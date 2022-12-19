<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = $this->province->select('id', 'name', 'country_id')->where('disabled', 0)->orderBy('name')->get();

        $response = array();
        foreach ($provinces as $province) {
            $response[] = array(
                "id"            => $province->id,
                "name"          => $province->name,
                "country_id"   => $province->country_id,
            );
        }

        return response()->json($response);    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinces = $this->province->select('id', 'name', 'country_id')->where('disabled', 0)->where('country_id', $id)->orderBy('name')->get();

        $response = array();
        foreach ($provinces as $province) {
            $response[] = array(
                "id"            => $province->id,
                "name"          => $province->name,
                "country_id"   => $province->country_id,
            );
        }

        return response()->json($response);
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
