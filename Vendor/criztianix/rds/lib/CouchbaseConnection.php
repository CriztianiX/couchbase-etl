<?php
namespace Rds {
    class CouchbaseConnection  {
        public static function getBucketConnection($config)
        {
          $cluster = new \CouchbaseCluster($config["connectionString"]);
          return $cluster->openBucket($config["bucket"]);
        }
    }
}
