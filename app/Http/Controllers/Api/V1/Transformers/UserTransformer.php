<?php
namespace App\Http\Controllers\Api\V1\Transformers;

use App\Models\Admin as User;
use Illuminate\Http\Request;
use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{  


   // protected $defaultIncludes = [
   //      'article'
   //  ];
      protected $availableIncludes = [
        'article'
    ];
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
    public function includeArticle(User $user)
    {
      $article = $user->articles()->first();

      return $this->item($article,new ArticleTransformer);
    }
}