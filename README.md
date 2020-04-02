# Geonames Demo

## Run Locally

## Steps to Recreate This Demo 

Because u

composer config repositories.git-survos-geonames-bundle '{"type": "vcs", "url": "https://github.com/survos/geonames-bundle.git"}'

echo "DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db" >> .env.local


bin/console doctrine:schema:update --force --dump-sql
bin/console doctrine:fixtures:load -n
bin/console bordeux:geoname:import -a http://download.geonames.org/export/dump/US.zip

