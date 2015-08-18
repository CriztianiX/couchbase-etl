<?php

namespace Rds {
    class Worker extends \Worker {
        protected $loader;
        protected $couchbase;

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
          if (!$this->couchbase) {
            $this->couchbase = CouchbaseConnection::getBucketConnection();
          }

          return $this->couchbase;
        }

        public function start()
        {
          return parent::start(PTHREADS_INHERIT_NONE);
        }
    }
}
