# Gunakan image nginx
FROM nginx:alpine

# Hapus config default
RUN rm /etc/nginx/conf.d/default.conf

# Salin file konfigurasi nginx
COPY nginx.conf /etc/nginx/conf.d

# Salin file PHP ke folder web root
COPY index.php /usr/share/nginx/html/

# Expose port untuk akses
EXPOSE 80
