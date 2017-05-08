<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Article;

class ArticleController extends Controller
{
    
    function __construct() {
        $this->middleware('auth');
    }
    
    public function index (){
        
        $segment = \Request::segment(1);
        $articles =  Article::all();
        
        if(!isset($segment)) {
            $articles = Article::where('published_at', '>=', date('Y-m-d H:i:s'))->get();
             return view('public/listFrontEnd',['articles' => $articles]);
        } 
        else if(isset($segment) && \Auth::guest() ){
            return redirect('login');
        } else {
            $articles = Article::all();
            return view('articles/list', ['articles' => $articles]);
        }

        return view('articles/list',['articles' => $articles]);
    }
    
    public function create(){
        
        $categories = \App\Category::pluck('title', 'id');
        $tags = \App\Tag::pluck('name', 'id');
        return view('articles.create', [
            'categories' => $categories,
            'tags' => $tags]);
    }
    
    public function store(Request $request){
//       var_dump($request::all());
        $this->validate($request,[
            'title' => 'required|min:3',
            'body' => 'required',
            'excerpt' => 'required',
            'slug' => 'required|unique:articles',
            'feature_image' => 'required|image',
            'category_id' => 'required|integer',
            'published_at' => 'required|date'
        ]);
        
        $image = Input::file('feature_image');
        $imageName = time().$image->getClientOriginalName();
        $image->move('uploads', $imageName);
        
        $input = $request->all();
        $tags = $input['tag'];
        unset($input['tag']);
        $input['feature_image'] = $imageName;
        $input['user_id'] = \Auth::user()->id;
        $article = Article::create($input);
        $article->tags()->attach($tags);
        \Session::flash('flash_message', 'Article successfully created');
        return redirect('articles');
    }
    
    function edit($id){
        $article = Article::find($id);
        $categories =\App\Category::pluck('title', 'id');
        $tags = \App\Tag::pluck('name', 'id');
        
        return view('articles.edit',[
            'article' => $article,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
    
    function update($id, Request $request){
        $this->validate($request,[
            'title' => 'required|min:3',
            'body' => 'required',
            'excerpt' => 'required',
            'slug' => 'required|unique:articles,slug,'.$id,
            'feature_image' => 'image',
            'category_id' => 'required|integer',
            'published_at' => 'required|date'
        ]);
        
        $article = Article::findOrFail($id);
        $input = $request->all();
        $tags = $input['tag'];
        unset($input['tag']);
        $image = Input::file('feature_image');
        
        if(isset($image)){
            $imageName = time().$image->getClientOriginalName();
            $input['feature_image'] = $imageName;
            $image->move('uploads', $imageName);
            
            if(file_exists('uploads/'.$article->feature_image)){
                unlink('uploads/'.$article->feature_image);
            }
        }
        
        $article->update($input);
        $article->tags()->sync($tags);
        return redirect('articles/'.$article->slug);
    }
    
    public function view($slug){
        $article = Article::all()->where('slug', $slug)->first();
        return view('articles.view', ['article' => $article]);
    }
}
