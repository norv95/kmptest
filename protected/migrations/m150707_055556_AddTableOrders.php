<?php

class m150707_055556_AddTableOrders extends CDbMigration
{
	public function up()
	{
        $sql = "CREATE TABLE  `orders` (
                `id` INT( 12 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `created` DATETIME NOT NULL ,
                `status` TINYINT NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;" ;

        $this->execute($sql);

	}

	public function down()
	{
        $sql = "DROP TABLE `orders`";
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