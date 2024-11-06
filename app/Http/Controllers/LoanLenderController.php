<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanLenderRequest;
use App\Http\Resources\LoanLenderResource;
use App\Models\LoanLender;

class LoanLenderController extends Controller
{
    public function index()
    {
        return LoanLenderResource::collection(LoanLender::all());
    }

    public function create(LoanLenderRequest $request)
    {
        $loanLenderData = $request->all();
        $loanLenderData['user_id'] = auth()->id();
        $loanLender = LoanLender::create($loanLenderData);

        return new LoanLenderResource($loanLender);
    }

    public function update(LoanLenderRequest $request, $id)
    {
        $loanLender = LoanLender::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$loanLender) {
            return response()->json([
                'message' => 'Loan Lender not found',
            ], 404);
        }

        $loanLender->update($request->all());

        return new LoanLenderResource($loanLender);
    }

    public function view($id)
    {
        $loanLender = LoanLender::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$loanLender) {
            return response()->json([
                'message' => 'Loan Lender not found',
            ], 404);
        }

        return new LoanLenderResource($loanLender);
    }

    public function delete($id)
    {
        $loanLenderLender = LoanLender::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$loanLenderLender) {
            return response()->json([
                'message' => 'Loan Lender not found',
            ], 404);
        } else {
            $loanLenderLender->delete();

            return response()->json([
                'message' => 'Loan Lender deleted',
            ]);
        }
    }
}
