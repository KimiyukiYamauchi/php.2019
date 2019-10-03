# php.2019

本リポジトリはPHPによるWebサービス作成(選択授業)の情報展開用です

## 環境構築

### apache2(Webサーバ)の設定

- インストール
	- $ sudo apt install apache2
- 状態確認
	- $ sudo service apache2 status

- 再起動
	- $ sudo service apache2 restart
- バーチャルホストの切り替え
	- デフォルトの無効化
		- $ sudo a2dissite 000-default.conf
	- ss.confの有効化
		- $ sudo a2ensite php.conf
	- 設定の再読込
		- $ sudo service apache2 reload

### サーバの設定
- タイムゾーンの設定
	- $ sudo timedatectl set-timezone Asia/Tokyo

### phpインストール

#### リポジトリの追加

- sudo add-apt-repository ppa:ondrej/php
- sudo apt update

#### php7.2と関連モジュール

- sudo apt install php7.2 php7.2-common php7.2-cli php7.2-fpm php7.2-mysql php7.2-dev php7.2-mbstring php7.2-zip php7.2-xml

#### enable php7.2-fpm

- sudo a2enconf php7.2-fpm
- sudo service apache2 restart

### MariaDB(dbサーバ)

#### インストール
- sudo apt install mariadb-server mariadb-client

#### rootのパスワードなどセキュリティの設定
- sudo mysql_secure_installation

#### sudoなしでrootでデータベースに接続するための設定

##### 一旦、sudoで接続
- sudo mysql -u root -p

##### 以下を実行
- use mysql;
- update user set plugin='mysql_native_password' where user='root';
- flush privileges; 
- quit;

##### 以降は以下で接続可能
- mysql -u root -p


## 関連リンク

- [Apache2とPHP7.2を動かす](https://www.yokoweb.net/2018/05/12/ubuntu-18_04-apache2-php72/)
- [一週間で身につくMySQL](http://web.sevendays-study.com/mysql/index.html)
- [php.net](https://www.php.net/manual/ja/index.php)
