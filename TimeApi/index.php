<?php
date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d\TH:i:s", time());
echo '{ "datetime": "'.$datetime.'" }';

?>