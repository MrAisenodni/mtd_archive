<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuAccess extends Model
{
    use HasFactory;

    protected $table = 'stg_menu_access';

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id')->select('id', 'title', 'icon', 'url', 'parent');
    }
    public function submenu()
    {
        return $this->belongsTo(SubMenu::class, 'submenu_id', 'id')->select('id', 'title', 'icon', 'url', 'menu_id');
    }
    public function login()
    {
        return $this->belongsTo(Login::class, 'login_id', 'id')->select('id', 'username', 'user_id');
    }
}
