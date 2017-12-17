# Simple tools/wrapers  for legacy code


### Google Captcha

Class : \Poznet\Tools\CaptchaHelper

requires HttpFundatiom\Request

example :

```
$validator = new CaptchaHelper('googlecaptchasecret');
$validator->validate(Request)
```

returns  true/false  based from google api  response



### SwiftMailer

Class : \Poznet\Tools\MailerHelper

requires Swiftmailer

example :

```
$mailer = new MailerHelper('arraywithsmtpaccessdata');
$mailer->send($subject,$from,$to,$body);
```

returns  true/false  
