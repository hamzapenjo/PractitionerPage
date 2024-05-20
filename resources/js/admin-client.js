
document.addEventListener('DOMContentLoaded', function() {
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const emailInput = document.getElementById('email');

    // Generate random number once
    const randomNumber = Math.floor(Math.random() * 1000) + 1;

    function generateEmail() {
        const firstName = firstNameInput.value.toLowerCase();
        const lastName = lastNameInput.value.toLowerCase();
        emailInput.value = `${firstName}.${lastName}${randomNumber}@example.com`;
    }

    firstNameInput.addEventListener('input', generateEmail);
    lastNameInput.addEventListener('input', generateEmail);
});
