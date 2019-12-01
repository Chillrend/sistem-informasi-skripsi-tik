<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosbingController extends Controller
{
    public function searchDosbing(Request $request){
        if($request->has('q')){
            $search = $request->q;

            $result = User::where('role', 'pembimbing')->where('email', 'like', '%' . $search . '%')->get();

            return response()->json($result);
        }
    }
}
