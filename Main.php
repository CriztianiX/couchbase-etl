<?php
require_once("Vendor/autoload.php");

class Main {
  public static function Init()
  {
      $boot = Rds\Bootstrap::getInstace();
      $numWorkers = 4;
      $totalPages = $boot->getTotalPages();

      if($totalPages>0)
      {
        $stacks = [ "Vendor/autoload.php" ];
        $pool = new \Pool((int)$numWorkers, \Rds\Worker::class, $stacks);
        for ($page=1; $page <= $totalPages ; $page++) {
          $task = new \Rds\Task($page);
          $pool->submit($task);
        }
        $pool->shutdown();
        $pool->collect(function($work){
          //return $work->isGarbage();
          return true;
        });
      }
    }
}

Main::Init();
