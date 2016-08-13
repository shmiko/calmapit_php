<?php

namespace Travellar\Controller;

use \Travellar\Service\UtilityService;

class TripController {
  public static function sendDeletionNotice($data) {
    foreach($data['companions'] as $user) {
      $receiver['email'] = $user['email'];
      $receiver['name'] = $user['fname'] . ' ' . $user['lname'];
      $content['title'] = 'Trip deletion notice';
      $content['message'] =
        nl2br("Hi " . $user['fname'] . ",

        We're just mailing you to let you know that a companion has deleted the following trip: <b>" . $data['trip']['name'] . "</b>
        
        If you believe this is a mistake we can still revert this change.
        Just contact us and we'll be happy to help you.

        Regards,
        Travellar
        info@travellar.eu
        <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/'>http://travellar.eu/</a>");

      UtilityService::mail($receiver['email'], $receiver['name'], $content['title'], $content['message']);
    }
  }

  public static function sendInviteMails($data) {
    if(count($data['notRegistered']) > 0) {
      foreach($data['notRegistered'] as $user) {
        $receiver['email'] = $user;
        $receiver['name'] = $user;
        $content['title'] = 'You\'ve been invited to join Travellar!';
        $message = "Hi,

          You've been invited to plan a trip, <b>" . $data['name'] . "</b>, together with <b>";

        $length = count($data['companions']);

        $i = 1;
        $andUsed = false;
        foreach($data['companions'] as $companion) {
          $message .= $companion['fname'];

          if(!$andUsed) {
            if($i == ($length - 1)) {
              $message .= " and ";
              $andUsed = true;
            }
            elseif($i++ < $length)
              $message .= ", ";
          }
        }

        $message .= "</b>.

        <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/#register' class='button'>Register now!</a>

          Regards,
          Travellar
          info@travellar.eu
          <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/'>http://travellar.eu/</a>";
        
        $content['message'] = nl2br($message);

        UtilityService::mail($receiver['email'], $receiver['name'], $content['title'], $content['message']);
      }
    }

    if(count($data['notAdded']) > 0) {
      foreach($data['notAdded'] as $user) {
        $receiver['email'] = $user['email'];
        $receiver['name'] = $user['fname'] . ' ' . $user['lname'];
        $content['title'] = 'You\'ve been added to a trip!';
        $message = "Hi " . $user['fname'] . ",

          You've been added to the trip administrators for the trip <b>" . $data['name'] . "</b> together with <b>";

        foreach($data['companions'] as $k => $v) {
          if($v['email'] == $user['email'])
            unset($data['companions'][$k]);
        }

        $length = count($data['companions']);

        $i = 1;
        $andUsed = false;
        foreach($data['companions'] as $companion) {
          $message .= $companion['fname'];

          if(!$andUsed) {
            if($i == ($length - 1)) {
              $message .= " and ";
              $andUsed = true;
            }
            elseif($i++ < $length)
              $message .= ", ";
          }
        }

        $message .= "</b>.

        You can now modify the trip data on the website.

          Regards,
          Travellar
          info@travellar.eu
          <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/'>http://travellar.eu/</a>";
        
        $content['message'] = nl2br($message);

        UtilityService::mail($receiver['email'], $receiver['name'], $content['title'], $content['message']);
      }
    }
  }

  public static function sendCreationNotice($data) {
    $receiver['email'] = $data['user']['email'];
    $receiver['name'] = $data['user']['fname'] . ' ' . $data['user']['lname'];
    $content['title'] = 'Trip creation notice';
    $content['message'] =
      nl2br("Hi " . $data['user']['fname'] . ",

      You have just created the trip <b>" . $data['trip']['name'] . "</b>.
      Add some companions to plan the trip together.
      The more people, the more fun!
      
      If you created this trip by accident you can always delete in <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/#my-account'>\"My Account\"</a> section.

      Regards,
      Travellar
      info@travellar.eu
      <a href='http://student.howest.be/wouter.de.schuyter/20122013/RMD2/TRIPIT/'>http://travellar.eu/</a>");

    UtilityService::mail($receiver['email'], $receiver['name'], $content['title'], $content['message']);
  }
}