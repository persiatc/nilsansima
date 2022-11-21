<?php

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

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Index
Route::get('/','DashboardController@index')->middleware('auth');

// Dashboards
Route::get('/dashboard','DashboardController@index')->middleware('auth');



// Users
Route::get('users','UserController@index')->middleware('auth');
Route::get('users/deleteUser/{id}','UserController@destroy')->middleware('auth');
Route::post('users/editUser/','UserController@update')->middleware('auth');
Route::post('users/addUser/','UserController@create')->middleware('auth');

// Profile
Route::get('profile','UserController@profileIndex')->middleware('auth');
Route::post('profile/updateInformation','UserController@updateInformation')->middleware('auth');
Route::post('profile/updatePassword','UserController@updatePassword')->middleware('auth');
Route::post('profile/updateAvatar','UserController@updateAvatar')->middleware('auth');


// TodoList
Route::post('/Tdl/updateFromDoer','TdlController@updateFromDoer')->middleware('auth');
Route::post('/Tdl/updateDoer','TdlController@updateDoer')->middleware('auth');
Route::post('/Tdl/updateAssignedToOther','TdlController@updateAssignedToOther')->middleware('auth');
Route::post('/Tdl/addTdl','TdlController@store')->middleware('auth');
Route::get('/Tdl/delete/{id}','TdlController@destroy')->middleware('auth');
Route::get('/Tdl/show/{id}','TdlController@show')->middleware('auth');
Route::post('/Tdl/updateAssignerStatus','TdlController@updateAssignerStatus')->middleware('auth');


//Inquiry
Route::get('/Inquiry','InquiryController@index')->middleware('auth');
Route::post('/Inquiry/add','InquiryController@store')->middleware('auth');
Route::get('/Inquiry/delete/{id}','InquiryController@destroy')->middleware('auth');
Route::get('/Inquiry/show/{id}','InquiryController@show')->middleware('auth');
Route::get('/Inquiry/detail/{id}','InquiryController@detail')->middleware('auth');
Route::post('/InquiryDetail/add','InquiryController@storeDetail')->middleware('auth');




// TimeSheet
Route::get('/timesheet','TimeSheetController@index')->middleware('auth');
Route::post('/timesheet/add','TimeSheetController@store')->middleware('auth');
Route::get('/timesheet/delete/{id}','TimeSheetController@destroy')->middleware('auth');
Route::get('/timesheet/show/{id}','TimeSheetController@show')->middleware('auth');


// Projects
Route::get('/projects','ProjectController@index')->middleware('auth');

//Avl
Route::get('avl','AvlController@index')->middleware('auth');
Route::post('avl','AvlController@store')->middleware('auth');
Route::get('avl/delete/{id}','AvlController@destroy')->middleware('auth');
Route::get('avl/edit/{id}','AvlController@edit')->middleware('auth');
Route::post('avl/update/{id}','AvlController@update')->middleware('auth');
Route::get('avl/show/{id}','AvlController@show')->middleware('auth');



//ContractsKarfarmayan
Route::get('contracts','ContractController@index')->middleware('auth');
Route::post('contracts','ContractController@store')->middleware('auth');
Route::get('contracts/delete/{id}','ContractController@destroy')->middleware('auth');
Route::get('contracts/edit/{id}','ContractController@edit')->middleware('auth');
Route::post('contracts/update/{id}','ContractController@update')->middleware('auth');
Route::get('contracts/show/{id}','ContractController@show')->middleware('auth');


//ContractsSellers
Route::get('SellersContracts','SellerContractController@index')->middleware('auth');
Route::post('SellersContracts','SellerContractController@store')->middleware('auth');
Route::get('SellerContract/delete/{id}','SellerContractController@destroy')->middleware('auth');
Route::get('SellerContract/edit/{id}','SellerContractController@edit')->middleware('auth');
Route::post('SellerContract/update/{id}','SellerContractController@update')->middleware('auth');
Route::get('SellerContract/show/{id}','SellerContractController@show')->middleware('auth');


//Proceeding
Route::get('ProceedingsApi','ProceedingController@indexApi');
Route::get('Proceedings','ProceedingController@index')->middleware('auth');
Route::post('Proceedings','ProceedingController@store')->middleware('auth');
Route::post('Proceedings/update','ProceedingController@update')->middleware('auth');
Route::get('Proceedings/delete/{id}','ProceedingController@destroy')->middleware('auth');


//Certificates
Route::get('Certificates','CertificatesController@index')->middleware('auth');
Route::post('Certificates','CertificatesController@store')->middleware('auth');
Route::get('Certificates/delete/{id}','CertificatesController@destroy')->middleware('auth');
Route::get('Certificates/edit/{id}','CertificatesController@edit')->middleware('auth');
Route::post('Certificates/update/{id}','CertificatesController@update')->middleware('auth');


//Dokumentation
Route::get('Dokumentation','DokumentationController@index')->middleware('auth');
Route::post('Dokumentation','DokumentationController@store')->middleware('auth');
Route::get('Dokumentation/delete/{id}','DokumentationController@destroy')->middleware('auth');
Route::get('Dokumentation/edit/{id}','DokumentationController@edit')->middleware('auth');
Route::post('Dokumentation/update/{id}','DokumentationController@update')->middleware('auth');



//Suggestions
Route::get('Suggestions','SuggestionController@index')->middleware('auth');
Route::post('Suggestions','SuggestionController@store')->middleware('auth');
Route::get('Suggestions/delete/{id}','SuggestionController@destroy')->middleware('auth');


//Suggestions
Route::get('Baner','SuggestionController@indexBaner')->middleware('auth');
Route::post('Baner','SuggestionController@storeBaner')->middleware('auth');
Route::get('Baner/delete/{id}','SuggestionController@destroyBaner')->middleware('auth');


//Forms
Route::get('forms','FormController@index')->middleware('auth');
Route::post('forms','FormController@store')->middleware('auth');
Route::get('forms/delete/{id}','FormController@destroy')->middleware('auth');




//Income Contracts
Route::get('IncomeContracts','IncomeContractController@index')->middleware('auth');
Route::post('IncomeContracts','IncomeContractController@store')->middleware('auth');
Route::get('IncomeContracts/delete/{id}','IncomeContractController@destroy')->middleware('auth');


//Tenders
Route::get('tenders','TenderController@index')->middleware('auth');
Route::post('tenders','TenderController@store')->middleware('auth');
Route::get('tenders/edit/{id}','TenderController@edit')->middleware('auth')->name('tenders.edit');
Route::post('tenders/update/{id}','TenderController@update')->middleware('auth')->name('tenders.update');
Route::get('tenders/delete/{id}','TenderController@destroy')->middleware('auth');
Route::get('tenders/show/{id}','TenderController@show')->middleware('auth');
Route::post('tenders/updateStatusTender','TenderController@updateStatusTender')->middleware('auth');


//phone book
Route::get('phoneBooks','PhoneBookController@index')->middleware('auth');
Route::post('phoneBooks','PhoneBookController@store')->middleware('auth');
Route::get('phoneBook/delete/{id}','PhoneBookController@destroy')->middleware('auth');
Route::post('phoneBook/update/{id}','PhoneBookController@update')->middleware('auth');

//archives
Route::get('archives/{type}','ArchiveController@index')->middleware('auth');
Route::post('archives','ArchiveController@store')->middleware('auth');
Route::delete('archive/delete/{id}','ArchiveController@destroy')->middleware('auth')->name('archive.delete');
Route::post('archive/update/{id}','ArchiveController@update')->middleware('auth');

//regulartions
Route::get('regulations','RegulationController@index')->middleware('auth');
Route::post('regulations','RegulationController@store')->middleware('auth');
Route::get('regulation/delete/{id}','RegulationController@destroy')->middleware('auth');
Route::post('regulation/update/{id}','RegulationController@update')->middleware('auth');


//Instructions
Route::get('instructions','InstructionController@index')->middleware('auth');
Route::post('instructions','InstructionController@store')->middleware('auth');
Route::get('instruction/delete/{id}','InstructionController@destroy')->middleware('auth');
Route::post('instruction/update/{id}','InstructionController@update')->middleware('auth');


//invoices
Route::get('invoices','InvoiceController@index')->name('invoices')->middleware('auth');
Route::post('invoices','InvoiceController@store')->middleware('auth');
Route::get('invoice/create','InvoiceController@create')->middleware('auth');
Route::get('invoice/delete/{id}','InvoiceController@destroy')->middleware('auth');
Route::post('invoice/update/{id}','InvoiceController@update')->middleware('auth');
Route::post('invoice/updateStatusInvoice','InvoiceController@updateStatusInvoice')->middleware('auth');


//excel
Route::get('downloadExcel/{type}/{id}', 'ExcelController@downloadExcel');
Route::get('invoiceExcel/{id}', 'ExcelController@viewExcel');


// FinancialGuarantee
Route::get('financialGuarantes','FinancialGuaranteeController@index')->middleware('auth');
Route::post('financialGuarantee‍','FinancialGuaranteeController@store')->middleware('auth')->name('financialGuarantee.store');
Route::delete('financialGuarantee/delete/{id}','FinancialGuaranteeController@destroy')->middleware('auth');
Route::post('financialGuarantee/update/{id}','FinancialGuaranteeController@update')->middleware('auth');
Route::post('financialGuarantee/updateEndDate/{id}','FinancialGuaranteeController@updateEndDate')->middleware('auth');


// DailyWork
Route::get('dailyWork','DailyWorkController@index')->middleware('auth');
Route::get('dailyWorkAllUser','DailyWorkController@dailyAlluser')->middleware('auth');

Route::post('dailyWork','DailyWorkController@store')->middleware('auth')->name('dailyWork.store');
// Route::get('financialGuarantee/delete/{id}','DailyWorkController@destroy')->middleware('auth');
// Route::post('financialGuarantee/update/{id}','DailyWorkController@update')->middleware('auth');



//PurchaseRequest
Route::get('PurchaseRequest/{id}','PurchaseRequestController@index')->middleware('auth')->name('PurchaseRequest');
Route::post('PurchaseRequest','PurchaseRequestController@store')->middleware('auth');
Route::get('PurchaseRequest/create/{id}','PurchaseRequestController@create')->middleware('auth');

Route::get('PurchaseRequest/delete/{id}','PurchaseRequestController@destroy')->middleware('auth');
Route::get('PurchaseRequest/edit/{id}','PurchaseRequestController@edit')->middleware('auth');
Route::post('PurchaseRequest/update/{id}','PurchaseRequestController@update')->middleware('auth');
Route::get('PurchaseRequest/show/{id}','PurchaseRequestController@show')->middleware('auth');



//CommissionMajor
Route::get('CommissionMajor/create/{type}/{id}','CommissionMajorController@create')->name('CommissionMajor.create')->middleware('auth');
// Route::get('PurchaseRequest/CommissionMajorList/{type}/{id}','CommissionMajorController@listCommissionsMajorFromPurchase')->name('CommissionMajor')->middleware('auth');
Route::post('CommissionMajor','CommissionMajorController@store')->middleware('auth');
Route::get('CommissionMajor/{type}/{id}','CommissionMajorController@index')->name('CommissionMajor')->middleware('auth');

Route::get('CommissionMajor/delete/{id}','CommissionMajorController@destroy')->middleware('auth');
// Route::get('CommissionMajor/edit/{id}','CommissionMajorController@edit')->middleware('auth');
Route::post('CommissionMajor/update/{id}','CommissionMajorController@update')->middleware('auth');



//CommissionMedium
Route::get('CommissionMedium','CommissionMediumController@index')->middleware('auth');
Route::post('CommissionMedium','CommissionMediumController@store')->middleware('auth');
// Route::get('CommissionMedium/delete/{id}','CommissionMediumController@destroy')->middleware('auth');
// Route::get('CommissionMedium/edit/{id}','CommissionMediumController@edit')->middleware('auth');
Route::post('CommissionMedium/update/{id}','CommissionMediumController@update')->middleware('auth');
// Route::get('CommissionMedium/show/{id}','CommissionMediumController@show')->middleware('auth');


//CommissionPartial
Route::get('CommissionPartial/create/{type}/{id}','CommissionPartialController@create')->name('CommissionPartial.create')->middleware('auth');


Route::get('CommissionPartial','CommissionPartialController@index')->middleware('auth')->name('CommissionPartial');
Route::post('CommissionPartial','CommissionPartialController@store')->middleware('auth');
// Route::get('CommissionPartial/delete/{id}','CommissionPartialController@destroy')->middleware('auth');
// Route::get('CommissionPartial/edit/{id}','CommissionPartialController@edit')->middleware('auth');
Route::post('CommissionPartial/update','CommissionPartialController@update')->middleware('auth');
// Route::get('CommissionPartial/show/{id}','CommissionPartialController@show')->middleware('auth');
Route::get('CommissionPartial/updatePurchaseRequestFormsStatus/{type}/{id}','CommissionPartialController@editPurchaseRequestFormsStatus')->middleware('auth')->name('updatePurchaseRequestFormsStatus');
Route::post('CommissionPartial/updatePurchaseRequestFormsStatus','CommissionPartialController@updatePurchaseRequestFormsStatus')->middleware('auth');



//confirm
Route::get('Commission/storeIdeaComision/{type}/{id}','ConfirmController@create')->name('storeIdeaComision')->middleware('auth');
Route::post('Commission/Confirm','ConfirmController@store')->middleware('auth');
Route::get('Confirm/index/{type}/{id}','ConfirmController@index')->name('Confirm.index')->middleware('auth');

// Route::get('CommissionPartial','ConfirmController@create')->middleware('auth');



//InfoCompany
Route::get('InfoCompany','InfoCompanyController@index')->middleware('auth')->name('InfoCompany');
Route::post('InfoCompany/update','InfoCompanyController@update')->middleware('auth');

// Route::post('InfoCompany','InfoCompanyController@store')->middleware('auth');
// Route::get('InfoCompany/create','InfoCompanyController@create')->middleware('auth');

// Route::get('InfoCompany/delete/{id}','InfoCompanyController@destroy')->middleware('auth');
// Route::get('InfoCompany/edit/{id}','InfoCompanyController@edit')->middleware('auth');
// Route::post('InfoCompany/update','InfoCompanyController@update')->middleware('auth');
// Route::get('InfoCompany/show/{id}','InfoCompanyController@show')->middleware('auth');


//Avl
Route::get('consent','ConsentController@index')->middleware('auth');
Route::post('consent','ConsentController@store')->middleware('auth');
Route::get('consent/delete/{id}','ConsentController@destroy')->middleware('auth');
Route::get('consent/edit/{id}','ConsentController@edit')->middleware('auth');
Route::post('consent/update/{id}','ConsentController@update')->middleware('auth');
Route::get('consent/show/{id}','ConsentController@show')->middleware('auth');



//Commission
Route::get('Commission','CommissionController@index')->middleware('auth');
Route::post('Commission','CommissionController@store')->middleware('auth');
Route::get('Commission/delete/{id}','CommissionController@destroy')->middleware('auth');
Route::get('Commission/edit/{id}','CommissionController@edit')->middleware('auth');
Route::post('Commission/update/{id}','CommissionController@update')->middleware('auth');
Route::get('Commission/show/{id}','CommissionController@show')->middleware('auth');


//PerformanceEvaluation
// Route::get('PerformanceEvaluation','PerformanceEvaluationController@index')->middleware('auth');
// Route::post('PerformanceEvaluation','PerformanceEvaluationController@store')->middleware('auth');
Route::get('PerformanceEvaluation/create','PerformanceEvaluationController@create')->middleware('auth');
// Route::get('PerformanceEvaluation/delete/{id}','PerformanceEvaluationController@destroy')->middleware('auth');
// Route::get('PerformanceEvaluation/edit/{id}','PerformanceEvaluationController@edit')->middleware('auth');
// Route::post('PerformanceEvaluation/update/{id}','PerformanceEvaluationController@update')->middleware('auth');
// Route::get('PerformanceEvaluation/show/{id}','PerformanceEvaluationController@show')->middleware('auth');



//chat
Route::get('chat','Nilsan\ChatController@index')->middleware('auth');
Route::post('chat','Nilsan\ChatController@store')->middleware('auth');
Route::get('chat/create','Nilsan\ChatController@create')->middleware('auth');
Route::get('chat/delete/{id}','Nilsan\ChatController@destroy')->middleware('auth');
Route::post('chat/update/{id}','Nilsan\ChatController@update')->middleware('auth');


//divar
Route::get('divar','Nilsan\DivarController@index')->middleware('auth');
Route::post('divar','Nilsan\DivarController@store')->middleware('auth');
// Route::get('divar/create','Nilsan\DivarController@create')->middleware('auth');
Route::get('divar/delete/{id}','Nilsan\DivarController@destroy')->middleware('auth');
Route::post('divar/update/{id}','Nilsan\DivarController@update')->middleware('auth');


//articles
Route::get('article','Nilsan\ArticleController@index')->middleware('auth');
Route::post('article/store','Nilsan\ArticleController@store')->middleware('auth');
Route::get('article/delete/{id}','Nilsan\ArticleController@destroy')->middleware('auth');
Route::post('article/update/{id}','Nilsan\ArticleController@update')->middleware('auth');
