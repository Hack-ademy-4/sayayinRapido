<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth.revisor');
	}

	public function index()
	{
		
		return view("profile.index", ["user" => Auth::user()]);
	}
}
