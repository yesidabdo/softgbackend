<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class BaseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public  function  create(Request $request){
            
        $data = $request ->json()->all();    
        
            $action = $request->route()->getAction();
            $class = $action["class"];
            $entity = new $class();
            
            //return response()->json($data,200);
            
            
        try{            
            $entity->fill($data);
            $entity->save();
            return response()->json($entity,200);
        }catch(\Exception $e){
            
            return response()->json("{$e}");
        }
                          
    }

    public function findAll(Request $request){
        $action = $request->route()->getAction();
        $class = $action["class"];
        $with = $action["with"]??'';
        $fks = explode(',', $with);

           
        if($with){
            
            $entity = $class::with($fks)->get();

        }else{
            $entity = $class::all();
        }
        
        

        return response()->json($entity,200);
        //return response()->json(['status'=> 'ok','data'=>$entity],200);
    }

    function find(Request $request, $id){
        
        $action = $request->route()->getAction();
        $class = $action["class"];
        $with = $action["with"]??'';
        $fks = explode(',', $with);

           
        if($with){
            
            $entity= $class::with($fks)->where('id',$id)->get();

        }else{
            $entity = $class::find($id);
        }

        return response()->json($entity[0],200);
    }

    public  function update(Request $request, $id){
            
        $data = $request ->json()->all();    
        $action = $request->route()->getAction();
        $class = $action["class"];
        $entity= $class::find($id);
    
        try{
            $entity->update($data);            
            $entity->save();
    
            return response()->json($entity,200);


        }catch(\Exception $e){
            
            return response()->json("{error}");
        }
         
            
    }

    function delete(Request $request, $id){

        $action = $request->route()->getAction();
        $class = $action["class"];
        

        try{
            
            $entity = $class::destroy($id);              
            $entity= $class::all();
            return response()->json($entity,200);



        }catch(\Exception $e){
            
            return response()->json("{error}");
        }
         
        
    }



}



