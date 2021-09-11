# How to test Elasticsearch in PHP

This repository was created as a code reference for my blog post.

## Requirements

- PHP8.0 or later on your host machine.
- Docker

If you are not using PHP7.1, you can checkout to the master branch for PHP8.0

## How to use

Clone the repository and navigate to the project directory.

```
git clone https://github.com/imdhemy/testing-es-in-php.git
cd testing-es-in-php
```

Install dependencies

```
composer install
```

Start docker container

```
docker-compose up -d
```

## Testing

You can run tests from composer

```
composer test
```
