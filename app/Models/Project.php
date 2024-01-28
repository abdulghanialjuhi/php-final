<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'system_name',
        'bu_name',
        'system_pic',
        'start_date',
        'end_date',
        'duration',
        'status',
        'development_methodology',
        'system_platform',
        'deployment_type',
        'request_type',
        'approved',
        'lead_dev',
        'system_id',
        'bu_id',
    ];

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'dev_project');
    }

    public function leaderdeveloper()
    {
        return $this->belongsTo(Developer::class, 'lead_dev');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

 
}
