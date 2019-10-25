<?php

define('DB_DATABASE', 'webap');
define('DB_USERNAME', 'dbuser');
define('DB_PASSWORD', 'pass');
define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABASE);

class User {
    public function show() {
        echo "$this->name ($this->score)" . '<br>';
    }
}


try {
    // connect
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*
     * (1) exec() -> 結果を返さない(insert/update/delete) 安全なSQL文の実行
     * (2) query() -> 結果を返す(select) 安全なSQL文の実行
     * (3) prepare() -> 結果を返す(insert/update/delete/select) 安全対策が必要なSQL文の実行
     */

    // insert
    /* $db->exec("insert into users (name, score) values ('yamauchi', 55)"); */

    /* $stmt = $db->prepare("insert into users (name, score) values (?, ?)"); */

    /* $stmt->execute(['kimiyuki', 44]); */
    /* $stmt = $db->prepare("insert into users (name, score) values (:name, :score)"); */

    /* $stmt->bindValue(':name', 'yamashita', PDO::PARAM_STR); */
    /* $stmt->bindValue(':score', 99, PDO::PARAM_INT); */

    /* $stmt->execute(); */

    /* $stmt->execute([':name' => 'kyama', ':score' => 90]); */
    /* $stmt->execute([':name' => 'kyama', ':score' => 90]); */
    /* $stmt->execute([':name' => 'kyama', ':score' => 90]); */

    /* echo "inserted: " . $db->lastInsertId(); */


    // select all
    /* $stmt = $db->query("select * from users"); */
    /* $users = $stmt->fetchAll(PDO::FETCH_ASSOC); */
    /* /1* $users = $stmt->fetchAll(PDO::FETCH_NUM); *1/ */

    // select(prepare)
    /* $stmt = $db->prepare("select score from users where score > ?"); */
    /* /1* $stmt->execute([80]); *1/ */
    /* $stmt->bindValue(1, 80, PDO::PARAM_INT); */
    /* $stmt->execute(); */
    /* $users = $stmt->fetchAll(PDO::FETCH_ASSOC); */

    /* $stmt = $db->prepare("select name, score from users order by score desc limit ?"); */
    /* $stmt->bindValue(1, 5, PDO::PARAM_INT); */
    /* $stmt->execute(); */

    /* /1* $users = $stmt->fetchAll(PDO::FETCH_ASSOC); *1/ */
    /* $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User'); */

    /* foreach($users as $user) { */
    /*     /1* var_dump($user); *1/ */
    /*     $user->show(); */
    /* } */
    /* echo $stmt->rowCount() . " records found."; */


    // delete
    /* $stmt = $db->prepare("delete from users where name = :name"); */
    /* $stmt->bindValue(':name', 'yamauchi', PDO::PARAM_STR); */
    /* $stmt->execute(); */

    /* echo 'row deleted:' . $stmt->rowCount(); */

    // update
    $stmt = $db->prepare("update users set score = :score where name = :name");
    $stmt->bindValue(':score', 'aaa', PDO::PARAM_INT);
    $stmt->bindValue(':name', 'kimiyuki', PDO::PARAM_STR);
    $stmt->execute();
    echo 'row updated: ' . $stmt->rowCount();


    // disconnect
    $db = null;
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}


?>
