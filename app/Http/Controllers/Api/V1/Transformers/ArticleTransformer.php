<?php
namespace App\Http\Controllers\Api\V1\Transformers;

use App\Models\Article ;
use Illuminate\Http\Request;
use App\Http\Requests;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'id' => $article->id,
            'name' => $article->content
        ];
    }

}