<?php

namespace Tests\Feature;

use App\Models\LoanLender;
use App\Models\User;
use Tests\TestCase;

class LoanLenderTest extends TestCase
{
    public function test_get_loan_lenders(): void
    {
        $this
            ->getJson('api/lenders')
            ->assertOk();

    }

    public function test_create_loan_lender()
    {
        $user = User::first();

        $this
            ->actingAs($user)
            ->postJson('api/lenders', [
                'user_id' => $user->id,
                'name' => 'Loan Lender Test',
            ])
            ->assertCreated();
    }

    public function test_update_loan_lender()
    {
        $loanLender = LoanLender::orderBy('id', 'DESC')->first();
        $user = User::first();

        $this
            ->actingAs($user)
            ->putJson('api/lenders/' . $loanLender->id, [
                'user_id' => $user->id,
                'name' => 'Loan Lender Test',
            ])
            ->assertOk();
    }

    public function test_delete_loan_lender()
    {
        $loanLender = LoanLender::orderBy('id', 'DESC')->first();
        $user = User::first();

        $this
            ->actingAs($user)
            ->deleteJson('api/lenders/' . $loanLender->id)
            ->assertOk();
    }
}
