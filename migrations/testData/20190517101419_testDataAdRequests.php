<?php

use Phoenix\Migration\AbstractMigration;

class TestDataAdRequests extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('INSERT INTO "ad_requests" ("ad_id", "created_time", "moderator_id", "reason_id", "status_id", "updated_time")
        VALUES (1, EXTRACT(epoch FROM now()), 1, null, 1, null),
               (2, EXTRACT(epoch FROM now()), 1, null, 1, null),
               (3, EXTRACT(epoch FROM now()), 1, null, 1, null),
               (4, EXTRACT(epoch FROM now()), 1, null, 1, null);
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "ad_requests"
        WHERE ad_id = 1 AND reason_id = 1 AND status_id = 1 OR 
              ad_id = 2 AND reason_id = 1 AND status_id = 1 OR 
              ad_id = 3 AND reason_id = 1 AND status_id = 1 OR 
              ad_id = 4 AND reason_id = 1 AND status_id = 1;');
    }
}
