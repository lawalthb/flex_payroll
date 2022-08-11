@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Attendants";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Add New Attendants
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
                <div class="col-md-9 comp-grid" >
                    <?php Html::display_page_errors($errors); ?>
                    <div  class="card-4 page-content" >
                        <!--[form-start]-->
                        <form id="attendants-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('attendants.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="worker_id">Worker's No. <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-worker_id-holder" class=" ">
                                                <select required="" data-endpoint="<?php print_link('componentsdata/worker_id_option_list') ?>" id="ctrl-worker_id" data-load-select-options="fullname" name="worker_id"  placeholder="Select a value ..."    class="selectize-ajax" >
                                                <option value="">Select a value ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="fullname">Fullname </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-fullname-holder" class=" ">
                                                <select  id="ctrl-fullname" data-load-path="<?php print_link('componentsdata/fullname_option_list') ?>" name="fullname"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date">Date <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-date-holder" class="input-group ">
                                                <input id="ctrl-date" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('date') ?>" type="datetime" name="date" placeholder="Enter Date" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j l, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="day">Day </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-day-holder" class=" ">
                                                <select  id="ctrl-day" name="day"  placeholder="Select a value ..."    class="custom-select" >
                                                <option value="">Select a value ...</option>
                                                <?php
                                                    $options = Menu::day();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('day', $value);
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>                                   
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="status">Status <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-status-holder" class=" ">
                                                <?php
                                                    $options = Menu::status();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('status', $value, "");
                                                ?>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="status" />
                                                <span class="custom-control-label"><?php echo $label ?></span>
                                                </label>
                                                <?php
                                                    }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="amin">Morning In </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-amin-holder" class="input-group ">
                                                <input id="ctrl-amin" class="form-control datepicker  datepicker"  value="<?php echo get_value('amin') ?>" type="time" name="amin" placeholder="Enter Morning In" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pmout">Evening Out </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-pmout-holder" class="input-group ">
                                                <input id="ctrl-pmout" class="form-control datepicker  datepicker"  value="<?php echo get_value('pmout') ?>" type="time" name="pmout" placeholder="Enter Evening Out" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="pmin">Evening In </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-pmin-holder" class="input-group ">
                                                <input id="ctrl-pmin" class="form-control datepicker  datepicker"  value="<?php echo get_value('pmin') ?>" type="time" name="pmin" placeholder="Enter Evening In" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="amout">Morning Out </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-amout-holder" class="input-group ">
                                                <input id="ctrl-amout" class="form-control datepicker  datepicker"  value="<?php echo get_value('amout') ?>" type="time" name="amout" placeholder="Enter Morning Out" data-enable-time="true" data-min-date="" data-max-date=""  data-alt-format="H:i" data-date-format="H:i:S" data-inline="false" data-no-calendar="true" data-mode="single" /> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">access_time</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
                                <i class="material-icons">send</i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
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
