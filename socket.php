<?php

echo "hello<br><br>";
$fp = stream_socket_client("tcp://127.0.0.1:80", $errno, $errstr, 1);
if (!$fp) {
    echo "error<br><br>";
    echo "$errstr ($errno)<br />\n";
} else {
    fwrite($fp, "GET / HTTP/1.0\r\nHost: www.facebook.com\r\nAccept: */*\r\n\r\n"); //just returns an acknowledgement
    while (!feof($fp)) {
        echo fgets($fp, 1024);
    }
    fclose($fp);
}