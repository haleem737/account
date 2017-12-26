<?php

namespace App\Http\Controllers;
use App\Client;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function index(){
        return view('ajax.index');
    }

    // search for client
    public function findClient(){

        $search = $_GET['query'];
        $clients = Client::where('co_name', 'LIKE','%'.$search.'%')->get();
        
        
        if(count($clients) == 0){
            $searchResult = 'now client found';
        }else{
            foreach($clients as $key =>$value){
                $searchResult[] = $value->co_name;
            }
        }

        return $searchResult;

    }

}
