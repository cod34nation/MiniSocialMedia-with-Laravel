<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Tes;

use Auth;

use DB;


class ArticleController extends Controller
{
     protected $date;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // DB::table('post')->orderBy('id', 'desc')->pluck('title');
         //return Tes::all();
        //$tes = Tes::all();
       // $articles = DB::table('articles');
        $articles = Article::orderBy('id','desc')->paginate(10);
       // $articles = Article::onlyTrashed()->paginate(10); //untuk menampilkan artikel yang sudah dihapus
       // $articles = Article::all();
         //$articles = DB::table('articles')->get();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $article = new Article;
        // $article->user_id = Auth::user()->id;
        // $article->content = $request->content;
        // $article->post_on = $request->post_on;
        // $article->live = (boolean)$request->live;
 $create= Article::create($request->all());

        if ($create) {
            
            return $this->index();
        }
        else{
             echo "Error";
        }

        // DB::table('articles')->insert($request->except('_token'));

        // Article::create([

        //             'user_id'=>Auth::user()->id,
        //             'content'=>$request->content,

        //     ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $article = Article::findOrFail($id);
       return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);
        if(!isset($request->live))
             $article->update(array_merge($request->all(),['live'=>false]));
        

        else
            $article->update($request->all());
        
       
        return redirect('/articles');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Article::destroy($id);
        //$article->forceDelete()

        return redirect('/articles');

    }
}
