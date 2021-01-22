<?php

$name = $_GET['name'] ?? $_POST['name'] ?? 'Deepak';
echo "Hello " . htmlspecialchars($name)."<br>";

// 整数
echo 1 <=> 1;
echo "<br>";
echo 1 <=> 0;
echo "<br>";
echo 5 <=> 10;
echo "<br>";
//浮点数
echo 1.0 <=> 1.5;
echo "<br>";
echo 1.0 <=> 1.0;
echo "<br>";
echo 0 <=> 1.0;
echo "<br>";
//字符串
echo "a" <=> "a";
echo "<br>";
echo "a" <=> "c";
echo "<br>";
echo "c" <=> "a";
echo "<br>";

echo "\u{0124}";
echo "\u{112}";
echo "\u{13B}";
echo "\u{13B}";
echo "\u{014C}";
