<div class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" /> 
            {{ config('app.name') }}
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-responsive-collapse">
            {{ Html::render_menu(Menu::navbartopleft()  , "navbar-nav mr-auto" ) }}
        </div>
    </div>
</div>