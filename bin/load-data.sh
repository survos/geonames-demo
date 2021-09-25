dbname=geonames

#heroku pg:reset --confirm jufj-scorecard  && echo "CREATE EXTENSION pg_trgm; CREATE EXTENSION \"uuid-ossp\";  CREATE EXTENSION hstore;" | heroku pg:psql
#echo "create user main WITH ENCRYPTED PASSWORD 'main';" | sudo -u postgres psql

echo "drop database if exists $dbname; create database $dbname; grant all privileges on database $dbname to main; " | sudo -u postgres psql
echo "database $dbname now ready for migrations or restore"

bin/console doctrine:schema:update --force
bin/console bordeux:geoname:import --countries

#git clean -f migrations/app/V*.php
#bin/console doctrine:migrations:diff  --configuration config/migrations/app_migrations.yaml  --em=default
#bin/console doctrine:migrations:migrate  --configuration config/migrations/app_migrations.yaml  --em=default -n

bin/console bordeux:geoname:import --skip-geoname

#bin/console doctrine:schema:update --dump-sql --em=default
#bin/console make:migration
#bin/console doctrine:migrations:migrate -n
#bin/console hautelook:fixtures:load -n
#bin/create-admins.sh


