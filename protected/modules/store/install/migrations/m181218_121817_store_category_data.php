<?php

class m181218_121817_store_category_data extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{store_category}}', 'data', 'longtext');
    }

    public function safeDown()
    {
        $this->dropColumn('{{store_category}}', 'data');
    }
}