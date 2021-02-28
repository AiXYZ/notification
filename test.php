<?php
require_once __DIR__ . '/vendor/autoload.php';

$channelName = 'news';
$recipient= 'ExponentPushToken[ov0haFCVNaAmew2nM5cDvT]';
// $recipient= 'ExponentPushToken[EKlKPYFJvi7fdj0Uir7cwR]'; //android

// You can quickly bootup an expo instance
$expo = \ExponentPhpSDK\Expo::normalSetup();

// Subscribe the recipient to the server
$expo->subscribe($channelName, $recipient);

// Build the notification data
$notification = [
    'title' => 'test 9', 
    'body' => 'Hello World 9', 
    '_displayInForeground' => true,
    'sound' => 'default',
];

// Notify an interest with a notification
$expo->notify([$channelName], $notification);

echo 'Test Succeeded';

?>