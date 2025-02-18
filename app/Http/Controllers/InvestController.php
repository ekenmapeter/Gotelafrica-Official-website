<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Product;
use App\Models\Recharge;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\Auth;

class InvestController extends Controller
{
    public function investID($id): View
    {
        $invest = Product::find($id); // Retrieve the transaction by ID
        $recharge = Recharge::Where("user_id", Auth::user()->id)->first();


        if (!$invest) {
            abort(404); // Handle if the transaction is not found
        }


        return view('investment_details', compact('invest','recharge'));
    }

        public function investPay(Request $request)
    {
        $id = $request->id; // Retrieve ID from the request

        $invest = Product::find($id); // Retrieve the product by ID
        if (!$invest) {
            toast('Product not found', 'error');
            return redirect()->back();
        }



        try {
            $getUserRecharge = Recharge::where('user_id', Auth::user()->id)->first();
            if ($getUserRecharge->amount < $request->price ) {
                toast('Your balance is less than <strong>₦' . number_format($request->price, 2) . '</strong>', 'error');
                return redirect()->back();
            } else {
                // Update user's wallet balance
                $deductUserRecharge = $getUserRecharge->amount - $request->price;
                $updateUserRecharge = Recharge::where('user_id', Auth::user()->id)->decrement('amount', $request->price);

                $create = ProductTransaction::create([
                    'user_id' => Auth::user()->id,
                    'name' => $request->name,
                    'description' => $request->description,
                    'product_id' => $id, // Use $id instead of $request->id
                    'price' => $request->price,
                    'daily_income' => $request->daily_income,
                    'validity_period' => $request->validity_period,
                    'total_income' => $request->total_income,
                    'business_value' => $request->business_value,
                    'status' => 1,
                ]);

                toast('Your investment was successful.', 'success');
                return redirect()->back();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // If validation fails, handle the exception
            $errors = $e->validator->errors()->all();
            toast('Validation failed! ' . implode(' ', $errors), 'error');
            return redirect()->back();
        }
    }

}
