<?php


use Maatwebsite\Excel\Facades\Excel;


use App\Livewire\User\UserCreate;
use App\Livewire\User\UserEdit;
use App\Livewire\User\UserIndex;
use App\Livewire\User\UserShow;


use App\Livewire\Products\ProductCreate;
use App\Livewire\Products\ProductEdit;
use App\Livewire\Products\ProductIndex;
use App\Livewire\Products\ProductShow;

use App\Livewire\Role\RoleIndex;
use App\Livewire\Role\RoleCreate;
use App\Livewire\Role\RoleEdit;
use App\Livewire\Role\RoleShow;
//* PWD
use App\Livewire\Pwd\PwdDashboard;
use App\Livewire\Pwd\PwdList;
use App\Livewire\Pwd\PwdInfo;
use App\Livewire\Pwd\PwdMember;
use App\Livewire\Pwd\PwdUpdate;

//* AICS
use App\Livewire\Aics\AicsDashboard;
use App\Livewire\Aics\Dashboard\AicsLinechart;
use App\Livewire\Aics\Dashboard\AicsPiechart;
use App\Livewire\Aics\Folder\AicsList;
use App\Livewire\Aics\Members\AddMembers;
use App\Livewire\Aics\Members\MonthlyListAics;
use App\Livewire\Aics\Members\UpdateMember;
use App\Livewire\Aics\Report\AicsReport;
use App\Livewire\Logs\ActivityLogs;
use App\Livewire\Logs\LoginActivity;
use App\Livewire\Logs\Pwd\PwdActivity;
use App\Livewire\Logs\Soloparent\SoloparentDeleted;
use App\Livewire\Pwd\Dashboard\PwdLinechart;
use App\Livewire\Pwd\Dashboard\PwdPiechart;
use App\Livewire\Pwd\Report\PwdReport;
use App\Livewire\Seniorcitizen\AddSeniorCitizen;
use App\Livewire\Seniorcitizen\Dashboard\SeniorLinechart;
use App\Livewire\Seniorcitizen\Dashboard\SeniorPiechart;
use App\Livewire\Seniorcitizen\Dead\SeniorDeceased;
use App\Livewire\Seniorcitizen\SeniorList;
use App\Livewire\Seniorcitizen\Show\SeniorShowInfo;
use App\Livewire\Seniorcitizen\Update\UpdateSenior;
use App\Livewire\Soloparent\Edit\EditSoloParent;
use App\Livewire\Soloparent\Id\SoloparentID;
//* Soloparent
use App\Livewire\Soloparent\Members\SoloParentAdd;
use App\Livewire\Soloparent\Report\SoloParentReport;
use App\Livewire\Soloparent\SoloParent;
use App\Livewire\Soloparent\Show\ShowParents;


use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/','login')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');


    Route::get('/user-activity', [LoginActivity::class, 'index'])->name('user.activity');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{id}/edit', UserEdit::class)->name('users.edit');
    Route::get('users/{id}', UserShow::class)->name('users.show');
    Route::get('users', UserIndex::class)->name('users.index');

    Route::get('product/create', ProductCreate::class)->name('product.create')->middleware('permission:product.create');
    Route::get('product/{id}/edit', ProductEdit::class)->name('product.edit')->middleware('permission:product.edit');
    Route::get('product/{id}', ProductShow::class)->name('product.show')->middleware('permission:product.show');
    Route::get('product', ProductIndex::class)->name('product.index')->middleware('permission:product.view|product.create|product.edit|product.delete');

    Route::get('activity', ActivityLogs::class)->name('activity.logs');
    Route::get('roles', RoleIndex::class)->name('roles.index')->middleware('permission:role.view|role.create|role.edit|role.delete');
    Route::get('roles/create', RoleCreate::class)->name('roles.create')->middleware('permission:role.create');
    Route::get('roles/{id}/edit', RoleEdit::class)->name('roles.edit')->middleware('permission:role.edit');
    Route::get('roles/{id}', RoleShow::class)->name('roles.show')->middleware('permission:role.delete');



    Route::get('pwd/list', PwdList::class)->name('pwd.list');
    Route::get('pwd/member/create', PwdMember::class)->name('pwd.member.create');
    Route::get('/pwd/register', PwdMember::class)->name('pwd.register');
    Route::get('pwd/report',PwdReport::class)->name('pwd.report');
    Route::get('pwd/latest', PwdActivity::class)->name('pwd.latest');

    Route::get('/pwd/disability-chart', [PwdLinechart::class, 'pwdDisabilityLineChart']);
    Route::get('/pwd/gender-chart', [PwdPiechart::class, 'pwdGenderChart']);
    Route::get('pwd/{id}/edit', PwdUpdate::class)->name('pwd.member.edit');
    Route::get('pwd/{id}', PwdInfo::class)->name('pwd.info'); // KEEP THIS LAST
    
    //! AICs Route


    Route::get('aics/list', AicsList::class)->name('aics.list');
    Route::get('aics/member/create', AddMembers::class)->name('aics.member.create');
    Route::get('monthly/list', MonthlyListAics::class)->name('aics.monthly.list');

    Route::get('/aics-piechart',AicsPiechart::class);
    Route::get('/aics-line-chart', AicsLinechart::class);
    Route::get('/aics/update/{id}', UpdateMember::class)->name('aics.update');



    //! Solo Parent
    Route::get('solo/parent/deleted', SoloparentDeleted::class)->name('soloparent.deleted');
    Route::get('solo/parent/add',SoloParentAdd::class)->name('solo-parent.add');
    Route::get('solo/parent', SoloParent::class)->name('solo-parent.list');
    Route::get('/solo/parent/report',SoloParentReport::class)->name('solo-parent.report');


    Route::get('/solo-parent/{id}/edit',EditSoloParent ::class)->name('solo-parent.edit');
    Route::get('/solo-parent/{id}', ShowParents::class)->name('solo-parent.show');


    //!Senior Citizen

    Route::get('senior/citizen', SeniorList::class)->name('senior-citizen.list');
    Route::get('senior/citizen/add', AddSeniorCitizen::class)->name('senior-citizen.add');
    Route::get('/senior/age-chart', [SeniorPiechart::class, 'seniorAgeChart']);
    Route::get('/senior/gender-linechart', [SeniorLinechart::class, 'genderLineChart']);

    Route::get('senior/citizen/deceased', SeniorDeceased::class)->name('senior-citizen.deceased');
    Route::get('senior/citizen/update/{id}', UpdateSenior::class)->name('senior-citizen.update');
    Route::get('senior/show/{id}',SeniorShowInfo ::class)->name('senior-citizen.show');

    //!Activity Logs - PWD
    


    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
