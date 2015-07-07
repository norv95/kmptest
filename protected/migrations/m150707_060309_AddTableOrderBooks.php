<?php

class m150707_060309_AddTableOrderBooks extends CDbMigration
{
	public function up()
	{
        $sql = "CREATE TABLE  `order_books` (
                  `id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                  `order_id` INT( 12 ) NOT NULL ,
                  `book_id` INT( 12 ) NOT NULL,
                  `books_cnt` INT NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;" ;

        $this->execute($sql);

 	}

	public function down()
	{
        $sql = "DROP TABLE `order_books`";
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