<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class everyday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:updateStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update the voucher status';

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


        DB::table('vouchers')
            ->where('expiry_date', '<', date("Y-m-d"))
            ->update(['status' => 'expired']);
    }
}
