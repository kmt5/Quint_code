FROM mysql:5.7.26
COPY ./my.cnf /etc/mysql/conf.d/

RUN groupmod -g 1000 mysql
RUN usermod -u 1000 -g 1000 mysql

RUN apt-get update
RUN apt-get -y install vim iputils-ping net-tools