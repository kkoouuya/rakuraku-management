<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Attendee extends UuidModel
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'name',
        'dep_id',
        'number'
    ];

    public function scopeDepartmentFilter($query, ?string $dep_id)
    {
        if (!is_null($dep_id)) {
            return $query->where('dep_id', $dep_id);
        }
        return $query;
    }

    public function scopeCreatedFilter($query, ?string $date)
    {
        if (!is_null($date)) {
            return $query->where('created_at', 'like', "%{$date}%");
        }
        return $query;
    }

}
