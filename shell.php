<?php

/** $argv available variable contain all parameters coming from cli when run script
 *  example php shell.php abdullah karma password (all parameters)
 */
$username = readline('what is your username: ');
$password = readline('what is your password: ');
$originName = readline('what is origin name: ');
$commitMessage = readline('what is your commit message: ');
$datePushing = readline('what is date you need to push your script: ');

if ($password != '123456' || $username != 'abdo'){
     die('invalid credentials');
}
exec("git add .");
sleep(2);
exec("git commit -m ".$commitMessage);
sleep(2);
exec("git push origin ".$originName);
sleep(2);
echo "successfully pushing to ".$originName;
