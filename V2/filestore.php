<?php

include('class/weshare.class.php');

use Shakib\WeShare;

$class = new WeShare(""); // Enter Your Api Token
$postData = [
    'file_link' => "", // Enter Your File Link : You can check supported file host server lists : https://xyzcdn.eu.org/page/hosts
];
var_dump($class->FileStore($postData));
