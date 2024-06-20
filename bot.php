<?php 

$API_KEY = "7418780057:AAFjdonByrVqRqsxnlZ2M3s4reFb4Rbaw9k";
define("API_KEY" , $API_KEY);

$inData = file_get_contents('php://input');

$tData = json_decode($inData);

$message = $tData->message;
$chat = $message->chat;
$chat_id = $chat->id;
$text = "hi";

// bot("sendMessage",[

//     "chat_id"=> $chat_id,
//     "text"=>"Hello...."
// ]);
$url = "http://api.telegram.org/bot" . API_KEY . "/" . "sendMessage" ."?"."chat_id" . "=" . $chat_id . "&" . "text=hi" ;
$ch = curl_init();
curl_setopt($ch , CURLOPT_URL, $url);
curl_setopt($ch , CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch , CURLOPT_PROXY, "socks5h://127.0.0.1:4040");
// curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$result = curl_exec($ch);
return $result;



//bot function
function bot($method , $data=[]){
    $url = "http://api.telegram.org/bot" . API_KEY . "/" . $method  ;
    $ch = curl_init();
    curl_setopt($ch , CURLOPT_URL, $url);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch , CURLOPT_PROXY, "socks5h://127.0.0.1:4040");
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

    $result = curl_exec($ch);
    return $result;
}