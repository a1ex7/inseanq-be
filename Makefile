#!/usr/bin/make
# Makefile readme (ru): <http://linux.yaroslavl.ru/docs/prog/gnu_make_3-79_russian_manual.html>
# Makefile readme (en): <https://www.gnu.org/software/make/manual/html_node/index.html#SEC_Contents>

SHELL = /bin/sh

APP_CONTAINER_NAME := app
NODE_CONTAINER_NAME := node


docker_bin := $(shell command -v docker 2> /dev/null)
docker_compose_bin := $(shell command -v docker-compose 2> /dev/null)


# --- [ Development tasks ] -------------------------------------------------------------------------------------------

---------------: ## ---------------

build: ## Build all containers and start
	$(docker_compose_bin) up --build -d

up: ## Start all containers (in background) for development
	$(docker_compose_bin) up --no-recreate -d

down: ## Stop all started for development containers
	$(docker_compose_bin) down

restart: up ## Restart all started for development containers
	$(docker_compose_bin) restart

shell: up ## Start shell into application container
	$(docker_compose_bin) exec "$(APP_CONTAINER_NAME)" /bin/bash

node: up ## Start shell into node container
	$(docker_compose_bin) run --rm "$(NODE_CONTAINER_NAME)" sh

install: up ## Install application dependencies into application container
	$(docker_compose_bin) exec "$(APP_CONTAINER_NAME)" composer install --no-interaction --ansi --no-suggest
	$(docker_compose_bin) run --rm "$(NODE_CONTAINER_NAME)" npm install

watch: up ## Start watching assets for changes (node)
	$(docker_compose_bin) run --rm "$(NODE_CONTAINER_NAME)" npm run watch

init: install ## Make full application initialization (install, seed, build assets, etc)
	$(docker_compose_bin) exec "$(APP_CONTAINER_NAME)" artisan migrate --force --no-interaction -vvv
	$(docker_compose_bin) exec "$(APP_CONTAINER_NAME)" artisan db:seed --force -vvv
	$(docker_compose_bin) run --rm "$(NODE_CONTAINER_NAME)" npm run dev

test: up ## Execute application tests
	$(docker_compose_bin) exec "$(APP_CONTAINER_NAME)" composer phpstan
	$(docker_compose_bin) exec "$(APP_CONTAINER_NAME)" composer test
