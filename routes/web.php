<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


/////////////
Route::get('/login', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

Route::get('/registration', [LoginController::class, 'register'])->middleware('alreadyLoggedIn');

Route::post('/registration-user', [LoginController::class, 'registerUser'])->name('registration-user');

Route::post('/login-user', [LoginController::class, 'loginuser'])->name('login-user'); // Changed 'loginUser' to 'loginuser'

Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [LoginController::class, 'logout']);



/////////////////////////


Route::get('/home', [HomeController::class, 'homepage'])->name('home');
Route::get('/about', [HomeController::class, 'aboutpage']);
Route::get('/package', [HomeController::class, 'packagepage']);


//////////////////////////////
Route::get('/classic_book', [HomeController::class, 'classicpage']);
Route::post('/classic-form', [HomeController::class, 'classicForm'])->name('classic-form');

Route::get('/premium_book', [HomeController::class, 'premiumpackage']);
Route::post('/premium-form', [HomeController::class, 'premiumForm'])->name('premium-form');

Route::get('/platinum_book', [HomeController::class, 'platinumpackage']);
Route::post('/platinum-form', [HomeController::class, 'platinumForm'])->name('platinum-form');

Route::get('/contactus', [HomeController::class, 'contactus']);
Route::post('/contactus-form', [HomeController::class, 'contactusform'])->name('contactus-form');


/////////////////////////////////////
Route::get('/adminpanel', [HomeController::class, 'adminview']); // Corrected the method name

Route::get('/adminhomepage', [AdminController::class, 'index'])->name('admin.adminhomepage');

Route::get('/platinumpannel', [AdminController::class, 'platinumview'])->name('admin.platinum');

Route::get('/premiumpannel', [AdminController::class, 'premiumview'])->name('admin.premium');

Route::get('/contactuspannel', [AdminController::class, 'contactusview'])->name('admin.contactuspannel');
////////////////////////////////////

Route::get('/approve-classic/{id}', [AdminController::class, 'approveClassicService'])->name('approveClassicService');
Route::get('/reject-classic/{id}', [AdminController::class, 'rejectClassicService'])->name('rejectClassicService');

Route::get('/approve-platinum/{id}', [AdminController::class, 'approvePlatinumService'])->name('approvePlatinumService');
Route::get('/reject-platinum/{id}', [AdminController::class, 'rejectPlatinumService'])->name('rejectPlatinumService');

Route::get('/approve-premium/{id}', [AdminController::class, 'approvePremiumService'])->name('approvePremiumService');
Route::get('/reject-premium/{id}', [AdminController::class, 'rejectPremiumService'])->name('rejectPremiumService');

Route::get('/report',[ReportController::class,'index'])->name('admin.report');


Route::get('/servicechart', [HomeController::class, 'ServiceChart'])->name('service.chart');
Route::post('/book-service', [HomeController::class, 'bookService'])->name('book.service');
Route::get('/servicestatus', [AdminController::class, 'ServicesStatus'])->name('user.servicestatus');

/////////////////////////////////////


// Route for approving payment
Route::get('/approve-payment/{id}/{type}', [PaymentController::class, 'approvePayment'])
    ->name('approve.payment');

// Route for rejecting payment
Route::get('/reject-payment/{id}/{type}', [PaymentController::class, 'rejectPayment'])
    ->name('reject.payment');


////////////////////////////////

Route::get('/cancelservice/{id}', [HomeController::class, 'deleteClassicService'])->name('cancelservice');
Route::get('/premiumcancel/{id}', [HomeController::class, 'deletePremiumService'])->name('premiumcancel');
Route::get('/platinumcancel/{id}', [HomeController::class, 'deletePlatiumService'])->name('platinumcancel');

///////////////////////////////////////////////


Route::get('admin/team/add', [AdminController::class, 'create'])->name('admin.team.create');
Route::post('admin/team', [AdminController::class, 'store'])->name('admin.team.store');

Route::get('/addTeamMember', [AdminController::class, 'createTeamMember'])->name('admin.team.create');

// Routes for admin actions on team members
Route::get('/admin/team/edit/{id}', [AdminController::class, 'editTeamMember'])->name('admin.team.edit');
Route::put('/admin/team/update/{id}', [AdminController::class, 'updateTeamMember'])->name('admin.team.update');

Route::delete('/admin/team/delete/{id}', [AdminController::class, 'deleteTeamMember'])->name('admin.team.delete');

Route::get('/members', [AdminController::class, 'showTeamMembers'])->name('admin.members');
Route::get('team', [HomeController::class, 'showTeam'])->name('user.team');
////////////////////////////////////////////

Route::get('/addService', [AdminController::class, 'create'])->name('services.create');
Route::post('/services', [AdminController::class, 'storeservice'])->name('services.storeservice');
Route::get('/viewServices', [AdminController::class, 'showServices'])->name('admin.viewServices');

Route::prefix('admin')->group(function () {
    // Route to show the edit form for a service
    Route::get('services/{id}/edit', [AdminController::class, 'edit'])->name('admin.services.edit');

    // Route to update a service
    Route::put('services/{id}', [AdminController::class, 'update'])->name('admin.services.update');

    // Route to delete a service
    Route::delete('services/{id}', [AdminController::class, 'destroy'])->name('admin.services.destroy');
});
