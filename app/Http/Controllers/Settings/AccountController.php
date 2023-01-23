<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    protected $path = '/pengaturan/akun-login';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->login->select('id', 'username', 'user_id')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('settings.login.index', $data);
    }

    public function create()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'users'         => $this->user->select('id', 'nik', 'full_name', 'email', 'position_id')->where('disabled', 0)->get()
        ];
        $data['access'] = $this->menu_access->select('add')->where('disabled', 0)->where('submenu_id', $data['menu']->id)->where('login_id', session()->get('sid'))->first();
        if (!$data['access']) abort(403);
        if ($data['access']->add == 0) abort(403);

        return view('settings.login.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'user'              => 'required|unique:stg_login,user_id,1,disabled',
            'username'          => 'required',
            'password'          => 'required',
            'repassword'        => 'required',
        ]);

        if ($input['password'] != $input['repassword']) return redirect(url()->previous())
            ->withInput()->with('error', 'Kata Sandi yang dimasukkan tidak sama.')
            ->with('field', 'password');

        $data = [
            'username'      => $input['username'],
            'password'      => Hash::make($input['password']),
            'user_id'       => $input['user'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->login->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->login->select('id', 'username', 'password', 'user_id')->where('id', $id)->where('disabled', 0)->first(),
            'users'         => $this->user->select('id', 'nik', 'full_name', 'email', 'position_id')->where('disabled', 0)->get()
        ];
        $data['access'] = $this->menu_access->select('detail')->where('disabled', 0)->where('submenu_id', $data['menu']->id)->where('login_id', session()->get('sid'))->first();
        if (!$data['access']) abort(403);
        if ($data['access']->detail == 0) abort(403);
        
        return view('settings.login.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->login->select('id', 'username', 'password', 'user_id')->where('id', $id)->where('disabled', 0)->first(),
            'users'         => $this->user->select('id', 'nik', 'full_name', 'email', 'position_id')->where('disabled', 0)->get()
        ];
        $data['access'] = $this->menu_access->select('edit')->where('disabled', 0)->where('submenu_id', $data['menu']->id)->where('login_id', session()->get('sid'))->first();
        if (!$data['access']) abort(403);
        if ($data['access']->edit == 0) abort(403);
        
        return view('settings.login.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        if ($request->delete) {
            $data = [
                'disabled'      => 1,
                'updated_at'    => now(),
                'updated_by'    => session()->get('user_id'),
            ];
    
            $this->login->where('id', $id)->update($data);
    
            return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
        } else {
            $validate = $request->validate([
                'user'              => 'required|unique:stg_login,user_id,'.$id.',id,disabled,0',
                'username'          => 'required',
                'password'          => 'required',
                'repassword'        => 'required',
            ]);

            if ($input['password'] != $input['repassword']) return redirect(url()->previous())
                ->withInput()->with('error', 'Kata Sandi yang dimasukkan tidak sama.')
                ->with('field', 'password');
    
            $data = [
                'username'      => $input['username'],
                'password'      => Hash::make($input['password']),
                'user_id'       => $input['user'],
                'created_at'    => now(),
                'created_by'    => session()->get('user_id'),
            ];
    
            $this->login->where('id', $id)->update($data);
        }

        return redirect(url()->previous())->with('status', 'Data Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $data = [
            'disabled'      => 1,
            'updated_at'    => now(),
            'updated_by'    => session()->get('user_id'),
        ];

        $this->login->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
