<?php
namespace Rds {
    class CouchbaseConnection  {
        public static function getBucketConnection()
        {
          $config = Configuration::getInstance();
          $cluster = new \CouchbaseCluster($config->couchbase("connectionString"));
          return $cluster->openBucket($config->couchbase("bucket"));
        }
    }
}
