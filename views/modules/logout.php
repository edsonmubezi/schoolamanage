<?php

 $getip = BasicMethodsCtrl::GetIpAddress();
 $hour = BasicMethodsCtrl::getime();
 $date = BasicMethodsCtrl::getdate();

$table = "useractivity";
$data = array('userid' =>$_SESSION["id"],
			  'activity' =>"logged Out",
			  'datecreated' =>$date,
			  'ipaddress' =>$getip,
			  'timecreated' =>$hour);
$answer = CommonMethodsmdl::AddUserActivityMdl($table,$data);
session_destroy();

echo '<script>

	window.location = "login";

</script>';
