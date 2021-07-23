CONTAINER_NAME ?= lapel

start:
	docker-compose up -d 

stop:
	docker-compose stop

init:
	docker-compose up -d --build 