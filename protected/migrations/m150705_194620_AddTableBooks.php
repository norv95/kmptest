<?php

class m150705_194620_AddTableBooks extends CDbMigration
{
	public function up()
	{

        $sql = "CREATE TABLE  `books` (
            `id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `title` VARCHAR( 255 ) NOT NULL COMMENT  'Название',
            `isbn` VARCHAR( 30 ) NOT NULL ,
            `annotation` TEXT NOT NULL ,
            `pagescount` INT NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        $this->execute($sql);
	}

	public function down()
	{
        $sql = "DROP TABLE  `books`";
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