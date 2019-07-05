<?php

namespace Tables;

use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

class Messages extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('messages')
            ->addColumn('chat_id', 'integer')
            ->addColumn('message', 'text')
            ->addColumn('user_from', 'integer')
            ->addColumn('user_to', 'integer')
            ->addColumn('created_time', 'biginteger')
            ->addForeignKey('chat_id', 'chats', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('user_from', 'users', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('user_to', 'users', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->create();
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE messages CASCADE;');
    }
}