<?php

namespace Tables;

use Phoenix\Migration\AbstractMigration;

class Users extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('users')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('mobile', 'biginteger')
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('created_time', 'biginteger')
            ->create();
        $this->execute('ALTER TABLE users ADD UNIQUE (email);');
        $this->execute('ALTER TABLE users ADD UNIQUE (mobile);');
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE users CASCADE;');
    }
}