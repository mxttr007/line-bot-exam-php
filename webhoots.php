<?php
   $accessToken = "/wY5HSrpnmDx7LIWM7AUTEWD1GIxquEPOeyZP+5qmR4HxF2SNpR68NbtCuNR4gQm4Nmy7GtKojgCFm8LYSXi1JRu9DZdd79DvPD149iCQ8TA8jIiKDEvjFAvN1uJMHsN7X3WmqSQ1EiSipWZ6TN0SQdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   if($message == "เเสส"){
       $arrayPostData['to'] = $id;
       $arrayPostData['messages'][0]['type'] = "text";
       $arrayPostData1['messages'][0]['text'] = "$message";
       pushMsg($arrayHeader,$arrayPostData);
   }
   //if($message == "นับ 1-10"){
   //    for($i=1;$i<=10;$i++){
   //       $arrayPostData['to'] = $id;
   //       $arrayPostData['messages'][0]['type'] = "text";
   //       $arrayPostData['messages'][0]['text'] = $i;
   //       $arrayPostData1['messages'][0]['text'] = "text";
   //       $arrayPostData1['messages'][0]['text'] = "$message";
   //       pushMsg($arrayHeader,$arrayPostData,$arrayPostData1);
   //   }
    }
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>
