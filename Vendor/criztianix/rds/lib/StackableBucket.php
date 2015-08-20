<?php
namespace Rds {
  class StackableBucket extends \Stackable
  {
    static $bucket;

    public function upsert($config, $key, $value)
    {
      if (!self::$bucket)
      {
        $cluster = new \CouchbaseCluster($config["connectionString"]);
        self::$bucket = $cluster->openBucket($config["bucket"]);
      }

      self::$bucket->upsert($key, $value);
    }
  }
}
