# Use official PHP image with Apache
FROM php:8.2-apache

# Copy challenge files into Apache web root
COPY . /var/www/html/

# Give proper permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
