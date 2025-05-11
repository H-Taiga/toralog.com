<?php
namespace Libs\Https;

use Enum\HttpCodeEnum;

class Response {
  private string $_content;
  private int $_status_code;
  private string $_status_text;
  private array $_http_headers;

  public function __construct(string $_content = "", int $_status_code = HttpCodeEnum::OK->value, string $_status_text = "") {
    $this->_content = $_content;
    $this->_status_code = $_status_code;
    $this->_status_text = !$_status_text? "hoge" : $_status_text;
    $this->_http_headers = [];
  }

  public function send():void {
    header('HTTP/1.1 '. $this->_status_code. ' '. $this->_status_text);
    foreach ($this->_http_headers as $_name => $_value) {
      header($_name. ": ". $_value);
    }
    echo $this->_content;
  }

  public function setHttpHeaders(string $_name, string $_value):void {
    $this->_http_headers[$_name] = $_value;
  }

  public function statusCode():int {
    return $this->_status_code;
  }

  public function statusText():string {
    return $this->status_text;
  }

  public static function redirect(string $location):Response {
    $response = new self("", HttpCodeEnum::MOVED_PERMANENTLY->value);
    $response->setHttpHeaders('Location', $location);
    return $response;
  }
}