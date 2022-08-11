<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Guarantors extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'guarantors';
	

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
		'worker_id','fullname','address','phone','email','relationship','otherinfo','status','hardcopy'
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
				fullname LIKE ?  OR 
				address LIKE ?  OR 
				phone LIKE ?  OR 
				email LIKE ?  OR 
				relationship LIKE ?  OR 
				otherinfo LIKE ?  OR 
				hardcopy LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"id",
			"worker_id",
			"fullname",
			"address",
			"phone",
			"email",
			"relationship",
			"otherinfo",
			"status",
			"hardcopy" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"worker_id",
			"fullname",
			"address",
			"phone",
			"email",
			"relationship",
			"otherinfo",
			"status",
			"hardcopy" 
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
			"worker_id",
			"fullname",
			"address",
			"phone",
			"email",
			"relationship",
			"otherinfo",
			"status",
			"hardcopy" 
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
			"worker_id",
			"fullname",
			"address",
			"phone",
			"email",
			"relationship",
			"otherinfo",
			"status",
			"hardcopy" 
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
			"worker_id",
			"fullname",
			"address",
			"phone",
			"email",
			"relationship",
			"otherinfo",
			"status",
			"hardcopy" 
		];
	}
}
