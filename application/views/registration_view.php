<h1>Страница регистрации</h1>
<p>
<form action="/registration/adduser" method="post">
    <table class="reg">
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" name="password"></td>
        </tr>
        <th colspan="2" style="text-align: right">
            <input type="submit" value="Зарегистрироватся" name="btn"
                   style="width: 150px; height: 30px;"></th>
    </table>
</form>

<?php if($data['email']=="access_denied") { ?>
    <p style="color:red">Email введены неверно.</p>
<?php } ?>
<?php if($data['pass']=="access_denied") { ?>
    <p style="color:red">Пароль слишком короткий, минимум 4 символа.</p>
<?php } ?>
