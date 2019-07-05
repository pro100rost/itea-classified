<?php

namespace Tables;

use Phoenix\Migration\AbstractMigration;

class Categories extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('categories')
            ->addColumn('name', 'string')
            ->addColumn('parent_id', 'integer')
            ->addColumn('depth', 'integer')
            ->addColumn('created_time', 'biginteger')
            ->create();
        $this->execute('ALTER TABLE categories ADD UNIQUE (name);');
        $this->execute('ALTER TABLE categories ALTER COLUMN parent_id DROP NOT NULL;');
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE categories CASCADE;');
    }
}
