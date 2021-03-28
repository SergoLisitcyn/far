<?php

use yii\db\Migration;

/**
 * Class m210326_212824_create_table_vacancy
 */
class m210326_212824_create_table_vacancy extends Migration
{
    public function up()
    {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'sfera' => $this->string(255)->notNull(),
            'city' => $this->string()->notNull(),
            'experience' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'keywords' => $this->string(255),
            'status' => $this->integer(11)->defaultValue(1),
            'sort' => $this->integer(11)->defaultValue(0),
        ]);
    }

    public function down()
    {
        $this->dropTable('vacancy');
    }
}
