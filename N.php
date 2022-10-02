<?php
 include 'config.php';
$dbport = 3306;


$dblink = mysqli_init();
$dbconnection = mysqli_real_connect($dblink, $dbhost, $dbuser, $dbpassword, $db, $dbport);

if($dbconnection) {

}
else{
	die("connection failed" . mysql_error());
}
$tq="SELECT MAX(id) FROM Bets";
    $tqres=mysqli_query($dblink, $tq);
    $rqRow=mysqli_fetch_row($tqres);
    if($rqRow[0]%15 == 0)
    {
        
        $RN=$rqRow[0]+rand(1,14);
        echo "Succ  ".$rqRow[0]."  ".$RN;
        // $NBQuery="UPDATE AdminUsers SET NextRound='$RN' WHERE userid='TieAdmin'";
        // $nR=mysqli_query($dblink, $NBQuery);
        
    }
    else
    {
        echo "Fail  ".$rqRow[0];
    }

//echo json_encode($rrr);
?>



