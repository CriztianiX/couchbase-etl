<?php

namespace Rds {
    class Worker extends \Worker {
        protected $loader;

        public function __construct($loader)
        {
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
