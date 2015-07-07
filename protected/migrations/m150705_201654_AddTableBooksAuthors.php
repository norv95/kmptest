<?php

class m150705_201654_AddTableBooksAuthors extends CDbMigration
{
	public function up()
	{
        $sql = "CREATE TABLE  `books_authors` (
            `id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `author_id` INT( 12 ) NOT NULL ,
            `book_id` INT( 12 ) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;" ;

        $this->execute($sql);
	}

	public function down()
	{
        $sql = "DROP TABLE `books_authors`";
        $this->execute($sql);
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}