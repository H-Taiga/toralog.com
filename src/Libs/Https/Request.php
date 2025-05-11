<?php
namespace Libs\Https;

class Request {
  private static ?Request $_instance = null;
  private array $_headers;

  private function __construct() {
    $this->_headers = getallheaders();
  }

  public static function getInstance():Request {
    return is_null(self::$_instance)?
        self::$_instance = new self() : self::$_instance;
  }

  public function methodType():string {
    if (is_null($this->post('_method')))
        return $_SERVER['REQUEST_METHOD'];
    return $this->post('_method');
  }

  public function get(string $name, $default = null):string | null {
    if (isset($_GET[$name]))
        return $_GET[$name];
    return $default;
  }

  public function post($name, $default = null) {
    if (isset($_POST[$name]))
        return $_POST[$name];
    return $default;
  }

  public function header($name = null):string {
    if (empty($name))
        return getallheaders();
    return empty($this->_headers[$name]) ? '' : $this->_headers[$name];
  }

  public function host():string {
    if (!empty($_SERVER['HTTP_HOST']))
        return $_SERVER['HTTP_HOST'];
    return $_SERVER['SERVER_NAME'];
  }

  public function requestUri():string {
    return $_SERVER['REQUEST_URI'];
  }

  public function baseUrl():string {
    $script_name = $_SERVER['SCRIPT_NAME'];
    $request_uri = $this->requestUri();

    if (strpos($request_uri, $script_name) === 0)
        return $script_name;
    else if (strpos($request_uri, dirname($script_name)) === 0)
        return rtrim(dirname($script_name));

    return '';
  }

  public function pathInfo():string {
    $base_url = $this->baseUrl();
    $request_uri = $this->requestUri();

    $pos = strpos($request_uri, '?');
    if (false !== $pos)
        $request_uri = substr($request_uri, 0, $pos);

    $path_info = (string)substr($request_uri, strlen($base_url));

    return $path_info;
  }

}