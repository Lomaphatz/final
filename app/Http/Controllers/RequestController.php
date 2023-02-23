<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaRequest;
use App\Models\Course;
use App\Models\User;
use Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $reqs = TaRequest::where('user_id',$user_id)->get();
        return view('request.index', compact('reqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $reqs = TaRequest::all();
        $courses = Course::all();
        $users = User::all();
        return view('layouts.student.form',compact('courses','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
        $user_id = Auth::user()->id;
         $request = TaRequest::create([
                'request_id' => $request->request_id,
                'detail' => $request->detail,
                'user_id' => $user_id,
                'course_id' => $request->course_id,
         ]);


        // $request->validate([
        //     'request_id' => 'required',
        //     'detail' => 'required',
        //     'user_id' => 'required',
        //     'course_id' => 'required',
        // ]);
        // $reqs = new TaRequest([
        //     'request_id' => $request->get('request_id'),
        //     'detail' => $request->get('detail'),
        //     'user_id' => $user_id,
        //     'course_id' => $request->get('course_id'),
            
        // ]);
        // $reqs->save();
        return redirect()->route('request.index')->with('success', 'Data saved.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request_id)
    {
        $req = TaRequest::where('request_id',$request_id)->first();
        $courses = Course::all();
        $users = User::all();
        return view('layouts.student.edit', compact('courses','users','req'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_id)
    {
        //dd('$req');
        $request->validate([
            'detail' => 'required',
            'course_id' => 'required',
        ]);
            $reqs = TaRequest::find($request_id);
            $reqs->detail = $request->get('detail');
            $reqs->course_id = $request->get('course_id');
            $reqs->save();

            
        
        return redirect()->route('request.index')->with('success', 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reqs = TaRequest::find($id);
        $reqs->delete();
        
        return redirect()->back()('success','Data removed.'); 
    }

    
}
