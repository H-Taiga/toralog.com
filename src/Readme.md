# ブログアプリケーション

## ディレクトリ構成
```
src/
  ┣━ Enum/                         // 列挙型定数管理Dir
  ┃   ┣━ Interface/                    // 列挙型インターフェース
  ┃   ┃   ┗━ EnumInterface.php
  ┃   ┣━ Trait/                        // 列挙型トレイト
  ┃   ┃   ┗━ EnumTrait.php
  ┃   ┣━ HttpCodeEnum.php
  ┃   ┗━ SymbolEnum.php
  ┣━ Libs/                         // アプリケーションライブラリ
  ┃   ┣━ Utils/                    // 汎用機能格納Dir
  ┃   ┃   ┗━ AutoLoader.php
  ┃   ┗━ Project.php
  ┗━ public/                       // ドキュメントルート
      ┣━ image/                        // 画像格納Dir
      ┗━ index.php
```