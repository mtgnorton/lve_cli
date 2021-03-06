<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use EasySlug\EasySlug\EasySlugFacade as EasySlug;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(15)->toArray();
        return response()->json($articles);
    }

    public function store(\JWTAuth $auth)
    {
        $this->validate(request(), [
            'title' => 'required|unique:articles|max:255',
            'summary' => 'required|max:255',
            'content' => 'required|min:100',
        ], [
            'title.required' => '标题不能为空',
            'title.unique' => '标题已存在',
            'title.max' => '标题长度不能超过255',
            'summary.required' => '摘要不能为空',
            'summary.max' => '摘要度不能超过255',
            'content.required' => '内容不能为空',
            'content.min' => '内容不能小于100个字',
        ]);

        $slug = EasySlug::generateUniqueSlug(request('title'), 'articles', "slug");
        $publish_at = request('publish_at');
        if (isset($publish_at)) {
            $publish_at = date('Y-m-d H:i:s',  strtotime($publish_at));
        }

        Article::create([
            'user_id' => auth()->id(),
            'title' => request('title'),
            'slug' => $slug,
            'publish_at' => $publish_at,
            'summary' => request('summary'),
            'content' => request('content')
        ]);

        return response()->json(['status' => 'OK']);
    }
}
