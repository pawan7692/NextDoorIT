<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberDiscountsController extends Controller
{
    //
    public function showMemberDiscounts() {
    	return view('user.memberDiscounts');
    }
}
