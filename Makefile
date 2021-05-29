CONTAINER_NAME ?= lapel

start:
	docker-compose up -d 

stop:
	docker-compose stop

init:
	docker-compose up -d --build 

# install:
# 	docker-compose exec $(CONTAINER_NAME) composer install
# 	docker-compose exec $(CONTAINER_NAME) php bin/install.php