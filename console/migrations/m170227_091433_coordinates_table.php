<?php

use yii\db\Migration;

class m170227_091433_coordinates_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%coordinate}}', [
            'id' => $this->primaryKey(),
            'catalog_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('FK_coordinate_catalog', '{{%coordinate}}', 'catalog_id');
        $this->addForeignKey('FK_coordinate_catalog', '{{%coordinate}}', 'catalog_id', '{{%catalog}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%coordinate}}');
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
