#!/bin/bash
set -e

# Find PHP executable in common locations
PHP_BIN=$(which php 2>/dev/null || \
          find /nix/store -name php -type f -executable 2>/dev/null | head -1 || \
          find /usr -name php -type f -executable 2>/dev/null | head -1 || \
          echo "")

if [ -z "$PHP_BIN" ]; then
    echo "Error: PHP not found. Searching..."
    find /nix/store -name php 2>/dev/null | head -5
    exit 1
fi

echo "Using PHP: $PHP_BIN"
$PHP_BIN --version

# Start Laravel server
exec $PHP_BIN artisan serve --host=0.0.0.0 --port=$PORT

