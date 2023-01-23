<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    protected $path = '/master/rak';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->shelf->select('id', 'name', 'chest_id')->where('disabled', 0)->get(),
            'chests'        => $this->chest->select('id', 'name')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('masters.shelf.index', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'chest_id'      => $input['chest'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        /* Validation Form */
        $check = $this->shelf->where('name', $input['name'])->where('chest_id', $input['chest'])->where('disabled', 0)->first();
        if ($check) return redirect(url()->previous())->with('error', 'Rak sudah terdaftar pada Lemari yang sama.')->withInput();

        /* Testing with Validation Parameter */
        // $validation = $this->validation_parameter->where('menu_id', $menu->id)->get();
        // $validation_count = $this->validation_parameter->where('menu_id', $menu->id)->count();

        // $expression = $validation[0]->expression;

        // $check = $this->shelf->whereRaw($expression)->first();
        // dd($check);
        // for ($i=0; $i++; $i<$validation_count) 
        // {
        //     if ($validation[$i]->type == 'expression')
        //     {
        //         $check = $this->shelf->whereRaw($validation->expression)->first();
        //         dd($check);
        //         if ($check) return redirect(url()->previous())->with('error', $validation->message)->withInput();
        //     }
        // }

        $this->shelf->insert($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->shelf->select('id', 'name', 'chest_id')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->shelf->select('id', 'name', 'chest_id')->where('disabled', 0)->get(),
            'chests'        => $this->chest->select('id', 'name')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('masters.shelf.index', $data);
    }

    public function edit($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->shelf->select('id', 'name', 'chest_id')->where('id', $id)->where('disabled', 0)->first(),
            'data'          => $this->shelf->select('id', 'name', 'chest_id')->where('disabled', 0)->get(),
            'chests'        => $this->chest->select('id', 'name')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->edit == 0) abort(403);
        
        return view('masters.shelf.index', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $data = [
            'name'          => $input['name'],
            'chest_id'      => $input['chest'],
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];
        
        /* Validation Form */
        $check = $this->shelf->where('name', $input['name'])->where('chest_id', $input['chest'])->where('disabled', 0)->where('id', $id)->first();
        if ($check) return redirect(url()->previous())->with('error', 'Rak sudah terdaftar pada Lemari yang sama.')->withInput();

        $this->shelf->where('id', $id)->update($data);

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->shelf->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
