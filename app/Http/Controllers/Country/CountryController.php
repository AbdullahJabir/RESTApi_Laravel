<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
	/*VIEW ALL*/
    public function country(){

    	return response()->json(CountryModel::get(),200);

    }
	/*FIND BY ID*/
    public function countryById($id)
    {
    	$country= CountryModel::find($id);

    	if(is_null($country)){
			return response()->json(["message"=>"Record Not Found"],404); 
			  	}
    	return response()->json($country,200);

    }
    /*FOR SAVE*/

    public function countrySave(Request $request){

    	$rules = [
    		'name'=>'required|min:3',
    		'iso'=>'required|min:2|max:2'
    	];

    	$validator= Validator::make($request->all(),$rules);

    	if($validator->fails()){
    		return response()->json($validator->errors(),400);
    	}

    	$country = CountryModel::create($request->all());

    	return response()->json($country,201); //create 201
    }
	/*FOR UPDATE*/
    public function countryUpdate(Request $request,$id){

    	$country = CountryModel::find($id);

    	if(is_null($country)){
    		return response()->json(["message"=>"Record Not Found"],404); //no content 404
    	}

    	$country->update($request->all());
    	return response()->json($country,200); //ok 200
    }
    /*for delete*/
    public function countryDelete(Request $request,$id){

    	$country = CountryModel::find($id);
    	if(is_null($country)){
    		return response()->json(["message"=>"Record Not Found"],404); 
    	}

    	$country->delete();
    	return response()->json(null,204);

    }
}


