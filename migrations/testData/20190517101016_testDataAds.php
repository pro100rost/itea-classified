<?php

use Phoenix\Migration\AbstractMigration;

class TestDataAds extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "ads" ("category_id", "city_id", "created_time", "currency", "description", "is_deleted",
                            "main_photo", "price", "reason_id", "status_id", "title", "updated_time", "user_id")
        VALUES (6, 1, EXTRACT(epoch FROM now()), \'UAH\',
                \'The diesel engine makes for lagging acceleration from stopped, and produces more rattle than we would like.\',
                false, null, 20000, null, 1, \'BMW X5 tdi 3.5\', EXTRACT(epoch FROM now()), 1),
               (7, 2, EXTRACT(epoch FROM now()), \'USD\',
                \'Niken GT, a sport-touring motorcycle with the company’s leaning-multi-wheel (LMW) technology.\',
                false, null, 2500, null, 1, \'Yamaha 3CT Scooter\', (EXTRACT(epoch FROM now()) + 2), 2),
               (10, 3, EXTRACT(epoch FROM now()), \'EUR\',
                \'My favorite is to go for a good workout in their gym that overlooks downtown LA.\',
                false, null, 100000, null, 1, \'Flat in Peremogy prospect\', (EXTRACT(epoch FROM now()) + 3), 3),
               (15, 4, EXTRACT(epoch FROM now()), \'UAH\',
                \'Tee Review is known to give extremely honest reviews of dresses of all kinds.\',
                false, null, 200, null, 1, \'Fancy dress\', (EXTRACT(epoch FROM now()) + 4), 4);
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "ads"
        WHERE title = \'BMW X5 tdi 3.5\' OR 
              title = \'Yamaha 3CT Scooter\' OR 
              title = \'Flat in Peremogy prospect\' OR 
              title = \'Fancy dress\';');
    }
}
