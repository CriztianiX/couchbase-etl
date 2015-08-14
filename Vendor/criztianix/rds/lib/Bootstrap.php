<?php
namespace Rds;

class Bootstrap {
  public static function getInstace()
  {
    $implementation = new \Impl\ApplicationUserImpl();
    $cfg = new \Spot\Config();
    $cfg->addConnection("pgsql", "pgsql://md:Metallica324!@localhost:25432/md");
    $spot = new \Spot\Locator($cfg);
    
    return new EntitySyncronizer($spot->mapper($implementation->entity()), $implementation);
  }
}
