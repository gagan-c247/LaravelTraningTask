<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\File;
class TeamController extends Controller
{
    protected $team;
    public function __construct(Setting $team)
    {
       $this->team = $team;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Setting::where('type','team')->get();
        return view('vendor.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.team.create')->with('team',$this->team);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request['user_id'] =  auth()->id();
        $request['type'] = 'team';
        $request['value'] = json_encode([
                                        'twitter'=>$request['twitter'],
                                        'facebook'=>$request['facebook'],
                                        'instagram'=> $request['instagram'],
                                        'linkdin'=>$request['linkdin'] 
                                        ]);

        if($request->hasFile('profile')){
            $data['user_id'] = $request['user_id'];
            $data['type'] = $request->profile->extension();
            $data['filepath'] = $request->profile->getClientOriginalName();
            $file = $request->profile->storeAS('images',$data['filepath'],'public');
            $upload = File::create($data);
            $request['file_id'] = $upload->id;
        }else{
            session()->flash('danger','Choose image profile');
            return redirect()->back()->withInput();
        }
        $team = Setting::create($request->except(['_token','twitter','facebook','instagram','linkdin','profile']));
        return redirect()->route('team.edit',$team->id);
    
                                    
  
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
        $team = Setting::with('file')->find($id);
        return view('vendor.team.create',compact('team'));
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
