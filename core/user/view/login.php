
        
<div class="user_auth_form_box">
<form  action="/system/auth/?go=auth" autocomplete="on" method="post">
    <h1>Авторизация</h1>
            <p>
                <label for="username" class="uname" data-icon="u" > Логин </label>
                <input id="username" name="username" required="required" type="text" placeholder="myusername "/>
            </p>
            <p>
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

