<?php

include('class/weshare.class.php');

use Shakib\WeShare;

$class = new WeShare(""); // Enter Your Api Token
$postData = [
    'file_id' => "", // Enter Your File ID
    'title' => '' // Enter Your File New Name
];
var_dump($class->FileUpdate("", $postData)); // Enter Your File ID
