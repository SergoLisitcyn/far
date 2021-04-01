<?php

use yii\db\Migration;

/**
 * Class m210331_211557_update_table_solution_adv_alt
 */
class m210331_211557_update_table_solution_adv_alt extends Migration
{
    public function up()
    {
        $this->addColumn('advantages', 'alt', $this->string(255)->defaultValue(null));
        $this->addColumn('solutions', 'alt', $this->string(255)->defaultValue(null));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('advantages', 'alt');
        $this->dropColumn('solutions', 'alt');
    }
}
