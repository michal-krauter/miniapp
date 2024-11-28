const deleteButtons = document.querySelectorAll('.btn-delete');

deleteButtons.forEach(button => {
    button.addEventListener('click', (event) => {
        event.preventDefault();
        if (confirm(`Opravdu chcete smazat produkt?`)) {
            button.closest('form').submit();
        }
    });
});
