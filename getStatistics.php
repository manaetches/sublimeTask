
<?php
$server = $_GET['q'];
$json = file_get_contents('https://services.mysublime.net/st4ts/data/get/type/iq/server/'.$server.'/');
echo $json;
?>