<h1>Контакты</h1>
<?php foreach ($data as $user): ?>
<p>

    Email: <a href="mailto:<?php echo($user->email); ?>"><?php echo($user->email); ?></a><br/>
    Password: <?php echo($user->password); ?>
</p>
<?php endforeach; ?>
