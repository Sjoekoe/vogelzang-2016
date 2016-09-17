<?php

use App\Factories\BuildsModels;
use App\Factories\ModelFactory;
use App\Testing\CreatesModels;
use Illuminate\Http\Response;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    use BuildsModels, CreatesModels;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
        $this->modelFactory = $app->make(ModelFactory::class);

        return $app;
    }

    public function setup()
    {
        parent::setUp();

        $this->artisan('migrate');
    }

    public function assertNoContent()
    {
        return $this->assertResponseStatus(Response::HTTP_NO_CONTENT);
    }
}
