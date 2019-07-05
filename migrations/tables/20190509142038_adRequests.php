<?php

namespace Tables;

use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

class AdRequests extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('ad_requests')
            ->addColumn('ad_id', 'integer')
            ->addColumn('moderator_id', 'integer')
            ->addColumn('status_id', 'integer')
            ->addColumn('reason_id', 'integer')
            ->addColumn('created_time', 'biginteger')
            ->addColumn('updated_time', 'biginteger')
            ->addForeignKey('ad_id', 'ads', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('moderator_id', 'admins', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->create();
        $this->execute('ALTER TABLE ad_requests ALTER COLUMN reason_id DROP NOT NULL;');
        $this->execute('ALTER TABLE ad_requests ALTER COLUMN updated_time DROP NOT NULL;');
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE ad_requests CASCADE;');
    }
}