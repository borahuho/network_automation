```
docker run -it -p 80:80 -p 443:443 --name nginx-alpine-ssl alpine /bin/sh

#Let’s install nginx now:
apk add nginx

#Make the directory that’s needed for nginx:
mkdir /run/nginx/

#Run nginx 
nginx

#Testing the server is running with curl
apk add curl
curl localhost

#Looking at the default.conf nginx file:
apk add nano
nano /etc/nginx/conf.d/default.conf

#Change it to the following, save and exit:
server {
        listen 80 default_server;
        listen [::]:80 default_server;
        # New root location
        location / {
                root /var/www/localhost/htdocs; 
                # return 404;
        }
        # You may need this to prevent return 404 recursion.
        location = /404.html {
                internal;
        }
}

#Restart nginx:
nginx -s reload

#Create an html in the htdocs folder:
echo "<h1>Hello world!</h1>" > /var/www/localhost/htdocs/index.html

#Test that it’s working with curl:
curl localhost

#Next we need to use OpenSSL to generate our key and certificate files.
apk add openssl

#Create our new key and crt files:
openssl req -x509 -nodes -days 365 -subj "/C=CA/ST=QC/O=Company, Inc./CN=mydomain.com" -addext "subjectAltName=DNS:mydomain.com" -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt

#We now need to associate our SSL certificate to our default.conf nginx file.
nano /etc/nginx/conf.d/default.conf

#Add the following 
server {
        listen 80 default_server;
        listen [::]:80 default_server;
        listen 443 ssl http2 default_server;
        listen [::]:443 ssl http2 default_server;
        ssl_certificate /etc/ssl/certs/nginx-selfsigned.crt;
        ssl_certificate_key /etc/ssl/private/nginx-selfsigned.key;
        # New root location
        location / {
                root /var/www/localhost/htdocs; 
                # return 404;
        }
        # You may need this to prevent return 404 recursion.
        location = /404.html {
                internal;
        }
}

#Save the file, check the file is correct with:
nginx -t

#Don’t forget to now reload nginx:
nginx -s reload;

#Let’s test https with curl:
curl https://localhost

curl https://localhost --insecure


```