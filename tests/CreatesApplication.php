<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Hash as HashAlias;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        HashAlias::driver('bcrypt')->setRounds(4);

        return $app;
    }
}
