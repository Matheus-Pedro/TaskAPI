FROM mysql:latest

COPY ./scripts/ /docker-entrypoint-initdb.d/
