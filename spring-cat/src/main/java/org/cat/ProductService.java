package org.cat;

import com.googlecode.jsonrpc4j.JsonRpcParam;

public interface ProductService {
    String add(@JsonRpcParam(value = "name") String name, @JsonRpcParam(value = "price") Double price);
}
