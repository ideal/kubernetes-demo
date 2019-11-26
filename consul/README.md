## 文档

https://www.consul.io/docs/platform/k8s/run.html

https://helm.sh/docs/intro/install/

## 步骤

1.

```shell
brew install helm
```

2.

```shell
git clone https://github.com/hashicorp/consul-helm.git
cd consul-helm
git checkout v0.12.0
helm install --name consul ./
```

