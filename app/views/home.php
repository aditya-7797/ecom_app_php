<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; line-height: 1.6; }
        .card { max-width: 700px; padding: 1.25rem; border: 1px solid #ddd; border-radius: 8px; }
        code { background: #f5f5f5; padding: 0.2rem 0.4rem; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="card">
        <h1><?= htmlspecialchars($heading) ?></h1>
        <p><?= htmlspecialchars($message) ?></p>
        <p><strong>Environment:</strong> <?= htmlspecialchars($environment) ?></p>
        <p>Current URL should be: <code><?= htmlspecialchars($baseUrl) ?></code></p>
        <p><a href="<?= htmlspecialchars($baseUrl) ?>/products">View Products</a></p>
    </div>
</body>
</html>
