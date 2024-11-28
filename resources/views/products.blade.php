<!DOCTYPE html>
<html>
<head>
    <title>Seznam produktů</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/app.js"></script>
</head>
<body>

<h1>Seznam produktů</h1>

<div class="product-list">
    @foreach ($products as $product)
        <div class="product-card">
            <img src="/images/{{ $product->sku }}/{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
            <h2 class="product-name">{{ $product->name }}</h2>
            <p class="product-description">{{ $product->description }}</p>
            <p class="product-sku">SKU: {{ $product->sku }}</p>
            <p class="product-price">{{ number_format($product->price, 2) }} Kč</p>
            <p class="product-status">
                {{ $product->is_published ? 'Publikovaný' : 'Nepublikovaný' }}
            </p>
            <div class="product-actions">
                <a href="/products/{{ $product->id }}" class="btn btn-edit">Editovat</a>
                <form action="/products/del/{{ $product->id }}" method="DELETE">
                    <button type="submit" class="btn btn-delete">Smazat</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
