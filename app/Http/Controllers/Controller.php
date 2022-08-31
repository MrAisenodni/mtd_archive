<?php

namespace App\Http\Controllers;

use App\Models\Settings\{
    Login,
    Menu,
    SubMenu,
};
use App\Models\Masters\{
    City,
    Country,
    Company,
    District,
    Department,
    DepartmentGroup,
    LetterLocation,
    LetterStatus,
    LetterType,
    Province,
    User,
    Ward,
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
        $this->city = new City();
        $this->country = new Country();
        $this->company = new Company();
        $this->department = new Department();
        $this->department_group = new DepartmentGroup();
        $this->district = new District();
        $this->letter_location = new LetterLocation();
        $this->letter_status = new LetterStatus();
        $this->letter_type = new LetterType();
        $this->province = new Province();
        $this->user = new User();
        $this->ward = new Ward();
    }
}
