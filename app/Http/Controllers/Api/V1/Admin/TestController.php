<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Models\Admin as User;
use App\Http\Controllers\Api\V1\Transformers\UserTransformer;
use League\Fractal;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\ArraySerializer;

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
    public function test($id)
    {
       $user = User::find($id);


      

        $manager = new Fractal\Manager();
          if (isset($_GET['include'])) {
            $manager->parseIncludes($_GET['include']);

        }
        $manager->setSerializer(new ArraySerializer());
       $resource =  new Item($user,new UserTransformer);
        return $manager->createData($resource)->toArray();
    }       

}
