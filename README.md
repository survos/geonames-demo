# Geonames Demo

Loads the key tables from Geonames (www.geonames.org), using 
[bordeaux/geoname-bundle](https://github.com/bordeux/geoname-bundle)
and then visible via Easy Admin.

Requirements:

* [Symfony Local Server](https://symfony.com/doc/current/setup/symfony_server.html)
* PHP 8.0 +

## Run Locally

Super-fast to set up!  BUT kinda slow to load, depending on your computer and connection.

```bash
git clone git@github.com:survos/geonames-demo && cd geonames-demo
composer install
```

By default, this demo uses a sqlite database, if you use postgres or mysql configure DATABASE_URL in .env.local.  Otherwise, just make sure you have the sqlite extension loaded in PHP if you get an error in the next step.

```bash
bin/console doctrine:schema:update --force
bin/console bordeux:geoname:import -a http://download.geonames.org/export/dump/MX.zip --timezones=0 --env=prod

bin/console bordeux:geoname:import -a http://download.geonames.org/export/dump/US.zip --timezones=0 --env=prod
symfony server:start 
```

Note: the timezones=0 is a flag to NOT load timezones, which disappeared on April 2, 2020.  --env=prod disables some logging and speeds it up slightly.  Use -a to select a country for downloading, or remove that altogether to load everything (about 360M download).

Open your browser and you'll be able to search the various geonames tables.

## Note

Actually, it's using the [survos fork of the geoname bundle](https://github.com/survos/geoname-bundle).

