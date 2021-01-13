<?php


namespace App\Database;


use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    private Capsule $capsule;
    private array $config;

    /**
     * Init database config with data from dotenv.
     */
    public function __construct()
    {
        $this->capsule = new Capsule;
        $this->config = [
            'driver' => env('DB_CONNECTION'),
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ];
        \Illuminate\Pagination\Paginator::currentPageResolver(function ($pageName = 'page') {
            return (int) ($_GET[$pageName] ?? 1);
        });
    }

    /**
     * Setup eloquent.
     */
    public function setupCapsule(): void
    {
        $this->capsule->addConnection($this->config);
        $this->capsule->bootEloquent();
        $this->capsule->setAsGlobal();
    }

    /**
     * Get eloquent capsule.
     * @return Capsule
     */
    public function getCapsule(): Capsule
    {
        return $this->capsule;
    }

    /**
     * Get database config.
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }
}