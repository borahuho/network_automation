docker network create nginx
docker volume create nginx 

sudo mkdir -p /etc/nginx-demo/nginx
cd /etc/nginx-demo/nginx
sudo mkdir -p ssl/default && sudo openssl req -x509 -newkey rsa:2048 -nodes -keyout ssl/default/privkey.pem -out ssl/default/fullchain.pem -days 36500 -subj '/CN=localhost'
sudo openssl dhparam -out ssl/dhparam.pem 4096

sudo nano Dockerfile

FROM nginx

copy www /usr/share/nginx/html

sudo docker build -t nginx-demo

docker run \
    -d --restart=unless-stopped \
    --name nginx \
    -p 80:80 -p 443:443 \
    --net nginx \
    --log-driver=syslog --log-opt syslog-facility=local5 -v /dev/log:/dev/log \
    -v /etc/nginx-demo/nginx/nginx.conf:/etc/nginx/nginx.conf:ro \
    -v /etc/nginx-demo/nginx/plugins.d/:/etc/nginx/plugins.d/:ro \
    -v /etc/nginx-demo/nginx/sites-enabled.d/:/etc/nginx/sites-enabled.d/:ro \
    -v /etc/nginx-demo/nginx/ssl/:/etc/nginx/ssl/:ro \
    nginx-demo
    
    
    # stop && remove container from list
    docker stop nginx 
    docker rm nginx 

