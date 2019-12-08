package org.cat.impl;

import com.googlecode.jsonrpc4j.JsonRpcMethod;
import com.googlecode.jsonrpc4j.JsonRpcParam;
import com.googlecode.jsonrpc4j.JsonRpcService;
import com.googlecode.jsonrpc4j.spring.AutoJsonRpcServiceImpl;
import org.cat.ProductService;
import org.springframework.stereotype.Service;

@Service
@JsonRpcService("/product")
@AutoJsonRpcServiceImpl
public class ProductServiceImpl implements ProductService {
    @Override
    @JsonRpcMethod("/product/add")
    public String add(@JsonRpcParam(value = "name") String name, @JsonRpcParam(value = "price") Double price)
    {
        return "ok from Java service";
    }
}
