<?php
//Example posting post on a page.

require __DIR__ . '/facebook-php-sdk-v4/autoload.php';
require __DIR__ . '/config.php';
require __DIR__ . '/FBUtils.php';


$f = new FBUtils(FB_APP_ID, FB_APP_SECRET, FB_TOKEN);
$post = $f->post(FB_PAGE, "Message to post - check out this link!", "http://www.ted.com/");
print($post);
    
?>

