# Classified Project

#### REQUIREMENTS

- PHP version > 7.0
- PhpStorm, ValentinaDB
- Linux
- Nginx, Apache

#### INSTALLATION

#####  Before pull

###### Create DataBase in Terminal (MacOS):

- `sudo psql postgres`
- `createuser "classified-admin"`
- `psql postgres -U "classified-admin"`
- `CREATE ROLE "classified-admin" WITH LOGIN PASSWORD 'itea1234';`
- `CREATE DATABASE classified_db;`
- `GRANT ALL PRIVILEGES ON DATABASE classified_db to "classified-admin";`
- `\list`
- `\q`

###### Create DataBase in Console (Ubuntu):

- `sudo -u postgres psql postgres`
- `# CREATE USER "classified-admin" WITH PASSWORD 'itea1234';`
- `# CREATE DATABASE classified_db WITH OWNER "classified-admin";`
- `# GRANT ALL PRIVILEGES ON DATABASE classified_db to "classified-admin";`
- `# \quit`
- `sudo systemctl restart postgresql`

##### Git pull

- `git init`
- `git remote add origin git@gitlab.com:itea-classified/classified.git`
- `git pull origin develop`

##### After pull

###### Install Composer in Terminal:

- `composer install`

###### Create configuration file:

Create directory `configs` in the root directory of your project. Then create file `config.ini` in this directory.

File input (for example):

```
[database]
dbms = pgsql
db_host = localhost
db_username = classified-admin
db_password = itea1234
db_name = classified_db
```

###### Create migrations in Terminal:

- `php vendor/bin/phoenix init`
- `php vendor/bin/phoenix migrate --dir=tables` to add tables to DB
- `php vendor/bin/phoenix migrate --dir=test_data` to add test data to tables
- `php vendor/bin/phoenix rollback --dir=tables` to delete last migration from tables
- `php vendor/bin/phoenix rollback --dir=test_data` to delete last migration from test_data
- `php vendor/bin/phoenix rollback --all` to delete all information

###### Create virtual host in local machine:

Configure the virtual host along the path: `/app/client-side/web`