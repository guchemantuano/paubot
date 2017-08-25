<?php
require_once('vendor/autoload.php');
 
$loop = React\EventLoop\Factory::create();

$client = new Slack\RealTimeClient($loop);
$client->setToken('xoxb-232227407542-uswTfAkLZSjPbOp7aGROrdbB');

$client->on('message', function ($data) use ($client) {
	$currentMessage = $data['text'];
    echo "Someone typed a message: ".$currentMessage."\n";
    if ($currentMessage == "andate pau") {
    	$client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
        	$message = $client->getMessageBuilder()
                    ->setText("auchi")
                    ->setChannel($channel)
                    ->create();
        	$client->postMessage($message);
    	});
    	$client->disconnect();
    }
    elseif(strpos(strtolower($currentMessage), "pau") !== false) {
    	$client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
        	$message = $client->getMessageBuilder()
                    ->setText("tratame bieeeeeeeen!")
                    ->setChannel($channel)
                    ->create();
        	$client->postMessage($message);
    	});
    }
    elseif (strpos(strtolower($currentMessage), "zorra") !== false) {
    	$client->getChannelGroupOrDMByID($data['channel'])->then(function ($channel) use ($client, $data) {
        	$message = $client->getMessageBuilder()
                    ->setText("zorri")
                    ->setChannel($channel)
                    ->create();
        	$client->postMessage($message);
    	});
    }
});

$client->connect()->then(function () {
    echo "Connected!\n";
});

$loop->run();
