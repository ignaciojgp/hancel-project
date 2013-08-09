<?php
    function buildBaseString($baseURI, $method, $params)

    {

        $r = array();

        ksort($params);

        foreach($params as $key=>$value){

            $r[] = "$key=" . rawurlencode($value);

        }

        return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));

    }

     

    function buildAuthorizationHeader($oauth)

    {

        $r = 'Authorization: OAuth ';

        $values = array();

        foreach($oauth as $key=>$value)

            $values[] = "$key=\"" . rawurlencode($value) . "\"";

        $r .= implode(', ', $values);

        return $r;

    }

     

    $url = "https://api.twitter.com/1.1/search/tweets.json?q=%40twitterapi%20-via";

     

    //OAuth Settings

    $oauth_access_token = "633400078-Q20tTG3gvWkKE4HnF49cEIzwcFE7fuSLvUwiet2R";

    $oauth_access_token_secret = "fyp1BcOs3M0xmtuHSwcusFHSMUDLUvnC1esaRb8iic";

    $consumer_key = "G3ZNI2opSZD1ru9GzfisA";

    $consumer_secret = "WALEc7cXO0rH1gqKrzZgw9V8LP6Je7vCxSdRotXsXf4";

    $oauth = array( 'oauth_consumer_key' => $consumer_key, 

                    'oauth_nonce' => time(),

                    'oauth_signature_method' => 'HMAC-SHA1',

                    'oauth_token' => $oauth_access_token,

                    'oauth_timestamp' => time(),

                    'oauth_version' => '1.0');

     

    //Generate OAuth Signature

    $base_info = buildBaseString($url, 'GET', $oauth);

    $composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);

    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));

    $oauth['oauth_signature'] = $oauth_signature;

     

    //Generate Pre-CURL settings

	//$header='Authorization: OAuth oauth_consumer_key="G3ZNI2opSZD1ru9GzfisA", oauth_nonce="567092001c3b301eda93fd356a29b43b", oauth_signature="h1VSj8YoUgfcqaMRkQLCcVIIAwY%3D", oauth_signature_method="HMAC-SHA1", oauth_timestamp="1372629506", oauth_token="633400078-Q20tTG3gvWkKE4HnF49cEIzwcFE7fuSLvUwiet2R", oauth_version="1.0"' ;

    $header = array(buildAuthorizationHeader($oauth), 'Expect:');

    $options = array( CURLOPT_HTTPHEADER => $header,

                      CURLOPT_HEADER => false,

                      CURLOPT_URL => $url,

                      CURLOPT_RETURNTRANSFER => true,

                      CURLOPT_SSL_VERIFYPEER => false);

     

    $ch = curl_init();    // Initialize the curl library

    curl_setopt_array($ch, $options);  // CURL settings

    $result = curl_exec($ch);   // Open the URL and collect the output in $result (this will containt the JSON data)

    $resultArray = curl_getinfo($ch); // Look at the returned header

    curl_close($ch); // Close the curl library
	
	print_r($result);
	

?>