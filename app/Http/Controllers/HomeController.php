<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $total_users;
    public $total_topics;
  	public $requests_pending;
    public $requests_approved;
    public $my_requests_pending;
    public $my_requests_approved;



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $this->checkUser();
        $this->total_users = DB::table('users')->count();
        $this->total_topics = DB::table('topics')->count();
      	$this->requests_pending = DB::table('chapter_requests')->where('status', 'pending')->count();
        $this->requests_approved = DB::table('chapter_requests')->where('status', 'approved')->count();
        $this->my_requests_pending = DB::table('chapter_requests')->where('status', 'pending')
        ->where('requester_id', auth()->user()->id)->count();
        $this->my_requests_approved = DB::table('chapter_requests')->where('status', 'approved')
        ->where('requester_id', auth()->user()->id)->count();
        
        return view('home', [
            'total_users' => $this->total_users,
            'total_topics' => $this->total_topics,
          	'requests_pending' => $this->requests_pending,
            'requests_approved' => $this->requests_approved,
            'my_requests_pending' => $this->my_requests_pending,
            'my_requests_approved' => $this->my_requests_approved,
        ]);
    }
}