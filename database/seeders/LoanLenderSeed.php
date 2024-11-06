<?php

namespace Database\Seeders;

use App\Models\LoanLender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanLenderSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loanLenders = [
            [
                'name' => 'Lender 1',
                'user_id' => 1,
            ],
            [
                'name' => 'Lender 2',
                'user_id' => 1,
            ],
            [
                'name' => 'Lender 3',
                'user_id' => 1,
            ],
        ];

        foreach ($loanLenders as $lender) {
            LoanLender::create($lender);
        }
    }
}
