<?php
namespace Rds;

class Configuration {
    private static $instance;
    private $config;

    public function option($opt)
    {
      return $this->config->{$opt}->__toString();
    }

    public function couchbase($opt)
    {
      return $this->config->connectionStrings->couchbase->$opt->__toString();
    }

    public function rds($opt)
    {
        return $this->config->connectionStrings->rds->$opt->__toString();
    }


    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __construct()
    {
      $this->config = simplexml_load_file( __DIR__ . "/../../../../App.config");
      var_dump("Configuration loaded!");
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}
