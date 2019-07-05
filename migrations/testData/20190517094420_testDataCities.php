<?php

use Phoenix\Migration\AbstractMigration;

class TestDataCities extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "cities" ("city", "created_time")
        VALUES (\'Kyiv\', EXTRACT(epoch FROM now())),
               (\'Lviv\', EXTRACT(epoch FROM now())),
               (\'Odesa\', EXTRACT(epoch FROM now())),
               (\'Kharkiv\', EXTRACT(epoch FROM now()));
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "cities"
        WHERE city = \'Kyiv\' OR 
              city = \'Lviv\' OR 
              city = \'Odesa\' OR 
              city = \'Kharkiv\';');
    }
}
