<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use App\Category;
use App\Testimonial;
use App\FAQ;
use App\Setting;
use DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::with('file')->get();
        $recentblogs = Blog::orderby('id','desc')->with('file','blogcategory')->take(3)->get();
        $faqs = FAQ::get();
        $services = Setting::where('type','service')->first();
        $price = Setting::where('type','price')->first();
        $value = Setting::where('type','our_values')->first();
        $about = Setting::where('type','about')->first();
        $teams =   Setting::where('type','team')->get();
        return view('vendor.welcome',compact('recentblogs','testimonials','faqs','services','price','value','about','teams'));
    }

    public function blog(){
        $blogs = Blog::orderby('id','desc')->with('file','blogcategory')->paginate(4);
        $allcategory = Category::with('blog')->get();
        $recentblogs = Blog::orderby('id','desc')->with('file','blogcategory')->take(3)->get();
        return view('vendor.blog.blog',compact('blogs','allcategory','recentblogs'));
    }

    public function singleblog($slug){
        $blog = Blog::where('slug',$slug)->with('file','blogcategory','comment','user')->first();
        $allcategory = Category::with('blog')->get();
        $recentblogs = Blog::orderby('id','desc')->with('file','blogcategory')->take(3)->get();
        return view('vendor.blog.singleblog',compact('blog','allcategory','recentblogs'));
    }

    public function blogCategory($id){
        // return $id;
        $allcategory  = Category::get();
        $recentblogs = Blog::orderby('id','desc')->with('file','blogcategory')->take(3)->get();
        $blogCategory = Category::find($id);
        $blogs = $blogCategory->blog()->paginate(3);
        return view('vendor.blog.categoryblog',compact('blogs','blogCategory','allcategory','recentblogs'));
    }


    public function blogsearch(Request $request){
        // return $request->all();
        
        if($request->ajax()){
            $output = '';
            $query = $request->search;
            if($query != '')
            {
                $data = DB::table('blogs as b')
                    ->select('b.id','b.title','b.content','b.slug','f.filepath')
                    ->leftjoin('files as f', 'f.id','=','b.file_id')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('blogs')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $blog)
                {
                    $output .= '<article class="entry">';
                    $output .=      '<div class="entry-img">';
                    $output .=          '<img src="'.'/storage/images/'.$blog->filepath.'" alt="" class="img-fluid">';
                    $output .=      '</div>';
                    $output .=       '<h2 class="entry-title">';     
                    $output .=          '<a href="'.route('singleblog',$blog->slug).'">'.$blog->title ?? 'title not found'.'</a>';
                    $output .=        '</h2>';
                    $output .=        '<div class="entry-meta">';
                    $output .=          '<ul>';
                    $output .=              '<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li>';
                    $output .=              '<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>';
                    $output .=              '<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>';
                    $output  .=         '</ul>';
                    $output .=      '</div>';
                    $output .=      '<div class="entry-content">';
                    $output .=          '<p>';
                    $output .=              "$blog->content ?? ''";
                    $output .=          '</p>';
                    $output .=          '<div class="read-more">';
                    $output .=              '<a href="'.route('singleblog',$blog->slug).'">Read More</a>';
                    $output .=           '</div>';
                    $output .=      '</div>';
                    $output .='</article>';
                }
            }
            else
            {
                $output = '
                <article class="entry">

                    <div class="entry-img">
                        <img src="https://image.shutterstock.com/image-illustration/question-mark-3d-gold-yellow-260nw-719478730.jpg" alt="" class="img-fluid">
                    </div>
                
                    <h2 class="entry-title">
                         <a href="" > No Blog Present yet</a>
                    </h2>
                </article>
                ';
            }
            echo json_encode(['blog'=>$output,'status'=>'success']);
        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
