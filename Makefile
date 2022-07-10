
dev:
	@docker-compose -f docker-compose.local.yml  down \
	&& docker-compose -f docker-compose.local.yml up --build

test:
	@docker-compose -f docker-compose.testing.yml  down -v \
    	&& docker-compose -f docker-compose.testing.yml up

migrate:
	@docker-compose -f docker-compose.testing.yml run php php artisan migrate:refresh --seed --env=testing

