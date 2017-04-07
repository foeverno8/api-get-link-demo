<?php 
/**
 * Demo get link from VideoAPI
 * Login: https://videoapi.io/panel/login
 * Register: https://videoapi.io/panel/login/register
 * Get Key: https://videoapi.io/panel/config
 */

$key = ''; // Enter your key on VideoAPI
$link = 'https://drive.google.com/file/d/0B1xQLLJtrzJoaWUxUHdqY01mRGM/view';
$api = 'https://videoapi.io/api/getlink?key='.$key.'&link='.$link.'&cache=false';
$sources = curl($api);
$sourcesDecode = json_decode($sources);
echo "<pre>";
print_r($sourcesDecode);
echo "</pre>";
// function curl
function curl($url)
{
  $ch = @curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  $head[] = "Connection: keep-alive";
  $head[] = "Keep-Alive: 300";
  $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
  $head[] = "Accept-Language: en-us,en;q=0.5";
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36');
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_TIMEOUT, 15);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
  $page = curl_exec($ch);
  curl_close($ch);
  return $page;
}
?>
