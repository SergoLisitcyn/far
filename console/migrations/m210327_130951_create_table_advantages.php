<?php

use yii\db\Migration;

/**
 * Class m210327_130951_create_table_advantages
 */
class m210327_130951_create_table_advantages extends Migration
{
    public function up()
    {
        $this->createTable('advantages', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'image' => $this->string(255)->null(),
            'status' => $this->integer(11)->defaultValue(1),
            'sort' => $this->integer(11)->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('advantages');
    }
}
