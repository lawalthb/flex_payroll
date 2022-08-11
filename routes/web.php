<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

	
	Route::get('', 'HomeController@index')->name('index');
	Route::get('home', 'HomeController@index')->name('home');




/* routes for Attendants Controller */	
	Route::get('attendants', 'AttendantsController@index')->name('attendants.index');
	Route::get('attendants/index', 'AttendantsController@index')->name('attendants.index');
	Route::get('attendants/index/{filter?}/{filtervalue?}', 'AttendantsController@index')->name('attendants.index');	
	Route::get('attendants/view/{rec_id}', 'AttendantsController@view')->name('attendants.view');	
	Route::get('attendants/add', 'AttendantsController@add')->name('attendants.add');
	Route::post('attendants/store', 'AttendantsController@store')->name('attendants.store');
		
	Route::any('attendants/edit/{rec_id}', 'AttendantsController@edit')->name('attendants.edit');	
	Route::get('attendants/delete/{rec_id}', 'AttendantsController@delete');

/* routes for Attendants_Card Controller */	
	Route::get('attendants_card', 'Attendants_CardController@index')->name('attendants_card.index');
	Route::get('attendants_card/index', 'Attendants_CardController@index')->name('attendants_card.index');
	Route::get('attendants_card/index/{filter?}/{filtervalue?}', 'Attendants_CardController@index')->name('attendants_card.index');	
	Route::get('attendants_card/view/{rec_id}', 'Attendants_CardController@view')->name('attendants_card.view');	
	Route::get('attendants_card/add', 'Attendants_CardController@add')->name('attendants_card.add');
	Route::post('attendants_card/store', 'Attendants_CardController@store')->name('attendants_card.store');
		
	Route::any('attendants_card/edit/{rec_id}', 'Attendants_CardController@edit')->name('attendants_card.edit');	
	Route::get('attendants_card/delete/{rec_id}', 'Attendants_CardController@delete');

/* routes for Branchs Controller */	
	Route::get('branchs', 'BranchsController@index')->name('branchs.index');
	Route::get('branchs/index', 'BranchsController@index')->name('branchs.index');
	Route::get('branchs/index/{filter?}/{filtervalue?}', 'BranchsController@index')->name('branchs.index');	
	Route::get('branchs/view/{rec_id}', 'BranchsController@view')->name('branchs.view');
	Route::get('branchs/masterdetail/{rec_id}', 'BranchsController@masterDetail')->name('branchs.masterdetail');	
	Route::get('branchs/add', 'BranchsController@add')->name('branchs.add');
	Route::post('branchs/store', 'BranchsController@store')->name('branchs.store');
		
	Route::any('branchs/edit/{rec_id}', 'BranchsController@edit')->name('branchs.edit');	
	Route::get('branchs/delete/{rec_id}', 'BranchsController@delete');

/* routes for Departments Controller */	
	Route::get('departments', 'DepartmentsController@index')->name('departments.index');
	Route::get('departments/index', 'DepartmentsController@index')->name('departments.index');
	Route::get('departments/index/{filter?}/{filtervalue?}', 'DepartmentsController@index')->name('departments.index');	
	Route::get('departments/view/{rec_id}', 'DepartmentsController@view')->name('departments.view');
	Route::get('departments/masterdetail/{rec_id}', 'DepartmentsController@masterDetail')->name('departments.masterdetail');	
	Route::any('departments/edit/{rec_id}', 'DepartmentsController@edit')->name('departments.edit');	
	Route::get('departments/delete/{rec_id}', 'DepartmentsController@delete');	
	Route::get('departments/department2', 'DepartmentsController@department2');
	Route::get('departments/department2/{filter?}/{filtervalue?}', 'DepartmentsController@department2');

/* routes for Guarantors Controller */	
	Route::get('guarantors', 'GuarantorsController@index')->name('guarantors.index');
	Route::get('guarantors/index', 'GuarantorsController@index')->name('guarantors.index');
	Route::get('guarantors/index/{filter?}/{filtervalue?}', 'GuarantorsController@index')->name('guarantors.index');	
	Route::get('guarantors/view/{rec_id}', 'GuarantorsController@view')->name('guarantors.view');	
	Route::get('guarantors/add', 'GuarantorsController@add')->name('guarantors.add');
	Route::post('guarantors/store', 'GuarantorsController@store')->name('guarantors.store');
		
	Route::any('guarantors/edit/{rec_id}', 'GuarantorsController@edit')->name('guarantors.edit');	
	Route::get('guarantors/delete/{rec_id}', 'GuarantorsController@delete');

/* routes for Local_Governments Controller */	
	Route::get('local_governments', 'Local_GovernmentsController@index')->name('local_governments.index');
	Route::get('local_governments/index', 'Local_GovernmentsController@index')->name('local_governments.index');
	Route::get('local_governments/index/{filter?}/{filtervalue?}', 'Local_GovernmentsController@index')->name('local_governments.index');	
	Route::get('local_governments/view/{rec_id}', 'Local_GovernmentsController@view')->name('local_governments.view');	
	Route::get('local_governments/add', 'Local_GovernmentsController@add')->name('local_governments.add');
	Route::post('local_governments/store', 'Local_GovernmentsController@store')->name('local_governments.store');
		
	Route::any('local_governments/edit/{rec_id}', 'Local_GovernmentsController@edit')->name('local_governments.edit');	
	Route::get('local_governments/delete/{rec_id}', 'Local_GovernmentsController@delete');

/* routes for Positions Controller */	
	Route::get('positions', 'PositionsController@index')->name('positions.index');
	Route::get('positions/index', 'PositionsController@index')->name('positions.index');
	Route::get('positions/index/{filter?}/{filtervalue?}', 'PositionsController@index')->name('positions.index');	
	Route::get('positions/view/{rec_id}', 'PositionsController@view')->name('positions.view');	
	Route::any('positions/edit/{rec_id}', 'PositionsController@edit')->name('positions.edit');	
	Route::get('positions/delete/{rec_id}', 'PositionsController@delete');

/* routes for States Controller */	
	Route::get('states', 'StatesController@index')->name('states.index');
	Route::get('states/index', 'StatesController@index')->name('states.index');
	Route::get('states/index/{filter?}/{filtervalue?}', 'StatesController@index')->name('states.index');	
	Route::get('states/view/{rec_id}', 'StatesController@view')->name('states.view');	
	Route::get('states/add', 'StatesController@add')->name('states.add');
	Route::post('states/store', 'StatesController@store')->name('states.store');
		
	Route::any('states/edit/{rec_id}', 'StatesController@edit')->name('states.edit');	
	Route::get('states/delete/{rec_id}', 'StatesController@delete');

/* routes for Users Controller */	
	Route::get('users', 'UsersController@index')->name('users.index');
	Route::get('users/index', 'UsersController@index')->name('users.index');
	Route::get('users/index/{filter?}/{filtervalue?}', 'UsersController@index')->name('users.index');	
	Route::get('users/view/{rec_id}', 'UsersController@view')->name('users.view');	
	Route::get('users/add', 'UsersController@add')->name('users.add');
	Route::post('users/store', 'UsersController@store')->name('users.store');
		
	Route::any('users/edit/{rec_id}', 'UsersController@edit')->name('users.edit');	
	Route::get('users/delete/{rec_id}', 'UsersController@delete');

/* routes for Workers Controller */	
	Route::get('workers', 'WorkersController@index')->name('workers.index');
	Route::get('workers/index', 'WorkersController@index')->name('workers.index');
	Route::get('workers/index/{filter?}/{filtervalue?}', 'WorkersController@index')->name('workers.index');	
	Route::get('workers/view/{rec_id}', 'WorkersController@view')->name('workers.view');	
	Route::get('workers/add', 'WorkersController@add')->name('workers.add');
	Route::post('workers/store', 'WorkersController@store')->name('workers.store');
		
	Route::any('workers/edit/{rec_id}', 'WorkersController@edit')->name('workers.edit');	
	Route::get('workers/delete/{rec_id}', 'WorkersController@delete');	
	Route::get('workers/wk_list', 'WorkersController@wk_list');
	Route::get('workers/wk_list/{filter?}/{filtervalue?}', 'WorkersController@wk_list');

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {
	
	
});


	
Route::get('componentsdata/worker_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->worker_id_option_list($request);
	}
);
	
Route::get('componentsdata/fullname_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->fullname_option_list($request);
	}
);
	
Route::get('componentsdata/attendants_card_worker_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->attendants_card_worker_id_option_list($request);
	}
);
	
Route::get('componentsdata/state_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->state_id_option_list($request);
	}
);
	
Route::get('componentsdata/department_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->department_id_option_list($request);
	}
);
	
Route::get('componentsdata/workers_state_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->workers_state_id_option_list($request);
	}
);
	
Route::get('componentsdata/lga_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->lga_id_option_list($request);
	}
);
	
Route::get('componentsdata/workers_department_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->workers_department_id_option_list($request);
	}
);
	
Route::get('componentsdata/position_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->position_id_option_list($request);
	}
);
	
Route::get('componentsdata/branch_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->branch_id_option_list($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');