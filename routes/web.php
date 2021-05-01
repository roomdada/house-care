<?php

use App\Domain\City\City;
use App\Domain\House\House;
use App\Domain\Service\Domaine;
use App\Domain\Service\Service;
use App\Domain\User\Testimony;
use App\Http\Controllers\Call\CallController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\CanvasserController;
use App\Http\Controllers\auth\CustomerController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPassword;
use App\Http\Controllers\customer\CustomerDashController;
use App\Http\Controllers\dashboard\provider\PageDashController;
use App\Http\Controllers\house\HouseController;
use App\Http\Controllers\house\TimeController;
use App\Http\Controllers\pages\PageController;
use App\Http\Controllers\proposals\ProposalController;
use App\Http\Controllers\provider\TestimonyController;
use App\Http\Controllers\search\SearchController;
use App\Http\Controllers\services\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('home.page');



Route::get('user-acount/',[PageController::class, 'UserAccount'])->name('user.account.path');
Route::post('search-provider',[SearchController::class,'search'])->name('search.path');



Route::get('page/{page}',[PageController::class,'page'])->name('page.path');
Route::post('call',[CallController::class,'call'])->name('call.path');
Route::get('register/{type_user}',[RegisterController::class,'page'])->name('register.path');
Route::get('login',[LoginController::class,'index'])->name('login.path');
Route::post('logout',[LoginController::class,'logout'])->name('logout');
Route::post('login',[LoginController::class,'authenticate'])->name('login.store.path');
Route::get('provider/{service}',[ServiceController::class,'ProviderService'])->name('provider.path');
Route::get('house/{house}',[ServiceController::class,'HouseDetails'])->name('house.details.path');
Route::get('domaine/{domaine}',[ServiceController::class,'ServiceDomaine'])->name('domaine.services.path');

Route::post('register/provider',[RegisterController::class,'RegisterProvider'])->name('store.register.provider');
Route::post('register/canvasser',[CanvasserController::class,'RegisterCanvasser'])->name('store.register.canvasser');
Route::post('register/customer',[CustomerController::class,'RegisterCustomer'])->name('store.register.cistomer');


Route::post('create/provider-proposal/',[ProposalController::class,'CreateProviderProvider'])->name('create.provider.proposal');
Route::post('create/service-proposal/',[ProposalController::class,'CreateServiceProvider'])->name('create.service.proposal');

Route::get('account/confirmation/{token}',[RegisterController::class,'ProviderConfirmAccount'])->name('confirmation.user.account');
Route::get('call/provider/{token}/{service}',[CallController::class,'ProviderDetails'])->name('provider.details');
Route::get('create-call/provider/{provider}/{service}',[CallController::class,'CallProvider'])->name('call.provider');
Route::post('create-call/provider/',[CallController::class,'StoreCallProvider'])->name('store.call.provider');
Route::post('create-call/canvasser/',[CallController::class,'StoreCallCanvasser'])->name('store.call.canvasser');


Route::middleware('auth','provider')->prefix('provider')->group(function(){
    Route::get('dash/{page}',[PageDashController::class,'page'])->name('provider.page.path');
    Route::get('/delete/{service}',[ServiceController::class,'ProviderDeleteService'])->name('provider.delete.service');
    Route::get('proposal/{service}',[ServiceController::class,'ShowProposalPrice'])->name('show.proposal');
    Route::post('create-proposal/',[ServiceController::class,'CreateProposal'])->name('store.proposal');

     
});
     Route::get('user-status',[PageDashController::class,'UserStatus'])->name('provider.status');
    Route::post('create-testimony',[TestimonyController::class,'create'])->name('create.testimony.path');


Route::middleware('auth','house')->prefix('house-provider')->group(function(){
    Route::get('/',[PageDashController::class,'HouseProvider'])->name('home.house.provider');
    Route::get('house/{page}',[PageDashController::class,'house_page'])->name('provider.house.path');
    Route::get('create-house/',[HouseController::class,'index'])->name('provider.show');
    Route::post('create-house/',[HouseController::class,'StoreHouse'])->name('store.house');
    Route::get('edit-house/{house}',[HouseController::class,'EditHouse'])->name('edit.house.show');
    Route::post('edit-house',[HouseController::class,'StoreEdit'])->name('edit.house.post');
    Route::post('timetable',[TimeController::class,'Store'])->name('timetable.post');
    Route::get('timetable/{id}',[TimeController::class,'delete'])->name('timetable.delete');

});


Route::post('edit-account',[HouseController::class,'StoreEditAccount'])->name('edit.account.post');

Route::get('password-forget',function(){
        return view('pages.users.password-reset.show',['category' => Domaine::all()]);
})->name('show.password.forget.form');

Route::post('verify-user-identity',[ResetPassword::class,'VerifyUserEmail'])->name('verify.user.email');
Route::post('confirm-password-reset',[ResetPassword::class,'ConfirmNewPassword'])->name('confirm.password.reset');
Route::get('password-reset-form/{user}',[ResetPassword::class, 'LoginForm'])->name('show.password-reset.form');


Route::middleware('customer','auth')->prefix('customer')->group(function(){
    Route::get('/{page}',[CustomerDashController::class,'page'])->name('customer.page');
});

Route::middleware('auth','admin')->prefix('administrateur')->group(function(){
    Route::get('{page}',[AdminController::class,'page'])->name('admin.page');
    Route::get('service/{page}',[AdminController::class,'ServicePage'])->name('admin.service.page');
    Route::get('delete-user/{user}',[AdminController::class,'DeleteUser'])->name('admin.delete.user');
    Route::get('delete-domaine/{domaine}',[AdminController::class,'DeleteDomaine'])->name('admin.delete.domaine');
    Route::post('store-edit-domaine',[AdminController::class,'StoreEditDomaine'])->name('admin.store.edit.domaine');
    Route::get('edit-domaine/{domaine}',[AdminController::class,'ShowDomaine'])->name('admin.edit.domaine');
    Route::post('create/domaine',[AdminController::class,'storeService'])->name('admin.create.domaine');
    Route::get('proposal/provider',[AdminController::class,'ShowProviderProposal'])->name('admin.show.provider.proposal');
    Route::get('delete/proposal/{proposal}',[AdminController::class,'DeleteProposalProvider'])->name('admin.delete.provider.proposal');
    Route::get('delete/service/{service}',[AdminController::class,'DeleteService'])->name('admin.delete.service');
    Route::post('create-service',[AdminController::class,'CreateService'])->name('admin.create.service');
    Route::get('edit-service/{service}',[AdminController::class,'ShowService'])->name('admin.edit.service');
    Route::post('store-edit-service',[AdminController::class,'StoreEditService'])->name('admin.store.edit.service');


    Route::get('provider/{page}',[AdminController::class,'ProviderPage'])->name('provider.page');
    Route::get('accept-user-acount/{token}',[AdminController::class,'AcceptUserAccount'])->name('accept.user.account');
    Route::get('delete-proposal-provider/{page}',[AdminController::class,'DeleteProviderProposal'])->name('admin.delete.provider.proposal');
    Route::get('others/{page}',[AdminController::class,'OtherPages'])->name('admin.other.page');
    Route::get('delete-message/{message}',[AdminController::class,'DeleteMessage'])->name('admin.delete.message');
    Route::get('delete-testimony/{testimony}',[AdminController::class,'DeleteTestimony'])->name('admin.delete.testimony');
    Route::get('delete-proposal-price/{proposal}',[AdminController::class,'DeleteProposalPrice'])->name('admin.delete.price.proposal');
    Route::post('city', [AdminController::class,'AddCity'])->name('store.city.path');
    Route::get('delete-city/{city}', [AdminController::class,'DeleteCity'])->name('delete.city.path');
    Route::get('show-user/{user}', [AdminController::class,'ShowUser'])->name('show.user.path');
});