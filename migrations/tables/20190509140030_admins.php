<?php

namespace Tables;

use Phoenix\Migration\AbstractMigration;

class Admins extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('admins')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('role_id', 'integer')
            ->addColumn('created_time', 'biginteger')
            ->create();
        $this->execute('ALTER TABLE admins ADD UNIQUE (email);');
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE admins CASCADE;');
    }
}