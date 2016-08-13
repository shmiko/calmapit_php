<?php

require 'Instagram.php';
use MetzWeb\Instagram\Instagram;

// initialize class
$instagram = new Instagram(array(
  'apiKey'      => '8d11693c54314da1acca39c219abf094',
  'apiSecret'   => 'fe8906875ecd455992533754668ab674',
  'apiCallback' => 'http://calmapit.com/Instagram/master/Instagram-PHP-API-master/example/success.php' // must point to success.php
));

// create login URL
$loginUrl = $instagram->getLoginUrl();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram - OAuth Login</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <style>
      .login {
        display: block;
        font-size: 20px;
        font-weight: bold;
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <header class="clearfix">
        <h1>Instagram <span>display your photo stream</span></h1>
      </header>
      <div class="main">
        <ul class="grid">
          <li><img src="assets/instagram-big.png" alt="Instagram logo"></li>
          <li>
            <a class="login" href="<?php echo $loginUrl ?>">» Login with Instagram</a>
            <h>Use your Instagram account to login.</h4>
          </li>
        </ul>
        <!-- GitHub project -->
        <footer>
          <p>created by <a href="https://github.com/cosenary/Instagram-PHP-API">cosenary's Instagram class</a>, available on GitHub</p>
        </footer>
      </div>
    </div>
  </body>
</html>