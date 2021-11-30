<?php session_start();?>
<!doctype html>

<html lang="en">
<head>
    <link href="index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Сайт объявлений Данилы Киренского</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<script src="scripts.js">
    load_header();
</script>
<body onload="load_header();">
    <header id="header" >
    </header>

    <div id = "login-window">
        <div class = "registration-top">
            <a href="">
                <div class="cl-btn-2">
                    <div>
                        <div class="left-to-right"></div>
                        <div class="right-to-left"></div>
                        <span class="close-btn">закрыть</span>
                    </div>
                </div>
            </a>
            <div><h1>Вход</h1></div>
            <div><a href="#registration-window" class="change-window">Регистрация</a></div>
        </div>
        <form action="#" class = "top-row" id="authorization-form" method="post" onsubmit="
            event.preventDefault();
            authorization();
            ">>
                <label for="loginEmail"></label><input type="email" placeholder="Электронная почта..." required autocomplete="email" name="email" pattern="[a-zA-Z0-9\s]+@[a-zA-Z0-9\s]+\.[a-zA-Z0-9\s]+$" id="loginEmail"/>

                <label for="loginPassword"></label><input type="password" placeholder="Пароль..." required autocomplete="off" name="password" pattern="[@?!,.a-zA-Z0-9\s]+$" id="loginPassword" minlength="7"/>

            <button type="submit" id="login_button" class="button button-block">Войти</button>
            <script>
                const LoginPass = document.querySelector('#loginPassword');
                const LoginEmail = document.querySelector('#loginEmail');

                function changeBackgroundLogin() {
                    if (LoginPass.validity.patternMismatch || LoginEmail.validity.patternMismatch
                        || LoginPass.validity.valueMissing || LoginEmail.validity.valueMissing
                        || LoginPass.value.length < 7) {
                        document.querySelector('#login_button').style.backgroundColor = 'darkgray';
                    } else {
                        document.querySelector('#login_button').style.backgroundColor = 'darkred';
                    }
                }

                LoginPass.addEventListener('input', changeBackgroundLogin);
                LoginEmail.addEventListener('input', changeBackgroundLogin);
            </script>
        </form>
        <ul id="logUL">

        </ul>
    </div>


    <div id = "registration-window">
        <div class = "registration-top">
            <a href="" id="CloseRegistrationWindow">
                <div class="cl-btn-2">
                    <div>
                        <div class="left-to-right"></div>
                        <div class="right-to-left"></div>
                        <span class="close-btn">закрыть</span>
                    </div>
                </div>
            </a>
            <div><h1>Регистрация</h1></div>
            <div><a href="#login-window" class="change-window">Вход</a></div>
        </div>
        <form action="index.php" class = "top-row" id="registration-form" method="post" onsubmit="
            event.preventDefault();
            registration();
            ">

            <label for="RegistrationName"></label><input type="name" name="name" placeholder="Введите ваше имя..." required autocomplete="on" pattern="[А-ЯЁа-яё]+$" id="RegistrationName"/>

            <label for="email"></label><input type="email" name="email" placeholder="Электронная почта..." required autocomplete="email" pattern="[a-zA-Z0-9\s]+@[a-zA-Z0-9\s]+\.[a-zA-Z0-9\s]+$" id="email"/>

            <label for="tel"></label><input type="tel" name="tel" placeholder="Номер телефона (в формате +71234567890)...." required autocomplete="tel" pattern="[\+]\d{11}" minlength="12" maxlength="12" id="tel"/>

            <label for="txtNewPassword"></label><input type="password" name="firstPassword" placeholder="Пароль..." required autocomplete="off" pattern="[@?!,.a-zA-Z0-9\s]+$" id="txtNewPassword" minlength="7"/>

            <label for="txtConfirmPassword"></label><input type="password" name="secondPassword" placeholder="Повторите пароль..." required autocomplete="off" pattern="[@?!,.a-zA-Z0-9\s]+$" id="txtConfirmPassword" minlength="7"/>
            <div id="divCheckPassword"></div>

            <div class = "registration-block"></div>
                <label class="checkbox-google">
                    <input type="checkbox" required id="info">
                    <span class="checkbox-google-switch"></span>
                </label>
                Согласие на обработку персональных данных
            <script src="https://www.google.com/recaptcha/api.js"></script>
            <script>
                function onSubmit(token) {
                    document.getElementById("registration-form").submit();
                }
            </script>
            <button name="submit" id="button" data-sitekey="reCAPTCHA_site_key"
                    data-callback='onSubmit'
                    data-action='submit' class="button button-block">Зарегистрироваться</button>
            <script>
                const pass = document.querySelector('#txtNewPassword');
                const nameBlock = document.querySelector('#RegistrationName');
                const email = document.querySelector('#email');
                const repeatPass = document.querySelector('#txtConfirmPassword');
                const tel = document.querySelector('#tel');
                const info = document.querySelector('#info');

                repeatPass.addEventListener('input', function () {
                    if (!passCheck())
                    {
                        document.querySelector('#txtConfirmPassword').style.borderColor = 'red';
                    }
                    else
                    {
                        document.querySelector('#txtConfirmPassword').style.borderColor = 'green';
                    }
                });

                function passCheck(){
                    return pass.value === repeatPass.value;
                }

                function changeBackgroundRegistration() {
                    if (pass.validity.patternMismatch || tel.validity.patternMismatch || email.validity.patternMismatch
                        || nameBlock.validity.patternMismatch || repeatPass.validity.patternMismatch ||
                        pass.validity.valueMissing || tel.validity.valueMissing || email.validity.valueMissing
                        || nameBlock.validity.valueMissing || repeatPass.validity.valueMissing
                        || !info.checked || !passCheck() || pass.value.length < 7 || repeatPass.value.length < 7) {
                        document.querySelector('#button').style.backgroundColor = 'darkgray';
                    } else {
                        document.querySelector('#button').style.backgroundColor = 'darkred';
                    }
                }

                pass.addEventListener('input', changeBackgroundRegistration);
                nameBlock.addEventListener('input', changeBackgroundRegistration);
                email.addEventListener('input', changeBackgroundRegistration);
                repeatPass.addEventListener('input', changeBackgroundRegistration);
                tel.addEventListener('input', changeBackgroundRegistration);
                info.addEventListener('input', changeBackgroundRegistration);
            </script>
            </form>
        <ul id="regUL">

        </ul>
        </div>

    <main>
        <div class="content" id="content">
            <?php include "first_load_script.php";?>
        </div>
        <button class="load_button" onclick="ticket_load(findLastId());" id="load_button">Загрузить ёщё</button>

    </main>

    <footer>
        <div>Выполнил студент ПИ-19 Киренский Данила</div>
        <div>Email: Kirenskiydanila@gmail.com</div>
    </footer>

</body>
</html>

