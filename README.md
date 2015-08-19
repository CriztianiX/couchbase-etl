# couchbase-etl

Syncronize a database table into Couchbase

Requeriments
- PHP compiled with zts
- pthreads extension (http://php.net/manual/en/book.pthreads.php)
- Couchbase extension (http://docs.couchbase.com/developer/php-2.0/php-intro.html)
- You need npm and gulp to build the project.

#### config.json
```bash
 "implementation": default implemented model (a database table) in impl/ directory to syncronize
 "num_workers": number of parallel process to execute the paginated queries.
 "rds.driver": database driver to use.
 "rds.connectionString": the connection string for connect to database
 "couchbase.bucket": couchbase bucket to store the documents
 "couchbase.connectionString": the connection string for connect to couchbase cluster
```

#### Implementing a model (TODO)
```bash
Take a look in impl/ directory
```

#### Building the project
```bash
php composer.phar install
npm install
./gulpize build
```

#### Running
```bash
php Main.php
```
