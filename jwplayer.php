<?php 
/**
 * Demo get link from VideoAPI, use jwplayer
 * Login: https://videoapi.io/panel/login
 * Register: https://videoapi.io/panel/login/register
 * Get Key: https://videoapi.io/panel/config
 */

$key = ''; // Enter your key on VideoAPI.io
$link = 'https://drive.google.com/file/d/0B1xQLLJtrzJoaWUxUHdqY01mRGM/view';
$api = 'https://videoapi.io/api/getlink?key='.$key.'&link='.$link;
$sources = curl($api);
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
<div id="videoapi-player" style="width: 640px;height: 360px"></div>
<script type="text/javascript" src="https://videoapi.io/public/player/jwplayer/jwplayer.js"></script>
<script type="text/javascript">
  jwplayer.key = "XYS/ica6YQUMq9rC6J2E77obUFoIPLeM";
  var playerInstance = jwplayer("videoapi-player");
    playerInstance.setup({
      sources: <?php echo $sources; ?>,
      controls: true,
      displaytitle: true,
      width: "640px",
      height: "360px",
      aspectratio: "16:9",
      fullscreen: "true",
      autostart: true,
    });
</script>
