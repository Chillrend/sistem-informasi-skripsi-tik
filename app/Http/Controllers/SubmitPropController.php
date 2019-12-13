<?php


namespace App\Http\Controllers;


use App\Mail\SendMail;
use App\Proposal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            'pembimbing' => ['required', 'string']
        ]);

        $prop = new Proposal();

        $prop -> fill($request -> all());
        $prop -> mahasiswa = Auth::user()->identifier;
        $prop -> save();

        $palindrome = User::where('identifier', $prop->pembimbing)->first();

        Mail::to($palindrome->email)->send(new SendMail($prop));

        return Redirect::to("submit_prop")->with('message', 'Berhasil! langkah selanjutnya adalah : Berdoa supaya proposal diterima oleh panitia dan Dosbing :)');
    }
}
