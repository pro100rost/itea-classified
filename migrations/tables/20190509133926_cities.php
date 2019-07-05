<?php

namespace Tables;

use Phoenix\Migration\AbstractMigration;

class Cities extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('cities')
            ->addColumn('city', 'string')
            ->addColumn('created_time', 'biginteger')
            ->create();
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE cities CASCADE;');
    }
}