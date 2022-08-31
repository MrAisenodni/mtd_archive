<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterLocationController extends Controller
{
    protected $path = '/master/lokasi-surat';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->letter_location->select('id', 'name')->where('disabled', 0)->get(),
        ];

        return view('masters.letter_location.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->letter_location->insert($data);

        return redirect(url()->previous())->with('location', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->letter_location->select('id', 'name')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->letter_location->select('id', 'name')->where('disabled', 0)->get(),
        ];
        
        return view('masters.letter_location.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->letter_location->where('id', $id)->update($data);

        return redirect(url()->previous())->with('location', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->letter_location->where('id', $id)->update($data);

        return redirect($this->path)->with('location', 'Data Berhasil Dihapus.');
    }
}
