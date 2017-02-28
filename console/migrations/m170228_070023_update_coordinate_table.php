<?php

use yii\db\Migration;

class m170228_070023_update_coordinate_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%coordinate}}', 'lat', $this->float()->notNull());
        $this->addColumn('{{%coordinate}}', 'lng', $this->float()->notNull());
        $this->addColumn('{{%coordinate}}', 'name', $this->string(['length' => 255]));
        $this->addColumn('{{%coordinate}}', 'place_id', $this->string(['length' => 255]));
        $this->addColumn('{{%coordinate}}', 'reference', $this->string());
        $this->addColumn('{{%coordinate}}', 'formated_address', $this->string(['length' => 255]));
    }

    public function down()
    {
        echo "m170228_070023_update_coordinate_table cannot be reverted.\n";

        return false;
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
