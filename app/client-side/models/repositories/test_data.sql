-- First SQL commands:
-- add data to table categories

INSERT INTO "categories" ("created_time", "depth", "name", "parent_id")
VALUES (EXTRACT(epoch FROM now()), 1, 'root', null),
       (EXTRACT(epoch FROM now()), 2, 'Transport', 1),
       (EXTRACT(epoch FROM now()), 2, 'Realty', 1),
       (EXTRACT(epoch FROM now()), 2, 'Electronic', 1),
       (EXTRACT(epoch FROM now()), 2, 'Clothes', 1),
       (EXTRACT(epoch FROM now()), 3, 'Cars', 2),
       (EXTRACT(epoch FROM now()), 3, 'Bicycles', 2),
       (EXTRACT(epoch FROM now()), 3, 'Motorcycles', 2),
       (EXTRACT(epoch FROM now()), 3, 'Houses', 3),
       (EXTRACT(epoch FROM now()), 3, 'Flats', 3),
       (EXTRACT(epoch FROM now()), 3, 'Cottages', 3),
       (EXTRACT(epoch FROM now()), 3, 'Computers', 4),
       (EXTRACT(epoch FROM now()), 3, 'Smartphones', 4),
       (EXTRACT(epoch FROM now()), 3, 'Tablets', 4),
       (EXTRACT(epoch FROM now()), 3, 'T-shirts', 5),
       (EXTRACT(epoch FROM now()), 3, 'Trousers', 5),
       (EXTRACT(epoch FROM now()), 3, 'Footwear', 5);

-- add data to table cities

INSERT INTO "cities" ("city", "created_time")
VALUES ('Kyiv', EXTRACT(epoch FROM now())),
       ('Lviv', EXTRACT(epoch FROM now())),
       ('Odesa', EXTRACT(epoch FROM now())),
       ('Kharkiv', EXTRACT(epoch FROM now()));

-- add data to table users

INSERT INTO "users" ("created_time", "email", "first_name", "last_name", "mobile", "password")
VALUES (EXTRACT(epoch FROM now()), 'genry42@ukr.net', 'Genry', 'Hudson', 380978521645, 'hnui2b42y1u'),
       (EXTRACT(epoch FROM now()), 'abc_d@mail.ru', 'Richard', 'Lion', 380634891234, 'hb2ti2nol21'),
       (EXTRACT(epoch FROM now()), 'b12v4yu@rambler.ru', 'George', 'Newton', 380748978321, 'n23j5bi23'),
       (EXTRACT(epoch FROM now()), 'normal_user@gmail.com', 'Tom', 'Jerry', 380955326725, '04081985');

-- add data to table admins

INSERT INTO "admins" ("created_time", "email", "password", "role_id")
VALUES (EXTRACT(epoch FROM now()), 'super_admin@gmail.com', 'nfbuni23KWEIF', 1);

------------------------------------------------------------------------------------------------------------------------

-- Second SQL command:
-- add data to table ads

INSERT INTO "ads" ("category_id", "city_id", "created_time", "currency", "description", "is_deleted",
                            "main_photo", "price", "reason_id", "status_id", "title", "updated_time", "user_id")
VALUES (6, 1, EXTRACT(epoch FROM now()), 'UAH',
        'The diesel engine makes for lagging acceleration from stopped, and produces more rattle than we would like.',
        false, null, 20000, null, 1, 'BMW X5 tdi 3.5', EXTRACT(epoch FROM now()), 1),
       (7, 2, EXTRACT(epoch FROM now()), 'USD',
        'Niken GT, a sport-touring motorcycle with the company’s leaning-multi-wheel (LMW) technology.',
        false, null, 2500, null, 1, 'Yamaha 3CT Scooter', EXTRACT(epoch FROM now()), 2),
       (10, 3, EXTRACT(epoch FROM now()), 'EUR',
        'My favorite is to go for a good workout in their gym that overlooks downtown LA.',
        false, null, 100000, null, 1, 'Flat in Peremogy prospect', EXTRACT(epoch FROM now()), 3),
       (15, 4, EXTRACT(epoch FROM now()), 'UAH',
        'Tee Review is known to give extremely honest reviews of T-shirts of all kinds.',
        false, null, 200, null, 1, 'Fancy T-shirt', EXTRACT(epoch FROM now()), 4);

------------------------------------------------------------------------------------------------------------------------

-- Third SQL commands:
-- add data to table photos

INSERT INTO "photos" ("ad_id", "created_time", "is_main", "name")
VALUES (1, EXTRACT(epoch FROM now()), false, 'car2.jpg'),
       (1, EXTRACT(epoch FROM now()), true, 'car.jpg'),
       (2, EXTRACT(epoch FROM now()), true, 'scooter.jpg'),
       (2, EXTRACT(epoch FROM now()), false, 'scooter2.jpg'),
       (3, EXTRACT(epoch FROM now()), true, 'flat.jpg'),
       (4, EXTRACT(epoch FROM now()), false, 'dress2.jpg'),
       (4, EXTRACT(epoch FROM now()), true, 'dress.jpg'),
       (4, EXTRACT(epoch FROM now()), false, 'dress3.jpg');

-- add data to table ad_requests

INSERT INTO "ad_requests" ("ad_id", "created_time", "moderator_id", "reason_id", "status_id", "updated_time")
VALUES (1, EXTRACT(epoch FROM now()), 1, null, 1, null),
       (2, EXTRACT(epoch FROM now()), 1, null, 1, null),
       (3, EXTRACT(epoch FROM now()), 1, null, 1, null),
       (4, EXTRACT(epoch FROM now()), 1, null, 1, null);

-- add data to table chats

INSERT INTO "chats" ("ad_id", "created_time", "user_from", "user_to")
VALUES (3, EXTRACT(epoch FROM now()), 1, 2),
       (4, EXTRACT(epoch FROM now()), 3, 4);

------------------------------------------------------------------------------------------------------------------------

-- Fourth SQL command:
-- add data to table messages

INSERT INTO "messages" ("chat_id", "created_time", "message", "user_from", "user_to")
VALUES (1, EXTRACT(epoch FROM now()), 'Hello, how are you?', 1, 2),
       (1, EXTRACT(epoch FROM now()), 'Hi, hz...', 2, 1),
       (2, EXTRACT(epoch FROM now()), 'Hello', 3, 4),
       (2, EXTRACT(epoch FROM now()), 'Au', 3, 4),
       (2, EXTRACT(epoch FROM now()), 'Bye...', 3, 4);

------------------------------------------------------------------------------------------------------------------------

-- Fifth SQL command:
-- update data at table ads

UPDATE ads
SET main_photo = photos.name
FROM photos
WHERE photos.is_main = true
  AND photos.ad_id = 1
  AND ads.id = 1;

UPDATE ads
SET main_photo = photos.name
FROM photos
WHERE photos.is_main = true
  AND photos.ad_id = 2
  AND ads.id = 2;

UPDATE ads
SET main_photo = photos.name
FROM photos
WHERE photos.is_main = true
  AND photos.ad_id = 3
  AND ads.id = 3;

UPDATE ads
SET main_photo = photos.name
FROM photos
WHERE photos.is_main = true
  AND photos.ad_id = 4
  AND ads.id = 4;