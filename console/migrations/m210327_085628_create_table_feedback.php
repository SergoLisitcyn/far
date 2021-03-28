<?php

use yii\db\Migration;

/**
 * Class m210327_085628_create_table_feedback
 */
class m210327_085628_create_table_feedback extends Migration
{
    public function up()
    {
        $this->createTable('feedback', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'surname' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255),
            'phone' => $this->string(255),
            'filename' => $this->string(255),
            'link' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('feedback');
    }
}
