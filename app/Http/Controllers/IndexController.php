<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $user = Auth()->user();
        $auths = null;
        if($user){
            $auths = $user->auths()->get();
        }
        return view('index', [
            'auths' => $auths,
        ]);
    }
}
