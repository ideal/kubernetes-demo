FROM java:8

RUN mkdir /var/www

ADD target/spring-cat-demo.jar /var/www

WORKDIR /vaw/www

CMD ["java", "-jar", "spring-cat-demo.jar"]
