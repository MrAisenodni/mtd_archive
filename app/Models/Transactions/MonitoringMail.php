<?php

namespace App\Models\Transactions;

use App\Models\Masters\{
    Department,
    LetterStatus,
    LetterType,
    Shelf,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringMail extends Model
{
    use HasFactory;

    protected $table = 'trx_monitoring_mail';

    public function letter_status()
    {
        return $this->belongsTo(LetterStatus::class)->select('id', 'name', 'back_color', 'fore_color')->where('disabled', 0);
    }

    public function letter_type()
    {
        return $this->belongsTo(LetterType::class)->select('id', 'name')->where('disabled', 0);
    }

    public function depertment()
    {
        return $this->belongsTo(Department::class)->select('id', 'name')->where('disabled', 0);
    }

    public function shelf()
    {
        return $this->belongsTo(Shelf::class)->select('id', 'name', 'chest_id')->where('disabled', 0);
    }
}
