<?php

?>

    <form method="post" action="/register/">
        <p><input type="text" name="login" value="" placeholder="Логин"></p>
        <p><input type="password" name="password1" value="" placeholder="Пароль"></p>
        <p><input type="password" name="password2" value="" placeholder="Повторите пароль"></p>
        <p><input type="text" name="mail" value="" placeholder="Электронная почта"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Запомнить меня
          </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Зарегистрироваться"></p>
      </form>