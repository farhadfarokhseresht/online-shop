<?php

class SmsIR_SendMessage
{

    /**
     * Gets API Message Send Url.
     *
     * @return string Indicates the Url
     */
    protected function getAPIMessageSendUrl()
    {
        return "api/MessageSend";
    }

    /**
     * Gets Api Token Url.
     *
     * @return string Indicates the Url
     */
    protected function getApiTokenUrl()
    {
        return "api/Token";
    }

    /**
     * Gets config parameters for sending request.
     *
     * @param string $APIKey API Key
     * @param string $SecretKey Secret Key
     * @param string $LineNumber Line Number
     * @param string $APIURL API URL
     *
     * @return void
     */
    public function __construct($APIKey, $SecretKey, $LineNumber, $APIURL)
    {
        $this->APIKey = $APIKey;
        $this->SecretKey = $SecretKey;
        $this->LineNumber = $LineNumber;
        $this->APIURL = $APIURL;
    }

    /**
     * Send sms.
     *
     * @param MobileNumbers[] $MobileNumbers array structure of mobile numbers
     * @param Messages[] $Messages array structure of messages
     * @param string $SendDateTime Send Date Time
     *
     * @return string Indicates the sent sms result
     */

    public function sendMessage($MobileNumbers, $Messages, $SendDateTime = '')
    {
        $token = $this->_getToken($this->APIKey, $this->SecretKey);

        if ($token != false) {
            $postData = array(
                'Messages' => $Messages,
                'MobileNumbers' => $MobileNumbers,
                'LineNumber' => $this->LineNumber,
                'SendDateTime' => $SendDateTime,
                'CanContinueInCaseOfError' => 'false'
            );

            $url = $this->APIURL . $this->getAPIMessageSendUrl();
            $SendMessage = $this->_execute($postData, $url, $token);
            $object = json_decode($SendMessage);

            $result = false;
            if (is_object($object)) {
                $result = $object->Message;
            } else {
                $result = false;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * Gets token key for all web service requests.
     *
     * @return string Indicates the token key
     */
    private function _getToken()
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


    /**
     * Executes the main method.
     *
     * @param postData[] $postData array of json data
     * @param string $url url
     * @param string $token token string
     *
     * @return string Indicates the curl execute result
     */
    private function _execute($postData, $url, $token)
    {

        $postString = json_encode($postData);

        $ch = curl_init($url);
        curl_setopt(
            $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'x-sms-ir-secure-token: ' . $token
            )
        );
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}

function sendsms($Ms,$Mo)
{
    try {
        date_default_timezone_set("Asia/Tehran");

        // your sms.ir panel configuration
        $APIKey = "395aa5fdb328e68e276eaac0";
        $SecretKey = "f@rh@dF72p@ss";
        $LineNumber = "30005680000565";
        $APIURL = "https://ws.sms.ir/";

        // your mobile numbers
        $MobileNumbers = array($Mo);

        // your text messages
        $Messages = array($Ms);

        // sending date
        @$SendDateTime = date("Y-m-d") . "T" . date("H:i:s");

        $SmsIR_SendMessage = new SmsIR_SendMessage($APIKey, $SecretKey, $LineNumber, $APIURL);
        $SendMessage = $SmsIR_SendMessage->sendMessage($MobileNumbers, $Messages, $SendDateTime);
        #var_dump($SendMessage);

    } catch (Exeption $e) {
        echo 'Error SendMessage : ' . $e->getMessage();
    }
    return($SendMessage);
}
?>