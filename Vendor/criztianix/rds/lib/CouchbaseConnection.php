<?php
namespace Rds {
    class CouchbaseConnection  {
        public static function getBucketConnection()
        {
          //$connectionString = $config->connectionStrings->couchbase->connectionString->__toString();
          $connectionString = "http://127.0.0.1:28091";

          $bucket = "default";
          //$bucket = $config->connectionStrings->couchbase->bucket->__toString();
          $cluster = new \CouchbaseCluster($connectionString);

          return $cluster->openBucket($bucket);
        }
    }
}
