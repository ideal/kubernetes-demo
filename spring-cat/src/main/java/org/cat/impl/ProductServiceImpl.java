package org.cat.impl;

import com.googlecode.jsonrpc4j.JsonRpcService;
import com.googlecode.jsonrpc4j.spring.AutoJsonRpcServiceImpl;
import org.cat.ProductService;
import org.springframework.stereotype.Service;

@Service
@JsonRpcService("/product")
@AutoJsonRpcServiceImpl
public class ProductServiceImpl implements ProductService {
    @Override
    public String add(String name, Double price)
    {
        return "ok";
    }
}
