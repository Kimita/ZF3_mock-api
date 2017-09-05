# ZF3_mock-api
自分用に、ZendFramework3 を使ってAPI-CentricなアプローチでWebアプリを作る際の mock を組む時のための、APIサーバ側雛形を用意した。  

- 筆者のブログ記事「ZF3で空のプロジェクトを作成する自分なりの手順」  
http://crapporin.blogspot.jp/2017/05/zf3.html  
にて示した空プロジェクトの状態から、都度必要とするモジュールを composer require しながら作成しています。
- Frontサーバ https://github.com/Kimita/ZF3_mock-front とセットで使用します。
- PHP7.1 を使ったEclipseプロジェクトとして作成したので、その設定ファイルが含まれています。

## 参考にした書籍
下記の書籍から学んだ内容をベースにして、自分なりに mockアプリ作成時に取り揃えておきたい要素をまとめたものです。

- 書名: Zend Framework 2 Application Development
- 著者: Christopher Valles
- 発行: 2013年10月25日

# 盛り込んであるもの

- AbstractRestfullController を使用したコントローラ実装
- ApiErrorListenerによるError時の表示制御
- PostgreSQLもしくはMySQLへのアクセス
- 上記のDBをデータソースとして、FrontサーバからのLoginリクエストに対する認証処理
