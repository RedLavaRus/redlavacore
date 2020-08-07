<?php


namespace Core\Mail;
 
use \CFG as CFG;
use \Core\Mail\SendSmtp as SendSMTP;

class Send
{
    public $config;
    public function __construct()
    {
        $this->config = [
            'defaultFrom'  => 'mymail@example.org',
            //'onError'     => function($error, $message, $transport) { myErrorLog($error); },
            //'afterSend'   => function($text, $message, $layer) { myMailLog($text); },
            'transports'  => [
            //     ['file', 'dir'  => __DIR__ .'/mails'],
              ['smtp', 'host' => CFG::$mail_host, 'ssl' => true, 'port' => CFG::$mail_port, 'login' => CFG::$mail_login, 'password' => CFG::$mail_password],
             ],
         ];

    }

    public function send(
        $thems =  "default thems",
        $SenderEmail = "gakman@yandex.ru",
        $Recipient = "gakman@ya.ru",
        $content = "test"
        )
    {
        $mailSMTP = new \Core\Mail\SendSmtp();
        $mailSMTP->init($this->config);
        $message =  $mailSMTP->newHtmlMessage();
        $message->setSubject($thems);
        $message->setSenderEmail($SenderEmail);
        $message->addRecipient($Recipient);
        //$message->addContent(file_get_contents('mail-header.html'));
        $message->addContent($content);
        //$message->addContent(file_get_contents('mail-footer.html'));
        //$message->addRelatedFile('signature.png');
        $mailSMTP->sendMessage($message);
    }
}