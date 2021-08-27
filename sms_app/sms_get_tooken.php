<?php

/**
 * GetToken File Restful API PHP Sample Codes
 *
 * PHP version 5.6.23 | 7.2.12
 *
 * @category  PHPSampleCodes
 * @package   SampleCodes
 * @copyright 2018 The Ide Pardazan (ipe.ir) PHP Group. All rights reserved.
 * @license   https://sms.ir/ ipe license
 * @version   IPE: 2.0
 * @link      https://sms.ir/ Documentation of sms.ir Restful API PHP Sample Codes.
 */

/**
 * GetToken Class Restful API PHP Sample Codes
 *
 * @category  PHPSampleCodesClass
 * @package   SampleCodesClass
 * @copyright 2018 The Ide Pardazan (ipe.ir) PHP Group. All rights reserved.
 * @license   https://sms.ir/ ipe license
 * @link      https://sms.ir/ Documentation of sms.ir
 */
class SmsIR_GetToken
{
    protected function getApiTokenUrl()
    {
        return "api/Token";
    }

    public function __construct($APIKey, $SecretKey, $APIURL)
    {
        $this->APIKey = $APIKey;
        $this->SecretKey = $SecretKey;
        $this->APIURL = $APIURL;
    }

    public function getToken()
    {
        $postData = array(
            'UserApiKey' => $this->APIKey,
            'SecretKey' => $this->SecretKey,
            'System' => 'php_rest_v_2_0'
        );
        $postString = json_encode($postData);

        $ch = curl_init($this->APIURL . $this->getApiTokenUrl());
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);

        $resp = false;
        $IsSuccessful = '';
        $TokenKey = '';
        if (is_object($response)) {
            $IsSuccessful = $response->IsSuccessful;
            if ($IsSuccessful == true) {
                $TokenKey = $response->TokenKey;
                $resp = $TokenKey;
            } else {
                $resp = false;
            }
        }
        return $resp;
    }
}

try {
    date_default_timezone_set("Asia/Tehran");

    // your sms.ir panel configuration
    $APIKey = "f@rh@dF72sms";
    $SecretKey = "84d0a494f26bb2c195c4b051";
    $APIURL = "https://ws.sms.ir/";

    $SmsIR_GetToken = new SmsIR_GetToken($APIKey, $SecretKey, $APIURL);
    $GetToken = $SmsIR_GetToken->getToken();
    var_dump($GetToken);

} catch (Exeption $e) {
    echo 'Error GetToken : ' . $e->getMessage();
}

?> 