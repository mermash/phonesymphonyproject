# use from
# https://github.com/alejandro-yakovlev/symfony-docker

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

# APP #
#

#come in inside container
.PHONY: app_bash
app_bash:
	docker-compose -f ./docker/docker-compose.yml exec -u www-data php-fpm bash
