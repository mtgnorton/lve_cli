<?php

namespace App\Http\Controllers\Admin\System;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin as User;
class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $pageSize = $request->size;
      $users = User::paginate($pageSize);
      return response()->json($users);
    }
}
