<?php



require "vendor/autoload.php";

$access_token = 'UuN8JGxYKD7kAhRAp/xRNLukAzHA1d6mMR49EGgR5nGSTbFdOR2VekihaEdwdLURDBY9/c7nCRhF1BpexBBBEo/Ay/jc5L97wXtdESxrtTD9RYnpnzkevc51xeTmSgYj/ElsS9DFTr7CQuDFn0D7ywdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'bc95a1fff627a6d3997b0437f74fca17';

$pushID = 'U4cf3b2caa96814c20815eed72ef8b7c7';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







