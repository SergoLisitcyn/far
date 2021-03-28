<?php

use yii\db\Migration;

/**
 * Class m210327_101800_create_table_main_page
 */
class m210327_101800_create_table_main_page extends Migration
{
    public function up()
    {
        $this->createTable('main_page', [
            'id' => $this->primaryKey(),
            'header_title' => $this->string(255)->notNull(),
            'header_subtitle' => $this->string(255)->notNull(),
            'header_desc' => $this->text()->notNull(),
            'name_company' => $this->string(255)->notNull(),
            'site' => $this->string(255)->null(),
            'address' => $this->string(255)->null(),
            'phone' => $this->string(255)->notNull(),
            'email_contact' => $this->string(255)->notNull(),
            'email_footer' => $this->string(255)->notNull(),
            'advantages' => $this->json(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'keywords' => $this->string(255),
        ]);
    }

    public function down()
    {
        $this->dropTable('vacancy');
    }
}
