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
                        Workers
                    </div>
                </div>
                <div class="col-md-auto " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("workers/add") ?>" >
                    <i class="material-icons">add</i>                               
                    Add New Workers 
                </a>
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
                    <div id="workers-list-records">
                        <div class="row">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <?php Html::page_bread_crumb("/workers/", $field_name, $field_value); ?>
                                    <table class="table table-hover table-striped table-sm text-left">
                                        <thead class="table-header ">
                                            <tr>
                                                <th class="td-checkbox">
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                <span class="custom-control-label"></span>
                                                </label>
                                                </th>
                                                <th class="td-id" > Id</th>
                                                <th class="td-regno" > Regno</th>
                                                <th class="td-firstname" > Firstname</th>
                                                <th class="td-lastname" > Lastname</th>
                                                <th class="td-middlename" > Middlename</th>
                                                <th class="td-dob" > Dob</th>
                                                <th class="td-gender" > Gender</th>
                                                <th class="td-phone" > Phone</th>
                                                <th class="td-email" > Email</th>
                                                <th class="td-date_join" > Date Join</th>
                                                <th class="td-photo" > Photo</th>
                                                <th class="td-cv" > Cv</th>
                                                <th class="td-address" > Address</th>
                                                <th class="td-department_id" > Department Id</th>
                                                <th class="td-position_id" > Position Id</th>
                                                <th class="td-status" > Status</th>
                                                <th class="td-work_type_id" > Work Type Id</th>
                                                <th class="td-branch_id" > Branch Id</th>
                                                <th class="td-state_id" > State Id</th>
                                                <th class="td-lga_id" > Lga Id</th>
                                                <th class="td-btn"></th>
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
                                                <td class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                    <span class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <!--PageComponentStart-->
                                                <td class="td-id">
                                                    <a href="<?php print_link("workers/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                                </td>
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
                                                <td class="td-dob">
                                                    <span title="<?php echo human_datetime($data['dob']); ?>" class="has-tooltip">
                                                    <?php echo relative_date($data['dob']); ?>
                                                    </span>
                                                </td>
                                                <td class="td-gender">
                                                    <?php echo  $data['gender'] ; ?>
                                                </td>
                                                <td class="td-phone">
                                                    <a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a>
                                                </td>
                                                <td class="td-email">
                                                    <a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a>
                                                </td>
                                                <td class="td-date_join">
                                                    <span title="<?php echo human_datetime($data['date_join']); ?>" class="has-tooltip">
                                                    <?php echo relative_date($data['date_join']); ?>
                                                    </span>
                                                </td>
                                                <td class="td-photo">
                                                    <?php 
                                                        Html :: page_img($data['photo'],50,50, "medium", "large", 1); 
                                                    ?>
                                                </td>
                                                <td class="td-cv">
                                                    <?php echo  $data['cv'] ; ?>
                                                </td>
                                                <td class="td-address">
                                                    <?php echo  $data['address'] ; ?>
                                                </td>
                                                <td class="td-department_id">
                                                    <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("departments/view/$data[department_id]?subpage=1") ?>">
                                                    <?php echo $data['departments_name'] ?>
                                                </a>
                                            </td>
                                            <td class="td-position_id">
                                                <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("positions//$data[position_id]?subpage=1") ?>">
                                                <?php echo $data['positions_name'] ?>
                                            </a>
                                        </td>
                                        <td class="td-status">
                                            <?php echo  $data['status'] ; ?>
                                        </td>
                                        <td class="td-work_type_id">
                                            <?php echo  $data['work_type_id'] ; ?>
                                        </td>
                                        <td class="td-branch_id">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("branchs//$data[branch_id]?subpage=1") ?>">
                                            <?php echo $data['branchs_name'] ?>
                                        </a>
                                    </td>
                                    <td class="td-state_id">
                                        <?php echo  $data['state_id'] ; ?>
                                    </td>
                                    <td class="td-lga_id">
                                        <?php echo  $data['lga_id'] ; ?>
                                    </td>
                                    <!--PageComponentEnd-->
                                    <td class="td-btn">
                                        <div class="dropdown" >
                                            <button data-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                            <i class="material-icons">menu</i> 
                                            </button>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item "   href="<?php print_link("workers/view/$rec_id"); ?>">
                                                <i class="material-icons">visibility</i> View
                                            </a>
                                            <a class="dropdown-item "   href="<?php print_link("workers/edit/$rec_id"); ?>">
                                            <i class="material-icons">edit</i> Edit
                                        </a>
                                        <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("workers/delete/$rec_id"); ?>">
                                        <i class="material-icons">clear</i> Delete
                                    </a>
                                </ul>
                            </div>
                        </td>
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
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("workers/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                        <i class="material-icons">clear</i> Delete Selected
                        </button>
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
