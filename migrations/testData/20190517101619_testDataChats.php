<?php

use Phoenix\Migration\AbstractMigration;

class TestDataChats extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "chats" ("ad_id", "created_time", "user_from", "user_to")
        VALUES (3, EXTRACT(epoch FROM now()), 1, 2),
               (4, EXTRACT(epoch FROM now()), 3, 4);
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "chats"
        WHERE ad_id = 3 AND user_from = 1 AND user_to = 2 OR 
              ad_id = 4 AND user_from = 3 AND user_to = 4;');
    }
}
