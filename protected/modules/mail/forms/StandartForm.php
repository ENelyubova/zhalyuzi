<?php

/**
 * StandertForm
 */
class StandartForm extends CFormModel
{
    public $name;
    public $email;
    public $phone;
    public $body;
    public $json;
    public $key;
    public $verify;
    public $check;

    public function rules()
    {
        return [
            ['name, phone', 'required'],
            ['email', 'email'],
            // ['check', 'compare', 'compareValue' => 1, 'message' => 'Для продолжения вы должны согласиться c пользовательским соглашением'],
            ['name, key, verify, body, json, check', 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'  => 'Представьтесь, пожалуйста',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'body'  => 'Сообщение',
            'json'  => '',
        ];
    }

    public function beforeValidate()
    {
        if (isset($_POST['g-recaptcha-response'])){
            if($_POST['g-recaptcha-response']=='') {
                $this->addError('verify', 'Пройдите проверку reCAPTCHA.');
            } else {
                $post = [
                    'secret' => Yii::app()->params['secretkey'],
                    'response' => $_POST['g-recaptcha-response'],
                ];

                $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                $response = curl_exec($ch);
                curl_close($ch);

                $response = CJSON::decode($response);
                if (isset($response['success']) and isset($response['error-codes']) and $response['success']===false) {
                    $this->addError('verify', implode(', ', $response['error-codes']));
                }
            }
        }
        return parent::beforeValidate();
    }
}
