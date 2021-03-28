<?php

use yii\db\Migration;

/**
 * Class m210327_153827_update_table_feedback
 */
class m210327_153827_update_table_feedback extends Migration
{
    public function up()
    {
        $this->addColumn('feedback', 'file_src_filename', $this->string()->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('feedback', 'file_src_filename');
    }
}
