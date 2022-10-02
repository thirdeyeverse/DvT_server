 <?php 
    $Key="gtKFFx";
    $txnid="fdfgdhgdtr";
    $productinfo="iPhone";
    $amount="10";
    $email="test@gmail.com";
    $firstname="Ashish";
    $lastname="Kumar";
    $surl="https://apiplayground-response.herokuapp.com/";
    $furl="https://apiplayground-response.herokuapp.com/";
    $phone="9988776655";
    $SALT="wia56q6O";
    $hashString=$Key."|".$txnid."|".$amount."|".$productinfo."|".$firstname."|".$email."|||||||||||".$SALT;
    $hash = strtolower(hash('sha512', $hashString));
    
    
    $url = "https://test.payu.in/_payment";
    $req = req_init();
    req_setopt($req, CURLOPT_URL, $url);
    req_setopt($req, CURLOPT_POST, true); 
    req_setopt($req, CURLOPT_RETURNTRANSFER, true);
    $headers = array( "Content-Type: application/x-www-form-urlencoded", ); 
    req_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $data = "key=".$Key."&txnid=".$txnid."&amount=".$amount."&firstname=".$firstname."&email=".$email."&phone=".$phone."&productinfo=".$productinfo."&pg=&bankcode=&surl=".$surl."&furl=".$furl."&ccnum=&ccexpmon=&ccexpyr=&ccvv=&ccname=&txn_s2s_flow=&hash=".$hash;
    req_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $resp = req_exec($req);
    req_close($req);
    echo $resp;
    var_dump($resp);
    
    
    ?>
