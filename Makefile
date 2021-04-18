#!make
include .env
export $(shell sed 's/=.*//' .env)

## Install project
install: .env vendor npm-i
	php artisan key:generate

## Create all databases
install_db:
	make create_database
	make fresh

## Run Code Sniffer
cs:
	./vendor/bin/phpcs --report=full

## Run fix Code Sniffer
csfix:
	./vendor/bin/phpcbf -w

## Run Larastan
stan:
	./vendor/bin/phpstan analyse --memory-limit=2G

## Run various tests
test:
	make schecker-$(APP_OS)
	make cs
	make stan

# BASE DE DONNEES
##Create database
create_database:
	php artisan mysql:create-database --force

## Migrate databases
migrate:
	php artisan migrate

## Fresh databases
fresh:
	php artisan migrate:fresh --seed

## Migrate databases
rollback:
	php artisan migrate:rollback

## Run Security Checker on Mac OS
schecker-macos:
	./local-php-security-checker-macos

## Run Security Checker on Windows
schecker-windows:
	./local-php-security-checker-windows.exe

# DEPENDANCES
## Copy .env.example
.env:
	cp .env.example .env

## Install composer dependencies
vendor:
	composer install

npm-i:
	npm install

# Help instructions
help:
	@echo "\033[0;33mUsage:\033[0m"
	@echo "     make [target]\n"
	@echo "\033[0;33mAvailable targets:\033[0m"
	@awk '/^[a-zA-Z\-\_0-9\.@]+:/ { \
		returnMessage = match(n4line, /^# (.*)/); \
		if (returnMessage) { \
			printf "\n"; \
			printf "     %s\n", n5line; \
			printf "     %s\n", n4line; \
			printf "     %s\n", n3line; \
			printf "\n"; \
		} \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf "     \033[0;32m%-22s\033[0m %s\n", helpCommand, helpMessage; \
		} \
	} \
	{ n5line = n4line; n4line = n3line; n3line = n2line; n2line = lastLine; lastLine = $$0;}' $(MAKEFILE_LIST)
	@echo ""
