<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Prodact;
use Carbon\Carbon;

class NoticeController extends Controller
{
    public function index(){
        // 現在から一週間後の日付
        $oneWeekFromNow = Carbon::now()->addWeek();
       
        $records = Prodact::where('is_selling','1')->where('deadline', '<=', $oneWeekFromNow)->get();

        return Inertia::render('Notices/Index',[
            'records' => $records
        ]);
    }
}