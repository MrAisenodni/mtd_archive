<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $path = '/master/provinsi';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->province->select('id', 'code', 'name', 'country_id')->where('disabled', 0)->get(),
            'countries'     => $this->country->select('id', 'code', 'name')->where('disabled', 0)->get(),
        ];

        return view('masters.province.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'code'              => 'required|unique:mst_province,code,1,disabled',
            'name'              => 'required',
            'country'           => 'required',
        ]);

        $data = [
            'code'          => $input['code'],
            'name'          => $input['name'],
            'country_id'    => $input['country'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->province->insert($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->province->select('id', 'code', 'name', 'country_id')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->province->select('id', 'code', 'name', 'country_id')->where('disabled', 0)->get(),
            'countries'     => $this->country->select('id', 'code', 'name')->where('disabled', 0)->get(),
        ];
        
        return view('masters.province.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = $request->validate([
            'code'              => 'required|unique:mst_province,code,'.$id.',id,disabled,1',
            'name'              => 'required',
            'country'           => 'required',
        ]);

        $data = [
            'code'          => $input['code'],
            'name'          => $input['name'],
            'country_id'    => $input['country'],
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->province->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->province->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
