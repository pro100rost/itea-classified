<?php

use Phoenix\Migration\AbstractMigration;

class TestDataPhotos extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "photos" ("ad_id", "created_time", "is_main", "name")
        VALUES (1, EXTRACT(epoch FROM now()), false, \'car2.jpg\'),
               (1, EXTRACT(epoch FROM now()), true, \'car.jpg\'),
               (2, EXTRACT(epoch FROM now()), true, \'scooter.jpg\'),
               (2, EXTRACT(epoch FROM now()), false, \'scooter2.jpg\'),
               (3, EXTRACT(epoch FROM now()), true, \'flat.jpg\'),
               (4, EXTRACT(epoch FROM now()), false, \'dress2.jpg\'),
               (4, EXTRACT(epoch FROM now()), true, \'dress.jpg\'),
               (4, EXTRACT(epoch FROM now()), false, \'dress3.jpg\');
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "photos"
        WHERE name = \'car2.jpg\' OR 
              name = \'car.jpg\' OR 
              name = \'scooter.jpg\' OR 
              name = \'scooter2.jpg\' OR 
              name = \'flat.jpg\' OR 
              name = \'dress2.jpg\' OR 
              name = \'dress.jpg\' OR 
              name = \'dress3.jpg\';');
    }
}
