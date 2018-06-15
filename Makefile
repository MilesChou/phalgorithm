#!/usr/bin/make -f

.PHONY: check test

check:
	php vendor/bin/phpcs

tests: check
	php vendor/bin/phpunit

coverage:
	php vendor/bin/phpunit --coverage-html=build