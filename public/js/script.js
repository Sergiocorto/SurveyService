async function processForm(event) {
    event.preventDefault();
    const email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();

    if (password === confirmPassword) {
        password = btoa(password);
        const user = {
            'email': email,
            'password': password
        }
        const form = document.getElementById('form');
        await fetch(form.action, {
            method: form.method,
            body: JSON.stringify(user)
        })
            .then(response => {
                if (!response.ok) {
                    alert('Реєстрація не пройшла, спробуйте ще раз')
                } else {
                response.text().then(data => {
                    window.location.href = 'login';
                });
            }
            })
    } else {
        alert('Пароль та повтор паролю не співпадають');
    }
}

async function processLoginForm(event) {
    event.preventDefault();
    const email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    password = btoa(password);
    const user = {
        'email': email,
        'password': password
    }
    const form = document.getElementById('form');
    await fetch(form.action, {
        method: form.method,
        body: JSON.stringify(user)
    })
        .then(response => {
            if (!response.ok) {
                alert('Error')
            } else {
                response.text().then(data => {
                    window.location.href = '/myCabinet';
                });
            }
        })
}