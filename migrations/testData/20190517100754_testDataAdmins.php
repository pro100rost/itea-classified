<?php

use ClientModels\services\ConfigParser;
use Phoenix\Migration\AbstractMigration;

class TestDataAdmins extends AbstractMigration
{
    protected function up(): void
    {
        $password = 'pass1234';
        $email = 'super_admin@gmail.com';

        $salt = 'classified';

        $adminEmail = hash('sha256', $salt . $email);
        $adminPassword = hash('sha256', $salt . $password);

        $this->execute('INSERT INTO "admins" ("created_time", "email", "password", "role_id")
        VALUES (EXTRACT(epoch FROM now()), \'' . $adminEmail . '\', \'' . $adminPassword . '\', 1);
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM admins WHERE email = \'super_admin@gmail.com\';');
    }
}
