<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkersAddRequest;
use App\Http\Requests\WorkersEditRequest;
use App\Models\Workers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
class WorkersController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.workers.list";
		$query = Workers::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Workers::search($query, $search); // search table records
		}
		$query->join("departments", "workers.department_id", "=", "departments.id");
		$query->join("positions", "workers.position_id", "=", "positions.id");
		$query->join("branchs", "workers.branch_id", "=", "branchs.id");
		$orderby = $request->orderby ?? "workers.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Workers::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Workers::query();
		$record = $query->findOrFail($rec_id, Workers::viewFields());
		return $this->renderView("pages.workers.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.workers.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(WorkersAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("photo", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['photo'], "photo");
			$modeldata['photo'] = $fileInfo['filepath'];
		}
		
		if( array_key_exists("cv", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['cv'], "cv");
			$modeldata['cv'] = $fileInfo['filepath'];
		}
		
		//save Workers record
		$record = Workers::create($modeldata);
		$rec_id = $record->id;
		$this->afterAdd($record);
		return $this->redirect("home", "Record added successfully");
	}
    /**
     * After new record created
     * @param array $record // newly created record
     */
    private function afterAdd($record){
        //enter statement here
        $id = $record->id;
        DB::table('workers')->where('id', $id)->update(['regno' => "FPW00".$id]);
    }
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(WorkersEditRequest $request, $rec_id = null){
		$query = Workers::query();
		$record = $query->findOrFail($rec_id, Workers::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("photo", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['photo'], "photo");
			$modeldata['photo'] = $fileInfo['filepath'];
		}
		
		if( array_key_exists("cv", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['cv'], "cv");
			$modeldata['cv'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("workers", "Record updated successfully");
		}
		return $this->renderView("pages.workers.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Workers::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function wk_list(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.workers.wk_list";
		$query = Workers::query();
		$limit = $request->limit ?? 20;
		if($request->search){
			$search = trim($request->search);
			Workers::search($query, $search); // search table records
		}
		$query->join("departments", "workers.department_id", "=", "departments.id");
		$query->join("positions", "workers.position_id", "=", "positions.id");
		$query->join("branchs", "workers.branch_id", "=", "branchs.id");
		$orderby = $request->orderby ?? "workers.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Workers::wkListFields());
		return $this->renderView($view, compact("records"));
	}
}
