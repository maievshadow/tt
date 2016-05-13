<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cache;

class TestController extends Controller
{
    public function index()
    {
        $posts = Cache::get('posts',[]);
        if(!$posts)
            exit('Nothing');

        $html = '<ul>';

        foreach ($posts as $key=>$post) {
            $html .= '<li><a href='.route('test.show',['post'=>$key]).'>'.$post['title'].'</li>';
        }

        $html .= '</ul>';

        return $html;
    }

    public function show($id)
    {
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Found！');
        $post = $posts[$id];

        $editUrl = route('test.edit',['post'=>$id]);
        $html = <<<DETAIL
        <h3>{$post['title']}</h3>
        <p>{$post['content']}</p>
        <p>
            <a href="{$editUrl}">编辑</a>
        </p>
DETAIL;

        return $html;
    }

    public function edit($id)
    {
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Found！');
        $post = $posts[$id];

        $postUrl = route('test.update',['post'=>$id]);
        $csrf_field = csrf_field();
        $html = <<<UPDATE
        <form action="$postUrl" method="POST">
            $csrf_field
            <input type="hidden" name="_method" value="PUT"/>
            <input type="text" name="title" value="{$post['title']}"><br/><br/>
            <textarea name="content" cols="50" rows="5">{$post['content']}</textarea><br/><br/>
            <input type="submit" value="提交"/>
        </form>
UPDATE;
        return $html;
    }

    public function create()
    {
        $postUrl = route('test.store');
        $csrf_field = csrf_field();
        $html = <<<CREATE
        <form action="$postUrl" method="POST">
            $csrf_field
            <input type="text" name="title"><br/><br/>
            <textarea name="content" cols="50" rows="5"></textarea><br/><br/>
            <input type="submit" value="提交"/>
        </form>
CREATE;
        return $html;
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $post = ['title'=>trim($title),'content'=>trim($content)];

        $posts = Cache::get('posts',[]);

        if(!Cache::get('post_id')){
            Cache::add('post_id',1,60);
        }else{
            Cache::increment('post_id',1); 
        }
        $posts[Cache::get('post_id')] = $post;

        Cache::put('posts',$posts,60);
        return redirect()->route('test.show',['post'=>Cache::get('post_id')]);

    }

    public function update(Request $request, $id)
    {
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Found！');

        $title = $request->input('title');
        $content = $request->input('content');

        $posts[$id]['title'] = trim($title);
        $posts[$id]['content'] = trim($content);

        Cache::put('posts',$posts,60);
        return redirect()->route('test.show',['post'=>Cache::get('post_id')]);
    }

    public function destroy($id)
    {
        $posts = Cache::get('posts',[]);
        if(!$posts || !$posts[$id])
            exit('Nothing Deleted！');

        unset($posts[$id]);
        Cache::decrement('post_id',1);

        return redirect()->route('test.index');
    }
}
