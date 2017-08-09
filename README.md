# PHP Docker Example

With this example you can easly launch your first PHP application in Docker.

## Preparation

First of all you need [Docker](https://docs.docker.com/engine/installation/) and [Docker Compose](https://docs.docker.com/compose/install/).

When you get this programs you need to clone this repository using your git client or pure shell

    git clone https://github.com/ventaquil/php-docker-example.git
  
If you are using Linux maybe you will be necessary to change permissions of `./database` directory.

You can do that with this command

    chown -R :docker ./database

## Launch services

Just call comand below to start your PHP application

    docker-compose up
    
At first time you will see pulling and building process.

## Experiment

You can change PHP version in just 2 lines of code.

Firstly change first line of `./apache/Dockerfile` into i.e. `FROM php:5.6-apache`.

Then edit `./docker-compose.yml` by just changing line `image: "php:7.1-apache-custom"` into `image: "php:5.6-apache-custom"`.

Restart your application and... it's all!

## More information

Here you have some useful links:
- [Docker Compose file reference](https://docs.docker.com/compose/compose-file/)
- [Docker Compose command-line reference](https://docs.docker.com/compose/reference/)
- [Dockerfile reference](https://docs.docker.com/engine/reference/builder/)
- [PHP Repository in Docker Hub](https://hub.docker.com/_/php/)

