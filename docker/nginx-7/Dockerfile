FROM ubuntu:16.04

MAINTAINER Nhan Nguyen <quocnhan1843@gmail.com>

# Install Nginx
RUN apt-get update -y && \
    apt-get install -y nginx && \
    rm -rf /var/cache/apt/*

# Replace nginx config files
COPY config/nginx.conf /etc/nginx/nginx.conf

# Copy project and CDN server configs
COPY config/project.conf /etc/nginx/sites-available/project
COPY config/project_static.conf /etc/nginx/sites-available/project_static

# Enable both it
RUN ln -s /etc/nginx/sites-available/project /etc/nginx/sites-enabled/
RUN ln -s /etc/nginx/sites-available/project_static /etc/nginx/sites-enabled/

# Remove default server config
RUN rm /etc/nginx/sites-enabled/default

# Create directory and app log files for project
RUN mkdir -p /var/log/nginx/project
RUN touch /var/log/nginx/project/app.access.log
RUN touch /var/log/nginx/project/app.error.log

# Create directory and app log files for project_static
RUN mkdir -p /var/log/nginx/project_static
RUN touch /var/log/nginx/project_static/app.access.log
RUN touch /var/log/nginx/project_static/app.error.log

# Forward both request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/nginx/project/app.access.log
RUN ln -sf /dev/stderr /var/log/nginx/project/app.error.log

# Export ports
EXPOSE 80 443

# Define default command.
CMD ["nginx"]