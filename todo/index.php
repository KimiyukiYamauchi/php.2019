<?php
require_once(__DIR__ . '/config.php');
require_once(__DIR__ . '/functions.php');

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div id="container">
    <h1>Todos</h1>
    <form action="">
      <input type="text" id="new_todo" placeholder="What needs tobe done?">
    </form>
    <ul>
      <li>
        <input type="checkbox">
        <span>Do something<span>
        <div class="delete_todo">x</div>
      </li>
      <li>
        <input type="checkbox">
        <span>Do something again<span>
        <div class="delete_todo">x</div>
      </li>
    </ul>
  </div>
</body>
</html>
