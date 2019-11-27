## 文档

https://www.consul.io/docs/platform/k8s/run.html

https://helm.sh/docs/intro/install/

## 步骤

1.

On macOS:

```shell
brew install helm
```

On archlinux:

Add archlinuxcn repo, see https://github.com/archlinuxcn/repo , and then:

```shell
sudo pacman -S kubernetes-helm
```

2.

```shell
git clone https://github.com/hashicorp/consul-helm.git
cd consul-helm
git checkout v0.12.0
helm install --name consul ./
```

备注：

对于阿里云上的Kubernetes集群，修改values.yaml里的storage为20Gi，修改storageClass为alicloud-disk-ssd，然后运行`helm install --name consul ./`。或者也直接不修改values.yaml，直接这样运行`helm install --name consul --set server.storage=20Gi,server.storageClass=alicloud-disk-ssd ./`。因为阿里云针对有些类型的StorageClass存在最小容量限制，参见https://www.alibabacloud.com/help/doc-detail/86612.htm .

另外阿里云的Kubernetes网络组件terway，不支持hostPort，需要将templates/server-service.yam l里的clusterIP: None去掉，即使用ClusterIP形式的Service。
