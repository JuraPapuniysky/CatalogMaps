<?php

use yii\db\Migration;

class m170227_081424_db_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'country_id' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'address' => $this->string((['length' => 255]))->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'country_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->createIndex('FK_city_country', '{{%city}}', 'country_id');
        $this->addForeignKey('FK_city_country', '{{%city}}', 'country_id', '{{%country}}', 'id');

        $this->createIndex('FK_catalog_country', '{{%catalog}}', 'country_id');
        $this->addForeignKey('FK_catalog_country', '{{%catalog}}', 'country_id', '{{%country}}', 'id');

        $this->createIndex('FK_catalog_city', '{{%catalog}}', 'city_id');
        $this->addForeignKey('FK_catalog_city', '{{%catalog}}', 'city_id', '{{%city}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%catalog}}');
        $this->dropTable('{{%country}}');
        $this->dropTable('{{%city}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
