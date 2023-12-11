# Use the official PHP 8.2 image from Docker Hub
FROM php:8.2-cli

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages specified in src/composer.json
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Make port 80 available to the world outside this container
EXPOSE 8080

# Run the command to start PHP's built-in server
CMD ["php", "-S", "0.0.0.0:80", "-t", "src"]