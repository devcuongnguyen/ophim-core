<?php

namespace Ophim\Core\Console;

use Ophim\Core\Database\Seeders\SettingUpdateTableSeeder;
use Illuminate\Console\Command;

class UpdateSettingTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vungtv:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update VungTv';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('db:seed', [
            'class' => SettingUpdateTableSeeder::class,
        ]);
        return 0;
    }
}