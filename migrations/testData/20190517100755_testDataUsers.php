<?php

use Phoenix\Migration\AbstractMigration;

class TestDataUsers extends AbstractMigration
{
    protected function up(): void
    {
        $email1 = 'genry42@ukr.net';
        $email2 = 'abc_d@mail.ru';
        $email3 = 'b-boy@i.ua';
        $email4 = 'normal_user@gmail.com';
        $password = 'pass1234';

        $salt = 'classified';

        $userPassword = hash('sha256', $salt . $password);
        $adminEmail1 = hash('sha256', $salt . $email1);
        $adminEmail2 = hash('sha256', $salt . $email2);
        $adminEmail3 = hash('sha256', $salt . $email3);
        $adminEmail4 = hash('sha256', $salt . $email4);

        $this->execute('INSERT INTO "users" ("created_time", "email", "first_name", "last_name", "mobile", "password")
        VALUES (EXTRACT(epoch FROM now()), \'' . $adminEmail1 . '\', \'Genry\', \'Hudson\', 380978521645, \'' . $userPassword . '\'),
               (EXTRACT(epoch FROM now()), \'' . $adminEmail2 . '\', \'Richard\', \'Lion\', 380634891234, \'' . $userPassword . '\'),
               (EXTRACT(epoch FROM now()), \'' . $adminEmail3 . '\', \'George\', \'Newton\', 380748978321, \'' . $userPassword . '\'),
               (EXTRACT(epoch FROM now()), \'' . $adminEmail4 . '\', \'Tom\', \'Jerry\', 380955326725, \'' . $userPassword . '\');
        ');
    }

    protected function down(): void
    {
        $this->execute('DELETE FROM "users"
        WHERE email = \'genry42@ukr.net\' OR 
              email = \'abc_d@mail.ru\' OR 
              email = \'b12v4yu@rambler.ru\' OR 
              email = \'normal_user@gmail.com\';');
    }
}
