<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; line-height: 1.6; }
        .container { max-width: 900px; margin: 0 auto; }
        .top-nav { margin-bottom: 1rem; }
        .top-nav a { color: #0a58ca; text-decoration: none; }
        .top-nav a:hover { text-decoration: underline; }
        .meta { color: #666; margin-bottom: 1rem; }
        .grid { display: grid; gap: 1rem; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 1rem; background: #fff; }
        .name { margin: 0 0 0.4rem 0; font-size: 1.1rem; }
        .price { margin: 0 0 0.5rem 0; font-weight: 700; color: #0a7a34; }
        .desc { margin: 0; color: #333; }
        .detail-link { display: inline-block; margin-top: 0.75rem; color: #0a58ca; text-decoration: none; font-weight: 600; }
        .detail-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-nav">
            <a href="<?= htmlspecialchars($baseUrl) ?>">Back to Home</a>
        </div>

        <h1><?= htmlspecialchars($heading) ?></h1>
        <p class="meta">Environment: <?= htmlspecialchars($environment) ?></p>

        <div class="grid">
            <?php foreach ($products as $product): ?>
                <article class="card">
                    <h2 class="name"><?= htmlspecialchars($product->name) ?></h2>
                    <p class="price">$<?= number_format($product->price, 2) ?></p>
                    <p class="desc"><?= htmlspecialchars($product->description) ?></p>
                    <a class="detail-link" href="<?= htmlspecialchars($baseUrl) ?>/products/<?= (int) $product->id ?>">View Details</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
