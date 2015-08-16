<?php

namespace Rds {
    class Worker extends \Worker {
        protected $loader;
        protected static $couchbase;

        public function __construct($loader)
        {
            $this->loader = $loader;
        }
        public function run()
        {
          require_once($this->loader);
        }

        public function getCouchbaseConnection()
        {
          if (!self::$couchbase) {
            self::$couchbase = \Rds\CouchbaseConnection::getBucketConnection();
          }

          return self::$couchbase;
        }

        public function start()
        {
          return parent::start(PTHREADS_INHERIT_NONE);
        }
    }
}
