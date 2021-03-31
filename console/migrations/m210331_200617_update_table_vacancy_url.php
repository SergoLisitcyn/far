<?php

use yii\db\Migration;

/**
 * Class m210331_200617_update_table_vacancy_url
 */
class m210331_200617_update_table_vacancy_url extends Migration
{
    public function up()
    {
        $this->addColumn('vacancy', 'url', $this->string(255)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('vacancy', 'url');
    }
}
