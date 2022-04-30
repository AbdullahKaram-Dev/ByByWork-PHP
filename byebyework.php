<?php

$projectName = 'php';
$connection= mysqli_connect('localhost','root','','cron');
$data = mysqli_query($connection,"select * from cron where project_path = '$projectName' order by date asc limit 1");
$result = mysqli_fetch_object($data);

mysqli_close($connection);

exec("git add .");
sleep(2);
exec("git commit -m ".$result->commit_message);
sleep(2);
exec("git push origin ".$result->origin_name);
sleep(2);
echo "successfully pushing";