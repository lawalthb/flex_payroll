<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Local_GovernmentsAddRequest;
use App\Http\Requests\Local_GovernmentsEditRequest;
use App\Models\Local_Governments;
use Illuminate\Http\Request;
use Exception;
class Local_GovernmentsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.local_governments.list";
		$query = Local_Governments::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Local_Governments::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "local_governments.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Local_Governments::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Local_Governments::query();
		$record = $query->findOrFail($rec_id, Local_Governments::viewFields());
		return $this->renderView("pages.local_governments.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.local_governments.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(Local_GovernmentsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Local_Governments record
		$record = Local_Governments::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("local_governments", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(Local_GovernmentsEditRequest $request, $rec_id = null){
		$query = Local_Governments::query();
		$record = $query->findOrFail($rec_id, Local_Governments::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("local_governments", "Record updated successfully");
		}
		return $this->renderView("pages.local_governments.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Local_Governments::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
