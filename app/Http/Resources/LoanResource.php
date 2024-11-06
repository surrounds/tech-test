<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'loan_lender_id' => $this->loan_lender_id,
            'loan_borrower_id' => $this->loan_borrower_id,
            'name' => $this->name,
            'amount' => $this->amount,
            'rate' => $this->rate,
            'duration' => $this->duration,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
