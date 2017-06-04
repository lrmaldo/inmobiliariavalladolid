<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required','message'=>'No se puede enviar campos vacíos',],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha','message'=>'El código de verificacion es incorrecto'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'=>'Nombre',
            'email'=>'Email',
            'subject'=>'Telefono',
            'body'=>'Su mensaje',
            'verifyCode' => 'Verifica el código',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        $content = "<p>Email: ". $this->email . "</p>";
        $content .= "<p>Nombre: ". $this->name . "</p>";
        $content .= "<p>Telefono: ". $this->subject . "</p>";
        $content .= "<p>Su mensaje: ".$this->body ."</p>";
        return Yii::$app->mailer->compose('layouts/html.php', ['content' => $content])
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
