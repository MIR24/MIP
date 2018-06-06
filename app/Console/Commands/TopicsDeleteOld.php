<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Jenssegers\Date\Date;
use DB;

class TopicsDeleteOld extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topics:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete old topic records';

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
     * @return mixed
     */
    public function handle()
    {
        DB::table('topics')
            ->where('created_at', '<', Date::now()->subDays(config('constants.topics_ttl')))
            ->whereNull('deleted_at')
            ->update(['deleted_at' => now()]);
    }
}
