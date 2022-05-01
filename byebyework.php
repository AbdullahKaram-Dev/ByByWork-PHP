<?php
$projectName = 'php';
$connection= mysqli_connect('localhost','root','','cron');
$data = mysqli_query($connection,"select * from cron where project_path = '$projectName' and status = 'uncompleted'");
$result = mysqli_fetch_object($data);

if (!is_null($result)){

    $message = "$result->commit_message";
//    var_dump($message);
//    die;
    exec("git add .");
    sleep(3);
    exec("git commit -m just cron jop");
    sleep(3);
    exec("git push -u origin main");
    sleep(3);
    //$updateCron = mysqli_query($connection,"update cron set status = 'completed' where id = '$result->id'");
}
mysqli_close($connection);