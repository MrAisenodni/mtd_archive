<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IncomingMailController extends Controller
{
    protected $path = '/manajemen/surat-masuk';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->incoming_mail->select('id', 'letter_title', 'letter_no', 'letter_date', 'letter_place', 'sender_name', 'sender_position', 'letter_appendix', 'letter_status_id', 'letter_type_id', 'letter_file')->where('disabled', 0)->get(),
        ];

        return view('transactions.incoming_mail.index', $data);
    }

    public function create()
    {
        $data = [
            'menu'              => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'letter_types'      => $this->letter_type->select('id', 'name')->where('disabled', 0)->get(),
            'letter_statuses'   => $this->letter_status->select('id', 'name')->where('disabled', 0)->get(),
        ];

        return view('transactions.incoming_mail.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input, date('Y-m-d', strtotime(str_replace('/', '-', $request->letter_date))));

        // $validate = $request->validate([
        //     'code'              => 'required|unique:mst_incoming_mail,code,1,disabled',
        //     'name'              => 'required',
        //     'group'             => 'required',
        // ]);

        $data = [
            'letter_title'          => $input['letter_title'],
            'letter_no'             => $input['letter_no'],
            'letter_about'          => $input['letter_about'],
            'letter_date'           => date('Y-m-d', strtotime(str_replace('/', '-', $input['letter_date']))),
            'letter_place'          => $input['letter_place'],
            'letter_address'        => $input['letter_address'],
            'sender_name'           => $input['sender_name'],
            'sender_no'             => $input['sender_no'],
            'sender_position'       => $input['sender_position'],
            'sender_company'        => $input['sender_company'],
            'letter_appendix'       => $input['letter_appendix'],
            'letter_file'           => $input['letter_file'],
            'letter_type_id'        => $input['letter_type'],
            'letter_status_id'      => $input['letter_status'],
            'created_at'            => now(),
            'created_by'            => session()->get('user_id'),
        ];

        if ($request->letter_file) {
            $file = $request->file('letter_file');
            $extension = $request->letter_file->getClientOriginalExtension();  // Get Extension
            $fileName =  date('Ymd', strtotime($request->letter_date)).'_'.$request->letter_title.'_'.$request->sender_name.'.'.$extension;  // Concatenate both to get FileName
            $filePath = $file->storeAs('surat_masuk', $fileName, 'public');  
            $data['letter_file'] = $filePath; 
        }

        $this->incoming_mail->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'              => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'letter_types'      => $this->letter_type->select('id', 'name')->where('disabled', 0)->get(),
            'letter_statuses'   => $this->letter_status->select('id', 'name')->where('disabled', 0)->get(),
            'detail'            => $this->incoming_mail->where('id', $id)->where('disabled', 0)->first(),
        ];
        
        return view('transactions.incoming_mail.edit', $data);
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
    
            $this->incoming_mail->where('id', $id)->update($data);
    
            return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
        } else {
            // $validate = $request->validate([
            //     'code'              => 'required|unique:mst_deleted_mail,code,'.$id.',id,disabled,1',
            //     'name'              => 'required',
            //     'group'             => 'required',
            // ]);
    
            $data = [
                'letter_title'          => $input['letter_title'],
                'letter_no'             => $input['letter_no'],
                'letter_about'          => $input['letter_about'],
                'letter_date'           => date('Y-m-d', strtotime(str_replace('/', '-', $input['letter_date']))),
                'letter_place'          => $input['letter_place'],
                'letter_address'        => $input['letter_address'],
                'sender_name'           => $input['sender_name'],
                'sender_no'             => $input['sender_no'],
                'sender_position'       => $input['sender_position'],
                'sender_company'        => $input['sender_company'],
                'letter_appendix'       => $input['letter_appendix'],
                'letter_file'           => $input['letter_file'],
                'letter_type_id'        => $input['letter_type'],
                'letter_status_id'      => $input['letter_status'],
                'created_at'            => now(),
                'created_by'            => session()->get('user_id'),
            ];

            if ($request->letter_file) {
                if ($request->old_letter_file) File::delete(public_path().'/storage/'.$request->old_letter_file);
                $file = $request->file('letter_file');
                $extension = $request->letter_file->getClientOriginalExtension();  // Get Extension
                $fileName =  date('Ymd', strtotime($request->letter_date)).'_'.$request->letter_title.'_'.$request->sender_name.'.'.$extension;  // Concatenate both to get FileName
                $filePath = $file->storeAs('surat_masuk', $fileName, 'public');  
                $data['letter_file'] = $filePath;
            }
    
            $this->incoming_mail->where('id', $id)->update($data);
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
        $this->incoming_mail->where('id', $id)->update($data);

        $data = [
            'deleted_id'    => $id,
            'letter'        => 'surat_masuk',
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];
        $this->deleted_mail->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }
}
