<?php

class ContactForm 
{
    public $username;
    public $email;
    public $message;
    
    public function __construct($username,$email,$message)
    {
        $this->username=$username;
        $this->email=$email;
        $this->message=$message;
    }
    public function isValid()
    {
        return trim($this->username) != '' && trim($this->email) != '' && trim($this->message) != '';
    }
}
