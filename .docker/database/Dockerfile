FROM mysql:5.7

#ENV MYSQL_DATABASE=attendant
#ENV MYSQL_USER=salimas
#ENV MYSQL_PASSWORD=salimas
#ENV MYSQL_ROOT_PASSWORD=root

COPY sql-scripts/createTable.sql /docker-entrypoint-initdb.d/

EXPOSE 3306

