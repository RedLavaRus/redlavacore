<?php

$var = \Core\Show\View::$var;
?>
        
<div class="user_auth_form_box">
<form  action="/system/reg/?go=reg" autocomplete="on" method="post">
    <h1>Регистрация</h1>
            <p>
            <?php
                if (isset($var["res"]["login"])){
                    foreach($var["res"]["login"] as $e){
                        echo '<label for="username" class="uname" data-icon="u" >'.$e.'</label><br>';
                    }
                }
            ?>
                <label for="username" class="uname" data-icon="u" > Логин </label>
                <input id="username" name="username" required="required" type="text" placeholder="myusername "/>
            </p>
            <p>
            <?php
                if (isset($var["res"]["pass"])){
                    foreach($var["res"]["pass"] as $e){
                        echo '<label for="password" class="password" data-icon="u" >'.$e.'</label><br>';
                    }
                }
            ?>
                <label for="password" class="youpasswd" data-icon="p"> Пароль </label>
                <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
            </p>
            <p>
                <label for="password2" class="youpasswd" data-icon="p"> Повторите пароль </label>
                <input id="password2" name="password2" required="required" type="password" placeholder="eg. X8df!90EO" />
            </p>
            <p>
            <?php
                if (isset($var["res"]["mail"])){
                    foreach($var["res"]["mail"] as $e){
                        echo '<label for="email" class="email" data-icon="u" >'.$e.'</label><br>';
                    }
                }
            ?>
                <label for="email" class="uname" data-icon="u" > Почта </label>
                <input id="email" name="email" required="required" type="text" placeholder="myusername@fds/ru"/>
            </p>
            <p class="login button">
                <input type="submit" value="Войти" />
            </p>
        </form>
</div>

