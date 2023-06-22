<?php

namespace Database\Seeders;

use App\Models\IssueApproval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueApprovalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $table->increments('ia_id');
        // $table->foreignId('issue_id');
        // $table->foreignId('app_list_id');
        // $table->string('app_by');
        // $table->date('app_date');
        // $table->boolean('app_status')->default(false);

        IssueApproval::create([
            'ia_id' => 1,
            'issue_id' => 1,
            'app_list_id' => 1,
            'app_by' => 'A',
            'app_date' => \Carbon\Carbon::now(),
            'app_status' => 1
        ]);

        IssueApproval::create([
            'ia_id' => 2,
            'issue_id' => 1,
            'app_list_id' => 2,
            'app_by' => 'B',
            'app_date' => \Carbon\Carbon::now(),
            'app_status' => 0
        ]);
        
        IssueApproval::create([
            'ia_id' => 3,
            'issue_id' => 1,
            'app_list_id' => 3,
            'app_by' => 'C',
            'app_date' => \Carbon\Carbon::now(),
            'app_status' => 0
        ]);
    }
}
