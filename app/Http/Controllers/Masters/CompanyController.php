<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $path = '/master/perusahaan';

    public function index()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'data'          => $this->company->select('id', 'code', 'name', 'address_1', 'address_2', 'address_3', 'phone_no_1', 'phone_no_2', 'email')->where('disabled', 0)->paginate(10),
        ];

        return view('masters.company.index', $data);
    }

    public function create()
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'wards'         => $this->ward->select('id', 'name', 'district_id')->where('disabled', 0)->get(),
            // 'provinces'     => $this->province->select('id', 'name', 'country_id')->where('disabled', 0)->get(),
        ];

        return view('masters.company.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validate = $request->validate([
            'code'              => 'required|max:10|unique:mst_company,code,1,disabled',
            'name'              => 'required',
            'address_1'         => 'required',
            'address_2'         => 'max:3',
            'address_3'         => 'max:3',
            'phone_no_1'        => 'required',
            'email'             => 'required',
        ]);

        $data = [
            'code'          => $input['code'],
            'name'          => $input['name'],
            'address_1'     => $input['address_1'],
            'address_2'     => $input['address_2'],
            'address_3'     => $input['address_3'],
            'phone_no_1'    => $input['phone_no_1'],
            'phone_no_2'    => $input['phone_no_2'],
            'phone_no_3'    => $input['phone_no_3'],
            'email'         => $input['email'],
            'created_at'    => now(),
            'created_by'    => session()->get('user_id'),
        ];

        $this->company->insert($data);

        return redirect($this->path)->with('status', 'Data Berhasil Ditambahkan.');
    }

    public function show($id)
    {
        $data = [
            'menu'          => $this->submenu->select('id', 'title', 'menu_id', 'url')->where('url', $this->path)->first(),
            'detail'        => $this->company->select('id', 'code', 'name', 'address_1', 'address_2', 'address_3', 'address_2', 'address_3', 'phone_no_1', 'phone_no_2', 'email')->where('id', $id)->where('disabled', 0)->first(),
            'wards'         => $this->ward->select('id', 'name', 'district_id')->where('disabled', 0)->get(),
            // 'provinces'     => $this->province->select('id', 'name', 'country_id')->where('disabled', 0)->get(),
        ];
        
        return view('masters.company.edit', $data);
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
    
            $this->company->where('id', $id)->update($data);
    
            return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
        } else {
            $validate = $request->validate([
                'code'              => 'required|max:10|unique:mst_company,code,'.$id.',id,disabled,1',
                'name'              => 'required',
                'address_1'         => 'required',
                'address_2'         => 'max:3',
                'address_3'         => 'max:3',
                'phone_no_1'        => 'required',
                'email'             => 'required',
            ]);
    
            $data = [
                'code'          => $input['code'],
                'name'          => $input['name'],
                'address_1'     => $input['address_1'],
                'address_2'     => $input['address_2'],
                'address_3'     => $input['address_3'],
                'phone_no_1'    => $input['phone_no_1'],
                'phone_no_2'    => $input['phone_no_2'],
                'phone_no_3'    => $input['phone_no_3'],
                'email'         => $input['email'],
                'updated_at'    => now(),
                'updated_by'    => session()->get('user_id'),
            ];
    
            $this->company->where('id', $id)->update($data);
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

        $this->company->where('id', $id)->update($data);

        return redirect($this->path)->with('status', 'Data Berhasil Dihapus.');
    }

    public function get_company(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length'); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        dd($draw);

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // ASC or DESC
        $searchValue = $search_arr['value']; // Search value

        // Total Records
        $totalRecords = $this->company->where('disabled', 0)->count();
        $totalRecordsWithFilter = $this->company->where('disabled', 0)->where('code', 'LIKE', '%'.$searchValue.'%')
            ->where('name', 'LIKE', '%'.$searchValue.'%')->where('address_1', 'LIKE', '%'.$searchValue.'%')
            ->where('phone_no', 'LIKE', '%'.$searchValue.'%')->where('home_no', 'LIKE', '%'.$searchValue.'%')
            ->where('fax_no', 'LIKE', '%'.$searchValue.'%')->count();
        
        // Fetch Records
        $records = $this->company->select('id', 'code', 'name', 'address_1', 'address_2', 'address_3', 'phone_no_1', 'phone_no_2', 'email')
            ->where('disabled', 0)->where('code', 'LIKE', '%'.$searchValue.'%')->where('name', 'LIKE', '%'.$searchValue.'%')
            ->where('address_1', 'LIKE', '%'.$searchValue.'%')->where('phone_no', 'LIKE', '%'.$searchValue.'%')
            ->where('home_no', 'LIKE', '%'.$searchValue.'%')->where('fax_no', 'LIKE', '%'.$searchValue.'%')
            ->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();
        
        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $code = $record->code;
            $name = $record->name;
            $address_1 = $record->address_1;
            $phone_no = $record->phone_no;
            $home_no = $record->home_no;
            $fax_no = $record->fax_no;
    
            $data_arr[] = array(
                "id" => $id,
                "code" => $code,
                "name" => $name,
                "address_1" => $address_1,
                "phone_no" => $phone_no,
                "home_no" => $home_no,
                "fax_no" => $fax_no,
            );
        }
    
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
    
        echo json_encode($response);
        exit;
    }
}
