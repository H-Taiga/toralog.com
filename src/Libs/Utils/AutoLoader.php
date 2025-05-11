<?php
namespace Libs\Utils;

class AutoLoader {
  private static string $_appRootDir;
  private static ?AutoLoader $_instance = null;

  public function __construct(string $root_dir) {
    self::$_appRootDir = $root_dir;
    spl_autoload_register([$this, "_loadClass"]);
  }

  public static function getInstance(string $root_dir):AutoLoader {
    return is_null(self::$_instance)?
      self::$_instance = new self($root_dir) : self::$_instance;
  }

  private function _loadClass(string $_className):void {
    $_className = ltrim($_className, '\\');

    list($_isReader, $_filePath) = $this->doCheckReaderbleFile($_className);
    if(!$_isReader)
      throw new \ErrorException('指定されたファイルが存在しません : '. $_filePath);

    require_once $_filePath;
  }

  protected function doCheckReaderbleFile(string $_className):array {
    $_hoge = str_replace('\\', DIRECTORY_SEPARATOR, $_className);
    $_fuga = self::$_appRootDir;
    $_list = [self::$_appRootDir, DIRECTORY_SEPARATOR, str_replace('\\', DIRECTORY_SEPARATOR, $_className)];
    $_filePath = vsprintf(sprintf('%s.php', str_repeat('%s', count($_list))), $_list);
    return [is_readable($_filePath), $_filePath];
  }

}