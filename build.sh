#!/bin/bash

# Install PHP dependencies (Composer install)
composer install --no-dev --optimize-autoloader

# Install Node dependencies (NPM install)
npm install

# Build frontend assets with Vite
npm run build

echo "Build complete"
