<?php
$this->breadcrumbs=array(
	'Soap Client',
);?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
echo CHtml::beginForm();

echo CHtml::label('Название','name');
echo CHtml::textfield('name');
echo CHtml::tag('br');echo CHtml::tag('br');
echo CHtml::label('Автор','author');
echo CHtml::textfield('author');
echo CHtml::tag('br');

echo CHtml::tag('br');
echo CHtml::submitButton('Отправить');
echo CHtml::tag('br');echo CHtml::tag('br');
echo CHtml::endForm($this->action->id);

foreach ($books as $book) {
    echo CHtml::link($book['title'], $this->createUrl($this->getId().'/GetBookInfo',array('book_id'=> $book['id'])));
    echo '<br><br>';
    /*echo CHtml::link($book['title']);*/
}
?>