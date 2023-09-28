<?php 
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Google2FAHelper.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google2FA Example</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.result-message{
			box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
			display: block;
			margin: auto;
			  margin-top: auto;
			width: 300px;
			padding: 20px 10px;
			font-family: Tahoma;
			margin-top: 100px;
			text-decoration: none;
			color: gray;
			text-align: center;
		}
	
	</style>
</head>
<body>
<div class="result-message">


<?php
 $helper = new Google2FAHelper;   

if(isset($_GET['2fa_code'])){
    $secret_key = 'IT5DK5HYRD24G553';
    //load $secret_key from database    
    $valid = $helper->verify($secret_key,$_GET['2fa_code']);
    echo '<b>ReceiveCode:</b> ' . $_GET['2fa_code'];
    echo '<br />';    
    echo '<b>' . ($valid ? 'Valid!' : 'Not Valid!') . '</b>';
}else{
    //generate new secret key
    $secret_key = $helper->generateNewSecret();
    //save $secret_key to database
    echo '<b>Secret Key:</b> ' . $secret_key;
    $companyName = 'iranecomm';
    $companyEmail = 'info@iranecomm.ir';    
    $barcodeSVG = $helper->getQRCode($companyName, $companyEmail, $secret_key);
    echo $barcodeSVG;
    
}

?>
</div>
</body>
</html>


