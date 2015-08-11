<?php

namespace Rds {
    class Worker extends \Worker {
        protected $loader;
        protected $config;

        public function __construct($loader, $config)
        {
            $this->config = $config;
            $this->loader = $loader;
        }
        public function run()
        {
          require_once($this->loader);
        }

        public function start()
        {
          return parent::start(PTHREADS_INHERIT_NONE);
        }
    }
}
