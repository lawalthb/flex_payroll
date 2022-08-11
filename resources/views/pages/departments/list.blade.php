@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Departments";
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
                        Departments
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
                        <div id="departments-list-records">
                            <div class="row">
                                <div class="col">
                                    <div id="page-main-content" class="table-responsive">
                                        <?php Html::page_bread_crumb("/departments/", $field_name, $field_value); ?>
                                        <table class="table table-hover table-striped table-sm text-left">
                                            <thead class="table-header ">
                                                <tr>
                                                    <th class="td-id" > Id</th>
                                                    <th class="td-name <?php echo (get_value('orderby') == 'name' ? 'sortedby' : null); ?>" >
                                                    <?php Html :: get_field_order_link('name', "Name", ''); ?>
                                                    </th>
                                                    <th class="td-status" > Status</th>
                                                    <th class="td-" > </th>
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
                                                    <td class="td-id">
                                                        <a href="<?php print_link("departments/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                                    </td>
                                                    <td class="td-name">
                                                        <?php echo  $data['name'] ; ?>
                                                    </td>
                                                    <td class="td-status">
                                                        <?php echo  $data['status'] ; ?>
                                                    </td>
                                                    <td class="td-masterdetailbtn">
                                                        <a data-page-id="departments-detail-page" class="btn btn-sm btn-secondary open-master-detail-page" href="<?php print_link("departments/masterdetail/$data[id]"); ?>">
                                                        <i class="material-icons">add</i> 
                                                    </a>
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
                            <!-- Detail Page Column -->
                            <?php if(!request()->has('subpage')){ ?>
                            <div class="col-12">
                                <div class=" ">
                                    <div id="departments-detail-page" class="master-detail-page"></div>
                                </div>
                            </div>
                            <?php } ?>
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
