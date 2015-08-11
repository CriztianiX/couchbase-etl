<?php
namespace Rds {
  class Task extends \Collectable {
    public $page;

    public function __construct($page) {
      $this->page = $page;
    }
    public function run()
    {
      $config = $this->worker->config;
      $boot = Bootstrap::getInstace($config);
      $rows = $boot->getPage($this->page);
      $bucket = \Rds\CouchbaseConnection::getBucketConnection($config["couchbase"]);

      foreach ($rows as $row) {
        $adaptedResult = $boot->adaptResult($row);
        try {
          $res = $bucket->upsert((string)$row->id, json_encode($adaptedResult));
        } catch (Exception $e) {
          var_dump($e->getMessage());
        }
      }

      // Close rdms conection
      $boot->mapper()->connection()->close();
      return $this->setGarbage();
    }
  }
}
