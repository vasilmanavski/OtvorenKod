<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\donation;
use App\Models\User;
use Illuminate\Support\Facades\App;
use DB;
use function PHPUnit\Framework\isEmpty;

class DonationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $donations = Donation::orderBy('resolve', 'desc')->paginate(10);
        $donations = Donation::where('resolve', 0)->paginate(10);

        return view('donations.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('donations.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
           'donation' => 'required',
            'image_path' => 'required',
            'description' => 'required',
            'donated_to' => 'required',
            'request_plea' => 'nullable'
        ]);
        $donation = new donation;
        $donation->donation = $request->input('donation');
        $donation->image_path = $request->input('image_path');
        $donation->description = $request->input('description');
        $donation->donated_to = $request->input('donated_to');
        $donation->user_id = auth()->user()->id;
        if(empty($request->input('request_plea'))){
            $donation->resolve = false;

        }
        else{
            $donation->resolve = true;
        }

        $donation->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
        $donation = Donation::find($id);
        return view('donations.show', compact('donation'));
    }

    public function showForUser()
    {

        $user_id = auth()->user()->id;


        $donations = Donation::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->get();
        return view('donations.showForUser', compact('donations'));
    }

    public function updateResolved(Request $request, $id){
        $this->validate($request,[
            'request_plea' => 'required'
        ]);
        $donation = DB::table('donations')
                        ->where('id','=',$id)
                        ->update(['resolve' => 1]);

        return redirect("/");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
