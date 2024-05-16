You have two options how to launch the script 
1. Use Docker
- Run docker-compose up --build
- Open terminal of fpm container - docker exec -it <container_id> bash (container_id - id of fpm container)
- Run script, for example: "php index.php 5 music file" OR "php index.php 5 music console"
2. Use PHP-8.2 
- Install PHP-8.2
- Run script, for example: "php index.php 5 music file" OR "php index.php 5 music console"