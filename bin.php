<?php



extract($_GET);

function getStr($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

$separador = explode("|", $lista);
$cc = trim($separador[0]);


$cctwo = substr("$cc", 0, 6);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cctwo.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);

$banco = getStr($fim, '"bank":{"name":"', '"');
$pais = getStr($fim, '"name":"', '"');
$nivel = getStr($fim, '"brand":"', '"');


 if(strpos($fim, '"type":"credit"') !== false) {
	$bin = 'Credit';
} else {
	$bin = 'Debit';
}


?>