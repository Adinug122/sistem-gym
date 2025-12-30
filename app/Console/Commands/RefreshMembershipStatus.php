<?php

namespace App\Console\Commands;

use App\Models\Membership;
use Illuminate\Console\Command;

class RefreshMembershipStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'membership:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
     $expired =  Membership::where('status','active')
        ->where('end','<',now())
        ->update(['status' => 'expired']);

      $activated =  Membership::where('status','schedule')
        ->where('start','<=',now())
        ->update(['status' => 'active']);
           $this->info("Expired: $expired | Activated: $activated");
    }
}
