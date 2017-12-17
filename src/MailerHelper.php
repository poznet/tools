<?php
/**
 * Created by PhpStorm.
 * User: pozyc
 * Date: 17.12.2017
 * Time: 11:57
 */

namespace Poznet\Tools;


class MailerHelper
{

    private $transport;

    /**
     * MailerHelper constructor.
     * @param $transport
     */
    public function __construct($data)
    {
        $this->transport = (new \Swift_SmtpTransport($data['smtp'],$data['port']))
            ->setUsername($data['username'])
            ->setPassword($data['password']);
    }

    public function sendEmail($subject,$from,$to,$body){
        $mailer=new \Swift_Mailer($this->transport);
        $message=(new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to)
            ->setBody($body, 'text/html') ;

        return $mailer->send($message);
    }


}