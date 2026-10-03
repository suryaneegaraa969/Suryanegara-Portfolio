<?php
// routes/web.php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\StreamedResponse;

Route::get('/view-certificate/{filename}', function (string $filename) {
    $path = 'certificates/' . $filename;

    if (!Storage::disk('public')->exists($path)) {
        abort(404);
    }

    return response()->file(storage_path('app/public/' . $path), [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
    ]);
})->name('certificate.view');

Route::get('/', [ProfileController::class, 'index'])->name('home');
Route::get('/portfolio/{project:slug}', [ProfileController::class, 'showProject'])->name('portfolio.show');
Route::get('/certifications/{certification:slug}', [ProfileController::class, 'showCertification'])->name('certification.show');
Route::post('/contact', [ProfileController::class, 'storeMessage'])->name('contact.store')->middleware('throttle:5,1');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Public routes (no authentication required)
    Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login.get');
    Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post')->middleware('throttle:5,1');

    // Protected routes (require authentication)
    Route::middleware(['admin'])->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Profile CRUD routes
        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('index');
            Route::get('/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('edit');
            Route::put('/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('update');
        });

        // Projects CRUD routes
        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('store');
            Route::get('/{project}/edit', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('edit');
            Route::put('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('update');
            Route::delete('/{project}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('destroy');
        });

        // Certifications CRUD routes
        Route::prefix('certifications')->name('certifications.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\CertificationController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\CertificationController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\CertificationController::class, 'store'])->name('store');
            Route::get('/{certification}/edit', [App\Http\Controllers\Admin\CertificationController::class, 'edit'])->name('edit');
            Route::put('/{certification}', [App\Http\Controllers\Admin\CertificationController::class, 'update'])->name('update');
            Route::delete('/{certification}', [App\Http\Controllers\Admin\CertificationController::class, 'destroy'])->name('destroy');
        });

        // Skills CRUD routes
        Route::prefix('skills')->name('skills.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SkillController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\Admin\SkillController::class, 'create'])->name('create');
            Route::post('/', [App\Http\Controllers\Admin\SkillController::class, 'store'])->name('store');
            Route::get('/{skill}/edit', [App\Http\Controllers\Admin\SkillController::class, 'edit'])->name('edit');
            Route::put('/{skill}', [App\Http\Controllers\Admin\SkillController::class, 'update'])->name('update');
            Route::delete('/{skill}', [App\Http\Controllers\Admin\SkillController::class, 'destroy'])->name('destroy');
        });

        // Messages routes
        Route::prefix('messages')->name('messages.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
            Route::get('/{message}', [App\Http\Controllers\Admin\MessageController::class, 'show'])->name('show');
            Route::put('/{message}/read', [App\Http\Controllers\Admin\MessageController::class, 'markAsRead'])->name('markAsRead');
            Route::delete('/{message}', [App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('destroy');
        });
    });
});

// routes/web.php — tambahkan di bagian bawah
use App\Models\Certification;
use App\Models\PortfolioProject;

Route::get('/sitemap.xml', function () {
    $urls = collect([
        ['loc' => url('/'), 'priority' => '1.0'],
    ]);

    foreach (PortfolioProject::all() as $project) {
        $urls->push(['loc' => route('portfolio.show', $project->slug), 'priority' => '0.8']);
    }

    foreach (Certification::all() as $cert) {
        $urls->push(['loc' => route('certification.show', $cert->slug), 'priority' => '0.6']);
    }

    $xml = view('sitemap', compact('urls'));

    return response($xml, 200)->header('Content-Type', 'text/xml');
})->name('sitemap');