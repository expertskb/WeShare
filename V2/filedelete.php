<?php

include('class/weshare.class.php');

use Shakib\WeShare;

$class = new WeShare(""); // Enter Your Api Token
$postData = [
    'file_id' => "", // Enter Your File ID
];
var_dump($class->FileDelete("", $postData)); // Enter Your File ID
