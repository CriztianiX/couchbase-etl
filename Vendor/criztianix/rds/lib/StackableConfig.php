<?php
namespace Rds;
class StackableConfig extends \Stackable {
    public function __construct($array) {
        $this->merge($array);
    }

    public function run() {}
}
