#!/bin/bash
curl -sS https://getcomposer.org/installer | php
php composer.phar install
npm install

./gulpize build
echo "Change config.json an re-run gulpize"
