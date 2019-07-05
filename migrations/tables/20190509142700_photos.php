<?php

namespace Tables;

use Phoenix\Database\Element\ForeignKey;
use Phoenix\Migration\AbstractMigration;

class Photos extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('photos')
            ->addColumn('is_main', 'boolean')
            ->addColumn('ad_id', 'integer')
            ->addColumn('name', 'string')
            ->addColumn('created_time', 'biginteger')
            ->addForeignKey('ad_id', 'ads', 'id', ForeignKey::CASCADE, ForeignKey::CASCADE)
            ->create();
        $this->execute('ALTER TABLE photos ADD UNIQUE (name);');
        $this->execute('ALTER TABLE photos ALTER COLUMN is_main DROP NOT NULL;');
    }

    protected function down(): void
    {
        $this->execute('DROP TABLE photos CASCADE;');
    }
}