<?php

use Phoenix\Migration\AbstractMigration;

class TestDataAdMainPhotos extends AbstractMigration
{
    protected function up(): void
    {
        $this->execute('UPDATE ads SET main_photo = photos.name FROM photos WHERE photos.is_main = true AND photos.ad_id = 1 AND ads.id = 1;');
        $this->execute('UPDATE ads SET main_photo = photos.name FROM photos WHERE photos.is_main = true AND photos.ad_id = 2 AND ads.id = 2;');
        $this->execute('UPDATE ads SET main_photo = photos.name FROM photos WHERE photos.is_main = true AND photos.ad_id = 3 AND ads.id = 3;');
        $this->execute('UPDATE ads SET main_photo = photos.name FROM photos WHERE photos.is_main = true AND photos.ad_id = 4 AND ads.id = 4;');
    }

    protected function down(): void
    {
        $this->execute('UPDATE ads SET main_photo = null FROM photos WHERE photos.is_main = true AND photos.ad_id = 1 AND ads.id = 1;');
        $this->execute('UPDATE ads SET main_photo = null FROM photos WHERE photos.is_main = true AND photos.ad_id = 2 AND ads.id = 2;');
        $this->execute('UPDATE ads SET main_photo = null FROM photos WHERE photos.is_main = true AND photos.ad_id = 3 AND ads.id = 3;');
        $this->execute('UPDATE ads SET main_photo = null FROM photos WHERE photos.is_main = true AND photos.ad_id = 4 AND ads.id = 4;');
    }
}
