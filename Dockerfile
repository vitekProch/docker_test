FROM mysql/mysql-server:8.0
COPY ./mysql/grant-privileges.sql /docker-entrypoint-initdb.d/
COPY ./mysql/hana_web.sql /docker-entrypoint-initdb.d/
