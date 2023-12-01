#!/bin/bash
php ../vendor/bin/openapi \
    --bootstrap ./swagger-constants.php \
    --output ./ ./swagger-v1.php \
    ../src
