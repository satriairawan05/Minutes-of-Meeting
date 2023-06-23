<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalList extends Model
{
    use HasFactory;

    protected $table = 'approval_lists';
    protected $primaryKey = 'app_list_id';

    public $incrementing = true;
    public $timestamps = true;
}
