<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Workers extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'workers';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'firstname','lastname','middlename','gender','dob','phone','email','date_join','photo','address','state_id','lga_id','department_id','position_id','status','work_type_id','branch_id','cv'
	];
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				workers.regno LIKE ?  OR 
				workers.firstname LIKE ?  OR 
				workers.lastname LIKE ?  OR 
				workers.middlename LIKE ?  OR 
				workers.gender LIKE ?  OR 
				workers.phone LIKE ?  OR 
				workers.email LIKE ?  OR 
				workers.cv LIKE ?  OR 
				workers.address LIKE ?  OR 
				workers.status LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"workers.id AS id",
			"workers.regno AS regno",
			"workers.firstname AS firstname",
			"workers.lastname AS lastname",
			"workers.middlename AS middlename",
			"workers.dob AS dob",
			"workers.gender AS gender",
			"workers.phone AS phone",
			"workers.email AS email",
			"workers.date_join AS date_join",
			"workers.photo AS photo",
			"workers.cv AS cv",
			"workers.address AS address",
			"workers.department_id AS department_id",
			"departments.name AS departments_name",
			"workers.position_id AS position_id",
			"positions.name AS positions_name",
			"workers.status AS status",
			"workers.work_type_id AS work_type_id",
			"workers.branch_id AS branch_id",
			"branchs.name AS branchs_name",
			"workers.state_id AS state_id",
			"workers.lga_id AS lga_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"workers.id AS id",
			"workers.regno AS regno",
			"workers.firstname AS firstname",
			"workers.lastname AS lastname",
			"workers.middlename AS middlename",
			"workers.dob AS dob",
			"workers.gender AS gender",
			"workers.phone AS phone",
			"workers.email AS email",
			"workers.date_join AS date_join",
			"workers.photo AS photo",
			"workers.cv AS cv",
			"workers.address AS address",
			"workers.department_id AS department_id",
			"departments.name AS departments_name",
			"workers.position_id AS position_id",
			"positions.name AS positions_name",
			"workers.status AS status",
			"workers.work_type_id AS work_type_id",
			"workers.branch_id AS branch_id",
			"branchs.name AS branchs_name",
			"workers.state_id AS state_id",
			"workers.lga_id AS lga_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"regno",
			"firstname",
			"lastname",
			"middlename",
			"dob",
			"gender",
			"phone",
			"email",
			"date_join",
			"photo",
			"cv",
			"address",
			"department_id",
			"position_id",
			"status",
			"work_type_id",
			"branch_id",
			"state_id",
			"lga_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"regno",
			"firstname",
			"lastname",
			"middlename",
			"dob",
			"gender",
			"phone",
			"email",
			"date_join",
			"photo",
			"cv",
			"address",
			"department_id",
			"position_id",
			"status",
			"work_type_id",
			"branch_id",
			"state_id",
			"lga_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"middlename",
			"gender",
			"dob",
			"phone",
			"email",
			"date_join",
			"photo",
			"address",
			"state_id",
			"lga_id",
			"department_id",
			"position_id",
			"status",
			"work_type_id",
			"branch_id",
			"cv" 
		];
	}
	

	/**
     * return wkList page fields of the model.
     * 
     * @return array
     */
	public static function wkListFields(){
		return [ 
			"workers.id AS id",
			"workers.regno AS regno",
			"workers.firstname AS firstname",
			"workers.lastname AS lastname",
			"workers.middlename AS middlename",
			"workers.dob AS dob",
			"workers.gender AS gender",
			"workers.photo AS photo",
			"departments.name AS departments_name",
			"positions.name AS positions_name",
			"departments.id AS departments_id",
			"departments.name AS departments_name",
			"positions.id AS positions_id",
			"positions.name AS positions_name",
			"branchs.id AS branchs_id",
			"branchs.name AS branchs_name",
			"workers.state_id AS state_id",
			"workers.lga_id AS lga_id" 
		];
	}
	

	/**
     * return exportWkList page fields of the model.
     * 
     * @return array
     */
	public static function exportWkListFields(){
		return [ 
			"workers.id AS id",
			"workers.regno AS regno",
			"workers.firstname AS firstname",
			"workers.lastname AS lastname",
			"workers.middlename AS middlename",
			"workers.dob AS dob",
			"workers.gender AS gender",
			"workers.photo AS photo",
			"departments.name AS departments_name",
			"positions.name AS positions_name",
			"departments.id AS departments_id",
			"departments.name AS departments_name",
			"positions.id AS positions_id",
			"positions.name AS positions_name",
			"branchs.id AS branchs_id",
			"branchs.name AS branchs_name",
			"workers.state_id AS state_id",
			"workers.lga_id AS lga_id" 
		];
	}
}
