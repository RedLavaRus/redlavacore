<?php

$var = \Core\Show\View::$var;
?>
        
<div class="user_auth_form_box">
<form  action="/system/auth/?go=auth" autocomplete="on" method="post">
    <h1>Авторизация</h1>
            <p><?php

if (isset($var["res"]["all"])){
    foreach($var["res"]["all"] as $e){
        echo '<label for="username" class="uname" data-icon="u" >'.$e.'</label><br>';
    }
}
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
            <p class="keeplogin">
                <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                <label for="loginkeeping">Запомнить меня</label>
            </p>
            <p class="login button">
                <input type="submit" value="Войти" />
            </p>
        </form>
</div>

