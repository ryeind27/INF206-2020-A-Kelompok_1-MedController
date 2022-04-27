server {
  listen 8080;
 
  server_name modulus_app_url;
 
  root /mnt/app/public;
  index index.html index.php;
 
  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }
 
  location ~ \.php$ {
 
    fastcgi_split_path_info ^(.+\.php)(/.+)$;
    fastcgi_pass unix:/mnt/home/php-fpm.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    fastcgi_index index.php;
 
    include fastcgi_params;
 
  }
}
