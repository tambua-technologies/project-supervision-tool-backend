
dev:
	@docker-compose -f docker-compose.local.yml  down \
	&& docker-compose -f docker-compose.local.yml up --build

test:
	@docker-compose -f docker-compose.testing.yml  down -v \
    	  && docker-compose -f docker-compose.testing.yml run php php artisan migrate:refresh --seed --env=testing \
             && docker-compose -f docker-compose.testing.yml run php php artisan passport:install --env=testing \
             && docker-compose -f docker-compose.testing.yml up


tinker:
	@docker-compose -f docker-compose.testing.yml run php php artisan tinker --env=testing

dump-autoload:
	@docker-compose -f docker-compose.testing.yml run php composer dump-autoload


certbot-renew:
	@docker-compose  down \
    && docker-compose run certbot renew
	&& docker-compose up -d





