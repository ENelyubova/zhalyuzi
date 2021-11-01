<?php

class m181218_121819_store_category_add_columns_name_material_in_view_complect extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{store_category}}', 'name_material', "varchar(255) DEFAULT NULL");
        $this->addColumn('{{store_category}}', 'in_view_complect', "boolean not null default '0'");
    }

    public function safeDown()
    {
        $this->dropColumn('{{store_category}}', 'name_material');
        $this->dropColumn('{{store_category}}', 'in_view_complect');
    }
}