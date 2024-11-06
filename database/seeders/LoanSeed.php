<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $loans = [
            [
                'user_id' => 1,
                'loan_lender_id' => 1,
                'loan_borrower_id' => 1,
                'name' => 'Loan 1',
                'amount' => 1000,
                'rate' => 0.1,
                'duration' => 12,
            ],
            [
                'user_id' => 1,
                'loan_lender_id' => 2,
                'loan_borrower_id' => 2,
                'name' => 'Loan 2',
                'amount' => 2000,
                'rate' => 0.2,
                'duration' => 24,
            ],
            [
                'user_id' => 1,
                'loan_lender_id' => 3,
                'loan_borrower_id' => 3,
                'name' => 'Loan 3',
                'amount' => 3000,
                'rate' => 0.3,
                'duration' => 36,
            ],
        ];

        foreach ($loans as $loan) {
            Loan::create($loan);
        }
    }
}
