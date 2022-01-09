
## Prerequeisetes
 1. Make sure Docker is installed
 2. Make sure docker-compose is installed

## Installating
``` bash 

# 1. clone the repository
$ git clone https://github.com/tambua-technologies/project-supervision-tool-backend.git

# 2. enter into the source codes directory
$ cd project-supervision-tool-backend

# 3. create .env file from .env.example file
$ cp .env.example .env

# 4. Build docker images
$ docker-compose build

# 5. orchestrate docker containers/services
$ docker-compose up -d

# 6. open php service/container
$ docker-compose exec php bash

# 7. install project dependendencies
$ composer install

# 8. create database tables
$ php artisan migrate

# 9. seed dummy data for testing
$ php artisan db:seed

# 10. create the encryption keys needed to generate secure access tokens
$ php artisan passport:install

# set application key.
$ php artisan key:generate

```

## Accessing & using API
- Open [localhost:800/api/docs](http://localhost:8000/api/docs) to view documentation

