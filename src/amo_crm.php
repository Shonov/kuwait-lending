<?php


class HamtimAmocrm
{
    public $settings;
    public $subdomain;
    public $auth;
    public $LEAD_LANG_AR = 'Arabic';
    public $LEAD_LANG_EN = 'English';

    public $CUSTOM_FIELD_LANGUAGE = 123969;

//    public $END_SUBSCRIPTIONS_DAY = 635095;

//    public $LEAD_LANGUAGE = 472259;
//    public $CONTACT_LANGUAGE = 636485;

//    public $CONTACT_LANG_EN = 1080121;
//    public $CONTACT_LANG_AR = 1080119;

    function HamtimAmocrm($login, $api, $subdomain)
    {
        $this->settings = new stdClass();
        $this->settings->amocrm = new stdClass();
        $this->settings->amocrm->api = $api;
        $this->settings->amocrm->login = $login;
        $this->settings->amocrm->subdomain = $subdomain;
        $this->amocrm_auth();
    }

    public function amocrm_auth()
    {
        if (isset($this->settings->amocrm)) {
            if ($this->settings->amocrm->api && $this->settings->amocrm->login && $this->settings->amocrm->subdomain) {
                $subdomain = $this->settings->amocrm->subdomain;
                $this->subdomain = $subdomain;
                $user = array(
                    'USER_LOGIN' => $this->settings->amocrm->login,
                    'USER_HASH' => $this->settings->amocrm->api
                );
            } else {
                return 'Нет данных для авторизации';
            }
        } else {
            return 'Нет данных для авторизации';
        }

        $link = 'https://' . $subdomain . '.amocrm.ru/private/api/auth.php?type=json';
        $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
        #Устанавливаем необходимые опции для сеанса cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($user, null, '&', PHP_QUERY_RFC1738));
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE); #Получим HTTP-код ответа сервера
        curl_close($curl); #Заверашем сеанс cURL

        $auth = json_decode($out);
        if ($out) $this->auth = $auth->response->auth;

        return $out;
    }

    function l($l)
    {
        echo '<pre>';
        var_dump($l);
        echo '</pre>';
    }

    public function findLeadBy($query)
    {
        $path = '/private/api/v2/json/leads?' . http_build_query(['query' => $query]);

        return $this->q($path, [], false, 'GET');
    }

    public function q($path, $fields = array(), $ifModifiedSince = false)
    {
        return $this->amocrm_query($path, $fields, $ifModifiedSince);
    }

    public function amocrm_query($path, $fields = array(), $ifModifiedSince = false)
    {
        $link = 'https://' . $this->subdomain . '.amocrm.ru' . $path;
        $curl = curl_init(); #Сохраняем дескриптор сеанса cURL
        #Устанавливаем необходимые опции для сеанса cURL
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
        curl_setopt($curl, CURLOPT_URL, $link);
        if ($ifModifiedSince) {
            $httpHeader = array('IF-MODIFIED-SINCE: ' . $ifModifiedSince);
        } else {
            $httpHeader = array();
        }
        if (count($fields)) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($fields));
            $httpHeader[] = 'Content-Type: application/json';
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpHeader);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt'); #PHP>5.3.6 dirname(__FILE__) -> __DIR__
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);

        $out = curl_exec($curl); #Инициируем запрос к API и сохраняем ответ в переменную
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //$this->l(curl_getinfo($curl));
        return json_decode($out);
    }

    public function moveLeadToStatus($userId, $statusId)
    {
        $path = '/api/v2/leads';
        $fields['update'] = [[
            'id' => $userId,
            'updated_at' => time(),
            'status_id' => $statusId,
        ]];

        return $this->q($path, $fields);
    }

    public function createLead($leadName, $statusId, $contactName, $phone, $email, $language = null)
    {
        $formType = [
            'lead_name' => $leadName,
            'status_id' => $statusId,
        ];

        $path = '/private/api/v2/json/leads/set';
        $fields['request']['leads']['add'] = [[
            'name' => $formType['lead_name'],
            'status_id' => $formType['status_id'],
        ]];

        if ($language !== null && in_array($language, ['Arabic', 'English'])) {
            $languages = [
                'Arabic' => 836209,
                'English' => 836211
            ];

            $fields['request']['leads']['add'][0]['custom_fields'][] = [
                #Emails
                'id' => 472259, #Уникальный индентификатор заполняемого дополнительного поля
                'values' => [[
                    'value' => $languages[$language],
                ]]
            ];
        }

        $leadAnswer = $this->q($path, $fields);

        $leadId = $leadAnswer->response->leads->add[0]->id;

        $customFields = [];


        if ($phone !== '' && $phone !== null) {
            $customFields[] = [
                #Телефоны
                'id' => 372437, #Уникальный индентификатор заполняемого дополнительного поля
                'values' => [[
                    'value' => $phone,
                    'enum' => 'MOB' #Мобильный
                ]]
            ];
        }

        if ($email !== '' && $email !== null) {
            $customFields[] = [
                #Emails
                'id' => 372439, #Уникальный индентификатор заполняемого дополнительного поля
                'values' => [[
                    'value' => $email,
                    'enum' => 'WORK' #Мобильный
                ]]
            ];
        }

        $contacts['request']['contacts']['add'] = [[
            'name' => $contactName, #Имя контакта
            'linked_leads_id' => [ #Список с айдишниками сделок контакта
                $leadId
            ],
            'custom_fields' => $customFields
        ]];

        $path = '/private/api/v2/json/contacts/set';
        $contactAnswer = $this->q($path, $contacts);
    }

    public function getLeadLang($lead)
    {
        foreach ($lead->custom_fields as $customField) {
            if (+$customField->id === $this->CUSTOM_FIELD_LANGUAGE) {
                if ($customField->values[0]->value === $this->LEAD_LANG_AR) {
                    return $this->LEAD_LANG_AR;
                }
            }
        }

        return $this->LEAD_LANG_EN;
    }

    public function getLeadById($id)
    {
        $path = '/private/api/v2/json/leads?' . http_build_query(['id' => $id]);

        return $this->q($path, [], false, 'GET')->response->leads[0];;
    }

    public function getContactById($id)
    {
        $path = '/private/api/v2/json/contacts?' . http_build_query(['id' => $id]);

        return $this->q($path, [], false, 'GET')->response->contacts[0];
    }

    public function getCustomFieldValue($id, $customFields)
    {
        foreach ($customFields as $field) {
            if (+$id === +$field->id) {
                return $field->values[0]->value;
            }
        }

        return null;
    }

    public function getCustomers($query)
    {
        $path = '/api/v2/customers?' . http_build_query($query);

        return $this->q($path, [], false, 'GET')->_embedded->items;
    }

    public function getLeads($query)
    {
        $path = '/api/v2/leads?' . http_build_query($query);

        return $this->q($path, [], false, 'GET')->_embedded->items;
    }

    public function updateCustomers($customers)
    {
        $path = '/private/api/v2/json/customers/set';
        $fields['request']['customers']['update'] = $customers;

        return $this->q($path, $fields);
    }

    public function updateContacts($contacts)
    {
        $path = '/api/v2/contacts';
        $fields['update'] = $contacts;

        return $this->q($path, $fields);
    }

    public function updateLeads($leads)
    {
        $path = '/api/v2/leads';
        $fields['update'] = $leads;

        return $this->q($path, $fields);
    }

    public function getContactEmail($contact)
    {
        foreach ($contact->custom_fields as $customField) {
            if ($customField->code === 'EMAIL') {
                return $customField->values[0]->value;
            }
        }

        return null;
    }
}
