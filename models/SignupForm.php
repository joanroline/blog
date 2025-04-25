<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $firstname;
    public $lastname;
    public $password;
    public $confirm_password;
    public $email;
    public $gender;

    public function rules()
    {
        return [
            [['firstname',],'required'],
            [['lastname',],'required'],
            [['username', 'password', 'confirm_password', 'email', 'gender'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'min' => 6],
            [['confirm_password'], 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute'=> 'password', 'message' => 'Passwords must match'],
            [['username'], 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['email', 'email', 'message' => 'Please enter a valid email address'],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->gender = $this->gender;
        $user->setPassword($this->password);


        return $user->save() ? $user : null;
    }
}
