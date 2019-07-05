<?php

use Phoenix\Migration\AbstractMigration;

class TestDataMessages extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "messages" ("chat_id", "created_time", "message", "user_from", "user_to")
        VALUES (1, EXTRACT(epoch FROM now()), \'Hello, how are you?\', 1, 2),
               (1, EXTRACT(epoch FROM now()), \'Hi, hz...\', 2, 1),
               (2, EXTRACT(epoch FROM now()), \'Hello\', 3, 4),
               (2, EXTRACT(epoch FROM now()), \'Au\', 3, 4),
               (2, EXTRACT(epoch FROM now()), \'Bye...\', 3, 4);
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "messages"
        WHERE chat_id = 1 AND user_from = 1 AND user_to = 2 OR 
              chat_id = 1 AND user_from = 2 AND user_to = 1 OR 
              chat_id = 2 AND user_from = 3 AND user_to = 4 OR 
              chat_id = 2 AND user_from = 3 AND user_to = 4 OR 
              chat_id = 2 AND user_from = 3 AND user_to = 4;');
    }
}
