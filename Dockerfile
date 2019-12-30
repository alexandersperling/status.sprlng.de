FROM alpine:latest
LABEL maintainer Alexander Sperling <alexander@sprlng.de>
RUN apk update -q && apk add \
	nginx \
	php7-fpm \
	php7-curl \
	supervisor
RUN mkdir /var/www/status
RUN mkdir -p /run/nginx
ADD config/status.conf /etc/nginx/conf.d/status.conf
ADD config/supervisord.conf /etc/
ADD config/php.ini /etc/php7-fpm/php.ini
ADD config/start.sh /start.sh
RUN chmod +x /start.sh 
EXPOSE 8083
CMD ["./start.sh"]
