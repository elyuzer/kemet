<!DOCTYPE html>
<html>
<title>Kemet - {{$title ?? 'Untitled'}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="icon" href="{{asset('/images/logo/kcaa.png')}}">
<script src="{{asset('js/app.js')}}"></script>

<body>
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
        <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="https://www.w3schools.com/images/w3schools.png" style="width:80%;"></a>
        <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
        <a class="w3-bar-item w3-button w3-theme w3-hover-light-blue" href="#">Home</a>
        <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Role</a>
        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('menu-user')" href="javascript:void(0)">
                User&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <div id="menu-user" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a id="menu-user-account" class="w3-bar-item w3-button w3-hover-light-blue" href="{{url('/accounts')}}">Account</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Group</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Organisation</a>
            </div>
        </div>
        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('menu-publication')" href="javascript:void(0)">
               AIM Publication&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <div id="menu-publication" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Publisher</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Publication</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Product</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Document</a>
            </div>
        </div>

        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('menu-item')" href="javascript:void(0)">
               Items&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <div id="menu-item" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a id="menu-item-item" class="w3-bar-item w3-button w3-hover-light-blue" href="">Item</a>
                <a id="menu-item-service" class="w3-bar-item w3-button w3-hover-light-blue" href="">Service</a>
            </div>
        </div>
        
        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('menu-subscription')" href="javascript:void(0)">
               Subscription&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <div id="menu-subscription" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Customer</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Subscription period</a>
            </div>
        </div>
        
        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('menu-distribution')" href="javascript:void(0)">
               Distribution&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <div id="menu-distribution" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Distrbution</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Dispatch</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Feedback</a>
            </div>
        </div>
        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('menu-account')" href="javascript:void(0)">
                <i class="fa fa-user fa-lg"></i>&nbsp;{{(Auth::user()) ? Auth::user()->name : null}}&nbsp; <i class="fa fa-caret-down"></i>
            </a>
            <div id="menu-account" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="">Account</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="w3-bar-item w3-button w3-hover-light-blue" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

    {{$slot}}

    

     
</body>
</html>