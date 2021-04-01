<?php

use yii\db\Migration;

/**
 * Class m210401_203228_update_table_main_page
 */
class m210401_203228_update_table_main_page extends Migration
{
    public function up()
    {
        $this->dropColumn('main_page', 'phone');
        $this->dropColumn('main_page', 'email_contact');
        $this->dropColumn('main_page', 'email_footer');
        $this->addColumn('main_page', 'phone', $this->string(255)->null());
        $this->addColumn('main_page', 'email_contact', $this->string(255)->null());
        $this->addColumn('main_page', 'email_footer', $this->string(255)->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('main_page', 'phone');
        $this->dropColumn('main_page', 'email_contact');
        $this->dropColumn('main_page', 'email_footer');
    }
}
