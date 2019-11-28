# Kubernetes-demo

demo for running services in Kubernetes.

# Steps

0. install `kubectl` and `helm`, run `helm init` to init both server (install tiller) and client.

1. Optional: build and push Docker images (if you need) under `mysql/master`, `mysql/slave`, `archlinux-php`, `backend-service`, `backend-www`. If you build and push images yourself, you need to change container image in the corresponding yaml files.

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

7. Test if all are ok:

```shell
# get backend-www's EXTERNAL-IP
kubectl get svc

# If you have EXTERNAL-IP
curl -i -XPOST EXTERNAL-IP/user?name=fatcat

# If you have no EXTERNAL-IP
# Change xxxx to your Pod name
kubectl exec backend-www-xxxx -- curl -i -XPOST "backend-www/user?name=fatcat"

# Check fatcat_db.user table in mysql master or slave if data inserted
...
```

8. Maybe the most exciting features of Kubernetes:

```shell
# scaling
kubectl scale --replicas 6 deployment/backend-service
kubectl scale --replicas 6 deployment/backend-www
kubectl scale --replicas 4 deployment/mysql-slave

# autoscaler
kubectl autoscale deployment/backend-service --min=2 --max=20 --cpu-percent=50

# graceful upgrading
kubectl set image deployment/backend-service backend-service=ideal/backend-service:0.0.1

# graceful restarting
kubectl rollout restart deployment/backend-www
```

![Pods](.image/pods.png?raw=true "Pods")

