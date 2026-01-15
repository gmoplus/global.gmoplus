#!/bin/bash
set -e

# Path to config file
CONFIG_FILE="/var/www/html/includes/config.inc.php"
TEMPLATE_FILE="/var/www/html/docker/config.tpl.php"

# Values to fallback if not set
: "${DB_PORT:=3306}"
: "${DB_HOST:=db}"
: "${DB_USER:=gmoplus}"
: "${DB_PASSWORD:=gmoplus}"
: "${DB_NAME:=gmoplus}"
: "${DB_PREFIX:=fl_}"
: "${APP_URL:=https://global.gmoplus.com}"
: "${REDIS_HOST:=redis}"
: "${REDIS_PORT:=6379}"
: "${REDIS_USER:=}"
: "${REDIS_PASSWORD:=}"

echo "Generating config.inc.php from template..."

# Check if template exists
if [ -f "$TEMPLATE_FILE" ]; then
    cp "$TEMPLATE_FILE" "$CONFIG_FILE"
    
    # Replace placeholders
    sed -i "s|{DB_PORT}|$DB_PORT|g" "$CONFIG_FILE"
    sed -i "s|{DB_HOST}|$DB_HOST|g" "$CONFIG_FILE"
    sed -i "s|{DB_USER}|$DB_USER|g" "$CONFIG_FILE"
    sed -i "s|{DB_PASSWORD}|$DB_PASSWORD|g" "$CONFIG_FILE"
    sed -i "s|{DB_NAME}|$DB_NAME|g" "$CONFIG_FILE"
    sed -i "s|{DB_PREFIX}|$DB_PREFIX|g" "$CONFIG_FILE"
    
    # Handle URL (escape slashes)
    ESCAPED_URL=$(printf '%s\n' "$APP_URL" | sed -e 's/[]\/$*.^[]/\\&/g')
    sed -i "s|{APP_URL}|$ESCAPED_URL|g" "$CONFIG_FILE"
    
    sed -i "s|{REDIS_HOST}|$REDIS_HOST|g" "$CONFIG_FILE"
    sed -i "s|{REDIS_PORT}|$REDIS_PORT|g" "$CONFIG_FILE"
    sed -i "s|{REDIS_USER}|$REDIS_USER|g" "$CONFIG_FILE"
    sed -i "s|{REDIS_PASSWORD}|$REDIS_PASSWORD|g" "$CONFIG_FILE"
    
    echo "Configuration generated successfully."
else
    echo "WARNING: Template file $TEMPLATE_FILE not found using existing config if any."
fi

# Set permissions for writable directories
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/files /var/www/html/tmp /var/www/html/backup 2>/dev/null || true
chmod -R 777 /var/www/html/files /var/www/html/tmp /var/www/html/backup 2>/dev/null || true

# Execute the main container command
exec "$@"
