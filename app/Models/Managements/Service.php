<?php

namespace App\Models\Managements;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'mgm_service';

    public function details()
    {
        return $this->hasMany(ServiceDetail::class, 'header_id', 'id')->selectRaw("id, title, subtitle, icon, description, header_id")->where('disabled', 0)->orderBy('order_no');
    }
}
