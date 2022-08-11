@inject('comp_model', 'App\Models\ComponentsData')
<?php 
    $pageTitle = "Home";
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<div>
    <div  class="card-4 bg-light mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                    <div class=" h5 font-weight-bold" >
                        Home
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>
    <div  class="mb-3" >
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid" >
                    <div class=" ">
                        <?php
                            $params = [ 'limit' => 100]; //new query param
                            $query = array_merge(request()->query(), $params);
                            $queryParams = http_build_query($query);
                            $url = url("workers/wk_list?$queryParams");
                        ?>
                        <div class="ajax-inline-page" data-url="{{ $url }}" >
                            <div class="ajax-page-load-indicator">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="font-weight-bold">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
