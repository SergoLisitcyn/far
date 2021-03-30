<?php

use yii\db\Migration;

/**
 * Class m210330_224330_create_table_terms
 */
class m210330_224330_create_table_terms extends Migration
{
    public function up()
    {
        $this->createTable('terms', [
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
        $this->dropTable('terms');
    }
}
