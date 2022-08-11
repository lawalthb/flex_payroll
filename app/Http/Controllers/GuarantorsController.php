<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuarantorsAddRequest;
use App\Http\Requests\GuarantorsEditRequest;
use App\Models\Guarantors;
use Illuminate\Http\Request;
use Exception;
class GuarantorsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.guarantors.list";
		$query = Guarantors::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Guarantors::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "guarantors.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Guarantors::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Guarantors::query();
		$record = $query->findOrFail($rec_id, Guarantors::viewFields());
		return $this->renderView("pages.guarantors.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.guarantors.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(GuarantorsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("hardcopy", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['hardcopy'], "hardcopy");
			$modeldata['hardcopy'] = $fileInfo['filepath'];
		}
		
		//save Guarantors record
		$record = Guarantors::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("guarantors", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(GuarantorsEditRequest $request, $rec_id = null){
		$query = Guarantors::query();
		$record = $query->findOrFail($rec_id, Guarantors::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("hardcopy", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['hardcopy'], "hardcopy");
			$modeldata['hardcopy'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("guarantors", "Record updated successfully");
		}
		return $this->renderView("pages.guarantors.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Guarantors::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}
