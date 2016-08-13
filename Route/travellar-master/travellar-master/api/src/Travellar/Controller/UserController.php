<?php

namespace Travellar\Controller;

use \Travellar\Service\UtilityService;

class UserController {
  public static function sendUpdateMail($data) {
    $receiver['email'] = $data['email'];
    $receiver['name'] = $data['fname'] . ' ' . $data['lname'];
    $content['title'] = 'Account details were updated';
    $content['message'] =
      nl2br("Hi " . $data['fname'] . ",

      We're just mailing you to let you know that your account details were updated on our website the <b>" . date("jS") . " of " . date("F, Y") . "</b> around <b>" . date("g:i a") . "</b> by the following ip: <b>" . $_SERVER['REMOTE_ADDR'] . "</b>. 
      
      If you believe this is a mistake or you didn't changed this youself you should contact us as soon as possible so we can reset your account.

      Regards,
      Travellar
      info@travellar.eu
      <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/'>http://travellar.eu/</a>");

    UtilityService::mail($receiver['email'], $receiver['name'], $content['title'], $content['message']);
  }

  public static function sendRegisterMail($data) {
    $receiver['email'] = $data['email'];
    $receiver['name'] = $data['fname'] . ' ' . $data['lname'];
    $content['title'] = 'Welcome, ' . $data['fname'] . '!';
    $content['message'] =
      nl2br("Welcome to Travellar, " . $data['fname'] . "!

      We're excited to see where you will be going to.
      To get started just login on the website, create a trip and invite some friends.
      And then you can start planning your awesome trip!

      <a class='button' href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/#login'>Login</a>

      Regards,
      Travellar
      info@travellar.eu
      <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/'>http://travellar.eu/</a>");

    UtilityService::mail($receiver['email'], $receiver['name'], $content['title'], $content['message']);
  }
}