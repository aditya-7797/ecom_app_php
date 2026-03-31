<?php

require_once __DIR__ . '/../core/Database.php';

class Product
{
    public int $id;
    public string $name;
    public float $price;
    public string $description;

    public function __construct(int $id, string $name, float $price, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    /**
     * Get all products from database.
     * Falls back to in-memory sample products when DB is unavailable.
     */
    public static function getAll(): array
    {
        try {
            $pdo = Database::connection();
            $stmt = $pdo->query('SELECT id, name, price, description FROM products ORDER BY id ASC');
            $rows = $stmt->fetchAll();

            $products = [];

            foreach ($rows as $row) {
                $products[] = new self(
                    id: (int) $row['id'],
                    name: (string) $row['name'],
                    price: (float) $row['price'],
                    description: (string) $row['description']
                );
            }

            if ($products !== []) {
                return $products;
            }
        } catch (Throwable $e) {
            // Keep onboarding smooth: if DB setup is not ready yet, app still renders.
        }

        return self::sampleProducts();
    }

    private static function sampleProducts(): array
    {
        return [
            new self(
                id: 1,
                name: 'Laptop',
                price: 899.99,
                description: 'High-performance laptop for work and gaming'
            ),
            new self(
                id: 2,
                name: 'Wireless Mouse',
                price: 29.99,
                description: 'Ergonomic wireless mouse with 2.4GHz connection'
            ),
            new self(
                id: 3,
                name: 'USB-C Cable',
                price: 12.99,
                description: 'Durable USB-C charging and data cable'
            ),
            new self(
                id: 4,
                name: 'Monitor 27"',
                price: 299.99,
                description: '4K Ultra HD IPS display with HDR support'
            ),
            new self(
                id: 5,
                name: 'Mechanical Keyboard',
                price: 149.99,
                description: 'RGB backlit mechanical keyboard with Cherry switches'
            ),
        ];
    }

    /**
     * Get a single product by ID
     * Returns null if not found
     */
    public static function getById(int $id): ?self
    {
        foreach (self::getAll() as $product) {
            if ($product->id === $id) {
                return $product;
            }
        }
        return null;
    }
}
