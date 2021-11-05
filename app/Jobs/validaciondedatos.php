<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use DB;

class validaciondedatos implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      /*  $user = DB::table('user')->get();

        foreach($user as $us){
           $name[]= $us->name;
         }


         foreach($user as $ser){
            $names = $ser->name;

            for($i=0; $i<count($name); $i++){

                if($name[$i]==$names){ */
    
                  //DB::delete("DELETE u1 FROM user u1 INNER JOIN user u2 WHERE u1.id > u2.id AND u1.is_admin = u2.is_admin");
      
             //     DB::table('user')->update(['is_admin'=> 1]);
             /* }
    
               }

         } 
     /* DB::table('user u1')->delete(u1)
     ->join('user u2')
     ->where('u1.id','>','u2.id')
     ->where('u1.email','=','u2.email'); */

        
    //   return true;

    }
}
