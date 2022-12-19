<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetentionController extends Controller
{
    protected $path = '/master/retensi';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->retention->select('id', 'time', 'type')->where('disabled', 0)->get(),
        ];

        return view('masters.retention.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'time'              => 'required',
            'type'              => 'required',
        ]);

        $data = [
            'time'          => $input['time'],
            'type'          => $input['type'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->retention->insert($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->retention->select('id', 'time', 'type')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->retention->select('id', 'time', 'type')->where('disabled', 0)->get(),
        ];
        
        return view('masters.retention.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = $request->validate([
            'time'              => 'required',
            'type'              => 'required',
        ]);

        $data = [
            'time'          => $input['time'],
            'type'          => $input['type'],
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->retention->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->retention->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
