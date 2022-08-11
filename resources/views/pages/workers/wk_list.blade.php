@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Workers";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Registered Workers
                    </div>
                </div>
                <div class="col-md-auto " >
                </div>
                <div class="col-md-3 " >
                    <form  class="search" action="{{ url()->current() }}" method="get">
                        <input type="hidden" name="page" value="1" />
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content" >
                        <div id="workers-wk_list-records">
                            <div class="row">
                                <div class="col">
                                    <div id="page-main-content" class="table-responsive">
                                        <?php Html::page_bread_crumb("/workers/wk_list", $field_name, $field_value); ?>
                                        <table class="table table-hover table-striped table-sm text-left">
                                            <thead class="table-header ">
                                                <tr>
                                                    <th class="td-regno" > Regno</th>
                                                    <th class="td-firstname <?php echo (get_value('orderby') == 'firstname' ? 'sortedby' : null); ?>" >
                                                    <?php Html :: get_field_order_link('firstname', "Firstname", ''); ?>
                                                    </th>
                                                    <th class="td-lastname <?php echo (get_value('orderby') == 'lastname' ? 'sortedby' : null); ?>" >
                                                    <?php Html :: get_field_order_link('lastname', "Lastname", ''); ?>
                                                    </th>
                                                    <th class="td-middlename <?php echo (get_value('orderby') == 'middlename' ? 'sortedby' : null); ?>" >
                                                    <?php Html :: get_field_order_link('middlename', "Middlename", ''); ?>
                                                    </th>
                                                    <th class="td-dob <?php echo (get_value('orderby') == 'dob' ? 'sortedby' : null); ?>" >
                                                    <?php Html :: get_field_order_link('dob', "Birthday", ''); ?>
                                                    </th>
                                                    <th class="td-gender <?php echo (get_value('orderby') == 'gender' ? 'sortedby' : null); ?>" >
                                                    <?php Html :: get_field_order_link('gender', "Gender", ''); ?>
                                                    </th>
                                                    <th class="td-photo" > Photo</th>
                                                    <th class="td-name" > Department</th>
                                                    <th class="td-name" > Position</th>
                                                    <th class="td-name" > Branch</th>
                                                    <th class="td-state_id" > State Id</th>
                                                    <th class="td-lga_id" > Lga Id</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                if($total_records){
                                            ?>
                                            <tbody class="page-data">
                                                <!--record-->
                                                <?php
                                                    $counter = 0;
                                                    foreach($records as $data){
                                                    $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                                    $counter++;
                                                ?>
                                                <tr>
                                                    <!--PageComponentStart-->
                                                    <td class="td-regno">
                                                        <?php echo  $data['regno'] ; ?>
                                                    </td>
                                                    <td class="td-firstname">
                                                        <?php echo  $data['firstname'] ; ?>
                                                    </td>
                                                    <td class="td-lastname">
                                                        <?php echo  $data['lastname'] ; ?>
                                                    </td>
                                                    <td class="td-middlename">
                                                        <?php echo  $data['middlename'] ; ?>
                                                    </td>
                                                    <td class="td-dob"><strong><?php echo date('d M', strtotime($data['dob'])); ?></strong></td>
                                                    <td class="td-gender">
                                                        <?php echo  $data['gender'] ; ?>
                                                    </td>
                                                    <td class="td-photo">
                                                        <?php 
                                                            Html :: page_img($data['photo'],50,50, "medium", "large", 1); 
                                                        ?>
                                                    </td>
                                                    <td class="td-departments_name">
                                                        <?php echo  $data['departments_name'] ; ?>
                                                    </td>
                                                    <td class="td-positions_name">
                                                        <?php echo  $data['positions_name'] ; ?>
                                                    </td>
                                                    <td class="td-branchs_name">
                                                        <?php echo  $data['branchs_name'] ; ?>
                                                    </td>
                                                    <td class="td-state_id">
                                                        <?php echo  $data['state_id'] ; ?>
                                                    </td>
                                                    <td class="td-lga_id">
                                                        <?php echo  $data['lga_id'] ; ?>
                                                    </td>
                                                    <!--PageComponentEnd-->
                                                </tr>
                                                <?php 
                                                    }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data"></tbody>
                                            <?php
                                                }
                                                else{
                                            ?>
                                            <tbody class="page-data">
                                                <tr>
                                                    <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                                        <i class="material-icons">block</i> No record found
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php
                                                }
                                            ?>
                                        </table>
                                    </div>
                                    <?php
                                        if($show_footer){
                                    ?>
                                    <div class="">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                </div>
                                            </div>
                                            <div class="col">   
                                                <?php
                                                    if($show_pagination == true){
                                                    $pager = new Pagination($total_records, $record_count);
                                                    $pager->show_page_count = false;
                                                    $pager->show_record_count = true;
                                                    $pager->show_page_limit =false;
                                                    $pager->limit = $limit;
                                                    $pager->show_page_number_list = true;
                                                    $pager->pager_link_range=5;
                                                    $pager->render();
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('pagecss')
<style>

</style>
@endsection
@section('pagejs')
<script>
	/*
	* Page Custom Javascript | Jquery codes
	*/

	//$(document).ready(function(){
	//	
	//});
</script>

@endsection
