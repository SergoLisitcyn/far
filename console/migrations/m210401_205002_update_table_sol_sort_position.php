<?php

use yii\db\Migration;

/**
 * Class m210401_205002_update_table_sol_sort_position
 */
class m210401_205002_update_table_sol_sort_position extends Migration
{
    public function up()
    {
        $this->addColumn('solutions', 'sort_position', $this->integer(11)->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('solutions', 'sort_position');
    }
}
