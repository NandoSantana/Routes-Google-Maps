<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Routes-Google-Maps - HOW INSTALL?
## Command composer
    - composer update

## Docker
Add File sharing path Nginx e FPM:
 - /Applications/MAMP/www/nameproject/run/var
 - /Applications/MAMP/www/nameproject/run
 - /Applications/MAMP/www/nameproject

## Import Database file
    - db-google-routes.sql

## Command build Docker
    - docker-compose build
    - docker-compose up


## Get Ip containers
    docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)

 ## access as localhost

