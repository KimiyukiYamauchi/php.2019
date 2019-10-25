<?php
session_start();

/* var_dump($_POST); */
$username = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$err = false;
	if (strlen($username) > 8) {
		$err = true;
    } else {
        // クッキーのセット
        /* setcookie("username", $username); */
        $_SESSION['username'] = $username;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Check username</title>
</head>
<body>
<form action="" method="POST">
<input type="text" name="username" placeholder="user name" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
<input type="submit" value="Check!">
<?php
if (isset($err)) {
	if ($err) { echo "Too long!"; } 
    else {
        echo "OK!<br>";
        /* echo "set cookei... " . $_COOKIE['username']; */
    }
    if (isset($_SESSION['username'])) {
        echo 'username: ' . $_SESSION['username'];
    }
}
?>
</form>
</body>
</html>
