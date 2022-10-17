<?php

namespace App\Http\Controllers\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MonitoringMailController extends Controller
{
    protected $path = '/manajemen/monitoring-surat';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->monitoring_mail->select('id', 'letter_title', 'letter_no', 'letter_date', 'letter_place', 'sender_name', 'sender_position', 'letter_appendix', 'letter_status_id', 'letter_type_id', 'department_id', 'shelf_id', 'letter_file')->where('disabled', 0)->get(),
        ];

        return view('transactions.monitoring_mail.index', $data);
    }

    public function show($id)
    {
        $data = [
            'menu'              => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'letter_types'      => $this->letter_type->select('id', 'name')->where('disabled', 0)->get(),
            'letter_statuses'   => $this->letter_status->select('id', 'name')->where('disabled', 0)->get(),
            'departments'       => $this->department->select('id', 'name')->where('disabled', 0)->get(),
            'shelfs'            => $this->shelf->select('id', 'name', 'chest_id')->where('disabled', 0)->get(),
            'detail'            => $this->monitoring_mail->where('id', $id)->where('disabled', 0)->first(),
        ];
        
        return view('transactions.monitoring_mail.edit', $data);
    }
}
