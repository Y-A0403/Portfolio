<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Prodact;
use Carbon\Carbon;

class NoticeController extends Controller
{
    public function index(){
        $oneWeekFromNow = Carbon::now()->addWeek();

        $records = Prodact::where('is_selling','1')->where('deadline', '<=', $oneWeekFromNow)->get();

        // dd($records);


        return Inertia::render('Notices/Index',[
            'records' => $records
        ]);
    }
}
