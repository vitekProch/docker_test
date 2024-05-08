FROM mysql/mysql-server:8.0
COPY ./grant-privileges.sql /docker-entrypoint-initdb.d/
COPY ./hana_web.sql /docker-entrypoint-initdb.d/
