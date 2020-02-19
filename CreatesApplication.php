<?php
 
 
namespace Tests;
 
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;
 
trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
 
        $app->make(Kernel::class)->bootstrap();
 
        Hash::setRounds(4);
 
        $fakeManager = new class ($app, $app['db.factory']) extends DatabaseManager {
            public function connection($name = null) {
                return parent::connection($this->getDefaultConnection());
            }
        };
        $app->instance('db', $fakeManager);
        Model::setConnectionResolver($fakeManager);
     
        return $app;
    }
}
