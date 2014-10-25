#!/usr/bin/make -f

.PHONY: check test

check:
	php vendor/bin/phpcs src tests --standard=PSR2

tests: check
	php vendor/bin/phpunit --testsuite tests --coverage-text --coverage-html=docs/coverage.html
