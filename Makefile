down:
	docker compose down
up:
	docker compose up -d
build:
	docker compose up -d --build
bash:
	docker compose exec $(app) bash
