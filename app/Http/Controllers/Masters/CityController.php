<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $path = '/master/kota';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->city->select('id', 'code', 'name', 'province_id')->where('disabled', 0)->get(),
            'provinces'     => $this->province->select('id', 'code', 'name')->where('disabled', 0)->get(),
        ];

        return view('masters.city.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'code'              => 'required|unique:mst_city,code,1,disabled',
            'name'              => 'required',
            'province'           => 'required',
        ]);

        $data = [
            'code'          => $input['code'],
            'name'          => $input['name'],
            'province_id'    => $input['province'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->city->insert($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->city->select('id', 'code', 'name', 'province_id')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->city->select('id', 'code', 'name', 'province_id')->where('disabled', 0)->get(),
            'provinces'     => $this->province->select('id', 'code', 'name')->where('disabled', 0)->get(),
        ];
        
        return view('masters.city.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = $request->validate([
            'code'              => 'required|unique:mst_city,code,'.$id.',id,disabled,1',
            'name'              => 'required',
            'province'           => 'required',
        ]);

        $data = [
            'code'          => $input['code'],
            'name'          => $input['name'],
            'province_id'    => $input['province'],
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->city->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->city->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
