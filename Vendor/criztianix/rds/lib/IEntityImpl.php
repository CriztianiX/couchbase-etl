<?php
namespace Rds {
  interface IEntityImpl  {
    public function limit();
    public function where();
    public function entity();
    public function result($row);
  }
}
