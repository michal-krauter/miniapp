<!DOCTYPE html>
<html>
<head>
    <title>Upravit produkt</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>

<h1>Upravit produkt</h1>

<form method="POST" action="/products/update/{{ $product->id }}" enctype="multipart/form-data">
    <div>
        <label for="name">Název:</label>
        <input type="text" name="name" value="{{ $product->name }}">
    </div>
    <div>
        <label for="sku">SKU:</label>
        <input type="text" name="sku" value="{{ $product->sku }}">
    </div>
    <div>
        <label for="image">Aktuální obrázek:
            <img src="/images/{{ $product->sku }}/{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
        </label>
        <input type="file" name="image" id="image" value="{{ $product->image }}">
    </div>
    <div>
        <label for="description">Popis:</label>
        <textarea name="description" id="description">{{ $product->description }}</textarea>
    </div>
    <div>
        <label for="price">Cena:</label>
        <input type="number" name="price" id="price"  value="{{ $product->price }}" >
    </div>
    <div>
        <label for="is_published">Publikovat:</label>
        <input type="checkbox" name="is_published" id="is_published" {{ $product->is_published == 1 ? 'checked' : '' }}>
    </div>

    <button type="submit">Uložit</button>
</form>
</body>
</html>
