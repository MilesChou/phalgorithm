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

shell8.0:
	docker run -it --rm -v ${PWD}:/source:delegated -w /source php:8.0-rc-alpine sh

shell7.4:
	docker run -it --rm -v ${PWD}:/source:delegated -w /source php:7.4-alpine sh

shell7.3:
	docker run -it --rm -v ${PWD}:/source:delegated -w /source php:7.3-alpine sh

shell7.2:
	docker run -it --rm -v ${PWD}:/source:delegated -w /source php:7.2-alpine sh

shell7.1:
	docker run -it --rm -v ${PWD}:/source:delegated -w /source php:7.1-alpine sh
