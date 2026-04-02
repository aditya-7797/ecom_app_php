<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; line-height: 1.6; }
        .container { max-width: 760px; margin: 0 auto; }
        .top-nav { margin-bottom: 1rem; }
        .top-nav a { color: #0a58ca; text-decoration: none; }
        .top-nav a:hover { text-decoration: underline; }
        .card { border: 1px solid #ddd; border-radius: 10px; padding: 1.25rem; background: #fff; }
        .meta { color: #666; margin-bottom: 1rem; }
        .name { margin: 0 0 0.5rem 0; font-size: 1.8rem; }
        .price { margin: 0 0 1rem 0; font-size: 1.1rem; font-weight: 700; color: #0a7a34; }
        .desc { margin: 0 0 1rem 0; }
        .product-id { color: #666; font-size: 0.95rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-nav">
            <a href="<?= htmlspecialchars($baseUrl) ?>/products">Back to Products</a>
        </div>

        <h1><?= htmlspecialchars($heading) ?></h1>
        <p class="meta">Environment: <?= htmlspecialchars($environment) ?></p>

        <article class="card">
            <h2 class="name"><?= htmlspecialchars($product->name) ?></h2>
            <p class="price">$<?= number_format($product->price, 2) ?></p>
            <p class="desc"><?= htmlspecialchars($product->description) ?></p>
            <p class="product-id">Product ID: <?= (int) $product->id ?></p>
        </article>
    </div>
</body>
</html>
