#!/usr/bin/make -f

.PHONY: clean clean-all check test coverage bench

# ---------------------------------------------------------------------

all: tests

clean:
	rm -rf ./build

clean-all: clean
	rm -rf ./vendor
	rm -rf ./composer.lock

check:
	php vendor/bin/phpcs

test: check
	phpdbg -qrr vendor/bin/phpunit

coverage: test
	@if [ "`uname`" = "Darwin" ]; then open build/coverage/index.html; fi

bench:
	php vendor/bin/phpbench run --report=default

bench8.0-jit:
	docker-compose run --rm php8.0-jit

bench8.0:
	docker-compose run --rm php8.0

bench7.4:
	docker-compose run --rm php7.4

bench7.3:
	docker-compose run --rm php7.3

bench7.2:
	docker-compose run --rm php7.2

bench7.1:
	docker-compose run --rm php7.1
