<?php

namespace App\Http\Controllers;

use App\Models\Masters\{
    Chest,
    City,
    Country,
    Company,
    District,
    Department,
    DepartmentGroup,
    LetterOrigin,
    LetterStatus,
    LetterType,
    Position,
    Province,
    Religion,
    Retention,
    SaveMethod,
    Shelf,
    StorageTime,
    Ward,
}; 
use App\Models\Settings\{
    Login,
    Menu,
    Provider,
    SubMenu,
    User,
};
use App\Models\Transactions\{
    DeletedMail,
    IncomingMail,
    MonitoringMail,
    OutgoingMail,
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
        $this->provider = new Provider();
        $this->submenu = new SubMenu();
        $this->user = new User();

        // Global Variabel untuk Master
        $this->chest = new Chest();
        $this->city = new City();
        $this->country = new Country();
        $this->company = new Company();
        $this->department = new Department();
        $this->department_group = new DepartmentGroup();
        $this->district = new District();
        $this->letter_origin = new LetterOrigin();
        $this->letter_status = new LetterStatus();
        $this->letter_type = new LetterType();
        $this->position = new Position();
        $this->province = new Province();
        $this->religion = new Religion();
        $this->retention = new Retention();
        $this->save_method = new SaveMethod();
        $this->shelf = new Shelf();
        $this->storage_time = new StorageTime();
        $this->ward = new Ward();

        // Global Variabel untuk Transactions
        $this->deleted_mail = new DeletedMail();
        $this->incoming_mail = new IncomingMail();
        $this->monitoring_mail = new MonitoringMail();
        $this->outgoing_mail = new OutgoingMail();
    }
}
