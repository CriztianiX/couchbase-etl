<?php
namespace Rds;

class Configuration {
    private static $instance;
    private $config;

    public static function get()
    {
        if (null === static::$instance) {
            static::$instance = new static();

        }

        return static::$instance->config;
    }

    protected function __construct()
    {
      $xml = simplexml_load_file( __DIR__ . "/../../../../App.config");

      $this->config = [
        "app" => [
          "workers" => (int) $xml->workers->__toString(),
          "implementation" => $xml->implementation->__toString()
        ],
        "couchbase" => [
          "bucket"  => $xml->connectionStrings->couchbase->bucket->__toString(),
          "connectionString" => $xml->connectionStrings->couchbase->connectionString->__toString()
        ],
        "rds" => [
          "driver" => $xml->connectionStrings->rds->driver->__toString(),
          "connectionString" => $xml->connectionStrings->rds->connectionString->__toString()
        ],
      ];

      var_dump("Configuration loaded!");
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
