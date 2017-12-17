<?php
/**
 * Created by PhpStorm.
 * User: pozyc
 * Date: 17.12.2017
 * Time: 11:32
 */

namespace Poznet\Tools;


use Psr\Http\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Request;

class CaptchaHelper
{
    private $secret;


    public function __construct($secret)
    {
        $this->secret = $secret;
    }

    public function validate(Request $request)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $fields_string = '';
        $fields = array(
            'secret' => urlencode($this->secret),
            'response' => urlencode($request->get('g-recaptcha-response')));

        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        $fields_string = rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $result2=json_decode($result,true);
        return $result2['success'];
    }
}