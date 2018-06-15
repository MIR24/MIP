<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Jenssegers\Date\Date;
use Log;
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

        $this->prefix = $this->signature.': ';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $records = DB::table('topics')
            ->where('published_at', '<', Date::now()->subMinutes(config('constants.topics_ttp')))
            ->where('status', 'active')
            ->whereNull('deleted_at')
            ->update(['status' => 'inactive']);
        Log::info($this->prefix.$records.' records unpublished');
        $records = DB::table('topics')
            ->where('published_at', '<', Date::now()->subMinutes(config('constants.topics_ttl')))
            ->where('status', 'inactive')
            ->whereNull('deleted_at')
            ->update(['deleted_at' => now()]);
        Log::info($this->prefix.$records.' records deleted');
    }
}
