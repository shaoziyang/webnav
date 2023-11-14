<?php

$file_last = 'last.txt';


if (file_exists($file_last))
{
    unlink($file_last);   
    header('location:'.getenv("HTTP_REFERER"));
    header("Refresh:0");
}

?>
