<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterStatusController extends Controller
{
    protected $path = '/master/status-surat';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->letter_status->select('id', 'name', 'back_color', 'fore_color', 'main_status')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('masters.letter_status.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'back_color'    => $input['back_color'],
            'fore_color'    => $input['fore_color'],
            'main_status'   => 0,
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ]; 
        if ($request->main_status) $data['main_status'] = 1;
        
        $check_main_status = $this->letter_status->select('main_status')->where('main_status', $data['main_status'])->where('disabled', 0)->first();
        if ($check_main_status['main_status'] == 1) {
            return redirect(url()->previous())->withInput()->with('error', 'Status Utama tidak boleh lebih dari satu.');
        }

        $this->letter_status->insert($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->letter_status->select('id', 'name', 'back_color', 'fore_color', 'main_status')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->letter_status->select('id', 'name', 'back_color', 'fore_color', 'main_status')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('masters.letter_status.index', $data);
    }

    public function edit($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->letter_status->select('id', 'name', 'back_color', 'fore_color', 'main_status')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->letter_status->select('id', 'name', 'back_color', 'fore_color', 'main_status')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('masters.letter_status.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'back_color'    => $input['back_color'],
            'fore_color'    => $input['fore_color'],
            'main_status'   => 0,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];
        if ($request->main_status) $data['main_status'] = 1;

        $check_main_status = $this->letter_status->select('id', 'main_status')->where('main_status', $data['main_status'])->where('disabled', 0)->first();
        if ($check_main_status['main_status'] == 1 && $check_main_status['id'] != $id) {
            return redirect(url()->previous())->withInput()->with('error', 'Status Utama tidak boleh lebih dari satu.');
        }

        $this->letter_status->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->letter_status->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
