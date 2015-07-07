<?php

class m150705_200840_AddTableAuthors extends CDbMigration
{
	public function up()
	{
        $sql = "CREATE TABLE  `authors` (
                  `id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                  `name` VARCHAR( 255 ) NOT NULL ,
                  `secname` VARCHAR( 255 ) NULL ,
                  `lastname` VARCHAR( 255 ) NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;" ;

        $this->execute($sql);
	}

	public function down()
	{
		$sql = "DROP TABLE  `authors`";
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