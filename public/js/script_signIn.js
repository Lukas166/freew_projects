const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
const usernameInput = document.getElementById('username');
const passError = document.getElementById('passError');
const inputError = document.getElementById('inputError');
const submitButton = document.querySelector('form button[type="submit"]');

const invalidChars = /[(){};:'"<>,]/;

const validateInputs = () => {
    let isValid = true;

    if (usernameInput.value.length < 3 || usernameInput.value.length > 15 || invalidChars.test(usernameInput.value)) {
        inputError.textContent = "Username must be between 3 and 15 characters and should not contain invalid characters.";
        inputError.style.display = "block";
        isValid = false;
    } else {
        inputError.style.display = "none";
    }

    if (passwordInput.value.length < 8 || invalidChars.test(passwordInput.value)) {
        passError.textContent = "Password must be at least 8 characters and should not contain invalid characters.";
        passError.style.display = "block";
        isValid = false;
    } else {
        passError.style.display = "none";
    }

    submitButton.disabled = !isValid;
};

usernameInput.addEventListener('input', validateInputs);
passwordInput.addEventListener('input', validateInputs);

togglePassword.addEventListener('click', function () {
    const type = passwordInput.type === 'password' ? 'text' : 'password';
    passwordInput.type = type;
    this.classList.toggle('fa-eye-slash');
});

submitButton.disabled = true;
