<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendantsAddRequest;
use App\Http\Requests\AttendantsEditRequest;
use App\Models\Attendants;
use Illuminate\Http\Request;
use Exception;
class AttendantsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.attendants.list";
		$query = Attendants::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Attendants::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "attendants.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Attendants::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Attendants::query();
		$record = $query->findOrFail($rec_id, Attendants::viewFields());
		return $this->renderView("pages.attendants.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.attendants.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AttendantsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Attendants record
		$record = Attendants::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("attendants", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AttendantsEditRequest $request, $rec_id = null){
		$query = Attendants::query();
		$record = $query->findOrFail($rec_id, Attendants::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("attendants", "Record updated successfully");
		}
		return $this->renderView("pages.attendants.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Attendants::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
