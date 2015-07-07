<?php

/**
 * This is the model class for table "books".
 *
 * The followings are the available columns in table 'books':
 * @property integer $id
 * @property string $title
 * @property string $isbn
 * @property string $annotation
 * @property integer $pagescount
 */
class Books extends CActiveRecord
{

    CONST MIN_LENGTH = 3;
    CONST LIMIT = 20;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'books';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, isbn, annotation, pagescount', 'required'),
			array('pagescount', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('isbn', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, isbn, annotation, pagescount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'booksAuthors' => array(self::MANY_MANY,'BooksAuthors','books_authors(book_id, author_id)'),
            'authors' => array(self::HAS_MANY, 'Authors', array('author_id' => 'id'), 'through' => 'booksAuthors')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'isbn' => 'Isbn',
			'annotation' => 'Annotation',
			'pagescount' => 'Pagescount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('isbn',$this->isbn,true);
		$criteria->compare('annotation',$this->annotation,true);
		$criteria->compare('pagescount',$this->pagescount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Books the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getBooks($name = '', $author = '') {

        $command = Yii::app()->db->createCommand()
            ->select("books.* , authors.* , GROUP_CONCAT(IFNULL(`authors`.`secname`,'')
                     , ' ', IFNULL(`authors`.`name`,''), ' '
                     , IFNULL(`authors`.`lastname`,'') SEPARATOR ', ') as fio" )
            ->from('books')
            ->leftJoin('books_authors booksAuthors_booksAuthors','books.id = booksAuthors_booksAuthors.book_id')
            ->leftJoin('books_authors booksAuthors','booksAuthors_booksAuthors.author_id = booksAuthors.id')
            ->leftJoin('authors authors','booksAuthors.author_id = authors.id')
            ->where('books.title like\'%'. $name . '%\'')
            ->group('books.id ')
            ->having(" LOCATE('". $author ."', fio )>0 ");


        if (($name  == '' && $author == '')
            || (strlen($name)  <= self::MIN_LENGTH && strlen($author) <= self::MIN_LENGTH)) {

            $command->limit(self::LIMIT);
        }

        return $command->queryAll();

    }

    public function getBookInfo($bookId) {

        return self::model()->with('booksAuthors','authors')->findByPk($bookId);
    }
}
