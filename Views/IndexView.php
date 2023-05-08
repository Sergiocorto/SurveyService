<?php
namespace Views;


class IndexView
{
    static public function render()
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
            <title>Login Form</title>
        </head>
        <body>
        <div class = "container">
            <form id="form" action="/user/add" method="post" onsubmit="processForm(event)">
			<div class="form-group">
				<label for="first_name">Ім`я:</label>
				<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введіть ім`я" required>
				<small class="form-text text-muted">Можна використовувати лише літери</small>
			</div>
			<div class="form-group">
				<label for="last_name">Прізвище:</label>
				<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введіть прізвище" required>
				<small class="form-text text-muted">Можна використовувати лише літери</small>
			</div>
			<div class="form-group">
				<label for="email">Емейл:</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Введіть емейл" required>
			</div>
			<div class="form-group">
				<label for="password">Пароль:</label>
				<input type="password" class="form-control" id="password" name="password"  placeholder="Введіть пароль"required>
			</div>
			<div class="form-group">
				<label for="confirm_password">Поторіть пароль:</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Повторіть пароль" required>
			</div>
			<button type="submit" class="btn btn-primary">Ввійти</button>
		</form>
		<h1 id="greeting">Реєстрація пройшла успішно</h1>
        </div>
        <script src="/public/js/script.js"></script>
        </body>
        </html>
        ';
    }
}












