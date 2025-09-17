# Use the official PHP image
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Expose port
EXPOSE 10000

# Start PHP server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]
