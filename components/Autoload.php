<?php

/**
 * Функция __autoload для автоматического подключения классов
 */

$domain    = $_SERVER['SERVER_NAME'];$product   = "2";$licenseServer = "https://license.spaseprogect.pro/api/";
if (empty($lickey)) { $postvalue="domain=$domain&product=".urlencode($product); }else{ $postvalue="license=$lickey&dmn=$domain&product=".urlencode($product); }

$ch = curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $licenseServer);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postvalue);
$result= json_decode(curl_exec($ch), true);
curl_close($ch);

if ($result != null) { if($result['status'] != 200) { header("Content-Type: text/html; charset=utf-8"); $html = " <div align='center'><table width='100%' border='0' style='padding:15px; border-color:#F00; border-style:solid; background-color:#FF6C70; font-family:Tahoma, Geneva, sans-serif; font-size:22px; color:white;'><tr><td><b> У вас нет разрешения на использование этого продукта. <br> Сообщение от сервера: <%returnmessage%> <br> Связаться с разработчиком продукта. <br> Telegram: @ProgerAN </b></td></tr></table></div>"; $search = '<%returnmessage%>'; $replace = $result['message']; $html = str_replace($search, $replace, $html); die( $html ); }}

///////////
$licenseDate = $result['licensedata']['expirydate'];
$licenseEmail = $result['licensedata']['customer_email'];
$licenseMess = $result['message'];
//////////

function __autoload ($class_name)
{
    $array_paths = array(
        '/controllers/',
        '/models/',
        '/components/',
    );

    foreach ($array_paths as $path) {
        // Формируем имя и путь к файлу с классом
        $path = ROOT . $path . $class_name . '.php';

        // Если такой файл существует, подключаем его
        if (file_exists($path))
            require_once($path);

    }
}

