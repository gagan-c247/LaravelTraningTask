<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
{   
    protected $faq;
    public function __construct(FAQ $faq)
    {
        $this->faq =$faq;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQ::orderby('id','desc')->get();
        return view('vendor.FAQs.index',compact('faqs'))->with('faq',$this->faq);
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
    public function store(FaqRequest $request)
    {
        // return $request->all();
        FAQ::Create($request->except(['_token']));
        session()->flash('success','Faq Inserted Successfully!');
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
        $faq = FAQ::find($id);
        $faqs = FAQ::orderby('id','desc')->get();
        return view('vendor.FAQs.index',compact('faq','faqs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        // return $request->all();  
        FAQ::where('id',$id)->update($request->except(['_token','_method']));
        session()->flash('success','Faq Updated Successfully!');
        return redirect()->route('faq.index');  
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
