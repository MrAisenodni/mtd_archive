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
}
