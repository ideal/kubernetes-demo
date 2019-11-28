# kubernetes-demo

demo for running services in kubernetes.

# Steps

0. install `kubectl` and `helm`, run `helm init` to init both server (install tiller) and client.

1. Optional: build and push Docker images (if you need) under `mysql/master`, `mysql/slave`, `archlinux-php`, `backend-service`, `backend-www`. If you build and push images yourself, you need to change container image in all yaml files.

2. Deploy MySQL master:

```shell
kubectl apply -f mysql/master/mysql-master-local.yaml
```

3. Deploy MySQL slave:

```shell
kubectl apply -f mysql/slave/mysql-slave-local.yaml
```

4. Deploy consul:

Change server.storage and server.storageClass to fit your requirement.

```shell
git submodule update --init
cd consul/consul-helm && helm install --name consul --set server.storage=20Gi,server.storageClass=alicloud-disk-ssd ./
```

5. Deploy backend-service, which provides jsonrpc service for backend-www:

```shell
kubectl apply -f backend-service/backend-service.yaml
```

6. Deploy backend-www, which calls backend-service and provides HTTP web access:

```shell
kubectl apply -f backend-www/backend-www.yaml
```

7. Testing if all are ok:

```shell
# get backend-www's EXTERNAL-IP
kubectl get svc

# If you have EXTERNAL-IP
curl -i -XPOST EXTERNAL-IP/user?name=fatcat

# If you have no EXTERNAL-IP
# Change xxxx to your Pod name
kubectl exec backend-www-xxxx -- curl -i -XPOST "backend-www/user?name=fatcat"

# Then check fatcat_db.user table in mysql master or slave
```

