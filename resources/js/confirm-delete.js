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

    const deletePracticeButtons = document.querySelectorAll('.delete-practice-btn');
    
    deletePracticeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const practiceId = this.getAttribute('data-practice-id');
            const modalId = `#deletePracticeModal-${practiceId}`;

            $(modalId).modal('show');
        });
    });

    const deleteFieldButtons = document.querySelectorAll('.delete-field-btn');

    deleteFieldButtons.forEach(button => {
        button.addEventListener('click', function () {
            const fieldId = this.getAttribute('data-field-id');
            const fieldName = this.getAttribute('data-field-name');
            const modalId = `#deleteFieldModal-${fieldId}`;

            $(modalId).modal('show');
        });
    });
});