<?php

namespace App\Models\Managements;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    use HasFactory;

    protected $table = 'mgm_service_detail';

    public function details()
    {
        return $this->belongsTo(Service::class, 'header_id', 'id')->selectRaw("id, title, subtitle, picture, description")->where('disabled', 0);
    }
}
