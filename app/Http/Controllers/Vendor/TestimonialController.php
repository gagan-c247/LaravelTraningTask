<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use App\File;
use App\Http\Requests\TestimonialRequest;
class TestimonialController extends Controller
{
    public function __construct(Testimonial $testimonial){
        $this->testimonial = $testimonial;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('vendor.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.testimonial.create')->with('testimonial',$this->testimonial);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        // return $request->all();
        $request['user_id']=auth()->id();
        if($request->hasFile('profile_image')){
            $data['user_id'] = $request['user_id'];
            $data['type'] = $request->profile_image->extension();
            $data['filepath'] = $request->profile_image->getClientOriginalName();
            $file = $request->profile_image->storeAS('images',$data['filepath'],'public');
            $upload = File::create($data);
            $request['file_id'] = $upload->id;
        }else{
            session()->flash('danger','Choose image blog');
            return redirect()->back()->withInput();
        }

        Testimonial::create($request->except(['_token','profile_image']));
        session()->flash('success','Inserted Sucessfully');
        return redirect()->back();
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
        $testimonial = $this->testimonial->with('file')->find($id);
        return view('vendor.testimonial.create',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        // return $request->all();
        if($request->hasFile('profile_image')){
            $data['user_id'] = $request['user_id'];
            $data['type'] = $request->profile_image->extension();
            $data['filepath'] = $request->profile_image->getClientOriginalName();
            $file = $request->profile_image->storeAS('images',$data['filepath'],'public');
            $upload = File::create($data);
            $request['file_id'] = $upload->id;
        }
        
        Testimonial::where('id',$id)->update($request->except(['_token','_method','profile_image']));
        session()->flash('success','Updated Sucessfully');
        return redirect()->back();
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
