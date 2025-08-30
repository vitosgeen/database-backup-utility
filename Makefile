run:
	echo "Starting docker dev environment "
	docker-compose up --build -d

stop:
	docker-compose down

test:
	docker-compose exec dbu.app php artisan test

getlaravel:
	docker-compose exec dbu.app composer create-project --prefer-dist laravel/laravel . 11.*
	docker-compose exec dbu.app mkdir -p /var/www/html/storage/logs
	docker-compose exec dbu.app chmod -R 777 /var/www/html/storage/logs
	docker-compose exec dbu.app chmod -R 777 /var/www/html/storage/framework

install-app:
	docker-compose exec dbu.app composer install
	docker-compose exec dbu.app php artisan migrate

update-app:
	docker-compose exec dbu.app composer update
	docker-compose exec dbu.app php artisan migrate

migrate:
	docker-compose exec dbu.app php artisan migrate

acmd:
	docker-compose exec dbu.app php artisan $(cmd)

lint:
	docker-compose exec dbu.app ./vendor/bin/pint

composer-update:
	docker-compose exec dbu.app composer update