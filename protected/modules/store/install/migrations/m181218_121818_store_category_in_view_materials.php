<?php

class m181218_121818_store_category_in_view_materials extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{store_category}}', 'in_view_materials', "boolean not null default '0'");
    }

    public function safeDown()
    {
        $this->dropColumn('{{store_category}}', 'in_view_materials');
    }
}