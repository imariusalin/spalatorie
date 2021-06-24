<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function apiboxa(Request $request) {
        $status = $request->input('status');
        $timer = $request->input('timer');
        $idboxa = $request->input('idboxa');

        $date = Carbon::now()->addMinutes($timer);
        $data = DB::table('boxe')
              ->where('id', $idboxa)
              ->update(['status' => $status,'timer_start'=>$timer,'updated_at'=>$date]); 
        
        //$data = DB::table('users')->get();
        return "ok";
    }



}
