<?php


namespace Views;


class RegistrationView
{
    static public function render(): void
    {
        echo
        '
        <!doctype html>
        <html lang="en" xmlns:th="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="/public/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="/public/css/index.css">
            <title>Registration</title>
        </head>
        <body>
        <div class = "container">
            <form id="form" action="/auth/registration" method="post" onsubmit="processForm(event)">
			<div class="form-group">
				<label for="email">Емейл:</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Введіть емейл" required>
			</div>
			<div class="form-group">
				<label for="password">Пароль:</label>
				<input type="password" class="form-control" id="password" name="password"  placeholder="Введіть пароль"required>
			</div>
			<div class="form-group">
				<label for="confirm_password">Повторіть пароль:</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Повторіть пароль" required>
			</div>
			<button type="submit" class="btn btn-primary">Зареєструватися</button>
		</form>
        </div>
        <script src="/public/js/script.js"></script>
        </body>
        </html>
        ';
    }
}