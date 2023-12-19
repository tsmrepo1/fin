<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CmsController extends Controller
{
    public function terms(){
        $result = DB::select("SELECT * FROM cms where id = 1");
        if(sizeof($result)>0){
            $topRow = $result[0];
            $termcond = $topRow->termsncond;
        }else{
            $termcond ="";  
        }
        
        return view('admin.cms.terms', ['cond' => $termcond]);
   }

   public function addterms(Request $rst){
    $result = DB::select("SELECT * FROM cms where id = 1");
    if(sizeof($result)>0){
        $topRow = $result[0];
        $termcond = $topRow->termsncond;

        if($termcond===null){
            $dataToInsert = [
                'termsncond' => $rst->content,
                
            ];
        
            // $query = "INSERT INTO cms (termsncond) 
            //           VALUES (:termsncond)
            //           ORDER BY id ASC";
        
            // // Execute the query with the data bindings
            // DB::insert($query, $dataToInsert);
            DB::table('cms')->insert([
    'termsncond' => $rst->content,
    'id' => 1,]);
        }else{
            DB::update("UPDATE cms SET termsncond = :X where id = 1", ['X' => $rst->content]);
        }
    }else{
        $dataToInsert = [
            'termsncond' => $rst->content,
            
        ];
    
        // $query = "INSERT INTO cms (termsncond) 
        //           VALUES (:termsncond)
        //           ORDER BY id ASC";
    
        // // Execute the query with the data bindings
        // DB::insert($query, $dataToInsert);  
        DB::table('cms')->insert([
    'termsncond' => $rst->content,
    'id' => 1,]);
    }
       
       

       return view("admin.cms.create"); 
   }

   public function priv(){
    $result = DB::select("SELECT * FROM cms where id = 1");
    if(sizeof($result)>0){
        $topRow = $result[0];
        $privacy = $topRow->privacy;
    }else{
        $privacy ="";  
    }
   
    return view('admin.cms.privacy', ['cond' => $privacy]);
}

public function addprivacy(Request $rst){
    $result = DB::select("SELECT * FROM cms where id = 1");
    if(sizeof($result)>0){
        $topRow = $result[0];
        $privacy = $topRow->privacy;
    
        if($privacy===null){
            DB::update("UPDATE cms SET privacy = :X where id = 1", ['X' => $rst->content]);
        }else{
            DB::update("UPDATE cms SET privacy = :X where id = 1", ['X' => $rst->content]);
        }
    }else{
        $dataToInsert = [
            'privacy' => $rst->content,
            
        ];
    
        $query = "INSERT INTO cms (privacy) 
                  VALUES (:privacy)
                  ORDER BY id ASC";
    
        // Execute the query with the data bindings
        DB::insert($query, $dataToInsert);  
    }
    
    return view("admin.cms.create"); 
}
}
