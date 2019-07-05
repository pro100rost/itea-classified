<?php

namespace Tables;

use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

class Ads extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('ads')
            ->addColumn('user_id', 'integer')
            ->addColumn('category_id', 'integer')
            ->addColumn('status_id', 'integer')
            ->addColumn('reason_id', 'integer')
            ->addColumn('created_time', 'biginteger')
            ->addColumn('updated_time', 'biginteger')
            ->addColumn('title', 'string')
            ->addColumn('description', 'text')
            ->addColumn('price', 'integer')
            ->addColumn('currency', 'string')
            ->addColumn('main_photo', 'string')
            ->addColumn('city_id', 'integer')
            ->addColumn('is_deleted', 'boolean')
            ->addForeignKey('user_id', 'users', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('category_id', 'categories', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->addForeignKey('city_id', 'cities', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->create();
        $this->execute('ALTER TABLE ads ALTER COLUMN reason_id DROP NOT NULL;');
        $this->execute('ALTER TABLE ads ALTER COLUMN main_photo DROP NOT NULL;');
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE ads CASCADE;');
    }
}