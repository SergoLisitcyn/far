<?php

use yii\db\Migration;

/**
 * Class m210326_220513_create_table_otdel
 */
class m210326_220513_create_table_otdel extends Migration
{
    public function up()
    {
        $this->createTable('otdel', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'status' => $this->integer(11)->defaultValue(1),
            'sort' => $this->integer(11)->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('otdel');
    }
}
