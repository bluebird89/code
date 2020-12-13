container=app

up:
    docker-compose up -d

build:
    docker-compose rm -vsf
    docker-compose down -v --remove-orphans
    docker-compose build
    docker-compose up -d

down:
    docker-compose down

require:
    docker-compose run ${container} composer require

require-dev:
    docker-compose run ${container} composer require --dev

run:
    docker-compose run ${container} php index.php

jumpin:
    docker-compose run ${container} bash

test:
    docker-compose run ${container} ./vendor/bin/phpunit ./tests/

test-file:
    docker-compose run ${container} ./vendor/bin/phpunit ./tests/ --group $(FILE)

stan:
    docker-compose run ${container} ./vendor/bin/phpstan analyse $(FILE) --level 7

cs-fixer:
    docker-compose run ${container} ./vendor/bi/php-cs-fixer fix $(FILE)

tail-logs:
    docker-compose logs -f ${container}
