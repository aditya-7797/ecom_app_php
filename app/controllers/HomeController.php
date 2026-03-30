<?php

class HomeController
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function index(): void
    {
        $title = $this->config['app_name'] . ' | Home';
        $heading = 'Step 2: MVC with Router + Controller';
        $message = 'This response is now handled by HomeController via route mapping in public/index.php.';
        $environment = $this->config['environment'];
        $baseUrl = $this->config['base_url'];

        require __DIR__ . '/../views/home.php';
    }
}
