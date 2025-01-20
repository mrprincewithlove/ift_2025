<?php

namespace App\Console\Commands;

use App\Models\MyConfig;
use App\Models\Permission;
use App\Models\Schedule;
use Illuminate\Console\Command;

class CacheAllCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'cache all models on system start';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "================== ===================\n";
        echo $this->description . "\n"; 

        \Artisan::call('optimize:clear');

        cache()->flush();
        $data = config('custom');
//        foreach ($data as $key=>$val)
//        {
//            MyConfig::create(['key' => $key, 'value'=>$val]);
//        }
        MyConfig::reCache();
        // Permission::reCache();
        // Schedule::reCache();
        MyConfig::reCache();
    }
}
