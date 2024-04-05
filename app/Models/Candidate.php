<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Candidate extends Model
{
    use HasFactory;
    
    public static function index(){
        $users = DB::table('candidates')
        ->whereNULL('is_deleted')
        ->get();
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
        

        $candidate = new candidate;
        $candidate->name=$request->name;
        $candidate->address=$request->address;
        $candidate->country=$request->country;
        $candidate->state=$request->state;
        $candidate->city=$request->city;
        $candidate->gender=$request->gender;
        $candidate->number=$request->number;
        $candidate->age=$request->age;
        $candidate->file=$fileName;
        $candidate->email=$request->email;
        $candidate->password=$request->password;

        $candidate->save();
    }
    public static function edit($id){
        $users = DB::table('candidates')
        ->where('id',$id)
        ->first();

        return $users;
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
}
