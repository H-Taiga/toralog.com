<?php
namespace Libs;

use Enum\HttpCodeEnum;
use Libs\Https\Request;
use Libs\Https\Response;


class Project {
  private static ?Project $_instance = null;
  private ?Request $_request = null;

  private function __construct(){
    $this->_request = Request::getInstance();
  }

  public static function getInstance():Project {
    return is_null(self::$_instance)?
      self::$_instance = new self() : self::$_instance;
  }

  public function run():void {
    $content = '';
    $content .= 'Method type:' . $this->_request->methodType() . '<br>';
    $content .= 'Header Connection:' . $this->_request->header('Connection') . '<br>';
    $content .= 'Host :' . $this->_request->host() . '<br>';
    $content .= 'Request uri:' . $this->_request->requestUri() . '<br>';
    $content .= 'Path info:' . $this->_request->pathInfo() . '<br>';
    $content .= 'GET name:' . $this->_request->get('name') . '<br>';
    $content .= 'GET aaa:' . $this->_request->get('aaa') . '<br>';
    $response = new Response($content);
    $response->send();
  }
}