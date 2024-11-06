<?php

namespace Tests\Feature;

use App\Models\LoanBorrower;
use App\Models\User;
use Tests\TestCase;

class LoanBorrowerTest extends TestCase
{
    public function test_get_loan_borrowers(): void
    {
        $user = User::first();
        $this
            ->actingAs($user)
            ->getJson('api/borrowers')
            ->assertOk();

    }

    public function test_create_loan_borrower()
    {
        $user = User::first();

        $this
            ->actingAs($user)
            ->postJson('api/borrowers', [
                'user_id' => $user->id,
                'name' => 'Loan Borrower Test',
            ])
            ->assertCreated();
    }

    public function test_update_loan_borrower()
    {
        $loanBorrower = LoanBorrower::orderBy('id', 'DESC')->first();
        $user = User::first();

        $this
            ->actingAs($user)
            ->putJson('api/borrowers/' . $loanBorrower->id, [
                'user_id' => $user->id,
                'name' => 'Loan Borrower Test',
            ])
            ->assertOk();
    }

    public function test_delete_loan_borrower()
    {
        $loanBorrower = LoanBorrower::orderBy('id', 'DESC')->first();
        $user = User::first();

        $this
            ->actingAs($user)
            ->deleteJson('api/borrowers/' . $loanBorrower->id)
            ->assertOk();
    }
}
