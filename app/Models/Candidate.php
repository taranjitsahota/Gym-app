<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class Candidate extends Model
{
    use HasFactory;
    
    public static function index(){
        $users = DB::table('candidates')
        ->select("candidates.*","countries.name as Countries_name","states.name as state_name","cities.name as city_name")
        
        ->join('countries','countries.id','=','candidates.country')
        ->join('states','states.id','=','candidates.state')
        ->join('cities','cities.id','=','candidates.city')

        // ->join('states','countries.id','=','states.country_id')
        // ->join('cities','states.id','=','cities.state_id')

        // ->select('candidates.*','states.name as states_name')
        ->whereNULL('is_deleted')
        ->get();
        // dd($users);
        return $users;
        // return view('candidates.index');
    }
    public static function create(){
        $users = DB::table('countries')
        ->select('name','id') 
        ->get();
        // dd("hellloo");
        return $users;
    }
    // public static function done($id){
    //     $users = DB::table('candidates')
    //     ->where('id',$id)
    //     ->get();
    //     return    $users;
    // }
    public static function store($request){
        // $users = DB::table('countries');
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('images'),$fileName);
        
        $data=array(
            
            // "id"=>$request->id,
            "name"=>$request->name,
            "address"=>$request->address,
            "country"=>$request->country,
            "state"=>$request->state,
            "city"=>$request->city,
            "gender"=>$request->gender,
            "number"=>$request->number,
            "age"=>$request->age,
            "file"=>$fileName,
            // "file"=>$request->fileName,
            "email"=>$request->email,
            "password"=>$request->password
        );

        $data = DB::table('candidates')
        
        ->insert($data);

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

        
    }
    public static function edit($id){
        $users = DB::table('candidates')
        ->where('id',$id)
        ->first();

        return $users;
    }
    public static function allState(){
        $users = DB::table('states')
        ->get();
        return $users;
    }
    public static function allCities(){
        $users = DB::table('cities')
        ->get();
        return $users;
    }
    public static function update1($request,$id){
        // dd($request->id);
        // $id=id;
        // if($requestArray['file']==null){
            //     unset($requestArray['file']);
            // }   else{
                //     // dd($request->file);
                //     $fileName = time().'.'.$request->file->extension();
                //     $request->file->move(public_path('images'),$fileName);
                // }   
                
        // $requestArray=$request->all();
        // $id= $requestArray['id'];
        // unset($requestArray['_token']);
        // unset($requestArray['id']);
        // unset($requestArray['_method']);
         if(isset($request->file)){
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('images'),$fileName);
            
            }
       
        $data=array(
            
            "id"=>$request->id,
            "name"=>$request->name,
            "address"=>$request->address,
            "country"=>$request->country,
            "state"=>$request->state,
            "city"=>$request->city,
            "gender"=>$request->gender,
            "number"=>$request->number,
            "age"=>$request->age,
            "file"=>$fileName,
            "email"=>$request->email
        );
        // dd($request->file);
        // $candidate=Candidate::where('id',$id)->first();
        // if(isset($request->file)){
        //     $fileName = time().'.'.$request->file->extension();
        //     $request->file->move(public_path('images'),$fileName);
        //     $candidate->file=$fileName;
        //     }
        //     $candidate->save();
            
        
         
        $data = DB::table('candidates')
        ->where('id',$id)
        ->update($data);
        
       
        
     return 'done';

        //  if(isset($request->file)){
        //  $fileName = time().'.'.$request->file->extension();
        //  $request->file->move(public_path('images'),$fileName);
        //  $candidate->file=$fileName;
        //  }
 
         
        //  $candidate->name=$request->name;
        //  $candidate->address=$request->address;
        //  $candidate->country=$request->country;
        //  $candidate->state=$request->state;
        //  $candidate->city=$request->city;
        //  $candidate->gender=$request->input('gender');
        //  $candidate->number=$request->number;
        //  $candidate->age=$request->age;
        //  $candidate->email=$request->email;
        //  $candidate->password=$request->password;
 
        //  $candidate->save();
        //  return back()->withSuccess('Candidate info updated!!');    
       
        // return $users;





        
    }
    public static function dest($id){
        // dd($id);
           $users = DB::table('candidates')
           ->where('id',$id)
           ->update(["is_deleted"=>1]);
        //    dd( $users);
           return $users;
    }
    public static function state($country_id){
        $users = DB::table('states')
        ->where('country_id', $country_id)
        ->get();
        return $users;
    }
    public static function city($state_id){
        $users = DB::table('cities')
        ->where('state_id', $state_id)
        ->get();
        return $users;
    }
    public static function loginPost($request){
// dd($request->all());
        // $data=array(
        //     // "id"=>$request->id,
        //     "email"=>$request->input('email'),
        //     "password"=>$request->input('password')
        // );


        $email = $request->input('email');
    $password = $request->input('password');
        // if(('email' == 'email') && (Hash::make('password') == 'password')) {

            $users=DB::table('users')
            ->where('email',$email)->first();
            
            // return $users;
            if ($users) {
                // Verify the password by comparing the hashed input password with the hashed password from the database
                if (Hash::check($password, $users->password)) {
                    // Passwords match, return the user data or do whatever is needed for successful login
                    // return $users;
                    return 1;
                } else {
                    return 0;
                    // Passwords don't match, handle invalid credentials
                    // return response()->json(['error' => 'Invalid email or password'], 401);
                }
            } else {
                return 0; 
                // User not found, handle accordingly
                // return response()->json(['error' => 'User not found'], 404);
            }
    }
    // public static function join(){
    //     $users = DB::table('countries')
    //     ->join('states','countries.id','=','states.country_id')
    //     ->select('states.*','countries.*')
    //     ->get();
    // // $users = "hello";
    // // dd($users);
    // return $users;
    // }
}

