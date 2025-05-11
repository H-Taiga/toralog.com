<?php
namespace Libs;

class Project {
  private static ?Project $_instance = null;

  private function __constract(){}

  public static function getInstance():Project {
    return is_null(self::$_instance)?
      self::$_instance = new self() : self::$_instance;
  }

  public function run():void {
    echo "Project is runnning!";
  }
}