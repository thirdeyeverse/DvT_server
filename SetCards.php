<?php
set_time_limit(0);
  sleep(48);
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





 $tq="SELECT MAX(id) FROM Bets";
    $tqres=mysqli_query($dblink, $tq);
    $rqRow=mysqli_fetch_row($tqres);
    $CMP=$rqRow[0]+1;
    if($CMP%15 == 0)
    {
        $RNQ=$CMP+rand(1,14);
        $NBQQuery="UPDATE AdminUsers SET NextRound='$RNQ' WHERE userid='TieAdmin'";
        $nRQ=mysqli_query($dblink, $NBQQuery);
        
                
        $query = "SELECT DR,TIE,TG from users";
        $result = mysqli_query($dblink, $query);
        
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($row);
        if($row){
            $DR=0;$TIE=0;$TG=0;
            $nrow=array();
            for ($x = 0; $x < count($row); $x++) {
                $DR+=$row[$x]['DR'];
                $TIE+=$row[$x]['TIE'];
                $TG+=$row[$x]['TG'];
            }
            $NDR=$DR;
            $NTIE=$TIE;
            $NTG=$TG;
            echo "DR->".$NDR."--------------------";
            echo "Tie->".$NTIE."--------------------";
            echo "TG->".$NTG."--------------------";
            $DR=2*$DR;
            $TIE=8*$TIE;
            $TG=2*$TG;
                echo "DR->".$DR."--------------------";
            echo "Tie->".$TIE."--------------------";
            echo "TG->".$TG."--------------------";
            $cards=array(1,2,3,4,5,6,7,8,9,10,11,12,13);
            $Type=array(0,1,2,3);
            
            
            
            // if($TIE < $DR && $TIE < $TG)
            // {
            //     $k = array_rand($cards);
            //     $vk = $cards[$k];
            //     unset($cards[$k]);
                
            //     $t=array_rand($Type);
            //     $vt=$Type[$t];
            //     unset($Type[$t]);
                
            //     $nt=array_rand($Type);
            //     $vnt=$Type[$nt];
            //     unset($Type[$nt]);
                
            //     $mv1=13*$vt;
            //     $mv2=13*$vnt;
                
            //     $v1=$vk+$mv1;
            //     $v2=$vk+$mv2;
                
                
            //     array_push($nrow,"TIE",$v1,$v2);
            // }
            if($DR == $TG)
            {
                $Uj=rand(1,50);
                if($Uj%2==0)
                {
                    $k1 = rand(1,12);
                    $vk1 = $cards[$k1];
                    
                    $vk=$vk1-1;
                    if($vk <= 1)
                    {
                        $k2=0;
                    }
                    else
                    {
                        if($k1 == $vk)
                        {
                            $k2=rand(0,$vk-1);
                        }
                        else
                        {
                            $k2=rand(0,$vk);
                        }
                        
                    }
                    
                    
                    //$k2 = array_rand($cards);
                    $vk2 = $cards[$k2];
                    unset($cards[$k2]);
                    
                    
                    $t=array_rand($Type);
                    $vt=$Type[$t];
                    
                    $nt=array_rand($Type);
                    $vnt=$Type[$nt];
                    
                    $mv1=13*$vt;
                    $mv2=13*$vnt;
                    
                    $v1=$vk1+$mv1;
                    $v2=$vk2+$mv2;
                    
                     array_push($nrow,"DRAGON",$v1,$v2);
                }
                else
                {
                    $k1 = rand(1,12);
                    $vk1 = $cards[$k1];
                    
                    
                    $vk=$vk1-1;
                    if($vk <= 1)
                    {
                        $k2=0;
                    }
                    else
                    {
                        if($k1 == $vk)
                        {
                            $k2=rand(0,$vk-1);
                        }
                        else
                        {
                            $k2=rand(0,$vk);
                        }
                        
                    }
                    
                    
                    //$k2 = array_rand($cards);
                    $vk2 = $cards[$k2];
                    unset($cards[$k2]);
                    
                    
                    $t=array_rand($Type);
                    $vt=$Type[$t];
                    
                    $nt=array_rand($Type);
                    $vnt=$Type[$nt];
                    
                    $mv1=13*$vt;
                    $mv2=13*$vnt;
                    
                    $v1=$vk2+$mv1;
                    $v2=$vk1+$mv2;
                    
                    
                     array_push($nrow,"TIGER",$v1,$v2);
                }
            }
            elseif($DR < $TG)
            {
                $k1 = rand(1,12);
                $vk1 = $cards[$k1];
                
                $vk=$vk1-1;
                if($vk <= 1)
                {
                    $k2=0;
                }
                else
                {
                    if($k1 == $vk)
                    {
                        $k2=rand(0,$vk-1);
                    }
                    else
                    {
                        $k2=rand(0,$vk);
                    }
                    
                }
                
                
                //$k2 = array_rand($cards);
                $vk2 = $cards[$k2];
                unset($cards[$k2]);
                
                
                $t=array_rand($Type);
                $vt=$Type[$t];
                
                $nt=array_rand($Type);
                $vnt=$Type[$nt];
                
                $mv1=13*$vt;
                $mv2=13*$vnt;
                
                $v1=$vk1+$mv1;
                $v2=$vk2+$mv2;
                
                 array_push($nrow,"DRAGON",$v1,$v2);
            }
            elseif($TG < $DR)
            {
                
                $k1 = rand(1,12);
                $vk1 = $cards[$k1];
                
                
                $vk=$vk1-1;
                if($vk <= 1)
                {
                    $k2=0;
                }
                else
                {
                    if($k1 == $vk)
                    {
                        $k2=rand(0,$vk-1);
                    }
                    else
                    {
                        $k2=rand(0,$vk);
                    }
                    
                }
                
                
                //$k2 = array_rand($cards);
                $vk2 = $cards[$k2];
                unset($cards[$k2]);
                
                
                $t=array_rand($Type);
                $vt=$Type[$t];
                
                $nt=array_rand($Type);
                $vnt=$Type[$nt];
                
                $mv1=13*$vt;
                $mv2=13*$vnt;
                
                $v1=$vk2+$mv1;
                $v2=$vk1+$mv2;
                
                
                 array_push($nrow,"TIGER",$v1,$v2);
            }
            
            $yourdate=date("Y-m-d H:i:30",time());
            $newquery="INSERT INTO Bets(DR,TIE,TG,DRCard,TGCard,Winner,Time) VALUES ('$DR','$TIE','$TG','$nrow[1]','$nrow[2]','$nrow[0]','$yourdate')";
        	if($resultnew = mysqli_query($dblink, $newquery)){
        	    
        	    $queryyy = "UPDATE users SET DR=0,TIE=0,TG=0";
                $resulty = mysqli_query($dblink, $queryyy);
        	}
        	else{
        			
        		}
            
            
            
            
            
        	$dataArray = array('success' => $nrow, 'Message' => 'Cards Set ');
        } else{
        	
            $dataArray = array('success' => false, 'Message' => 'Could not Set Cardssssssss, try again later.');
        
        }
        
        
        
        echo json_encode($dataArray);
       
        
    }
    else
    {
        $NBQuery="SELECT NextRound FROM AdminUsers WHERE userid='TieAdmin'";
        $nR=mysqli_query($dblink, $NBQuery);
        $nRR=mysqli_fetch_row($nR);
        if($nRR[0] == $rqRow[0])
        {
                         
            $query = "SELECT DR,TIE,TG from users";
            $result = mysqli_query($dblink, $query);
            
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if($row){
                $DR=0;$TIE=0;$TG=0;
                $nrow=array();
                for ($x = 0; $x < count($row); $x++) {
                    $DR+=$row[$x]['DR'];
                    $TIE+=$row[$x]['TIE'];
                    $TG+=$row[$x]['TG'];
                }
                $NDR=$DR;
                $NTIE=$TIE;
                $NTG=$TG;
                echo "DR->".$NDR."--------------------";
                echo "Tie->".$NTIE."--------------------";
                echo "TG->".$NTG."--------------------";
                $DR=2*$DR;
                $TIE=8*$TIE;
                $TG=2*$TG;
                    echo "DR->".$DR."--------------------";
                echo "Tie->".$TIE."--------------------";
                echo "TG->".$TG."--------------------";
                $cards=array(1,2,3,4,5,6,7,8,9,10,11,12,13);
                $Type=array(0,1,2,3);
                
                
                
            
                    $k = array_rand($cards);
                    $vk = $cards[$k];
                    unset($cards[$k]);
                    
                    $t=array_rand($Type);
                    $vt=$Type[$t];
                    unset($Type[$t]);
                    
                    $nt=array_rand($Type);
                    $vnt=$Type[$nt];
                    unset($Type[$nt]);
                    
                    $mv1=13*$vt;
                    $mv2=13*$vnt;
                    
                    $v1=$vk+$mv1;
                    $v2=$vk+$mv2;
                    
                    
                    array_push($nrow,"TIE",$v1,$v2);
                
                
                
                $yourdate=date("Y-m-d H:i:30",time());
                $newquery="INSERT INTO Bets(DR,TIE,TG,DRCard,TGCard,Winner,Time) VALUES ('$DR','$TIE','$TG','$nrow[1]','$nrow[2]','$nrow[0]','$yourdate')";
            	if($resultnew = mysqli_query($dblink, $newquery)){
            	    
            	    $queryyy = "UPDATE users SET DR=0,TIE=0,TG=0";
                    $resulty = mysqli_query($dblink, $queryyy);
            	}
            	else{
            			
            		}
                
                
                
                
                
            	$dataArray = array('success' => $nrow, 'Message' => 'Cards Set ');
            } else{
            	
                $dataArray = array('success' => false, 'Message' => 'Could not Set Cards, try again later.');
            
            }
            
            echo json_encode($dataArray);
        }
        else
        {
                        
            $query = "SELECT DR,TIE,TG from users";
            $result = mysqli_query($dblink, $query);
            
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($row);
            if($row){
                $DR=0;$TIE=0;$TG=0;
                $nrow=array();
                for ($x = 0; $x < count($row); $x++) {
                    $DR+=$row[$x]['DR'];
                    $TIE+=$row[$x]['TIE'];
                    $TG+=$row[$x]['TG'];
                }
                $NDR=$DR;
                $NTIE=$TIE;
                $NTG=$TG;
                echo "DR->".$NDR."--------------------";
                echo "Tie->".$NTIE."--------------------";
                echo "TG->".$NTG."--------------------";
                $DR=2*$DR;
                $TIE=8*$TIE;
                $TG=2*$TG;
                    echo "DR->".$DR."--------------------";
                echo "Tie->".$TIE."--------------------";
                echo "TG->".$TG."--------------------";
                $cards=array(1,2,3,4,5,6,7,8,9,10,11,12,13);
                $Type=array(0,1,2,3);
                
                
                
                // if($TIE < $DR && $TIE < $TG)
                // {
                //     $k = array_rand($cards);
                //     $vk = $cards[$k];
                //     unset($cards[$k]);
                    
                //     $t=array_rand($Type);
                //     $vt=$Type[$t];
                //     unset($Type[$t]);
                    
                //     $nt=array_rand($Type);
                //     $vnt=$Type[$nt];
                //     unset($Type[$nt]);
                    
                //     $mv1=13*$vt;
                //     $mv2=13*$vnt;
                    
                //     $v1=$vk+$mv1;
                //     $v2=$vk+$mv2;
                    
                    
                //     array_push($nrow,"TIE",$v1,$v2);
                // }
                 if($DR == $TG)
            {
                $Uj=rand(1,50);
                if($Uj%2==0)
                {
                    $k1 = rand(1,12);
                    $vk1 = $cards[$k1];
                    
                    $vk=$vk1-1;
                    if($vk <= 1)
                    {
                        $k2=0;
                    }
                    else
                    {
                        if($k1 == $vk)
                        {
                            $k2=rand(0,$vk-1);
                        }
                        else
                        {
                            $k2=rand(0,$vk);
                        }
                        
                    }
                    
                    
                    //$k2 = array_rand($cards);
                    $vk2 = $cards[$k2];
                    unset($cards[$k2]);
                    
                    
                    $t=array_rand($Type);
                    $vt=$Type[$t];
                    
                    $nt=array_rand($Type);
                    $vnt=$Type[$nt];
                    
                    $mv1=13*$vt;
                    $mv2=13*$vnt;
                    
                    $v1=$vk1+$mv1;
                    $v2=$vk2+$mv2;
                    
                     array_push($nrow,"DRAGON",$v1,$v2);
                }
                else
                {
                    $k1 = rand(1,12);
                    $vk1 = $cards[$k1];
                    
                    
                    $vk=$vk1-1;
                    if($vk <= 1)
                    {
                        $k2=0;
                    }
                    else
                    {
                        if($k1 == $vk)
                        {
                            $k2=rand(0,$vk-1);
                        }
                        else
                        {
                            $k2=rand(0,$vk);
                        }
                        
                    }
                    
                    
                    //$k2 = array_rand($cards);
                    $vk2 = $cards[$k2];
                    unset($cards[$k2]);
                    
                    
                    $t=array_rand($Type);
                    $vt=$Type[$t];
                    
                    $nt=array_rand($Type);
                    $vnt=$Type[$nt];
                    
                    $mv1=13*$vt;
                    $mv2=13*$vnt;
                    
                    $v1=$vk2+$mv1;
                    $v2=$vk1+$mv2;
                    
                    
                     array_push($nrow,"TIGER",$v1,$v2);
                }
            }
            elseif($DR < $TG)
            {
                $k1 = rand(1,12);
                $vk1 = $cards[$k1];
                
                $vk=$vk1-1;
                if($vk <= 1)
                {
                    $k2=0;
                }
                else
                {
                    if($k1 == $vk)
                    {
                        $k2=rand(0,$vk-1);
                    }
                    else
                    {
                        $k2=rand(0,$vk);
                    }
                    
                }
                
                
                //$k2 = array_rand($cards);
                $vk2 = $cards[$k2];
                unset($cards[$k2]);
                
                
                $t=array_rand($Type);
                $vt=$Type[$t];
                
                $nt=array_rand($Type);
                $vnt=$Type[$nt];
                
                $mv1=13*$vt;
                $mv2=13*$vnt;
                
                $v1=$vk1+$mv1;
                $v2=$vk2+$mv2;
                
                 array_push($nrow,"DRAGON",$v1,$v2);
            }
            elseif($TG < $DR)
            {
                
                $k1 = rand(1,12);
                $vk1 = $cards[$k1];
                
                
                $vk=$vk1-1;
                if($vk <= 1)
                {
                    $k2=0;
                }
                else
                {
                    if($k1 == $vk)
                    {
                        $k2=rand(0,$vk-1);
                    }
                    else
                    {
                        $k2=rand(0,$vk);
                    }
                    
                }
                
                
                //$k2 = array_rand($cards);
                $vk2 = $cards[$k2];
                unset($cards[$k2]);
                
                
                $t=array_rand($Type);
                $vt=$Type[$t];
                
                $nt=array_rand($Type);
                $vnt=$Type[$nt];
                
                $mv1=13*$vt;
                $mv2=13*$vnt;
                
                $v1=$vk2+$mv1;
                $v2=$vk1+$mv2;
                
                
                 array_push($nrow,"TIGER",$v1,$v2);
            }
            
                
                $yourdate=date("Y-m-d H:i:30",time());
                $newquery="INSERT INTO Bets(DR,TIE,TG,DRCard,TGCard,Winner,Time) VALUES ('$DR','$TIE','$TG','$nrow[1]','$nrow[2]','$nrow[0]','$yourdate')";
            	if($resultnew = mysqli_query($dblink, $newquery)){
            	    
            	    $queryyy = "UPDATE users SET DR=0,TIE=0,TG=0";
                    $resulty = mysqli_query($dblink, $queryyy);
            	}
            	else{
            			
            		}
                
                
                
                
                
            	$dataArray = array('success' => $nrow, 'Message' => 'Cards Set ');
            } else{
            	
                $dataArray = array('success' => false, 'Message' => 'Could not Set Cardssssssss, try again later.');
            
            }
            
            
            
            echo json_encode($dataArray);
            
        }
        
        
    }


?>