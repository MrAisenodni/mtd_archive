<?php

namespace App\Http\Controllers;

use App\Models\Settings\{
    Login,
    Menu,
    SubMenu,
};
use App\Models\Masters\{
    Company,
    Department,
    DepartmentGroup,
    LetterStatus,
    LetterType,
    User,
}; 

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() 
    {
        // Global Variabel untuk Setting
        $this->login = new Login();
        $this->menu = new Menu();
        $this->submenu = new SubMenu();

        // Global Variabel untuk Master
        $this->company = new Company();
        $this->department = new Department();
        $this->department_group = new DepartmentGroup();
        $this->letter_status = new LetterStatus();
        $this->letter_type = new LetterType();
        $this->user = new User();
    }
}
