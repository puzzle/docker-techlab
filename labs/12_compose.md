# Docker Lab: Orchestration

Instead of managing the containers with the `docker` command, you may use [Docker Compose](https://docs.docker.com/compose/) to handle them.

First, install the `docker-compose` command:

```
sudo apt-get install docker-compose
```

## Docker Compose file

Previously we run:

```
docker run --name mariadb-container-with-existing-external-volume -v$(pwd)/datastore-mysql:/var/lib/mysql -it -e MYSQL_ROOT_PASSWORD=my-secret-pw -d mariadb
```

and

```
docker run -itd --name php-app -p8080:80 --link mariadb-container-with-existing-external-volume php-app
```

We now create a file called `docker-compose.yml`:

```
version: '2'

services:

  php-app:
    image: php-app
    ports:
      - '8080:80'
    networks:
      - docker-techlab

  mariadb-container-with-existing-external-volume:
    image: mariadb
    environment:
      - MYSQL_ROOT_PASSWORD=my-secret-pw
    volumes:
      - './datastore-mysql:/var/lib/mysql'
    networks:
      - docker-techlab

networks:
  docker-techlab:
```

For each of the `docker run` commands, you add an entry under `services`, containing the appropriate options. The various options are described in the [Compose file reference](https://docs.docker.com/compose/compose-file/).

Having this file, you can run both containers with a simple command:

```
docker-compose up
```

Then again, check localhost/db.php in the browser.

[← Troubleshooting](11_troubleshooting.md) |
[Registry and Docker Hub →](13_dockerhub.md)
