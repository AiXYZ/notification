<?php
require_once __DIR__ . '/vendor/autoload.php';

/*
{
   "to":[
      {
         "token":"ExponentPushToken[ov0haFCVNaAmew2nM5cDvT]"
      },
      {
         "token":"ExponentPushToken[EKlKPYFJvi7fdj0Uir7cwR]"
      }
   ],
   "title":"Purchaser message",
   "body":"Please approve my invoice"
}
*/

if(isset($_GET['message'])) {
    $message = $_GET['message'];
    $message_array = json_decode($message, true);

    $body = $message_array['body'];
    $title = $message_array['title'];

    $channelName = 'invoice';
    $expo = \ExponentPhpSDK\Expo::normalSetup();

    foreach ($message_array['to'] as $to) {
        $recipient = $to['token'];
        $expo->subscribe($channelName, $recipient);
        
        echo json_encode($title ."-". $body ."-". $recipient);
    }

    // Build the notification data
    $notification = [
        'title' => $title, 
        'body' => $body, 
        '_displayInForeground' => true,
        'sound' => 'default',
    ];

    // Notify an interest with a notification
    $expo->notify([$channelName], $notification);
}else{
    echo json_encode("No Parameters");
}

?>