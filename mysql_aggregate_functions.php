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
$query = "SELECT status,client_course_row_id,sum(payment_history.payed_amount) as min_payed_amount FROM `payment_history` group by payment_history.client_course_row_id";

/** end sum aggregate function */

/** start sum aggregate function */
/** note : its calculate sum all value rows and divide on count all rows to get avg  */
$query = "SELECT avg(payment_history.payed_amount) as avg_payed_amount FROM `payment_history`";

/** end sum aggregate function */


/** start min aggregate function */

$query = "SELECT min(ALL payment_history.payed_amount) as min_payed_amount FROM `payment_history`";
$query = "SELECT client_course_row_id,min(payment_history.payed_amount) as min_payed_amount FROM `payment_history` group by payment_history.client_course_row_id
          HAVING min(payment_history.payed_amount) > 50";

/** end min aggregate function */

/** start max aggregate function */

$query = "SELECT max(DISTINCT payment_history.payed_amount) as max_payed_amount FROM `payment_history`";

/** end max aggregate function */


/** start group_concat() aggregate function */

$query = "SELECT client_id, group_concat(CONCAT_WS(' - ', clients.client_firstname, clients.client_lastname) SEPARATOR ';') as client_name FROM `clients` group by clients.client_id";

/** end group_concat() aggregate function */


$result = mysqli_query($connection, $query);
//$data = mysqli_fetch_object($result, 'stdClass');
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
dd($data);