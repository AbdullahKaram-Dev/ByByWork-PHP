<?php

require 'vendor/autoload.php';

use Twilio\Rest\Client;
$_ENV['TWILIO_ACCOUNT_SID'] = '';
$_ENV['TWILIO_AUTH_TOKEN'] = 'ff87bd74fdfa71630dcb18fba6dedcc5';


$sid = 'AC25fb446a5635f5146bce5675700d1499';
$token = 'ff87bd74fdfa71630dcb18fba6dedcc5';
$twilio = new Client($sid, $token);

$message = $twilio->messages
    ->create("+201118613231", [
            "body" => "مبروك كسبتى معانا ايفون 12 هدية سوف يتم التواصل معك فى أقرب وقت لمعرفة باقى التفاصيل",
            "from" => "+14784295811"]);

dd($message);
