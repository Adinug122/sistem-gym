<?php

namespace App\Console\Commands;

use App\Models\Member;
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
      
      $expiredMember = Member::where('status','active')
                      ->whereDoesntHave('membership',function($query){
                        $query->where('status','active');
                      })
                      ->update(['status' => 'nonactive']);
           
        $revived = Member::where('status','nonactive')
        ->wherehas('membership',function($q){
          $q->where('status','active');
        })
        ->update(['status' => 'active']);

 $this->info("nonactive member:  $expiredMember | Active Member: $revived");


    }
}
