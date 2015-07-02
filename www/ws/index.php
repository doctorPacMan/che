<?
$html = dirname(__FILE__).'/index.html';

//phpinfo();die();

echo "<!-- "."WebSockets ".(extension_loaded('sockets') ? "OK" : "FAIL")." -->";
echo "WebSockets ".(extension_loaded('sockets') ? "OK" : "FAIL");

require($html);
?>