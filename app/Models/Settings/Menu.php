<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'stg_menu';

    public function submenus()
    {
        return $this->hasMany(SubMenu::class)->select('id', 'title', 'url', 'icon')->where('disabled', 0);
    }
    
    public function menuaccess()
    {
        return $this->belongsTo(MenuAccess::class, 'id', 'menu_id')->select('id', 'login_id', 'view', 'add', 'edit', 'delete')->where('disabled', 0)->where('login_id', session()->get('sid'));
    }
}
