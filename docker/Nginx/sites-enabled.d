server {
    listen 80 default_server deferred;
    listen [::]:80 default_server deferred;
    listen 443 default_server ssl http2 deferred;
    listen [::]:443 default_server ssl http2 deferred;
    
    server_name _;
    
    # Generate dumb self-signed certificate:
    # mkdir -p ssl/default && openssl req -x509 -newkey rsa:2048 -nodes -keyout ssl/default/privkey.pem -out ssl/default/fullchain.pem -days 36500 -subj '/CN=localhost'
    
    ssl_certificate      ssl/default/fullchain.pem;
    ssl_certificate_key  ssl/default/privkey.pem;
    # comment out the next line if you use a trusted certificate (not a self-signed one)
    ssl_stapling         off;
    
    return 444;  # tells nginx to roughly close connection
    
    # return 302 $scheme://domain.com;
}