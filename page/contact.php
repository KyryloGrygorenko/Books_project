<?php

require ROOT . 'models/contact.php';

if (isRequestPost()) {
    // todo: добавить проверку капчи, задавать соответствующее значение для сообщения + менять капчу если успех
    if (isFormValid()) {
        $_SESSION['captcha_number'] = rand(1000, 9999);
        $message = createMessage(requestPost('username'), requestPost('email'), requestPost('message'));
        saveMessage($message);
        
        setFlash('Your message was sent');
        redirect("/index.php?page=contact");
    } 
    
    // todo: убрать
    setFlash('Fill the fields');
}
$messages = findAllMessages();