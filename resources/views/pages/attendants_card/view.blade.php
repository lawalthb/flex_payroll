@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Attendants Card Details";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="view" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Attendants Card Details
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class=" page-content" >
                        <?php
                            $counter = 0;
                            if($data){
                            $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                            $counter++;
                        ?>
                        <div id="page-main-content" class="">
                            <div class="row">
                                <div class="col">
                                    <!-- Table Body Start -->
                                    <div class="page-data">
                                        <!--PageComponentStart-->
                                        <div class="border-top td-id p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Id</div>
                                                    <div class="font-weight-bold">
                                                        <?php echo  $data['id'] ; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top td-worker_id p-2">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="text-muted"> Worker Id</div>
                                                    <div class="font-weight-bold">
                                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("workers/view/$data[worker_id]?subpage=1") ?>">
                                                        <i class="material-icons">visibility</i> <?php echo "Workers Detail" ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-image p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Image</div>
                                                <div class="font-weight-bold">
                                                    <?php 
                                                        Html :: page_img($data['image'],200,200, "", "", 1); 
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-totalpresent p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Totalpresent</div>
                                                <div class="font-weight-bold">
                                                    <?php echo  $data['totalpresent'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-totalabsent p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Totalabsent</div>
                                                <div class="font-weight-bold">
                                                    <?php echo  $data['totalabsent'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-month p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Month</div>
                                                <div class="font-weight-bold">
                                                    <?php echo  $data['month'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-status p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Status</div>
                                                <div class="font-weight-bold">
                                                    <?php echo  $data['status'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top td-year p-2">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <div class="text-muted"> Year</div>
                                                <div class="font-weight-bold">
                                                    <?php echo  $data['year'] ; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--PageComponentEnd-->
                                    <div class="d-flex q-col-gutter-xs justify-btween">
                                        <div class="dropdown" >
                                            <button data-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                            <i class="material-icons">menu</i> 
                                            </button>
                                            <ul class="dropdown-menu">
                                                <a class="dropdown-item "   href="<?php print_link("attendants_card/edit/$rec_id"); ?>">
                                                <i class="material-icons">edit</i> Edit
                                            </a>
                                            <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("attendants_card/delete/$rec_id"); ?>">
                                            <i class="material-icons">clear</i> Delete
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Table Body End -->
                    </div>
                </div>
            </div>
            <?php
                }
                else{
            ?>
            <!-- Empty Record Message -->
            <div class="text-muted p-3">
                <i class="material-icons">block</i> No Record Found
            </div>
            <?php
                }
            ?>
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
