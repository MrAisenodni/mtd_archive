<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;

    protected $table = 'stg_submenu';

    public function menu()
    {
        return $this->belongsTo(Menu::class)->select('id', 'title');
    }
    
    public function menuaccess()
    {
        return $this->belongsTo(MenuAccess::class, 'id', 'submenu_id')->select('id', 'login_id', 'view', 'add', 'edit', 'delete')->where('disabled', 0)->where('login_id', session()->get('sid'));
    }
}
