<?php

namespace TestData;

use Phoenix\Migration\AbstractMigration;

class TestDataCategories extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "categories" ("created_time", "depth", "name", "parent_id")
        VALUES (EXTRACT(epoch FROM now()), 1, \'root\', null),
               (EXTRACT(epoch FROM now()), 2, \'Transport\', 1),
               (EXTRACT(epoch FROM now()), 2, \'Realty\', 1),
               (EXTRACT(epoch FROM now()), 2, \'Electronic\', 1),
               (EXTRACT(epoch FROM now()), 2, \'Clothes\', 1),
               (EXTRACT(epoch FROM now()), 3, \'Cars\', 2),
               (EXTRACT(epoch FROM now()), 3, \'Bicycles\', 2),
               (EXTRACT(epoch FROM now()), 3, \'Motorcycles\', 2),
               (EXTRACT(epoch FROM now()), 3, \'Houses\', 3),
               (EXTRACT(epoch FROM now()), 3, \'Flats\', 3),
               (EXTRACT(epoch FROM now()), 3, \'Cottages\', 3),
               (EXTRACT(epoch FROM now()), 3, \'Computers\', 4),
               (EXTRACT(epoch FROM now()), 3, \'Smartphones\', 4),
               (EXTRACT(epoch FROM now()), 3, \'Tablets\', 4),
               (EXTRACT(epoch FROM now()), 3, \'Dresses\', 5),
               (EXTRACT(epoch FROM now()), 3, \'Trousers\', 5),
               (EXTRACT(epoch FROM now()), 3, \'Footwear\', 5);
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "categories"
        WHERE name = \'root\' OR 
              name = \'Transport\' OR 
              name = \'Realty\' OR 
              name = \'Electronic\' OR 
              name = \'Clothes\' OR 
              name = \'Cars\' OR 
              name = \'Bicycles\' OR 
              name = \'Motorcycles\' OR 
              name = \'Houses\' OR 
              name = \'Flats\' OR 
              name = \'Cottages\' OR 
              name = \'Computers\' OR 
              name = \'Smartphones\' OR 
              name = \'Tablets\' OR 
              name = \'T-shirts\' OR 
              name = \'Trousers\' OR 
              name = \'Footwear\';');
    }
}
