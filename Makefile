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

.PHONY: app_bash
app_bash:
	docker-compose -f ./docker/docker-compose.yml exec -u www-data php-fpm bash
#create symfony app inside container
#composer create-project symfony/skeleton app
#mv ./app/* ./

#doctrine check xml-mapping
.PHONY: php_valid_map
php_valid_map:
	php bin/console doctrine:schema:validate #check mapping

#doctrine add migration
.PHONY: php_add_mig
php_add_mig:
	php bin/console doctrine:migrations:diff #add migration

#execute migration
.PHONY: php_ex_mig
php_ex_mig:
	php bin/console doctrine:migrations:migrate

#install faker for data
.PHONY: compose_faker
compose_faker:
	composer require --dev fakerphp/faker

#install fixture bundle
.PHONY: composer_fixture
composer_fixture:
	composer require --dev orm-fixtures

.PHONY: cc
cc:
	php bin/console cache:clear

#loading fixture when use ORM
.PHONY: load_fixutre
load_fixture:
	php bin/console doctrine:fixtures:load

.PHONY: load_fixutre_test
load_fixture_test:
	php bin/console doctrine:fixtures:load --env=test

# install LiipTestFixturesBundle
.PHONY: test_fixture
test_fixture:
	#composer require --dev liip/test-fixtures-bundle:^2.0.0
	composer require --dev liip/test-fixtures-bundle

#allow to wrap up to a transaction and after that rollback it
.PHONY: install_test_fixture
install_test_fixture:
	composer require --dev dama/doctrine-test-bundle

.PHONY: install_symfony_messanger
install_symfony_messanger:
	composer require symfony/messenger


.PHONY: inst_jwt_access
inst_jwt_access:
	composer require lexik/jwt-authentication-bundle

.PHONY: inst_refresh_token
inst_refresh_token:
	composer require doctrine/orm doctrine/doctrine-bundle gesdinet/jwt-refresh-token-bundle


.PHONY: migrate_diff
migrate_diff:
	php bin/console doctrine:migrations:diff

.PHONY: gen_ssl_keys
gen_ssl_keys:
	php bin/console lexik:jwt:generate-keypair

.PHONY: webmozart
webmozart:
	composer require webmozart/assert


.PHONY: migrate_migrate
migrate_migrate:
	php bin/console doctrine:migrations:migrate
	php bin/console doctrine:migrations:diff -n


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

.PHONY: db_migrate
db_migrate:
	php bin/console doctrine:migrations:migrate

.PHONY: db_load
db_load:
	php bin/console doctrine:fixtures:load

#validator
#composer require symfony/validator

#curl -H 'Content-Type: application/json' -XPOST -v "http://localhost:888/api/v1/user/" --data '{"name": "test", "birthdate": "22-05-1990"}'
