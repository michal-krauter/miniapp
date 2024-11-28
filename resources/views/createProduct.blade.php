<!DOCTYPE html>
<html>
<head>
    <title>Přidat nový produkt</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/validation.js"></script>
</head>
<body>
<h1>Přidat nový produkt</h1>

<form method="POST" action="/products/store" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div>
        <label for="name">Název:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="sku">SKU:</label>
        <input type="text" name="sku" id="sku" required>
    </div>
    <div>
        <label for="image">Obrázek:</label>
        <input type="file" name="image" id="image" enctype="multipart/form-data">
    </div>
    <div>
        <label for="description">Popis:</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <label for="price">Cena:</label>
        <input type="number" name="price" id="price" required>
    </div>
    <div>
        <label for="is_published">Publikovat:</label>
        <input type="checkbox" name="is_published" id="is_published">
    </div>
    <button type="submit">Uložit</button>
</form>
</body>
</html>
