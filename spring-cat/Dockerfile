FROM java:8

LABEL maintainer="ideal <idealities@gmail.com>"

RUN mkdir /var/www

ADD target/spring-cat-demo.jar /var/www

WORKDIR /var/www

CMD ["java", "-jar", "spring-cat-demo.jar"]
