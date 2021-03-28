<?php

use yii\db\Migration;

/**
 * Class m210327_131040_create_table_solutions
 */
class m210327_131040_create_table_solutions extends Migration
{
    public function up()
    {
        $this->createTable('solutions', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'image' => $this->string(255)->null(),
            'status' => $this->integer(11)->defaultValue(1),
            'sort' => $this->integer(11)->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('solutions');
    }
}
