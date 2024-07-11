cd /home/ubuntu/example
cp Caddyfile.production Caddyfile
chown -R ubuntu:ubuntu Caddyfile
docker compose build
docker compose -f docker-compose.yml -f docker-compose.production.yml up --no-deps -d
# docker compose exec app bash -c 'php artisan migrate'
