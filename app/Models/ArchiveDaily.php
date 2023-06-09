<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveDaily extends Model
{
    use HasFactory;

    /**
     * Declaration table for Model
     */
    protected $table = 'archive_dailies';

    /**
     * Declaration Primary Key for Table
     */
    protected $primaryKey = 'arc_daily_id';
}
