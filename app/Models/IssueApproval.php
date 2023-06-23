<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueApproval extends Model
{
    use HasFactory;

    protected $table = 'issue_approvals';
    protected $primaryKey = 'iss_app_id';

    public $incrementing = true;
    public $timestamps = true;
}
