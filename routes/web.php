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

Route::group(['middleware' => ['revalidate','auth']], function(){
// Route::group(['middleware' => 'revalidate'], function(){
	Route::get('/', 'HomeController@index');
	// Route::get('/home', 'HomeController@index');
	Route::get('/dashboard', 'HomeController@index');

//Application document routes 
Route::get('application_type/{app_type_name}', 'HomeController@getDocumentTypes');

Route::resource('role', 'ErpRoleController');

Route::post('role_permission_store', 'ErpRoleController@rolePermissionStore');
Route::get('role_assign-permission/{id}', 'ErpRoleController@assignPermission');
Route::get('all_document_msg', 'ErpPatientController@allDocumentMsg');


// User route
Route::resource('user', 'ErpUserController');
Route::resource('doc_type_code', 'ErpDocTypeController');
Route::get('doc_type_code/getDoc/{id}','ErpDocTypeController@getDoc'); //for getting document types of a particular users
Route::get('deleteDocView/{id}', 'ErpDocTypeController@deleteDocView');

Route::resource('speciality', 'ErpSpecialityController');
Route::get('profile', 'ErpUserController@profile');
Route::put('view_profile', 'ErpUserController@edit_profile');


Route::get('deleteUserView/{id}', 'ErpUserController@deleteUserView');
Route::get('deleteUser/{id}', 'ErpUserController@deleteUser');
Route::get('user/editPassword/{id}','ErpUserController@editPassword');
Route::put('user/changePassword/{id}','ErpUserController@changePassword');
Route::get('user_assign-permission/{user_id}', 'ErpUserController@assignPermission');
Route::post('user_permission_store', 'ErpUserController@userPermissionStore');

//Header route
Route::get('header', 'ErpHeaderController@index_header');
Route::put('header_edit', 'ErpHeaderController@edit_header');

// Base group routes
Route::resource('base_group', 'ErpBaseGroupController');
Route::get('deleteBaseGroupView/{id}', 'ErpBaseGroupController@deleteBaseGroupView');
Route::get('deleteBaseGroup/{id}', 'ErpBaseGroupController@deleteBaseGroup');

// Base setup routes
Route::resource('base_setup', 'ErpBaseSetupController');
Route::get('deleteBaseSetupView/{id}', 'ErpBaseSetupController@deleteBaseSetupView');
Route::get('deleteBaseSetup/{id}', 'ErpBaseSetupController@deleteBaseSetup');

// Designation routes
Route::resource('designation', 'ErpDesignationController');
Route::get('deleteDesignationView/{id}', 'ErpDesignationController@deleteDesignationView');
Route::get('deleteDesignation/{id}', 'ErpDesignationController@deleteDesignation');

// Department routes
Route::resource('department', 'ErpDepartmentController');
Route::get('deleteDepartmentView/{id}', 'ErpDepartmentController@deleteDepartmentView');
Route::get('deleteDepartment/{id}', 'ErpDepartmentController@deleteDepartment');

// Patient routes
Route::resource('patient', 'ErpPatientController');
Route::get('deletePateientView/{id}', 'ErpPatientController@deletePateientView');
Route::get('deletePateient/{id}', 'ErpPatientController@deletePateient');

Route::get('create', ['as' => 'create', 'uses' => 'ErpPatientController@create']);
Route::post('edit', ['as' => 'edit', 'uses' => 'ErpPatientController@edit']);

Route::get('document/create', 'ErpPatientController@createDoc');
Route::get('document/getDoc/{id}','ErpPatientController@getDoc'); //for getting document types of a particular users
Route::post('document/store', 'ErpPatientController@storeDoc');
Route::get('document/edit/{id}', 'ErpPatientController@editDoc');
Route::put('document/update/{id}', 'ErpPatientController@updateDoc');
Route::get('document/{id}', 'ErpPatientController@documentPdf');
Route::get('deleteDocumentView/{id}', 'ErpPatientController@deleteDocumentView');
Route::get('deleteDocument/{id}', 'ErpPatientController@deleteDocument');


Route::get('patients_doc_types/{id}', ['as' => 'patients_doc_types', 'uses' => 'ErpPatientController@patients_doc_types']);




Route::get('checked_out/{id}', 'ErpPatientController@checkedOut');
Route::get('checkedOutLink/{id}', 'ErpPatientController@checkedOutLink');

Route::get('checked_in/{id}', 'ErpPatientController@checkedIn');
Route::get('checkedInLink/{id}', 'ErpPatientController@checkedInLink');

Route::post('getDocTypeCode', ['as' => 'getDocTypeCode', 'uses' => 'ErpPatientController@getDocTypeCode']);

Route::get('previousVersions/{id}', 'ErpPatientController@previousVersions');

// document preview

Route::get('preview_doc/{id}','ErpPatientController@doc_preview');

Route::get('preview_doc/getDoc/{id}','ErpDocTypeController@getDoc');

//send email
Route::post('send_email/{id}','ErpPatientController@send_email');

//web
// Route::get('home', 'ErpWebController@home');
//Route::get('behabiour', 'ErpWebController@behabiour');

Route::get('support_plan', ['as' => 'support_plan', 'uses' => 'ErpWebController@support_plan']);
Route::get('behabiour', ['as' => 'behabiour', 'uses' => 'ErpWebController@behabiour']);

//Route::get('generatePDF', 'ErpPatientController@generatePDF');
//Route::get('generatePDF/{id}', ['as' => 'generatePDF', 'uses' => 'ErpPatientController@generatePDF']);
Route::get('generatePDF/{id}', 'ErpPatientController@generatePDF');
Route::get('patient_demog/{id}', 'ErpPatientController@patient_demog');
Route::get('support_plan/{id}', 'ErpPatientController@support_plan');
Route::get('full_patients_details/{id}', 'ErpPatientController@full_patients_details');

//document
Route::get('doc_dashboard','ErpDocumentListController@allDoc');
Route::get('doc_list/{id}/{type}','ErpDocumentListController@docList');
Route::get('patient_doc_list/{id}/{type}','ErpDocumentListController@patient_doc_list');

Route::get('doc-type/edit/{id}', 'ErpDocumentListController@editDoc');
Route::put('doc-type/update/{id}', 'ErpDocumentListController@updateDoc');


//bulk update

Route::get('add_bulk', 'BulkImportController@addBulk');
Route::Post('bulk_import', 'BulkImportController@storeBulk');

//application type 
Route::resource('application_type', 'ErpAppTypeController');
});

// consultant 
Route::resource('consultant', 'ErpConsultantController');
