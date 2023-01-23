<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $path = '/master/departemen';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->department->select('id', 'code', 'name', 'group_id', 'user_id')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('masters.department.index', $data);
    }

    public function create()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'groups'        => $this->department_group->select('id','name')->where('disabled', 0)->get(),
            'managers'      => $this->user->select('id','full_name')->where('disabled', 0)->get(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0) abort(403);

        return view('masters.department.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'code'              => 'required|unique:mst_department,code,1,disabled',
            'name'              => 'required',
            'group'             => 'required',
        ]);

        $data = [
            'code'          => $input['code'],
            'name'          => $input['name'],
            'group_id'      => $input['group'],
            'user_id'       => $input['manager'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->department->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'groups'        => $this->department_group->select('id','name')->where('disabled', 0)->get(),
            'managers'      => $this->user->select('id','full_name')->where('disabled', 0)->get(),
            'detail'        => $this->department->select('id', 'code', 'name', 'group_id', 'user_id')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('masters.department.show', $data);
    }

    public function edit($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'groups'        => $this->department_group->select('id','name')->where('disabled', 0)->get(),
            'managers'      => $this->user->select('id','full_name')->where('disabled', 0)->get(),
            'detail'        => $this->department->select('id', 'code', 'name', 'group_id', 'user_id')->where('id', $id)->where('disabled', 0)->first(),
        ];
        $data['access'] = $this->menu_access->select('view', 'add', 'edit', 'delete', 'detail')->where('disabled', 0)
            ->where('login_id', session()->get('sid'))->where('submenu_id', $data['menu']->id)->first();
        if ($data['access']->view == 0 || $data['access']->detail == 0) abort(403);
        
        return view('masters.department.edit', $data);
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
    
            $this->department->where('id', $id)->update($data);
    
            return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
        } else {
            $validate = $request->validate([
                'code'              => 'required|unique:mst_department,code,'.$id.',id,disabled,1',
                'name'              => 'required',
                'group'             => 'required',
            ]);
    
            $data = [
                'code'          => $input['code'],
                'name'          => $input['name'],
                'group_id'      => $input['group'],
                'user_id'       => $input['manager'],
                'updated_at'    => now(),
                'updated_by'    => session()->get('user_id'),
            ];
    
            $this->department->where('id', $id)->update($data);
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

        $this->department->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
