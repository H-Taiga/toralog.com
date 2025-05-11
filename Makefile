include .env

up:
	docker compose up -d --build

down:
	docker-compose down --rmi all --volumes --remove-orphans