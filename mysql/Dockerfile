#使うDockerイメージ
FROM mysql:8.0

#MySQL設定ファイルをイメージ内にコピー
COPY my.cnf /etc/mysql/conf.d/my.cnf

RUN chmod 644 /etc/mysql/conf.d/my.cnf

#docker runに実行される
CMD ["mysqld"]
