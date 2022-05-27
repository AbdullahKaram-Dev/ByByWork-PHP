<?php

require 'vendor/autoload.php';

$connection = mysqli_connect('localhost', 'root', '', 'deen');


/** start count aggregate function */

$query = "SELECT count(*) as total_transaction FROM `payment_history`";
$query = "SELECT count(DISTINCT payment_history.payed_amount) as total_transaction FROM `payment_history`";
$query = "SELECT count(ALL payment_history.payed_amount) as total_transaction FROM `payment_history`";

/** end count aggregate function */

/** start sum aggregate function */

$query = "SELECT sum(payment_history.payed_amount) as total_payed_amount FROM `payment_history`";

/** end sum aggregate function */

/** start sum aggregate function */
/** note : its calculate sum all value rows and divide on count all rows to get avg  */
$query = "SELECT avg(payment_history.payed_amount) as avg_payed_amount FROM `payment_history`";

/** end sum aggregate function */



$result = mysqli_query($connection, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

dd($data);