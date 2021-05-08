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
