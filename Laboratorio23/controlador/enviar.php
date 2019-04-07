<?php
# Include the Autoloader (see "Libraries" for install instructions)
    require '../../vendor/autoload.php';
    use Mailgun\Mailgun;
# Instantiate the client.
$mgClient = new Mailgun('5b1cc26980fcd0dcb43be1fcae491a95-2416cf28-9aa6d2f6');
$domain = "sandbox63aea96ca64e4113a0af73b4542546b3.mailgun.org";


$subject=$_POST['subject'];
$text=$_POST['text'];

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
          array('from'    => 'Mailgun Sandbox <postmaster@sandbox63aea96ca64e4113a0af73b4542546b3.mailgun.org>',
                'to'      => 'Ricardo Antonio Vázquez Rodríguez <a01209245@itesm.mx>',
                'subject' => $subject,
                'text'    => $text));
header('Location: '.$_SERVER['HTTP_REFERER']); //Regresar a donde fue la petición

# You can see a record of this email in your logs: https://app.mailgun.com/app/logs

# You can send up to 300 emails/day from this sandbox server.
# Next, you should add your own domain so you can send 10,000 emails/month for free.

?>