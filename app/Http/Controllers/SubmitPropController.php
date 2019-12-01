<?php


namespace App\Http\Controllers;


use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SubmitPropController extends Controller
{

    /**
     * SubmitPropController constructor.
     */
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function index(){
        return view('submit_prop');
    }


    public function store(Request $request){
        $this->validate($request,[
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'abstrak' => ['required', 'string', 'min:50'],
            'pembimbing' => ['required', 'email']
        ]);

        $prop = new Proposal();

        $prop -> fill($request -> all());
        $prop -> mahasiswa = Auth::user()->email;
        $prop -> save();
        return Redirect::to("submit_prop")->withSuccess('Great! Form successfully submit with validation.');
    }
}
