<?php
    $hosting=$_SERVER["HTTP_HOST"];
    $protocol=$_SERVER["REQUEST_SCHEME"];
    $root_url=$protocol."://".$hosting;
?>