<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected $table = 'archive_meets';
    protected $primaryKey = 'arc_meeet_id';

    public $incrementing = true;
    public $timestamps = true;
}
