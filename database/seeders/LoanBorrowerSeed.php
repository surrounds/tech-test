<?php

namespace Database\Seeders;

use App\Models\LoanBorrower;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoanBorrowerSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowers = [
            [
                'user_id' => 1,
                'name' => 'John Doe',
            ],
            [
                'user_id' => 1,
                'name' => 'Jane Doe',
            ],
            [
                'user_id' => 1,
                'name' => 'Alice',
            ],
            [
                'user_id' => 1,
                'name' => 'Bob',
            ],
            [
                'user_id' => 1,
                'name' => 'Charlie',
            ],
        ];

        foreach ($borrowers as $borrower) {
            LoanBorrower::create($borrower);
        }
    }
}
