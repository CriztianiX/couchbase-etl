# couchbase-etl

Syncronize a database table into Couchbase

Requeriments
- PHP compiled with zts
- pthreads extension (http://php.net/manual/en/book.pthreads.php)
- Couchbase extension (http://docs.couchbase.com/developer/php-2.0/php-intro.html)
- You need npm and gulp to build the project.

Configurations (comming soon)
```bash
take a look at config.json
take a look at impl/ folder
```

Building the project
```bash
php composer.phar install
npm install
./gulpize build
```

Running
```bash
php Main.php
```
