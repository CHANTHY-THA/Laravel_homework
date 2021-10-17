<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profile::with(['user'])->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pro = new Profile();
        $pro->user_id = $request->user_id;
        $pro->image = $request->image;
        $pro->city = $request->city;

        $pro->save();
        return response()->json('Created Profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Profile::findOrFail($id);
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
        $profile = Profile::findOrFail($id);
        $profile->user_id = $request->user_id;
        $profile->image = $request->country;
        $profile->city = $request->city;
        $profile->save();

        return response()->json(['message' =>'Update Profile', 'data' => $profile], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Profile::destroy($id);
        if($isDeleted == 1) {
            return response()->json(['message' => 'deleted'], 200);
        }else{
            return response()->json(['message' => 'ID NOT FOUND'], 404);
        }
    }
}
