<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        return LoanResource::collection(Loan::all());
    }

    public function create(LoanRequest $request)
    {
        $loanData = $request->all();
        $loanData['user_id'] = auth()->id();
        $loan = Loan::create($loanData);

        return new LoanResource($loan);
    }

    public function update(LoanRequest $request, $id)
    {
        $loan = Loan::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found',
            ], 404);
        }

        $loan->update($request->all());

        return new LoanResource($loan);
    }

    public function view($id)
    {
        $loan = Loan::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found',
            ], 404);
        }

        return new LoanResource($loan);
    }

    public function delete($id)
    {
        $loan = Loan::where([
            'id' => $id,
            'user_id' => auth()->id(),
        ])->first();

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found',
            ], 404);
        } else {
            $loan->delete();

            return response()->json([
                'message' => 'Loan deleted',
            ]);
        }
    }
}
