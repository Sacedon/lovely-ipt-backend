<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;

class LoanController extends Controller
{
    public function index(){
        $recents = Loan::orderBy('ammount', 'DESC')->with(['client'])->get();

        return response()->json([
            'loans' => $recents
        ]);
    }

    public function show(Loan $loan){
        return response()->json($loan);
    }

    public function update(Loan $loan, Request $request){
        $loan->update($request->all());
        return response()->json($loan);
    }

    public function store(Request $request){
        $request->validate([
            'client_id' => 'numeric|required',
            'ammount' => 'string|required',
            'loan_date' => 'date|required',
            'due_date' => 'date|required',

        ]);

        $loan = Loan::create($request->all());
        return response()->json($loan);
    }

    public function destroy(Loan $loan){
        $loan->delete();
        response()->json(['message' => 'This Loan has been deleted.']);
    }
}
