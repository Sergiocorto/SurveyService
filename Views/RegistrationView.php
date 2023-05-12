<?php


namespace Views;


class RegistrationView
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <link rel="stylesheet" href="/public/css/login.css">
            <title>Registration</title>
        </head>
        <body>
        <div class = "container">
            <form id="form" action="/auth/registration" method="post" onsubmit="processForm(event)">
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password"  placeholder="Enter password"required>
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm password:</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
			</div>
			<button type="submit" class="btn btn-primary">Registration</button>
		</form>
        </div>
        <script src="/public/js/script.js"></script>
        </body>
        </html>
        ';
    }
}