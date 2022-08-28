<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', '/master/jenis-surat')->first(),
            'data'          => $this->letter_type->select('id', 'name')->where('disabled', 0)->get(),
        ];

        return view('masters.letter_type.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'created_at'    => now(),
            'created_by'    => 'Developer',
        ];

        $this->letter_type->insert($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', '/master/jenis-surat')->first(),
            'detail'        => $this->letter_type->select('id', 'name')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->letter_type->select('id', 'name')->where('disabled', 0)->get(),
        ];
        
        return view('masters.letter_type.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'updated_at'    => now(),
            'updated_by'    => 'Developer',
        ];

        $this->letter_type->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => 'Developer',
        ];

        $this->letter_type->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Dihapus.');
    }
}
