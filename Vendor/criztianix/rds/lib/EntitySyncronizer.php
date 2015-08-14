<?php
namespace Rds;

class EntitySyncronizer {
  protected $implementation;
  protected $mapper;

  public function __construct($mapper, $implementation)
  {
    $this->mapper = $mapper;
    $this->implementation = $implementation;
    $this->initialize();
  }

  public function getTotalResults()
  {
    $query = "SELECT COUNT(*) AS count FROM {$this->table} WHERE id > :id";
    $rows = $this->mapper->query($query, [0]);
    return $rows[0]->count;
  }

  public function getPage($page)
  {
    $offset = $this->getOffsetPage($page);
    $rows = $this->mapper->where($this->_where)
      ->limit($this->_limit)->offset($offset);

    return $rows;
  }

  public function adaptResult($row)
  {
    return $this->implementation->result($row);
  }

  public function getTotalPages()
  {
    return ceil($this->getTotalResults() / $this->_limit);
  }

  public function getOffsetPage($page)
  {
    return $page == 1 ? 0 : ( $page-1 ) * $this->_limit;
  }

  public function mapper()
  {
    return $this->mapper;
  }

  private function initialize()
  {
    $this->table = $this->mapper->table();
    $this->_limit = $this->implementation->limit();
    $this->_where = $this->implementation->where();
  }

  private $table;
  private $_limit;
  private $_where;
}
