<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Roles::with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Roles();
        $role->user_id = $request->user_id;
        $role->role = $request->role;
        $role->status = $request->status;

        $role->save();
        return response()->json('Created role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Roles::findOrFail($id);
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
        $role = Roles::findOrFail($id);
        $role->user_id = $request->user_id;
        $role->role = $request->role;
        $role->status = $request->status;
        $role->save();

        return response()->json(['message' =>'Update Profile', 'data' => $role], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Roles::destroy($id);
        if($isDeleted == 1) {
            return response()->json(['message' => 'deleted'], 200);
        }else{
            return response()->json(['message' => 'ID NOT FOUND'], 404);
        }
    }
}
