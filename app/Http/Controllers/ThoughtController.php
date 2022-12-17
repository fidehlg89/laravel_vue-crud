<?php

namespace App\Http\Controllers;

use App\Models\Thought;
use App\Thought as AppThought;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Thought::where('user_id', auth()->id())->get()
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thought = new Thought();
        $thought->description = $request->description;
        $thought->user_id = auth()->id();
        $thought->save();

        return $thought;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thought  $thought
     * @return \Illuminate\Http\Response
     */
    public function show(Thought $thought)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thought  $thought
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thought $thought)
    {
        $thought = Thought::find($id);
        $thought->description = $request->description;
        $thought->save();

        return $thought;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thought  $thought
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thought $thought)
    {
        $thought->delete();
    }
}
