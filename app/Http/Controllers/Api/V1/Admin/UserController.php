<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin as User;
class UserController extends BaseController
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
