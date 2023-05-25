<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetDetail extends Model
{
    use HasFactory;

    protected $table = 'meets_details';
    protected $guarded = 'id';

    // $table->string('project');
    // $table->string('tracker');
    // $table->string('subject');
    // $table->longText('description');
    // $table->string('status');
    // $table->string('priority');
    // $table->date('start_date');
    // $table->date('end_date');
    // $table->string('file')->nullable();
    // $table->boolean('is_private');

    protected $fillable = [
        'project',
        'tracker',
        'subject',
        'description',
        'status',
        'priority',
        'start_daye',
        'end_date',
        'file',
        'is_private'
    ];
}
