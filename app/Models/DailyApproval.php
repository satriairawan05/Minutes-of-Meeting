<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyApproval extends Model
{
    use HasFactory;

    protected $table = 'daily_approvals';

    protected $primaryKey = 'dai_app_id';
}
