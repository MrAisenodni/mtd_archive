<?php

namespace App\Models\Masters;

use App\Models\Settings\{
    User,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'mst_department';

    public function department_group()
    {
        return $this->belongsTo(DepartmentGroup::class, 'group_id', 'id')->select('id', 'code', 'name')->where('disabled', 0);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select('id', 'full_name')->where('disabled', 0);
    }
}
