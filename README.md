A simple app on the laravel with form for records data from form to db.

## Install via docker-compose

For PostgreSQL use the port 5432, does not work otherwise. 😂🤦‍♂️

```
chmod +x install.sh
./install.sh
docker-compose build app
docker-compose up -d 
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec app php artisan key:generate
docker-compose exec app npm install
docker-compose exec app npm run prod
```

## Requirements

> 1GM RAM

[Follow the link how to enable swap](https://getcomposer.org/doc/articles/troubleshooting.md#proc-open-fork-failed-errors)

## License

The repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). 😁
