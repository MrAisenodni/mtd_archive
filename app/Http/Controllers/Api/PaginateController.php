<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaginateController extends Controller
{
    public function get_wards(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $wards = $this->ward->select('id', 'name', 'post_code')->where('disabled', 0)->orderBy('name')->get();
        } else {
            $wards = $this->ward->select('id', 'name', 'post_code')->where('disabled', 0)->where('name', 'LIKE', "%$search%")->orderBy('name')->get();
        }

        $response = array();
        foreach ($wards as $ward) {
            $response[] = array(
                "id"        => $ward->id,
                "name"      => $ward->name,
                "post_code" => $ward->post_code,
            );
        }

        return response()->json($response);
    }
}
