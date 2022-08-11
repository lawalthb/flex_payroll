
<?php
	class Menu{
		
	public static function navbartopleft(){
		return [
		[
			'path' => 'home',
			'label' => "Home", 
			'icon' => ''
		],
		
		[
			'path' => 'workers/add',
			'label' => "Register Bio Data", 
			'icon' => ''
		],
		
		[
			'path' => 'guarantors/add',
			'label' => "Register Guarantor", 
			'icon' => ''
		],
		
		[
			'path' => 'departments',
			'label' => "Departments", 
			'icon' => ''
		],
		
		[
			'path' => 'positions',
			'label' => "Positions", 
			'icon' => ''
		]
	] ;
	}
	
		
	public static function day(){
		return [
		[
			'value' => 'Sunday', 
			'label' => "Sunday", 
		],
		[
			'value' => 'Monday', 
			'label' => "Monday", 
		],
		[
			'value' => 'Tuesday', 
			'label' => "Tuesday", 
		],
		[
			'value' => 'Wednesday', 
			'label' => "Wednesday", 
		],
		[
			'value' => 'Thursday', 
			'label' => "Thursday", 
		],
		[
			'value' => 'Friday', 
			'label' => "Friday", 
		],
		[
			'value' => 'Saturday', 
			'label' => "Saturday", 
		],] ;
	}
	
	public static function status(){
		return [
		[
			'value' => '1', 
			'label' => "Present", 
		],
		[
			'value' => '0', 
			'label' => "Abesent", 
		],] ;
	}
	
	public static function month(){
		return [
		[
			'value' => 'January', 
			'label' => "January", 
		],
		[
			'value' => 'February', 
			'label' => "February", 
		],
		[
			'value' => 'March', 
			'label' => "March", 
		],
		[
			'value' => 'April', 
			'label' => "April", 
		],
		[
			'value' => 'May', 
			'label' => "May", 
		],
		[
			'value' => 'June', 
			'label' => "June", 
		],
		[
			'value' => 'July', 
			'label' => "July", 
		],
		[
			'value' => 'August', 
			'label' => "August", 
		],
		[
			'value' => 'September', 
			'label' => "September", 
		],
		[
			'value' => 'October', 
			'label' => "October", 
		],
		[
			'value' => 'November', 
			'label' => "November", 
		],
		[
			'value' => 'Decembcer', 
			'label' => "Decembcer", 
		],] ;
	}
	
	public static function year(){
		return [
		[
			'value' => '2017', 
			'label' => "2017", 
		],
		[
			'value' => '2018', 
			'label' => "2018", 
		],
		[
			'value' => '2019', 
			'label' => "2019", 
		],
		[
			'value' => '2020', 
			'label' => "2020", 
		],
		[
			'value' => '2021', 
			'label' => "2021", 
		],
		[
			'value' => '2022', 
			'label' => "2022", 
		],
		[
			'value' => '2023', 
			'label' => "2023", 
		],
		[
			'value' => '2024', 
			'label' => "2024", 
		],
		[
			'value' => '2025', 
			'label' => "2025", 
		],
		[
			'value' => '2026', 
			'label' => "2026", 
		],
		[
			'value' => '2027', 
			'label' => "2027", 
		],
		[
			'value' => '2028', 
			'label' => "2028", 
		],
		[
			'value' => '2029', 
			'label' => "2029", 
		],
		[
			'value' => '2030', 
			'label' => "2030", 
		],] ;
	}
	
	public static function relationship(){
		return [
		[
			'value' => 'Mother', 
			'label' => "Mother", 
		],
		[
			'value' => 'Father', 
			'label' => "Father", 
		],
		[
			'value' => 'Brother', 
			'label' => "Brother", 
		],
		[
			'value' => 'Sister', 
			'label' => "Sister", 
		],
		[
			'value' => 'Neighbour', 
			'label' => "Neighbour", 
		],
		[
			'value' => 'Husband', 
			'label' => "Husband", 
		],
		[
			'value' => 'Wife', 
			'label' => "Wife", 
		],
		[
			'value' => 'Uncle', 
			'label' => "Uncle", 
		],
		[
			'value' => 'Aunt', 
			'label' => "Aunt", 
		],
		[
			'value' => 'Friend', 
			'label' => "Friend", 
		],
		[
			'value' => 'Other', 
			'label' => "Other", 
		],] ;
	}
	
	public static function gender(){
		return [
		[
			'value' => 'Male', 
			'label' => "Male", 
		],
		[
			'value' => 'Female', 
			'label' => "Female", 
		],] ;
	}
	
	public static function work_type_id(){
		return [
		[
			'value' => 'Full Time', 
			'label' => "Full Time", 
		],
		[
			'value' => 'Part Time', 
			'label' => "Part Time", 
		],
		[
			'value' => 'IT', 
			'label' => "IT", 
		],] ;
	}
	
	}
