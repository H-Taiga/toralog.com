<?PHP
namespace Enum;

use Enum\Interface\EnumInterface;
use Enum\Trait\EnumTrait;

enum SymbolEnum:string implements EnumInterface {
  use EnumTrait;

  case DOT           = '.';
  case COMMA         = ',';
  case PIPE          = '|';
  case COLON         = ':';
  case SEMICLON      = ';';
  case AT_MARK       = '@';
  case UNDERBAR      = '_';
  case BACKSLASH     = '\\';
  case QUESTION_MARK = '?';
  case SHARP         = "#";
  case EQUAL         = '=';
}
