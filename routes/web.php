<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TargetSalesController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\BusinessInfoController;
use App\Http\Controllers\UddesignBudgetController;
use App\Http\Controllers\UddesignTargetController;
use App\Http\Controllers\KuwagoTwoBudgetController;
use App\Http\Controllers\KuwagoTwoTargetController;
use App\Http\Controllers\BudgetAllocationController;
use App\Http\Controllers\UddesignFeedbackController;
use App\Http\Controllers\Uddesign\UddesignController;
use App\Http\Controllers\Executive\ExecutiveController;
use App\Http\Controllers\KuwagoOne\Kuwago_OneController;
use App\Http\Controllers\KuwagoTwo\Kuwago_TwoController;

Route::get('/', function () {
    return view('auth.login');
})->middleware('redirectIfAuthenticated')->name('login');

// Route::get('kuwago-one', [AccountController::class, 'navbar_index'])->name('general.kuwago-one.dashboard');

// Route::get('kuwago-one', function () {
//     return view('general.kuwago-one.dashboard');
// })->middleware(['auth', 'verified'])->name('general.kuwago-one.dashboard');

Route::middleware(['auth', 'ensureUserIsAuthorized'])->group(function () {
    Route::get('settings/{id}', [UserAccountController::class, 'show'])->name('settings.account-show');
    Route::get('settings/{id}/edit', [UserAccountController::class, 'edit'])->name('settings.account-edit');
    Route::put('settings/{id}', [UserAccountController::class, 'update'])->name('settings.account-update');
});


Route::middleware(['auth', 'kuwagoRole:owner,general,kuwago'])->group(function () {
    Route::get('kuwago-one', [Kuwago_OneController::class, 'general_kuwago_one'])->name('general.kuwago-one.dashboard');
    Route::get('kuwago-one/expenses', [Kuwago_OneController::class, 'chart_expenses_kuwago_one'])->name('general.kuwago-one.expenses');
    Route::get('kuwago-one/sales', [Kuwago_OneController::class, 'chart_sales_kuwago_one'])->name('general.kuwago-one.sales');
    Route::get('kuwago-one/promos', [Kuwago_OneController::class, 'kuwagoOnepromos'])->name('general.kuwago-one.promos');
    Route::get('kuwago-one/feedbacks', [Kuwago_OneController::class, 'showFeedbacks'])->name('general.kuwago-one.feedbacks');


    Route::get('kuwago-two', [Kuwago_TwoController::class, 'general_kuwago_two'])->name('general.kuwago-two.dashboard');
    Route::get('kuwago-two/expenses', [Kuwago_TwoController::class, 'chart_expenses_kuwago_two'])->name('general.kuwago-two.expenses');
    Route::get('kuwago-two/sales', [Kuwago_TwoController::class, 'chart_sales_kuwago_two'])->name('general.kuwago-two.sales');
    Route::get('kuwago-two/promos', [Kuwago_TwoController::class, 'kuwagoTwopromos'])->name('general.kuwago-two.promos');
    Route::get('kuwago-two/feedbacks', [Kuwago_TwoController::class, 'showFeedbacks'])->name('general.kuwago-two.feedbacks');
});

Route::middleware(['auth', 'uddesignRole:owner,general,uddesign'])->group(function () {
    Route::get('uddesign', [UddesignController::class, 'general_uddesign'])->name('general.uddesign.dashboard');
    Route::get('uddesign/expenses', [UddesignController::class, 'chart_expenses_uddesign'])->name('general.uddesign.expenses');
    Route::get('uddesign/sales', [UddesignController::class, 'chart_sales_uddesign'])->name('general.uddesign.sales');
    Route::get('uddesign/uddeals', [UddesignController::class, 'uddeals'])->name('general.uddesign.uddeals');
    Route::get('uddesign/feedbacks', [UddesignController::class, 'showFeedbacks'])->name('general.uddesign.feedbacks');

    Route::resource('deals', DealController::class);
    Route::resource('promos', PromoController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('account/password', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('account/password', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('account/password', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('business', BusinessInfoController::class);

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/import-one', [FeedbackController::class, 'importFeedbackOne']);
    Route::get('/feedback/import-two', [FeedbackController::class, 'importFeedbackTwo']);
    Route::post('/feedback/filter-by-date', [FeedbackController::class, 'filterByDate'])->name('feedback.filterByDate');


    Route::get('/uddesignfeedback', [UddesignFeedbackController::class, 'index'])->name('uddesignfeedback.index');
    Route::get('/uddesignfeedback/fetch', [UddesignFeedbackController::class, 'fetchAndStoreFeedback']);
    Route::post('/uddesignfeedback/filter-by-date', [UddesignFeedbackController::class, 'filterByDate'])->name('uddesignfeedback.filterByDate');

    Route::resource('targetSales', TargetSalesController::class);
    Route::resource('budgetAllocations', BudgetAllocationController::class);
    Route::resource('kuwago-two-target', KuwagoTwoTargetController::class);
    Route::resource('kuwago-two-budget', KuwagoTwoBudgetController::class);
    Route::resource('uddesign-target', UddesignTargetController::class);
    // Route::resource('uddesign-target', 'UddesignTargetController');

    Route::resource('uddesign-budget', UddesignBudgetController::class);

    Route::post('/target-sales/display/{id}', [TargetSalesController::class, 'setDisplayTargetSale'])->name('target.sales.display');
    Route::post('/budget-allocations/display/{id}', [BudgetAllocationController::class, 'setDisplayBugetAllocation'])->name('budget.allocations.display');
    Route::post('kuwago-two-target/display/{id}', [KuwagoTwoTargetController::class, 'setDisplayKuwagoTwoTarget'])->name('kuwagotwo.target.display');
    Route::post('kuwago-two-budget/display/{id}', [KuwagoTwoBudgetController::class, 'setDisplayKuwagoTwoBudget'])->name('kuwagotwo.budget.display');
    Route::post('uddesign-target/display/{id}', [UddesignTargetController::class, 'setDisplayUddesignTarget'])->name('uddesign.target.display');
    Route::post('uddesign-budget/display/{id}', [UddesignBudgetController::class, 'setDisplayUddesignBudget'])->name('uddesign.budget.display');
});

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('executive', [ExecutiveController::class, 'combinedDashboard'])->name('general.executive.dashboard');
    Route::get('executive/weather', [ExecutiveController::class, 'weather'])->name('general.executive.weather');
    Route::resource('account', AccountController::class);
});
// Route::get('/fetch-target-sale', [Kuwago_OneController::class, 'general_kuwago_one_new'])->name('general.kuwago-one.sale');


require __DIR__ . '/auth.php';
