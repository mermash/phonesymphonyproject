# DOCKER compose #
#

.PHONY: dc_build
dc_build:
	docker-compose -f ./docker/docker-compose.yml build

.PHONY: dc_start
dc_start:
	docker-compose -f ./docker/docker-compose.yml start

.PHONY: dc_stop
dc_stop:
	docker-compose -f ./docker/docker-compose.yml stop

.PHONY: dc_up
dc_up:
	docker-compose -f ./docker/docker-compose.yml up -d --remove-orphans

.PHONY: dc_ps
dc_ps:
	docker-compose -f ./docker/docker-compose.yml ps

.PHONY: dc_logs
dc_logs:
	docker-compose -f ./docker/docker-compose.yml logs -f

.PHONY: dc_down
dc_down:
	docker-compose -f ./docker/docker-compose.yml down -v --rmi=all --remove-orphans
# # App #
#

#come in inside container
.PHONY: app_bash
app_bash:
	docker-compose -f ./docker/docker-compose.yml exec -u www-data php-fpm bash


#composer require orm-pack
#composer require --dev symfony/maker-bundle
#./bin/console #all commands
#php bin/console make:entity
#php bin/console make:migration
#!!php bin/console doctrine:migrations:diff
#php bin/console doctrine:migrations:migrate

#composer require symfony/serializer-pack

#linter
#composer require --dev friendsofphp/php-cs-fixer
#vendor/bin/php-cs-fixer

#composer require --dev phpstan/phpstan
#vendor/bin/phpstan analyse src tests

#fixtures
#composer require --dev orm-fixtures
#php bin/console make:fixtures
#php bin/console doctrine:fixtures:load

#faker
#composer require fzaninotto/faker --dev

#validator
#composer require symfony/validator

#curl -H 'Content-Type: application/json' -XPOST -v "http://localhost:888/api/v1/user/" --data '{"name": "test", "birthdate": "22-05-1990"}'

#git init
#git add .
#git commit -m "first commit"
#git branch -M main
#git remote add origin git@github.com:mermash/phonesymphonyproject.git
#git push -u origin main
