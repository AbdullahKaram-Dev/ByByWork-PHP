<?php



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



//$dd = readline('what is your first name?');
//echo $dd;
//print_r($argv);
//$first_name = $argv[0];
//
//readline('what is your last name?');
//
//$last_name = $argv[0];
//
//echo "welcome".$first_name . $last_name;
//
//print_r($argv);
//print_r(getopt('aaa',[1,2,3]));
//
//exec('git push origin master',);