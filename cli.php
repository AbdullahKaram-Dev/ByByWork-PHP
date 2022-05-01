<?php
declare(strict_types=1);
/** check if request is coming from cli or cig not (http) */

$validCli = ['cgi-fcgi', 'cli', 'cgi'];
function checkIsCli():string
{
    global $validCli;
    return (in_array(php_sapi_name(), $validCli)) ? 'cli' : 'not cli';
}

echo checkIsCli();
exec('ls',$output);
print_r($output);
readline_add_history('ls');
print_r(readline_list_history());