<?php

class m150705_201237_AddTableSuppliers extends CDbMigration
{
	public function up()
	{
        $sql = "CREATE TABLE  `suppliers` (
                  `id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                  `workid` VARCHAR( 255 ) NOT NULL ,
                  `name` VARCHAR( 255 ) NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;" ;

        $this->execute($sql);
    }

	public function down()
	{
        $sql = "DROP TABLE  `suppliers`";
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