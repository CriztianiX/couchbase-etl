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
      $bucket = $this->worker->bucket;

      $rows = $boot->getPage($this->page);
      foreach ($rows as $row) {
        $adaptedResult = $boot->adaptResult($row);
        try {
          $key = (string)$row->id;
          $value = json_encode($adaptedResult);
          $res = $bucket->upsert($config["couchbase"], $key, $value);
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
