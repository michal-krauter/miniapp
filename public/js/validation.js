function validateForm() {
    const name = document.getElementById('name').value;
    const sku = document.getElementById('sku').value;
    const price = document.getElementById('price').value;

    if (name === '') {
        alert('Prosím, vyplňte název produktu.');
        return false;
    }

    if (sku === '') {
        alert('Prosím, vyplňte SKU.');
        return false;
    }

    if (price === '') {
        alert('Prosím, vyplňte cenu.');
        return false;
    }

    return true;
}
