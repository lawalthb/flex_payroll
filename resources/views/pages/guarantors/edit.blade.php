@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Guarantors";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="card-4 bg-light mb-3" >
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12 col-md-auto " >
                    <div class=" h5 font-weight-bold text-primary" >
                        Edit Guarantors
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
                    <div  class=" page-content" >
                        <div class="row">
                            <div class="col">
                                <!--[form-start]-->
                                <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("guarantors/edit/$rec_id"); ?>" method="post">
                                <!--[form-content-start]-->
                                @csrf
                                <div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="worker_id">Worker Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-worker_id-holder" class=" ">
                                                    <select required=""  id="ctrl-worker_id" name="worker_id"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                        $options = $comp_model->attendants_card_worker_id_option_list() ?? [];
                                                        foreach($options as $option){
                                                        $value = $option->value;
                                                        $label = $option->label ?? $value;
                                                        $selected = ( $value == $data['worker_id'] ? 'selected' : null );
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
                                                <label class="control-label" for="fullname">Fullname <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-fullname-holder" class=" ">
                                                    <input id="ctrl-fullname"  value="<?php  echo $data['fullname']; ?>" type="text" placeholder="Enter Fullname"  required="" name="fullname"  class="form-control " />
                                                </div>
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
                                                    <textarea placeholder="Enter Address" id="ctrl-address"  required="" rows="5" name="address" class=" form-control"><?php  echo $data['address']; ?></textarea>
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
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
                                                    <input id="ctrl-phone"  value="<?php  echo $data['phone']; ?>" type="text" placeholder="Enter Phone"  required="" name="phone"  class="form-control " />
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
                                                    <input id="ctrl-email"  value="<?php  echo $data['email']; ?>" type="email" placeholder="Enter Email"  name="email"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="relationship">Relationship </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-relationship-holder" class=" ">
                                                    <select  id="ctrl-relationship" name="relationship"  placeholder="Select a value ..."    class="custom-select" >
                                                    <option value="">Select a value ...</option>
                                                    <?php
                                                        $options = Menu::relationship();
                                                        $field_value = $data['relationship'];
                                                        if(!empty($options)){
                                                        foreach($options as $option){
                                                        $value = $option['value'];
                                                        $label = $option['label'];
                                                        $selected = Html::get_record_selected($field_value, $value);
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
                                                <label class="control-label" for="otherinfo">Otherinfo </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-otherinfo-holder" class=" ">
                                                    <textarea placeholder="Enter Otherinfo" id="ctrl-otherinfo"  rows="3" name="otherinfo" class=" form-control"><?php  echo $data['otherinfo']; ?></textarea>
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
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
                                                    <input id="ctrl-status"  value="<?php  echo $data['status']; ?>" type="number" placeholder="Enter Status" step="any"  required="" name="status"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="hardcopy">Hardcopy </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div id="ctrl-hardcopy-holder" class=" ">
                                                    <div class="dropzone " input="#ctrl-hardcopy" fieldname="hardcopy" uploadurl="{{ url('fileuploader/upload/hardcopy') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".docx,.doc,.xls,.xlsx,.xml,.csv,.pdf,.xps" filesize="3" maximum="1">
                                                        <input name="hardcopy" id="ctrl-hardcopy" class="dropzone-input form-control" value="<?php  echo $data['hardcopy']; ?>" type="text"  />
                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                    </div>
                                                </div>
                                                <?php Html :: uploaded_files_list($data['hardcopy'], '#ctrl-hardcopy'); ?>
                                                <small class="form-text">Signed Form</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-ajax-status"></div>
                                <!--[form-content-end]-->
                                <!--[form-button-start]-->
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">
                                    Update
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
