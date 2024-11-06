<?php

namespace Tests\Feature;

use App\Models\Loan;
use App\Models\LoanBorrower;
use App\Models\LoanLender;
use App\Models\User;
use Tests\TestCase;

class LoanTest extends TestCase
{
    public function test_get_loans(): void
    {
        $user = User::first();

        $this
            ->actingAs($user)
            ->getJson('api/loans')
            ->assertOk();

    }

    public function test_create_loan()
    {
        $user = User::first();
        $borrower = LoanBorrower::first();
        $lender = LoanLender::first();

        $this
            ->actingAs($user)
            ->postJson('api/loans', [
                'user_id' => $user->id,
                'loan_lender_id' => $lender->id,
                'loan_borrower_id' => $borrower->id,
                'name' => 'Loan Test',
                'amount' => 1000,
                'rate' => 5,
                'duration' => 12,
            ])
            ->assertCreated();
    }

    public function test_update_loan()
    {
        $loan = Loan::orderBy('id', 'DESC')->first();
        $user = User::first();
        $borrower = LoanBorrower::first();
        $lender = LoanLender::first();

        $this
            ->actingAs($user)
            ->putJson('api/loans/' . $loan->id, [
                'user_id' => $user->id,
                'loan_lender_id' => $lender->id,
                'loan_borrower_id' => $borrower->id,
                'name' => 'Loan Test',
                'amount' => 1000,
                'rate' => 5,
                'duration' => 12,
            ])
            ->assertOk();
    }

    public function test_delete_loan()
    {
        $loan = Loan::orderBy('id', 'DESC')->first();
        $user = User::first();

        $this
            ->actingAs($user)
            ->deleteJson('api/loans/' . $loan->id)
            ->assertOk();
    }
}
