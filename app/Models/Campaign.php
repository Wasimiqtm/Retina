<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $dates = ['to_date'];

    public function scopeFilter($query, $filter)
    {
        if ($filter) {
            return $query->whereDate('campaigns.created_at', '>=' , Carbon::now()->subDays($filter));
        }
        return $query;
    }
}
