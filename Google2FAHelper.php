<?php 
class Google2FAHelper{

    public function __construct() {
        $this->google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
    }

    public function generateNewSecret(){
        
        $secretKey = $this->google2fa->generateSecretKey();
        return $secretKey;
    }    

    public function getQRCode($companyName, $companyEmail, $secretKey){
        $this->companyName = $companyName;
        $this->companyEmail = $companyEmail;

        $inlineUrl = $this->google2fa->getQRCodeInline(
            $this->companyName,
            $this->companyEmail,
            $secretKey
        );
        return $inlineUrl;        
    }    

    public function verify($secretKey,$code_2fa){
        $valid = $this->google2fa->verifyKey($secretKey, $code_2fa);
        return $valid;
    }
}