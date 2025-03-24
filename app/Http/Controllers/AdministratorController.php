<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Points;
use App\Models\Wallet;
use App\Models\Account;
use App\Models\Product;
use App\Models\Recharge;
use App\Models\Withdraw;
use App\Models\Submission;

use Illuminate\View\View;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\DB;
use App\Models\RechargeTransaction;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function indexAdmin(): View
    {
        $totalUsers = User::all()->count();
        $totalWallet = Wallet::all()->sum('balance');
        $totalTransaction = ProductTransaction::all()->count();
        $totalActiveInvestment = ProductTransaction::where('status', 1 )->count();
        $totalRecharge = Recharge::all()->sum('amount');
        $totalPoint = Points::all()->sum('amount');
        $totalIncome = ProductTransaction::all()->where('st`atus', 1 )->sum('total_income');
        $totalProduct = Product::all()->count();


        $total_asset = $totalWallet + $totalPoint + $totalIncome + $totalRecharge;



        return view('admin.dashboard', compact('totalUsers','totalWallet','total_asset','totalProduct',
                                                'totalTransaction','totalActiveInvestment'));
    }

    public function indexTransaction(): View
    {

        $allTransactionCount = ProductTransaction::all()->count();
        $allTransaction = ProductTransaction::all();

        return view('admin.all_transaction', compact('allTransaction','allTransactionCount'));
    }

    public function adminTransDetails($id): View
    {
        $details = ProductTransaction::find($id); // Retrieve the transaction by ID

        if (!$details) {
            abort(404); // Handle if the transaction is not found
        }

        return view('admin.productTransactionDetails', compact('details'));
    }

    public function adminDepositDetails($id): View
    {

            $details = User::join('transaction', 'users.id', '=', 'transaction.user_id')
        ->select('users.*', 'transaction.*') // Adjust the columns you want to select
        ->where('transaction.id', $id)
        ->first();

        if (!$details) {
            abort(404); // Handle if the transaction is not found
        }


        return view('admin.depositTransactionDetails', compact('details'));
    }

    public function fundWallet(): View
    {

        $user = User::all();


        return view('admin.fund_wallet', compact('user'));
    }

        public function contestant(): View
    {
        $submissions = Submission::paginate(10);
        return view('admin.contest', compact('submissions'));
    }

    public function deleteSubmission($id)
    {
        // Find the submission
        $submission = Submission::findOrFail($id);

        // Get the user before deleting submission
        $user = $submission->user;

        // Delete the submission
        $submission->delete();

        // Delete the user's wallet if it exists
        if ($user && $user->wallet) {
            $user->wallet->delete();
        }

        // Delete the user
        if ($user) {
            $user->delete();
        }

        toast('User account and all associated data deleted successfully', 'success');
        return redirect()->back();
    }

    public function allOrder(): View
    {

        $running_product = ProductTransaction::where('status', 1)->paginate(10);


        return view('admin.all_order', compact('running_product'));
    }

    public function fundWalletRequest(Request $request)
{
    try {
        $validatedData = $request->validate([
            'user' => ['required'],
            'amount' => ['required'],
            'type' => ['required'],
        ]);

        if ($request->type == 'recharge') {
            $getUserRecharge = Recharge::where('user_id', $request->user )->first();
            // Update user's wallet balance
            $updateUserRecharge = Recharge::where('user_id', $request->user)->increment('amount', $request->amount);

            toast('User Recharge Account Funded With <strong>₦'.number_format($validatedData['amount'], 2).'</strong> successfully' , 'success');
            return redirect()->back();

        } elseif ($request->type == 'balance') {
            $getUserWallet = Wallet::where('user_id', $request->user )->first();

            // Update user's wallet balance
            $updateUserWallet = Wallet::where('user_id', $request->user)->increment('balance', $request->amount);

            toast('Wallet Funded With <strong>₦'.number_format($validatedData['amount'], 2).'</strong> successfully' , 'success');
            return redirect()->back();
        }

    } catch (\Illuminate\Validation\ValidationException $e) {
        // If validation fails, handle the exception
        $errors = $e->validator->errors()->all();
        toast('Validation failed! ' . implode(' ', $errors), 'error');
        return redirect()->back();
    }
}

public function WithdrawRequest()
  {



    $withdrawal_list = Withdraw::orderBy('created_at', 'desc')->paginate(10);

    return view('admin.withdraw_request', compact('withdrawal_list'));
  }

  public function adminWithdrawDetails($id): View
    {
        $details = Withdraw::find($id); // Retrieve the transaction by ID

        if (!$details) {
            abort(404); // Handle if the transaction is not found
        }

        return view('admin.withdrawDetails', compact('details'));
    }

  public function approveWithdraw($id)
  {

   $getUserRequest = Withdraw::find($id);

        Withdraw::where('id', $id)->update(['status' => 1]);


        toast('Withdrawal Approved Successfully' , 'success');
        return redirect()->back();

  }

  public function allUsers(): View
    {

        $users = User::orderBy('created_at','desc')->paginate(10);

        return view('admin.all_users', compact('users'));
    }

    public function deleteUser($id)
    {
        $details = User::find($id);

        if (!$details) {
            abort(404); // Handle if the user is not found
        }

        Account::where('user_id', $id)->delete();
        Points::where('user_id', $id)->delete();
        ProductTransaction::where('user_id', $id)->delete();
        Recharge::where('user_id', $id)->delete();
        RechargeTransaction::where('user_id', $id)->delete();
        Transaction::where('user_id', $id)->delete();
        Wallet::where('user_id', $id)->delete();
        Withdraw::where('user_id', $id)->delete();

        $details->delete();

        toast('User Records Deleted Successfully' , 'success');
        return redirect()->back();
    }

    public function userDeposit(): View
    {

        $deposit = Transaction::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.deposit', compact('deposit'));
    }

    public function rejectDeposit($id)
  {

   $getUserRequest = Transaction::find($id);

   Transaction::where('id', $id)->update(['status' => 2]);


        toast('Deposit Has Being Rejected' , 'success');
        return redirect()->back();

  }

  public function approveDeposit($id)
  {

   $getUserRequest = Transaction::find($id);

   Transaction::where('id', $id)->update(['status' => 1]);

   // Update user's wallet balance
   $updateUserRecharge = Recharge::where('user_id', $getUserRequest->user_id)->increment('amount', $getUserRequest->balance);

   $create_recharge = RechargeTransaction::create([
    'user_id' => $getUserRequest->user_id,
    'amount' => $getUserRequest->balance,
]);

        toast('Deposit Approved Successfully' , 'success');
        return redirect()->back();

  }

  public function allProduct(): View
    {

        $product = Product::paginate(10);

        return view('admin.all_product', compact('product'));
    }


    public function activateProduct($id)
  {

   $getUserRequest = Product::find($id);

   Product::where('id', $id)->update(['status' => 1]);

   toast(__( ''.$getUserRequest->name.'' . ' Activated Successfully' ), 'success');
   return redirect()->back();

  }

  public function deactivateProduct($id)
  {

   $getUserRequest = Product::find($id);

   Product::where('id', $id)->update(['status' => 0]);

   toast(__( ''.$getUserRequest->name.'' . ' Deactivated Successfully' ), 'success');
   return redirect()->back();

  }

  public function deleteProduct($id)
    {
        $details = Product::find($id);

        if (!$details) {
            abort(404); // Handle if the product is not found
        }

        $details->delete();

        toast(__( ''.$details->name.'' . ' Deleted Successfully' ), 'success');
        return redirect()->back();
    }


        public function createProduct(Request $request)
    {

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
                $filename1 = Str::random(30) . "." . $request->file('image')->extension();
                $publicPath = public_path('product_image');
                $file1->move($publicPath, $filename1);

            $create = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'daily_income' => $request->daily_income,
                'validity_period' => $request->validity_period,
                'total_income' => $request->total_income,
                'business_value' => $request->business_value,
                'status' => 0,
                'image' => $filename1, // Store public URL in the database
            ]);

            toast(__( ''.$request->name.'' . ' Product Was Created Successfully' ), 'success');
            return redirect()->back();
        }
    }

    public function editProduct(Request $request)
{
        $product = Product::findOrFail($request->id);

        $productUpdate = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'daily_income' => $request->daily_income,
            'validity_period' => $request->validity_period,
            'total_income' => $request->total_income,
            'business_value' => $request->business_value,
            'status' => 1,
        ];

      //  dd($productUpdate);

        if ($request->hasFile('image')) {
            $file1 = $request->file('image');
            $filename1 = Str::random(30) . "." . $request->file('image')->extension();
            $publicPath = public_path('product_image');
            $file1->move($publicPath, $filename1);

            $productUpdate['image'] = $filename1;
        }

        $product->update($productUpdate);

        DB::commit();
        toast('Product Edit Successfully', 'success');
        return redirect()->back();
}



}
