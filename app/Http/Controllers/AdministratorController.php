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
use App\Models\Transaction;
use App\Models\RechargeTransaction;
use App\Models\ProductTransaction;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositApproved;
use App\Mail\DepositRejected;
use Lab404\Impersonate\Services\ImpersonateManager;

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
        $allTransaction = ProductTransaction::paginate(10); // Paginate the results
        $allTransactionCount = ProductTransaction::count(); // Get the total count of transactions

        return view('admin.all_transaction', compact('allTransaction', 'allTransactionCount'));
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

    public function fundWallet(Request $request): View
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('other_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $user = $query->orderBy('created_at', 'desc')->get();

        return view('admin.fund_wallet', compact('user'));
    }

    public function contestant(Request $request)
    {
        $query = Submission::with(['user', 'user.contestEntries'])
            ->when($request->search, function($query) use ($request) {
                $query->where(function($q) use ($request) {
                    $q->where('full_name', 'like', '%' . $request->search . '%')
                      ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->status, function($query) use ($request) {
                if ($request->status === 'approved') {
                    $query->where('is_approved', true);
                } elseif ($request->status === 'pending') {
                    $query->where('is_approved', false);
                }
            })
            ->when($request->sort, function($query) use ($request) {
                switch ($request->sort) {
                    case 'oldest':
                        $query->oldest();
                        break;
                    case 'votes':
                        $query->withCount(['user.contestEntries as total_votes' => function($q) {
                            $q->selectRaw('sum(votes_count)');
                        }])->orderByDesc('total_votes');
                        break;
                    default:
                        $query->latest();
                        break;
                }
            }, function($query) {
                $query->latest();
            });

        $submissions = $query->paginate(10)->withQueryString();

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

    public function allOrder(Request $request): View
    {
        $query = ProductTransaction::where('status', 1);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('id', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                  });
            });
        }

        $running_product = $query->paginate(10);

        // Calculate statistics
        $total_orders = ProductTransaction::where('status', 1)->count();
        $active_today = ProductTransaction::where('status', 1)
            ->whereDate('created_at', today())
            ->count();
        $daily_income = ProductTransaction::where('status', 1)
            ->whereDate('created_at', today())
            ->sum('total_income');
        $total_investment = ProductTransaction::where('status', 1)
            ->sum('total_income');

        return view('admin.all_order', compact('running_product', 'total_orders', 'active_today', 'daily_income', 'total_investment'));
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

public function WithdrawRequest(Request $request)
{
    $query = Withdraw::orderBy('created_at', 'desc');

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('account_name', 'like', '%' . $search . '%')
              ->orWhere('id', 'like', '%' . $search . '%');
    }

    $withdrawal_list = $query->paginate(10);

    // Calculate total pending requests
    $pending_count = Withdraw::where('status', 0)->count();

    // Calculate total amount of all withdrawal requests
    $total_amount = Withdraw::sum('amount');

    return view('admin.withdraw_request', compact('withdrawal_list', 'pending_count', 'total_amount'));
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

  public function allUsers(Request $request): View
    {
        $query = User::query();

        // Handle search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('other_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Total Users
        $total_users = User::count();

        // Active Today (users who were active today)
        $active_today = User::whereHas('sessions', function ($query) {
            $query->where('last_activity', '>=', now()->startOfDay()->timestamp);
        })->count();

        // New This Week (users who registered this week)
        $new_this_week = User::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

        // Inactive Users (users who haven't been active for 30 days)
        $inactive_users = User::whereDoesntHave('sessions', function ($query) {
            $query->where('last_activity', '>=', now()->subDays(30)->timestamp);
        })->count();

        // Paginated list of users with search
        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.all_users', compact('users', 'total_users', 'active_today', 'new_this_week', 'inactive_users'));
    }

    public function getUserDetails($id)
    {
        $user = User::with(['wallet', 'transactions', 'withdrawals'])->findOrFail($id);
        return response()->json($user);
    }

    public function adjustUserFunds(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:add,remove',
            'reason' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($id);
        $amount = $request->amount;
        $type = $request->type;
        $reason = $request->reason;

        DB::beginTransaction();
        try {
            // Get or create wallet
            $wallet = $user->wallet;
            if (!$wallet) {
                $wallet = Wallet::create([
                    'user_id' => $user->id,
                    'balance' => 0
                ]);
            }

            if ($type === 'add') {
                $wallet->increment('balance', $amount);
            } else {
                if ($wallet->balance < $amount) {
                    throw new \Exception('Insufficient funds');
                }
                $wallet->decrement('balance', $amount);
            }

            // Record the transaction
            Transaction::create([
                'user_id' => $user->id,
                'balance' => $amount,
                'type' => $type === 'add' ? 'Admin Credit' : 'Admin Debit',
                'description' => $reason,
                'status' => 1,
                'proof_payment' => 'admin_adjustment'
            ]);

            DB::commit();
            toast('Funds adjusted successfully', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            toast($e->getMessage(), 'error');
            return redirect()->back();
        }
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

    public function userDeposit(Request $request): View
    {
        $search = $request->input('search');

        $deposits = Transaction::when($search, function($query) use ($search) {
                // Search by description, type, or status
                return $query->where('description', 'like', "%$search%")
                           ->orWhere('type', 'like', "%$search%")
                           ->orWhere('status', $this->getStatusValue($search));
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $stats = [
            'total' => Transaction::count(),
            'pending' => Transaction::where('status', 0)->count(),
            'approved' => Transaction::where('status', 1)->count(),
            'rejected' => Transaction::where('status', 2)->count(),
        ];

        return view('admin.deposit', compact('deposits', 'stats'));
    }

    private function getStatusValue($search)
    {
        // Map status keywords to their corresponding values
        $statusMap = [
            'pending' => 0,
            'approved' => 1,
            'rejected' => 2,
        ];

        // Convert search term to lowercase for case-insensitive matching
        $search = strtolower($search);

        // Return the status value if the search term matches a status keyword
        return $statusMap[$search] ?? null;
    }

    public function rejectDeposit($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $transaction = Transaction::findOrFail($id);
                $transaction->update(['status' => 2]);

                // Send rejection email
                $user = $transaction->user;
                Mail::to($user->email)->send(new DepositRejected($user, $transaction));
            });

            return redirect()->back()->with('success', 'Deposit rejected successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error rejecting deposit: ' . $e->getMessage());
        }
    }

    public function approveDeposit($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $transaction = Transaction::findOrFail($id);
                $transaction->update(['status' => 1]);

                Recharge::updateOrCreate(
                    ['user_id' => $transaction->user_id],
                    ['amount' => DB::raw("amount + {$transaction->balance}")]
                );

                RechargeTransaction::create([
                    'user_id' => $transaction->user_id,
                    'amount' => $transaction->balance,
                    'transaction_id' => $transaction->id
                ]);

                // Send approval email
                $user = $transaction->user;
                Mail::to($user->email)->send(new DepositApproved($user, $transaction));
            });

            return redirect()->back()->with('success', 'Deposit approved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error approving deposit: ' . $e->getMessage());
        }
    }

  public function allProduct(): View
    {
        $product = Product::paginate(10);
        $totalProducts = Product::count(); // Calculate total number of products

        return view('admin.all_product', compact('product', 'totalProducts'));
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

public function getSubmissionDetails($id)
{
    try {
        $submission = Submission::with(['user', 'user.contestEntries'])->findOrFail($id);
        return view('admin.submission-details', compact('submission'));
    } catch (\Exception $e) {
        toast('Failed to fetch submission details', 'error');
        return redirect()->back();
    }
}

public function approveSubmission($id)
{
    try {
        $submission = Submission::findOrFail($id);
        $submission->update(['is_approved' => true]);

        toast('Submission approved successfully', 'success');
        return redirect()->back();
    } catch (\Exception $e) {
        toast('Failed to approve submission', 'error');
        return redirect()->back();
    }
}

public function rejectWithdraw($id)
{
    $getUserRequest = Withdraw::find($id);

    if (!$getUserRequest) {
        abort(404); // Handle if the withdrawal request is not found
    }

    Withdraw::where('id', $id)->update(['status' => 2]);

    toast('Withdrawal Rejected Successfully', 'success');
    return redirect()->back();
}

public function removeFunds(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'amount' => 'required|numeric|min:0',
    ]);

    $userWallet = Wallet::where('user_id', $request->user_id)->first();

    if (!$userWallet) {
        return redirect()->back()->with('error', 'User wallet not found.');
    }

    if ($userWallet->balance < $request->amount) {
        return redirect()->back()->with('error', 'Insufficient balance in the user\'s wallet.');
    }

    $userWallet->decrement('balance', $request->amount);

    return redirect()->back()->with('success', 'Funds removed successfully.');
}

public function impersonate($id)
{
    $user = User::findOrFail($id);

    // Store the admin's ID in the session
    session()->put('impersonator_id', auth()->id());

    // Login as the user
    auth()->login($user);

    return redirect()->route('dashboard')->with('success', 'You are now impersonating ' . $user->first_name);
}

public function stopImpersonating()
{
    if (!session()->has('impersonator_id')) {
        return redirect()->route('dashboard');
    }

    // Get the admin's ID from the session
    $adminId = session()->get('impersonator_id');

    // Clear the impersonator ID from the session
    session()->forget('impersonator_id');

    // Log back in as the admin
    auth()->login(User::find($adminId));

    return redirect()->route('administrator')->with('success', 'Stopped impersonating user');
}

public function viewUser($id)
{
    $user = User::with('wallet')->findOrFail($id);
    return view('admin.user_view', compact('user'));
}

}
