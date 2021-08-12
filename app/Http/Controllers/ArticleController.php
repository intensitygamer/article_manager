<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $articles = Article::get();
         
        return view('index')->with('articles', $articles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_article()
    {
        //

        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input          = $request->all();
        $article        = new Article();


        $validator = Validator::make($input, [
            'article_name' => 'required',
            'article_description' => 'required',
        ]);


        if($validator->fails()){

            return view('article.create')->with('errors', $validator->errors() );

        }
 
        $article_input['article_name']            = $input["article_name"];
        $article_input['article_description']     = $input['article_description'];
        $article_input['author_id']                  = Auth::id();

        $article_result                   = Article::create($article_input);


        return redirect()->route('articles')
                        ->with('success','Article added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $article = Article::find(['id' => $id])->first();       
 
        return view('show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Article $article)
    {
        //

        $article = Article::find(['id' => $request->id])->first(); 
 
        return view('edit', compact('article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
        
        $input          = $request->all();

        $validator = Validator::make($input, [
            'article_name' => 'required',
            'article_description' => 'required',
        ]);


        if($validator->fails()){
        
            return redirect()->route('dashboard')->with('errors', $validator->errors() );

           // return view('dashboard')->with('errors', $validator->errors() );
        }


        $article_input['article_name']            = $input["article_name"];
        $article_input['article_description']     = $input['article_description'];
        $article_input['author_id']               = Auth::id();

        //$user_inputs['user_type_id']   = 2;

        Article::where('id', $request->id)->update($article_input);
       
        return redirect()->route('articles')
                        ->with('success','Article updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        //
        $id = $request->id;

        $article = Article::find( $id );

        $article->delete();
 
        return redirect()->route('dashboard')
                        ->with('success','Article deleted successfully');

    }
}
