const togglePassword = document.getElementById('togglePassword');
const togglePasswordC = document.getElementById('togglePasswordC');
const passwordInput = document.getElementById('password');
const passwordInputC = document.getElementById('confirm');
const usernameInput = document.getElementById('username');
const passError = document.getElementById('passError');
const inputError = document.getElementById('inputError');
const confirmError = document.getElementById('confirmError');
const submitButton = document.querySelector('form button[type="submit"]');

const invalidChars = /[(){};:'"<>,]/;

const validateInputs = () => {
    let isValid = true;

    if (usernameInput.value.length < 3 || usernameInput.value.length > 15 || invalidChars.test(usernameInput.value)) {
        inputError.style.display = "block";
        isValid = false;
    } else {
        inputError.style.display = "none";
    }

    if (passwordInput.value.length < 8 || invalidChars.test(passwordInput.value)) {
        passError.style.display = "block";
        isValid = false;
    } else {
        passError.style.display = "none";
    }

    if (passwordInputC.value !== passwordInput.value) {
        confirmError.style.display = "block";
        isValid = false;
    } else {
        confirmError.style.display = "none";
    }

    submitButton.disabled = !isValid;
    
    return isValid;
};

usernameInput.addEventListener('input', validateInputs);
passwordInput.addEventListener('input', validateInputs);
passwordInputC.addEventListener('input', validateInputs);

togglePassword.addEventListener('click', function () {
    const type = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = type;
    this.classList.toggle('fa-eye-slash');
});

togglePasswordC.addEventListener('click', function () {
    const typeC = passwordInputC.type === 'password' ? 'text' : 'password';
    passwordInputC.type = typeC;
    this.classList.toggle('fa-eye-slash');
});

usernameInput.addEventListener('input', () => {
    if (usernameInput.value.length < 3 || usernameInput.value.length > 15) {
        inputError.textContent = "Username must be between 3 and 15 characters.";
        inputError.style.display = "block";
    } else if (invalidChars.test(usernameInput.value)) {
        inputError.textContent = "Invalid characters like: (){};:'\"<>, are not allowed.";
        inputError.style.display = "block";
    } else {
        inputError.style.display = "none";
    }
});

passwordInput.addEventListener('input', () => {
    if (passwordInput.value.length < 8) {
        passError.textContent = "Password must be at least 8 characters.";
        passError.style.display = "block";
    } else if (invalidChars.test(passwordInput.value)) {
        passError.textContent = "Invalid characters like: (){};:'\"<>, are not allowed.";
        passError.style.display = "block";
    } else {
        passError.style.display = "none";
    }
});

passwordInputC.addEventListener('input', () => {
    if (passwordInputC.value !== passwordInput.value) {
        confirmError.textContent = "Passwords do not match.";
        confirmError.style.display = "block";
    } else {
        confirmError.style.display = "none";
    }
});