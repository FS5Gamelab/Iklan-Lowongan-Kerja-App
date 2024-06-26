<?php
use App\Http\Controllers\AppliedJobsController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeekersController;
use App\Http\Controllers\JobController;
use App\Models\Jobs;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $jobs = Jobs::all();
    return view('welcome', compact('jobs'));
});

Route::get('/beranda', function () {
    $jobs = Jobs::all();
    return view('seeker.layout.master', compact('jobs'));
})->name('beranda');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'company'])->group(function () {
    Route::resource('/company-profile', CompaniesController::class);
    Route::resource('/company/jobs', JobsController::class);
    Route::get('/company-jobs-show/{id}', [JobsController::class, 'show'])->name('company.jobs.show');
    Route::get('/company/jobs/{id}', [JobsController::class, 'show'])->name('jobs-show');
    Route::get('/company/jobs-trash', [JobsController::class, 'trash'])->name('company.jobs.trash');
    Route::get('/company/jobs-restore/{id}', [JobsController::class, 'restore'])->name('company.jobs.restore');
    Route::resource('applications', ApplicationsController::class);
    Route::get('applications-trash', [ApplicationsController::class, 'trash'])->name('applications.trash');
    Route::get('applications-restore/{id}', [ApplicationsController::class, 'restore'])->name('applications.restore');
    Route::resource('company-category', CategoriesController::class)->except(['show']);
    Route::get('company-category-trash', [CategoriesController::class, 'trash'])->name('company-category.trash');
    Route::get('company-category-restore/{id}', [CategoriesController::class, 'restore'])->name('company-category.restore');
    Route::get('/company/jobs/trash', [JobsController::class, 'trash'])->name('jobs.trash');
    Route::put('/company/jobs/restore/{id}', [JobsController::class, 'restore'])->name('jobs.restore');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/seeker/home', function () {
        return view('seeker.layout.master');
    })->name('seeker.home');
    Route::get('/seeker/applied_jobs', [SeekersController::class, 'appliedJobs'])->name('seeker.applied_jobs');
    Route::get('/seeker/jobs', [JobController::class, 'index'])->name('seeker.jobs.index');

    Route::get('/jobs/trash', [JobController::class, 'trash'])->name('jobs.trash');
    
    // Correct route definition for profile show
    Route::get('/seeker/profile/{seekerId}', [SeekersController::class, 'show'])->name('seeker.profile.show');
    Route::get('/profile/edit', [SeekersController::class, 'edit'])->name('seeker.profile.edit');
    Route::put('/profile/update', [SeekersController::class, 'update'])->name('seeker.profile.update');
    Route::get('/resume/{seekerId}', [SeekersController::class, 'viewResume'])->name('resume.view');
    Route::put('/profile/update/{seekerId}', [SeekersController::class, 'updateProfile'])->name('profile.updatep');
    Route::get('/seeker/jobs/{id}', [ApplicationController::class, 'showJob'])->name('seeker.jobs.show');
    Route::post('/seeker/applications', [ApplicationController::class, 'store'])->name('seeker.applications.store');
    

});


require __DIR__.'/auth.php';
