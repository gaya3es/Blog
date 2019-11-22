<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    public function index()
    {
        // $posts= Post::all();
        // to arrange it in order 
           // $posts=Post::orderBy('created_at','DESC')->get();
          //  pagination 
          $posts=Post::orderBy('created_at','DESC')->paginate(4);
          // $post=Post::where('active',1)->get();
          //different methods to retrieve data
        //   $posts=Post::orderBy('created_at','DESC')->take(2)->get();
          // $posts=Post::where('title','blog three')-> get();
         // $posts=DB::select('select * from posts');
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'ttl'=>'required',
            'bdy'=>'required',
            'cover_image'=>'image|mimes:jpeg,jpg,png|nullable|max:200000'
        ]);
        //to handle fime upload
        
        if($request->hasFile('cover_image'))
        {
            //get complete file name with extension
        $filenamewithextension=$request->file('cover_image')->getClientOriginalName();
        //get file name
        $filename=pathinfo($filenamewithextension,PATHINFO_FILENAME);
        //get extension
        $extension=$request->file('cover_image')->getClientOriginalExtension();
        // file name to store if multiple files have same name-> along with the time
        $filenametostore=$filename.'_'.time().'.'.$extension;
        //upload image 
        // store image to db,and upload image to the folder in hard disc(public/storage/cover_images)
       // $path=$request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
       Storage::disk('s3')->put($filenametostore,fopen($request->file('cover_image'),'r+'),'public');
        }
        //if no image selected
        else
        {

            $filenametostore='noimage.jpg';

        }

      $post=new Post();
      $post->title=$request->input('ttl');
      $post->body=$request->input('bdy');
      $post->user_id=Auth()->user()->id;
      $post->cover_image=$filenametostore;
      $post->save();
      return redirect('/dashboard')->with('success','Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Post::find($id);
        $path="https://g-imagesbucket.s3.ap-south-1.amazonaws.com";
        $data=array("post"=>$post,"path"=>$path);
        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id!==$post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized Page!!!!');
        }
        return view('posts.edit')->with('post',$post);
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
        $this->validate($request,[

           // 'ttl'=>'required',
            //'bdy'=>'required',
            'cover_image'=>'image|mimes:jpeg,jpg,png|nullable|max:200000'
        ]);
        $post=Post::find($id);

      $post->title=$request->input('ettl');
      $post->body=$request->input('ebdy');

      if($request->hasFile('cover_image'))
      {
          //get complete file name with extension
      $filenamewithextension=$request->file('cover_image')->getClientOriginalName();
      //get file name
      $filename=pathinfo($filenamewithextension,PATHINFO_FILENAME);
      //get extension
      $extension=$request->file('cover_image')->getClientOriginalExtension();
      // file name to store if multiple files have same name-> along with the time
      $filenametostore=$filename.'_'.time().'.'.$extension;
      //upload image 
      // store image to db,and upload image to the folder in hard disc(public/storage/cover_images)
     // $path=$request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
     Storage::disk('s3')->put($filenametostore,fopen($request->file('cover_image'),'r+'),'public');  
    }
      //if no image selected
      else
      {

          $filenametostore='noimage.jpg';

      }
      $post->cover_image=$filenametostore;
      $post->save();

      return redirect('/dashboard')->with('success','Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id!==$post->user_id)
        {
        return redirect('/posts')->with('error','Unauthorized Page');
    }
        $post->delete();
        return redirect('/dashboard')->with('success','Post deleted');
    }
}
