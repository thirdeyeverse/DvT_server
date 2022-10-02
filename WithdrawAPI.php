<?php
 include 'config.php';
$dbport = 3306;
// $dbuser = 'root';
// $dbpassword = '';
// $db = 'game';
// $dbhost = 'localhost';
// $dbport = 3306;





$dblink = mysqli_init();
$dbconnection = mysqli_real_connect($dblink, $dbhost, $dbuser, $dbpassword, $db, $dbport);

if($dbconnection) {

}
else{
	die("connection failed" . mysql_error());
}

date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d\TH:i:s", time());


$type=$_POST['type'];

$user = $_POST['uid'];
$amount=$_POST['amount'];




if($type == 0)
{
    $pid=$_POST['pid'];
    $phone=$_POST['phone'];
    $pay="PayTm";
    $ii=1;
    $qquery = "UPDATE users SET WReqCount=WReqCount+'$ii',LastReqTime='$datetime' WHERE userid='$user'";
    $query = "INSERT INTO withdrawshop (userid,PaymentType,Phone,PaytmID,Upi,AccNum,IFSC,Amount,RequestTime) VALUES ('$user','$pay','$phone','$pid', '', '', '','$amount','$datetime')";
    if($result = mysqli_query($dblink, $query))
    {
       
			
			
			if($rres = mysqli_query($dblink, $qquery))
			{
			    $dataArray = array('success' => true, 'error' => '',  'Message' => "Withdraw Requested Successfully");
			}
			else
			{
                
                $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
            }
        
			
    }
    else{
        //$r=mysqli_fetch_row($result);
        $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
    }
}
else if($type == 1)
{
    $upid=$_POST['upiid'];
    $phone=$_POST['phone'];
    $ii=1;
	$qquery = "UPDATE users SET WReqCount=WReqCount+'$ii',LastReqTime='$datetime' WHERE userid='$user'";
    $query = "INSERT INTO withdrawshop (userid,PaymentType,Phone,PaytmID,Upi,AccNum,IFSC,Amount,RequestTime) VALUES('$user','UPI','$phone','','$upid','', '','$amount','$datetime')";
    if($result = mysqli_query($dblink, $query))
    {
       
			
			if($rres = mysqli_query($dblink, $qquery))
			{
			    $dataArray = array('success' => true, 'error' => '',  'Message' => "Withdraw Requested Successfully");
			}
			else
			{
                
                $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
            }
    } else{
        $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
    }
}
else if($type == 2)
{
    $accnum=$_POST['accnum'];
    $ifsc=$_POST['ifsc'];
    $phone=$_POST['phone'];
    $ii=1;
	$qquery = "UPDATE users SET WReqCount=WReqCount+'$ii',LastReqTime='$datetime' WHERE userid='$user'";
    $query = "INSERT INTO withdrawshop (userid,PaymentType,Phone,PaytmID,Upi,AccNum,IFSC,Amount,RequestTime) VALUES('$user','Bank','$phone','','','$accnum','$ifsc','$amount','$datetime')";
    if($result = mysqli_query($dblink, $query))
    {
       
			
			if($rres = mysqli_query($dblink, $qquery))
			{
			    $dataArray = array('success' => true, 'error' => '',  'Message' => "Withdraw Requested Successfully");
			}
			else
			{
                
                $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
            }
    } else{
        $dataArray = array('success' => false, 'Message' => 'Request not completed, try again later.');
    }
}



echo json_encode($dataArray);
?>