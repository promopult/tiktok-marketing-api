check-all: cs psalm test

cs:
	composer cs-check

cs-fix:
	composer cs-fix

psalm:
	composer psalm

test:
	composer test
