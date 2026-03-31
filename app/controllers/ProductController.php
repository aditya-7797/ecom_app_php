<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function index(): void
    {
        $products = Product::getAll();
        $title = $this->config['app_name'] . ' | Products';
        $heading = 'Products';
        $environment = $this->config['environment'];
        $baseUrl = $this->config['base_url'];

        require __DIR__ . '/../views/products.php';
    }

    public function show(int $id): void
    {
        $product = Product::getById($id);

        if ($product === null) {
            http_response_code(404);
            $title = $this->config['app_name'] . ' | Product Not Found';
            $heading = 'Product Not Found';
            $message = 'The requested product does not exist.';
            $environment = $this->config['environment'];
            $baseUrl = $this->config['base_url'];

            require __DIR__ . '/../views/home.php';
            return;
        }

        $title = $this->config['app_name'] . ' | ' . $product->name;
        $heading = 'Product Detail';
        $environment = $this->config['environment'];
        $baseUrl = $this->config['base_url'];

        require __DIR__ . '/../views/product-detail.php';
    }
}
