# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any dependencies (optional)
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80

# Start Apache service in the foreground
CMD ["apache2-foreground"]
