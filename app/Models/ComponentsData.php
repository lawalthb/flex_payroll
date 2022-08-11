<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * worker_id_option_list Model Action
     * @return array
     */
	function worker_id_option_list(){
		$arr = [];
		if(request()->search){
			$search = trim(request()->search);
			$sqltext = "SELECT  DISTINCT id AS value, regno AS label FROM workers WHERE regno LIKE :search ORDER BY lastname ASC LIMIT 0,10" ;
			$query_params = [];
			$query_params['search'] = "%$search%";
			$arr = DB::select(DB::raw($sqltext), $query_params);
		}
		return $arr;
	}
	

	/**
     * fullname_option_list Model Action
     * @return array
     */
	function fullname_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT   CONCAT(firstname,' ', lastname)  AS value, CONCAT(firstname,' ', lastname) AS label FROM workers WHERE id=:lookup_worker_id" ;
		$query_params = [];
		$query_params['lookup_worker_id'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * attendants_card_worker_id_option_list Model Action
     * @return array
     */
	function attendants_card_worker_id_option_list(){
		$sqltext = "SELECT id as value, firstname as label FROM workers";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * state_id_option_list Model Action
     * @return array
     */
	function state_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM states";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * department_id_option_list Model Action
     * @return array
     */
	function department_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM departments";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * workers_state_id_option_list Model Action
     * @return array
     */
	function workers_state_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM states";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * lga_id_option_list Model Action
     * @return array
     */
	function lga_id_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM local_governments WHERE state_id=:lookup_state_id" ;
		$query_params = [];
		$query_params['lookup_state_id'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * workers_department_id_option_list Model Action
     * @return array
     */
	function workers_department_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM departments ORDER BY name ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * position_id_option_list Model Action
     * @return array
     */
	function position_id_option_list($value = null){
		$lookup_value = request()->lookup ?? $value;
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM positions WHERE department_id=:lookup_department_id ORDER BY name ASC" ;
		$query_params = [];
		$query_params['lookup_department_id'] = $lookup_value;
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * branch_id_option_list Model Action
     * @return array
     */
	function branch_id_option_list(){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM branchs ORDER BY name ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
}
