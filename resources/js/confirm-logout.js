document.addEventListener('DOMContentLoaded', function () {
    const logoutButton = document.querySelector('.logout-btn');

    logoutButton.addEventListener('click', function () {
        $('#logoutModal').modal('show');
    });
});
