document.addEventListener('DOMContentLoaded', function () {
    const deleteClientButtons = document.querySelectorAll('.delete-client-btn');

    deleteClientButtons.forEach(button => {
        button.addEventListener('click', function () {
            const clientId = this.getAttribute('data-client-id');
            const clientName = this.getAttribute('data-client-name');
            const modalId = `#deleteModal-${clientId}`;

            $(modalId).modal('show');
        });
    });
});