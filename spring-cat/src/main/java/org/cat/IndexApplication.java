package org.cat;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;

@SpringBootApplication
public class IndexApplication {
  public static void main(String[] args) {
      SpringApplication.run(IndexApplication.class, args);
  }

  @Controller
  public class CatController {

    @RequestMapping("/")
    public String root() {
        return "forward:/product";
    }

    @GetMapping("/health")
    @ResponseBody
    public String health() {
        return "ok";
    }
  }
}
