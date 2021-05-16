# K8s-demo Static-nginx deployment

Demo files for k8s-learning

1. nginx-depl.yaml  
2. nginx-svc.yaml 

kubectl apply -f nginx-depl.yaml 
kubectl apply -f nginx-svc.yaml 

kubectl get deployment
kubectl get pod
kubectl get svc 

Service == loadbalancing, state will stay pending, pod access by port number, somewhere in the +30000

kubectl delete deployment/nginx-depl 
kubectl delete service/nginx-service 





