<?php

namespace DiogoGPinto\AuthUIEnhancer\Commands;

use Illuminate\Console\Command;

class AuthUIEnhancerCommand extends Command
{
    public $signature = 'filament-auth-ui-enhancer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
