# Point Type
Point Type to Doctrine2
## How to use

First, composer install:

```
composer require cvek/doctrine-point
```

Add it in your app/config yml files
```
doctrine:
    dbal:
        types:
            point: Cvek\Point\PointType
        default_connection: default
        connections:
            default:
                driver: pdo_mysql
                host: '%database_host%'
                port: '%database_port%'
                dbname: '%database_name%'
                user: '%database_user%'
                password: '%database_password%'
                charset: UTF8
                mapping_types:
                    point: point
```
