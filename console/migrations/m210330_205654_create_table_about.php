<?php

use yii\db\Migration;

/**
 * Class m210330_205654_create_table_about
 */
class m210330_205654_create_table_about extends Migration
{
    public function up()
    {
        $this->createTable('about', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'keywords' => $this->string(255),
            'status' => $this->integer(11)->defaultValue(1),
        ]);
    }

    public function down()
    {
        $this->dropTable('about');
    }
}
