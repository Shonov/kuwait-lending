<?php
header('Access-Control-Allow-Origin: *');
require 'class.phpmailer.php';
require 'class.smtp.php';
require 'amo_crm.php';

class Logger {

    protected $fh;

    public function __construct() {
        $this->fh = fopen('log.txt', 'a+');
    }

    public function log($msg) {
        if(!$this->fh) {
            throw new Exception('Unable to open log file for writing');
        }
        if(fwrite($this->fh, $msg . "\n") === false) {
            throw new Exception('Unable to write to log file.');
        }
    }

    public function __destruct() {
        fclose($this->fh);
    }
}

$logger = new Logger();
$logger->log(date('m-d-Y H:i:s') . ' ' . $_SERVER['REMOTE_ADDR']);
$logger->log('$_POST: ' . print_r($_POST, true));


if (!isset($_POST['Phone'])) {
    $logger->log('ERROR DATA, RETURNED');
    exit();
}

$bodyData = $_POST;

$mail = new PHPMailer;
$mail->SMTPDebug = 1;
$mail->SMTPSecure = false;

$mail->isSMTP();
$mail->Host = 'smtp.yandex.ru';
$mail->SMTPAuth = true;
$mail->Username = 'Info@nexfit.com'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'jKfH65%fS'; // Ваш пароль
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('Info@nexfit.com	', 'EMS Personal Fitness Training - Trial Session | Nexfit Kuwait'); // Ваш Email

$mail->addAddress('v-shonov@mail.ru');

$mail->isHTML();
$mail->Subject = 'Trial Session Inquiry';

foreach ($bodyData as $key => $value) {
    if ($key === 'Utm') continue;
    $body .= $key . ': ' . $value . '<br>';
}

$mail->Body = $body;

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'ok';
}


function AmoCrmSendHook($contactName, $phone, $email, $language = null, $utm = null)
{
    $config = include 'settings.php';
    $amo = new HamtimAmocrm($config['amo_login'], $config['amo_api'], $config['amo_subdomain']);

    $amo = new HamtimAmocrm(''/*логин*/, ''/*api ключ*/, ''/*субдомен*/);

    if (!$amo->auth) {
        echo 'amo not auth';

        return;
    }

    $formType = [
        'lead_name' => 'Trial Session',
        'status_id' => '28009120',
    ];

    $path = '/private/api/v2/json/leads/set';
    $fields['request']['leads']['add'] = [[
        'name' => $formType['lead_name'],
        'status_id' => $formType['status_id'],
    ]];


    if (isset($language) && in_array($language, ['Arabic', 'English'], true)) {
        $languages = [
            'Arabic' => 198261,
            'English' => 198259
        ];

        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #Emails
            'id' => 149153, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $languages[$language],
            ]]
        ];
    }

    if (isset($utm['utm_source'])) {
        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #utm_source
            'id' => 133849, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $utm['utm_source'],
            ]]
        ];
    }

    if (isset($utm['utm_medium'])){
        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #utm_medium
            'id' => 133853, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $utm['utm_medium'],
            ]]
        ];
    }

    if (isset($utm['utm_channel'])) {
        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #utm_channel
            'id' => 133859, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $utm['utm_channel'],
            ]]
        ];
    }

    if (isset($utm['utm_keyword'])) {
        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #utm_keyword
            'id' => 133861, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $utm['utm_keyword'],
            ]]
        ];
    }

    if (isset($utm['utm_content'])) {
        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #utm_keyword
            'id' => 133863, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $utm['utm_content'],
            ]]
        ];
    }

    if (isset($utm['utm_campaign'])) {
        $fields['request']['leads']['add'][0]['custom_fields'][] = [
            #utm_channel
            'id' => 133865, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $utm['utm_campaign'],
            ]]
        ];
    }


    $leadAnswer = $amo->q($path, $fields);

    $leadId = $leadAnswer->response->leads->add[0]->id;

    $customFields = [];

    $customFields[] = [
        #Телефоны
        'id' => 95927, #Уникальный индентификатор заполняемого дополнительного поля
        'values' => [[
            'value' => $phone,
            'enum' => 'MOB' #Мобильный
        ]]
    ];

    $customFields[] = [
        #Emails
        'id' => 95929, #Уникальный индентификатор заполняемого дополнительного поля
        'values' => [[
            'value' => $email,
            'enum' => 'WORK' #Мобильный
        ]]
    ];

    if ($language !== null && in_array($language, ['Arabic', 'English'])) {
        $languages = [
            'Arabic' => 164837,
            'English' => 164835
        ];

        $customFields[] = [
            #Emails
            'id' => 123969, #Уникальный индентификатор заполняемого дополнительного поля
            'values' => [[
                'value' => $languages[$language],
            ]]
        ];
    }

    var_dump($customFields);
    $contacts['request']['contacts']['add'] = [[
        'name' => ucwords($contactName), #Имя контакта
        'linked_leads_id' => [ #Список с айдишниками сделок контакта
            $leadId
        ],
        'custom_fields' => $customFields
    ]];

    $path = '/private/api/v2/json/contacts/set';
    $contactAnswer = $amo->q($path, $contacts);
//    var_dump($leadAnswer, $contactAnswer);
}

//$language = null;

$language = 'English';

if ($_POST['Language']) {
    $language = $_POST['Language'];
}

AmoCrmSendHook($_POST['Name'], $_POST['Phone'], $_POST['Email'], $language, $_POST['Utm']);
