-- ユーザーテーブル
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ユーザーID',
    username VARCHAR(50) NOT NULL COMMENT 'ユーザー名',
    email VARCHAR(100) NOT NULL UNIQUE COMMENT 'メールアドレス（ユニーク）',
    password VARCHAR(255) NOT NULL COMMENT 'ハッシュ化されたパスワード',
    birthday DATE COMMENT '誕生日（日付形式、例：1990-05-11）',
    gender ENUM('male', 'female') COMMENT '性別（male: 男性, female: 女性）',
    role ENUM('admin', 'author', 'viewer') NOT NULL DEFAULT 'viewer' COMMENT 'ユーザー権限（admin: 管理者, author: 投稿者, viewer: 閲覧者）',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成日時',
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時'
) COMMENT='ユーザー情報テーブル';

-- カテゴリーテーブル
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'カテゴリーID',
    name VARCHAR(50) NOT NULL COMMENT 'カテゴリー名（例：IT、趣味）',
    slug VARCHAR(50) NOT NULL UNIQUE COMMENT 'URL用スラッグ（例：it、hobby）',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成日時'
) COMMENT='記事のカテゴリー分類テーブル';

-- 記事テーブル
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT '記事ID',
    user_id INT NOT NULL COMMENT '投稿者のユーザーID',
    category_id INT COMMENT 'カテゴリーID',
    title VARCHAR(200) NOT NULL COMMENT '記事タイトル',
    content TEXT NOT NULL COMMENT '記事本文',
    published BOOLEAN DEFAULT FALSE COMMENT '公開フラグ（TRUE: 公開、FALSE: 下書き）',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT '作成日時',
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新日時',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) COMMENT='ブログ記事のテーブル';

-- コメントテーブル（任意）
CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'コメントID',
    post_id INT NOT NULL COMMENT '対象の記事ID',
    user_id INT COMMENT 'コメント投稿者のユーザーID（匿名可）',
    content TEXT NOT NULL COMMENT 'コメント本文',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'コメント投稿日時',
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) COMMENT='記事へのコメント情報を保持';

-- タグテーブル（任意）
CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'タグID',
    name VARCHAR(50) NOT NULL UNIQUE COMMENT 'タグ名（例：Python、旅行）'
) COMMENT='記事に付けるタグの一覧';

-- 投稿とタグの中間テーブル（多対多）
CREATE TABLE post_tags (
    post_id INT NOT NULL COMMENT '記事ID',
    tag_id INT NOT NULL COMMENT 'タグID',
    PRIMARY KEY (post_id, tag_id),
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
) COMMENT='記事とタグの関連付け（多対多）';
