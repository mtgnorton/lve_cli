<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Models\Admin as User;
use App\Http\Controllers\Api\V1\Transformers\UserTransformer;

class TestController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);
return $this->response->paginator($users, new UserTransformer);
       // return $this->response->item($user, new UserTransformer);

    }
}
