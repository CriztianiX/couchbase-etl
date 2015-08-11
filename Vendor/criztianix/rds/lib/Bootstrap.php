<?php
namespace Rds;

class Bootstrap {
  public static function getInstace($config)
  {
    $impl = '\Impl\\' . $config["app"]["implementation"];
    $implementation = new $impl();
    $cfg = new \Spot\Config();
    $cfg->addConnection($config["rds"]["driver"], $config["rds"]["connectionString"]);
    $spot = new \Spot\Locator($cfg);

    return new EntitySyncronizer($spot->mapper($implementation->entity()), $implementation);
  }
}
