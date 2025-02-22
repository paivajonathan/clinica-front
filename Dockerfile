FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

RUN mkdir -p /tmp/database && \
    mv /var/www/html/database/database.sqlite /tmp/database/database.sqlite && \
    chmod -R 777 /tmp/database

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV DB_CONNECTION sqlite
ENV DB_DATABASE /tmp/database/database.sqlite
ENV APP_ENV production
ENV APP_DEBUG true
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]