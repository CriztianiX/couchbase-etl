<?php
require_once("Vendor/autoload.php");

class Main {
  public static function Init()
  {
      $config = \Rds\Configuration::get();
      $boot = \Rds\Bootstrap::getInstace($config);
      $totalPages = $boot->getTotalPages();

      if($totalPages>0)
      {
        $pool = new \Pool($config["app"]["workers"],
          \Rds\Worker::class, array("Vendor/autoload.php",
          new \Rds\StackableConfig($config)
        ));

        for ($page=1; $page <= $totalPages ; $page++) {
          $task = new \Rds\Task($page);
          $pool->submit($task);
        }
        $pool->shutdown();
        $pool->collect(function($work){
          return $work->isGarbage();
        });
      }
    }
}

Main::Init();
