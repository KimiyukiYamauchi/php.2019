<!DOCTYPE html>
<html lang="ja">
<body>
<?php 
/*
 * データ型:
 * - 文字列 string
 * - 数値 integer float
 * - 論理値 boolean true/false
 * - 配列
 * - オブジェクト
 * - null
 *
 */
// 定数の定義
/* define("MY_EMAIL", 'yamauchi@std.it-college.ac.jp'); */

/* echo MY_EMAIL; */
/* var_dump(__LINE__); */
/* var_dump(__FILE__); */
/* var_dump(__DIR__); */
/* $msg = "hello from the TOP!"; */
/* echo $msg; */
/* var_dump($msg); */

// + - * / % **
/* $x = 10 % 3; // 1 */
/* $y = 30.2 / 4; // 7. */
/* var_dump($x); */
/* var_dump($y); */

// ++ --
/* $z = 5; */
/* $z++; // 6 */
/* var_dump($z); */
/* $z--; // 5 */
/* var_dump($z); */
// =
/* $x = 5; */
/* $x = $x * 2; // 10 */
/* var_dump($x); */
/* $x *= 2; // 20 */
/* var_dump($x); */

/* $name = "yamauchi"; */
/* $name2 = "kimiyuki"; */
/* $fullname = $name . ' ' . $name2; */
/* var_dump($fullname); */
/* $s1 = "hello $name!\nhello again!"; */
/* echo $s1; */
/* $s2 = "hello {$name}!\nhello again!"; */
/* echo $s2; */
/* $s3 = "hello ${name}!\nhello again!"; */
/* echo $s3; */
/* $s4 = 'hello ${name}!\nhello again!'; */
/* echo $s4; */

/* $score = 50; */

/* /1* if ($score > 80) { *1/ */
/* if (true) { */
/*     echo "great!"; */
/* } elseif ($score > 60) { */
/*     echo "good!"; */
/* } else { */
/*     echo "ok"; */
/* } */
/* $signal = "green"; */

/* switch ($signal) { */
/* case "red": */
/*     echo "stop"; */
/*     break; */
/* case "blue": */
/* case "green": */
/*     echo "go!"; */
/*     break; */
/* case "yellow": */
/*     echo "caution!"; */
/*     break; */
/* default: */
/*     echo "wrong signal"; */
/*     break; */
/* } */
    

/* $i = 0; */
/* while ($i < 10) { */
/*     echo $i; */
/*     $i++; */
/* } */
/* for ($i = 0; $i < 10; $i++) { */
/*     if($i == 5) { */
/*         /1* break; *1/ */
/*         continue; */
/*     } */
/*     echo $i; */
/* } */
$sales = [
    "yamauchi" => 200,
    "kinoshita" => 800,
    "fukuda" => 600,
];



/* foreach ($sales as $key => $value) { */
/*     echo "$key : $value<br>"; */
/* } */
/* foreach ($sales as $value) { */
/*     echo "$value<br>"; */
/* } */
/* var_dump($sales); */
/* var_dump($sales["yamauchi"]); */

/* $color = ["red", "blue", "pink"]; */
/* var_dump($color); */
/* var_dump($color[0]); */

$sales = [
    "yamauchi" => 200,
    "kinoshita" => 800,
    "fukuda" => 600,
];
?>
<!--
<ul>
<?php foreach ($sales as $key => $value):?>
    <li><?php echo "$key : $value"?>
<?php endforeach; ?>
</ul>
-->
<?php
/* echo "<ul>\n"; */
/* foreach ($sales as $key => $value) { */
/*     echo "<li> $key : $value </li>"; */
/* } */
/* echo "</ul>\n"; */

/* function sayHi($name = "yamauchi") { */
/*     return "hi! " . $name; */
/* } */

/* /1* $s = sayHi("kimiyuki"); *1/ */
/* $s = sayHi(); */
/* var_dump($s); */
/* echo ceil($x); // 6 */
/* echo '<br>'; */
/* echo floor($x); // 5 */
/* echo '<br>'; */
/* echo round($x); // 6 */
/* echo '<br>'; */
/* echo rand(1,6); */
/* $x = 5.6; */
/* $s1 = "hello"; */
/* $s2 = "ねこ"; */
/* echo strlen($s1); */
/* echo '<br>'; */
/* echo strlen($s2); */
/* echo '<br>'; */
/* echo mb_strlen($s2); */
/* printf("%s - %s - %.3f", $s1, $s2, $x); */
$color = ["red", "blue", "pink"];
echo count($color);
echo "<ul><li>\n";
echo implode("</li><li>", $color);
echo "</li></ul>\n";
$fruits = "apple, orange, grape";
$fa = explode(", ", $fruits);
var_dump($fa);
?>
</body>
</html>
