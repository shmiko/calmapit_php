<?php
/**
 * @author: Travellar
 * @created: 19/01/13, 15:18
 * @filename: UtilityService.php
 */

namespace Travellar\Service;

use \Swift_SmtpTransport;
use \Swift_MailTransport;
use \Swift_Message;
use \Swift_Mailer;

use \Twig_Loader_Filesystem;
use \Twig_Environment;

class UtilityService {

    public static function aasort(&$array, $key) {
      $sorter = array();
      $ret = array();

      reset($array);

      foreach ($array as $ii => $va) {
          $sorter[$ii]=$va[$key];
      }

      asort($sorter);

      foreach ($sorter as $ii => $va) {
          $ret[$ii]=$array[$ii];
      }

      $array = $ret;
    }

    public static function mail($receiver_email, $receiver_name, $title, $message) {
      $content = array(
      "title" => $title,
      "message" => $message
      );

      $transport = Swift_MailTransport::newInstance();
      $mailer = Swift_Mailer::newInstance($transport);

      $message = Swift_Message::newInstance($content['title'])
        ->setFrom(array('no-reply@travellar.eu' => 'Travellar'))
        ->setTo(array($receiver_email => $receiver_name));

      $loader = new Twig_Loader_Filesystem('src/Travellar/View');
      $twig = new Twig_Environment($loader, array('cache' => false));
      $mailBody = $twig->render("email/basic.twig.html", $content);

      // $img_header = $message->embed(\Swift_Image::fromPath(WWW_ROOT . DIRECTORY_SEPARATOR .'layout/images/cicada_full.png'));

      $message->setBody($mailBody, 'text/html');
      $result = $mailer->send($message);

      return $result;
    }

    public static function notFoundHeaders() {
      header('HTTP/1.0 404 Not Found');
    }

    public static function urlise($string) {
        $string = mb_strtolower($string, 'UTF-8');

        $accentedVowels = array('é','è','ë','á','à','ä','ú','ù','ü','í','ì','ï','ó','ò','ö');
        $plainVowels    = array('e','e','e','a','a','a','u','u','u','i','i','i','o','o','o');
        $string = str_replace($accentedVowels, $plainVowels, $string);

        $reservedCharacters = array('/','?',':','@','#','[',']','!','$','&','\'','(',')','*','+','.',',',';','=','"');
        $string = str_replace($reservedCharacters, ' ', $string);

        $string = str_replace(' ', '-', $string);

        if (urldecode($string) == $string) {
            $string = urlencode($string);
        }

        // convert "--" to "-"
        $string = preg_replace('/\-+/', '-', $string);

        return trim($string, '-');
    }

    public static function formatTime($time, $format) {
        $time = new \DateTime($time);
        return $time->format($format);
    }

    public static function hashPassword($salt, $password) {
        $hash = $salt . $password;

        for($i = 0; $i < 100000; $i ++) {
          $hash = hash('sha256', $hash);
        }

        $hash =  $hash . $salt;

        return $hash;
    }

    public static function randomSha256Hash($suffix = '') {
        return hash('sha256', uniqid(mt_rand(), true) . ConfigurationService::SALT . strtolower($suffix));
    }

    public static function randomSha1Hash($suffix = '') {
        return hash('sha1', uniqid(mt_rand(), true) . ConfigurationService::SALT . strtolower($suffix));
    }

    public static function redirect($url, $seconds = 0) {
        header("Refresh: " . $seconds . "; url=" . $url);
    }

    public static function urlToCleanTitle($title) {
        $title = explode("-", strtolower($title));
        $newTitle = array();
        foreach($title as $titlePart) {
            $titlePart = ucfirst($titlePart);

            if(count($newTitle) > 0)
                $titlePart = ' ' . $titlePart;

            $newTitle[] = $titlePart;
        }

        return implode($newTitle);
    }

    public static function url_get_contents($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_USERAGENT, "PHP UrlGetContents Spider");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    public static function arrayToXML($data, $startElement = 'result', $xml_version = '1.0', $xml_encoding = 'UTF-8', $filter = ''){
      if(!is_array($data)){
         $err = 'Invalid variable type supplied, expected array not found on line '.__LINE__." in Class: ".__CLASS__." Method: ".__METHOD__;
         trigger_error($err);
         return false;
      }

      $xml = new XmlWriter();
      $xml->openMemory();
      $xml->startDocument($xml_version, $xml_encoding);

      $xml->startElement($startElement);
      function write(XMLWriter $xml, $data, $filter = ''){
          foreach($data as $key => $value){
              if(is_array($value)){
                  if(!empty($filter)) {
                      $flippedFilter = array_flip($filter);
                      if(strpos($key, $flippedFilter[reset($filter)]) !== false) $key = reset($filter);
                  }

                  $xml->startElement($key);
                  write($xml, $value, $filter);
                  $xml->endElement();
                  continue;
              }
              $xml->writeElement($key, $value);
          }
      }

      write($xml, $data, $filter);

      $xml->endElement();

      return $xml->outputMemory(true);
    }

    public static function dateDifference($time1, $time2) {

        if (!is_int($time1)) $time1 = strtotime($time1);
        if (!is_int($time2)) $time2 = strtotime($time2);

        if ($time1 > $time2) {
            $ttime = $time1;
            $time1 = $time2;
            $time2 = $ttime;
        }

        $intervals = array('years', 'months', 'days', 'hours', 'minutes', 'seconds');
        $diffs = array();

        foreach ($intervals as $interval) {
            // Set default diff to 0
            $diffs[$interval] = 0;
            // Create temp time from time1 and interval
            $ttime = strtotime("+1 " . $interval, $time1);
            // Loop until temp time is smaller than time2
            while ($time2 >= $ttime) {
                $time1 = $ttime;
                $diffs[$interval]++;
                $ttime = strtotime("+1 " . $interval, $time1);
            }
        }

        $count = 0;
        $returnValue = array();
        foreach ($diffs as $interval => $value) {
            $returnValue[$interval] = $value;
        }

        return $returnValue;
    }

    public static function daysInMonth($month, $year = "") {
        if (empty($year)) $year = date("Y");

        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }
}
