<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\{country,state, city};
use Illuminate\Support\Facades\DB;
// use app\Models\Candidate;

class Mycontroller extends Controller
{
    // public function index(){
        //  return view('candidates.index');
        // return view('candidates.index', ['candidates' => Candidate::where('is_deleted', NULL)->get()]);
        // $user1['candidates'] =  $user->index(); 
        // } 
    public function index(){
        // $user=new Candidate;
        $user1['candidates'] =  Candidate::index();
        return view('candidates.index',$user1);
    }

    // public function create(){
        // $data['countries'] = country::get(["name", "id"]);
        // $data['countries'] = Candidate::create();
        // dd($data);
// }
    public function create(){
        
        $data['countries']=Candidate::create();
        // dd($data);
        return view('candidates.create',$data);
    }

    // public function modelCall(){
    
    //     $Candidate= new Candidate();
    //     $id=1;
    //     $data= $Candidate->done($id);
    //     dd($data);
    // }
    public function store(Request $request){
        
        $request->validate([
           'name'=>'required',
           'address'=>'required',
           'country'=>'required',
           'state'=>'required',
           'city'=>'required',
           'gender'=>'required',
           'number'=>'required',
           'age'=>'required',
           'file'=>'required|mimes:jpeg,jpg,png|max:10000',
           'email'=>'required|email',
           'password' => ['required', Password::min(8)->mixedCase()]

        ]);
        $data['candidates']=Candidate::store($request);
        return back()->withSuccess('Candidate registred!!');
    }
        
        // $fileName = time().'.'.$request->file->extension();
        // $request->file->move(public_path('images'),$fileName);
        

        // $candidate = new candidate;
        // $candidate->name=$request->name;
        // $candidate->address=$request->address;
        // $candidate->country=$request->country;
        // $candidate->state=$request->state;
        // $candidate->city=$request->city;
        // $candidate->gender=$request->gender;
        // $candidate->number=$request->number;
        // $candidate->age=$request->age;
        // $candidate->file=$fileName;
        // $candidate->email=$request->email;
        // $candidate->password=$request->password;

        // $candidate->save();
        // $data['candidates']=Candidate::store($request);
        // dd($data);
        // return view('candidates.create',$data);
        // return back()->withSuccess('Candidate registred!!');
        
    

    // public function edit($id){
    //     // $Candidate= new Candidate();
    //     // $data= $Candidate->done($id);
    //     $candidate = Candidate::where('id',$id)->first();
    //     $data['countries'] = country::get(["name", "id"]);
    //     $data['states'] = state::get(["name","id"]);
    //     $data['cities'] = city::get(["name","id"]);
    //             // dd(  $candidate);
    //     return view('candidates.edit',['candidate'=>$candidate],$data);
    // }
    public function edit($id){
        $data['candidate']= Candidate::edit($id);
        $data['countries']=Candidate::create();
        $data['states']=Candidate::allState();
        $data['cities']=Candidate::allCities();
        return view('candidates.edit',$data);

    }
 
    public function update(Request $request,$id){
    //   dd($request);
    // $data['countries'] = country::get(["name", "id"]);
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'gender'=>'required',
            'number'=>'required',
            'age'=>'required',
            'file'=>'nullable|mimes:jpeg,jpg,png|max:10000',
            'email'=>'required|email',
            // 'password'=>'required'
            'password' => ['required', Password::min(8)->mixedCase()]
 
         ]);
 
         $candidate=Candidate::where('id',$id)->first(); 
         if(isset($request->file)){
         $fileName = time().'.'.$request->file->extension();
         $request->file->move(public_path('images'),$fileName);
         $candidate->file=$fileName;
         }
 
         
         $candidate->name=$request->name;
         $candidate->address=$request->address;
         $candidate->country=$request->country;
         $candidate->state=$request->state;
         $candidate->city=$request->city;
         $candidate->gender=$request->input('gender');
         $candidate->number=$request->number;
         $candidate->age=$request->age;
         $candidate->email=$request->email;
         $candidate->password=$request->password;
 
         $candidate->save();
         return back()->withSuccess('Candidate info updated!!');     
    }
    // public function destroy($id){
        // $candidate = Candidate::where('id',$id)->first();
        // $candidate->is_deleted = 1;
        // 
        // $candidate->save();
        // return back();
    // }
    public function desrtoy($id){
        $data['candidates']=Candidate::dest($id);
        return back();
    }

    // public function country()
    // {
    //     $data['countries'] = country::get(["name", "id"]);
    //     dd($data);
    //     return view('candidates.create', $data);
    // }
    // public function fetchState(Request $request)
    // {
    //     $data['states'] = state::where("country_id",$request->country_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }
    public function fetchState(Request $request)
    {
        // dd($request);
        $data['states'] = Candidate::state($request->country_id);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities']= Candidate::city($request->state_id);
        return response()->json($data);
    }
    
    //public function fetchCity(Request $request)
    // {
    //     $data['cities'] = city::where("state_id",$request->state_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }
//     function dbtest(){
//         $users=
        
//         DB::table('candidates')
//         ->join('state','country.id','state.country_id');
//         // ->get();
//         dd($users);    
// }
}




