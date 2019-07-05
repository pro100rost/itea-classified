<?php

namespace Tables;

use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

class Chats extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('chats')
            ->addColumn('ad_id', 'integer')
            ->addColumn('user_from', 'integer')
            ->addColumn('user_to', 'integer')
            ->addColumn('created_time', 'biginteger')
            ->addForeignKey('user_from', 'users', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('user_to', 'users', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('ad_id', 'ads', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->create();
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE chats CASCADE;');
    }
}