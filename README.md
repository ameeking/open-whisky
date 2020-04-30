# Open Whisky

> Ready to use whisky tasting platform

## Features

* API
* Admin
* Client

## Useful commands

`docker-compose exec php bin/console make:entity --api-resource`

`docker-compose exec php bin/console make:entity --api-resource --regenerate`

`docker-compose exec php bin/console doctrine:schema:update --force`

`docker-compose exec php bin/console make:migration`

`docker-compose exec db psql -U api-platform api`

`docker-compose exec php composer require jwt-auth`

```
$ mkdir config/jwt
$ openssl genrsa -out config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
