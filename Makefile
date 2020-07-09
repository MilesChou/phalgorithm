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
