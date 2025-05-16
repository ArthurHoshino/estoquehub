PWD ?= $(shell pwd)

initial:
php .\config\dbInitialConfig.php

up:
php .\db\migrateUp.php

down:
php .\db\migrateDown.php