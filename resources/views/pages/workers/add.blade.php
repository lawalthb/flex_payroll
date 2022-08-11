@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Workers";
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
                        Workers Registration Page
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
                        <form id="workers-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('workers.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="firstname">Firstname <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-firstname-holder" class=" ">
                                                <input id="ctrl-firstname"  value="<?php echo get_value('firstname') ?>" type="text" placeholder="Enter Firstname"  required="" name="firstname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="lastname">Lastname <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-lastname-holder" class=" ">
                                                <input id="ctrl-lastname"  value="<?php echo get_value('lastname') ?>" type="text" placeholder="Enter Lastname"  required="" name="lastname"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="middlename">Middlename </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-middlename-holder" class=" ">
                                                <input id="ctrl-middlename"  value="<?php echo get_value('middlename') ?>" type="text" placeholder="Enter Middlename"  name="middlename"  class="form-control " />
                                            </div>
                                            <small class="form-text">Optional</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="gender">Gender <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-gender-holder" class=" ">
                                                <?php
                                                    $options = Menu::gender();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    //check if current option is checked option
                                                    $checked = Html::get_field_checked('gender', $value, "");
                                                ?>
                                                <label class="custom-control custom-radio custom-control-inline">
                                                <input class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="gender" />
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
                                            <label class="control-label" for="dob">Date of Birth </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-dob-holder" class="input-group ">
                                                <input id="ctrl-dob" class="form-control datepicker  datepicker"  value="<?php echo get_value('dob', "NULL") ?>" type="datetime" name="dob" placeholder="Enter Date of Birth" data-enable-time="false" data-min-date="" data-max-date="<?php echo date('Y-m-d', strtotime('-15year')); ?>" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
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
                                            <label class="control-label" for="phone">Phone <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-phone-holder" class=" ">
                                                <input id="ctrl-phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email">Email </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email-holder" class=" ">
                                                <input id="ctrl-email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  name="email"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date_join">Date Join <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-date_join-holder" class="input-group ">
                                                <input id="ctrl-date_join" class="form-control datepicker  datepicker"  required="" value="<?php echo get_value('date_join', "NULL") ?>" type="datetime" name="date_join" placeholder="Enter Date Join" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="material-icons">date_range</i></span>
                                                </div>
                                            </div>
                                            <small class="form-text">the date you started work</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="photo">Photo </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-photo-holder" class=" ">
                                                <div class="dropzone " input="#ctrl-photo" fieldname="photo" uploadurl="{{ url('fileuploader/upload/photo') }}"    data-multiple="false" dropmsg="Choose your photo"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="photo" id="ctrl-photo" class="dropzone-input form-control" value="<?php echo get_value('photo') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                            <small class="form-text">optional</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="address">Address <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-address-holder" class=" ">
                                                <textarea placeholder="Enter Address" id="ctrl-address"  required="" rows="3" name="address" class=" form-control"><?php echo get_value('address') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="state_id">State of Origin <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-state_id-holder" class=" ">
                                                <select required=""  id="ctrl-state_id" data-load-select-options="lga_id" name="state_id"  placeholder="Select a state..."    class="custom-select" >
                                                <option value="">Select a state...</option>
                                                <?php 
                                                    $options = $comp_model->workers_state_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('state_id', $value);
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
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
                                            <label class="control-label" for="lga_id">Local Govt </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-lga_id-holder" class=" ">
                                                <select  id="ctrl-lga_id" data-load-path="<?php print_link('componentsdata/lga_id_option_list') ?>" name="lga_id"  placeholder="Enter Local Govt"    class="custom-select" >
                                                <option value="">Enter Local Govt</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="department_id">Department <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-department_id-holder" class=" ">
                                                <select required=""  id="ctrl-department_id" data-load-select-options="position_id" name="department_id"  placeholder="Select a department ..."    class="custom-select" >
                                                <option value="">Select a department ...</option>
                                                <?php 
                                                    $options = $comp_model->workers_department_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('department_id', $value);
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
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
                                            <label class="control-label" for="position_id">Position <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-position_id-holder" class=" ">
                                                <select required=""  id="ctrl-position_id" data-load-path="<?php print_link('componentsdata/position_id_option_list') ?>" name="position_id"  placeholder="Select a position ..."    class="custom-select" >
                                                <option value="">Select a position ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="work_type_id">Work Type <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-work_type_id-holder" class=" ">
                                                <select required=""  id="ctrl-work_type_id" name="work_type_id"  placeholder="Select a work type ..."    class="custom-select" >
                                                <option value="">Select a work type ...</option>
                                                <?php
                                                    $options = Menu::work_type_id();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('work_type_id', $value);
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
                                            <label class="control-label" for="branch_id">Branch <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-branch_id-holder" class=" ">
                                                <select required=""  id="ctrl-branch_id" name="branch_id"  placeholder="Select a branch ..."    class="custom-select" >
                                                <option value="">Select a branch ...</option>
                                                <?php 
                                                    $options = $comp_model->branch_id_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('branch_id', $value);
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
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
                                            <label class="control-label" for="cv">Upload CV </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-cv-holder" class=" ">
                                                <div class="dropzone " input="#ctrl-cv" fieldname="cv" uploadurl="{{ url('fileuploader/upload/cv') }}"    data-multiple="false" dropmsg="Choose your CV - PDF Format"    btntext="Browse" extensions=".pdf" filesize="3" maximum="1">
                                                    <input name="cv" id="ctrl-cv" class="dropzone-input form-control" value="<?php echo get_value('cv') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                            <small class="form-text">Optional</small>
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
