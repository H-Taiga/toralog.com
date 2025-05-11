<?php
namespace Enum;

use Enum\Interface\EnumInterface;
use Enum\Trait\EnumTrait;

enum HttpCodeEnum:int implements EnumInterface {
  use EnumTrait;

  // 100系 (分類：情報)
  case CONTINUE = 100;
  case SWITCHING_PROTOCOLS = 101;

  // 200系 (分類：成功)
  case OK = 200;
  case CREATED = 201;
  case ACCEPTED = 202;
  case NON_AUTHORITATIVE_INFORMATION = 203;
  case NO_CONTENT = 204;
  case RESET_CONTENT = 205;
  case PARTICAL_CONTENT = 206;

  // 300系 (分類：転送)
  case MULTIPLE_CHOICES = 300;
  case MOVED_PERMANENTLY = 301;
  case FOUND = 302;
  case SEE_OTHER = 303;
  case NOT_MODIFIED = 304;
  case USE_PROXY = 305;

  // 400系 (分類：クライアントエラー)
  case BAD_REQUEST = 400;
  case UNAUTHORIZED = 401;
  case PAYMENT_REQUIRED = 402;
  case FORBIDDEN = 403;
  case NOT_FOUND = 404;
  case METHOD_NOT_ALLOWED = 405;
  case NOT_ACCEPTABLE = 406;
  case PROXY_AUTHENTICATION_REQUIRED = 407;
  case REQUEST_TIMEOUT = 408;
  case CONFLICT = 409;
  case GONE = 410;
  case LENGTH_REQUIRED = 411;
  case PRECONDITION_FAILED = 412;
  case REQUEST_ENTITY_TOO_LARGE = 413;
  case REQUEST_URI_TOO_LARGE = 414;
  case UNSUPPORTED_MEDIA_TYPE = 415;

  // 500系 (分類：サーバエラー)
  case INTERNAL_SERVER_ERROR = 500;
  case NOT_IMPLEMENTED = 501;
  case BAD_GATEWAY = 502;
  case SERVICE_UNAVAILABLE = 503;
  case GATEWAY_TIMEOUT = 504;
  case HTTP_VERSION_NOT_SUPPORTED = 505;
}
