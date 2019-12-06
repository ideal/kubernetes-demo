package org.cat;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;

@SpringBootApplication
public class IndexApplication {
  public static void main(String[] args) {
      SpringApplication.run(IndexApplication.class, args);
  }

  @RestController
  public class CatController {

    @GetMapping("/")
    public String root() {
        return "hello";
    }

    @GetMapping("/health")
    public String health() {
        return "ok";
    }
  }
}
