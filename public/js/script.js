const form = document.querySelector("form");
const usernameInput = form.querySelector('input[name="username"]');
const passwordInput = form.querySelector('input[name="password"]');
const confirmedPasswordInput = form.querySelector('input[name="password_retype"]');
const emailInput = form.querySelector('input[name="email"]');

function isUsername(username) {
    return /^[a-zA-Z]+([0-9]?)+$/.test(username);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateUsername() {
    setTimeout( function() {
        markValidation(usernameInput, isUsername(usernameInput.value));
    }, 1000);
}

usernameInput.addEventListener('keyup', validateUsername);

function validatePassword() {
    setTimeout( function() {
        const condition = arePasswordsSame(
            passwordInput.value,
            confirmedPasswordInput.value
        );
        markValidation(confirmedPasswordInput, condition);
    }, 1000);
}

confirmedPasswordInput.addEventListener('keyup', validatePassword);

function validateEmail() {
    setTimeout(function() {
        markValidation(emailInput, isEmail(emailInput.value));
    }, 1000)
}

emailInput.addEventListener('keyup', validateEmail);