<h1>Form</h1>
    <b><?=getFlash() ?></b>
    
    <form method="post">
        <input type="name" name="username" value="<?=requestPost('username') ?>"><br>
        <input type="email" name="email" value="<?=requestPost('email') ?>"><br>
        <textarea name="message"><?=requestPost('message') ?></textarea><br>
        <img src="/captcha.php"> <br>
        <input type="text" name="security_number"/><br>
        <button>GO</button>
    </form>
    
    <hr>
    
    <?php foreach ($messages as $key => $message) : ?>
        
        <i><?=$message['username']?></i><br>
        <?=$message['message']?>
        
        <a href="#">Delete</a>
    <hr>
    <?php endforeach ?>