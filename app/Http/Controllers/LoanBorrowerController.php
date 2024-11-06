<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanBorrowerRequest;
use App\Http\Resources\LoanBorrowerResource;
use App\Models\LoanBorrower;

class LoanBorrowerController extends Controller
{
    public function index()
    {
        return LoanBorrowerResource::collection(LoanBorrower::all());
    }

    public function create(LoanBorrowerRequest $request)
    {
        $LoanBorrowerData = $request->all();
        $LoanBorrowerData['user_id'] = auth()->id();
        $LoanBorrower = LoanBorrower::create($LoanBorrowerData);

        return new LoanBorrowerResource($LoanBorrower);
    }

    public function update(LoanBorrowerRequest $request, $id)
    {
        $LoanBorrower = LoanBorrower::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$LoanBorrower) {
            return response()->json([
                'message' => 'Loan Borrower not found',
            ], 404);
        }

        $LoanBorrower->update($request->all());

        return new LoanBorrowerResource($LoanBorrower);
    }

    public function view($id)
    {
        $LoanBorrower = LoanBorrower::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$LoanBorrower) {
            return response()->json([
                'message' => 'Loan Borrower not found',
            ], 404);
        }

        return new LoanBorrowerResource($LoanBorrower);
    }

    public function delete($id)
    {
        $LoanBorrower = LoanBorrower::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$LoanBorrower) {
            return response()->json([
                'message' => 'Loan Borrower not found',
            ], 404);
        } else {
            $LoanBorrower->delete();

            return response()->json([
                'message' => 'Loan Borrower deleted',
            ]);
        }
    }
}
