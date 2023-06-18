<?php

namespace App\Models;

use App\Models\Tracker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daily extends Model
{
    use HasFactory;

    protected $table = 'dailies';
    protected $primaryKey = 'daily_id';

    public $incrementing = true;
    public $timestamps = true;

    public function tracker()
    {
        return $this->belongsTo(Tracker::class);
    }
}
