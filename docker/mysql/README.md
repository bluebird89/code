## MySQL

```sh
docker run --name db -v custom:/etc/mysql/conf.d -e MYSQL_ROOT_PASSWORD=realsecret -d mysql:8
docker cp custom/my.cnf $(docker ps -qf "name=db"):/etc/mysql/conf.d/custom.cnf
docker restart $(docker ps -qf "name=db")

git clone git@github.com:datacharmer/test_db.git
docker cp test_db $(docker ps -qf "name=db"):/home/test_db/
docker exec -it $(docker ps -qf "name=db") bash

cd /home/test_db/
mysql -uroot -prealsecret mysql < employees.sql
touch /var/log/mysqlslow.log
chown mysql:mysql /var/log/mysqlslow.log

mysql -uroot -prealsecret mysql
show databases;
use employees;
show tables;
select * from employees limit 5;
select count(*) from employees where gender = 'M' limit 5;
select count(*) from employees where first_name = 'Sachin';

show index from employees from employees\G
explain select first_name, last_name from employees where first_name = 'Sachin'\G
explain analyze select first_name, last_name from employees where first_name = 'Sachin'\G
create index idx_firstname on employees(first_name);
explain analyze select first_name, last_name from employees where first_name = 'Sachin';

# Run the command below in two terminal tabs to open two shells into the container.
docker exec -it $(docker ps -qf "name=db") bash
mysql -uroot -prealsecret mysql
select sleep(3);

tail -f /var/log/mysqlslow.log
# Time: 2021-01-08T01:38:44.971805Z
# User@Host: root[root] @ localhost []  Id:     8
# Query_time: 3.000425  Lock_time: 0.000000 Rows_sent: 1  Rows_examined: 1
SET timestamp=1610069921;
select sleep(3);
```
