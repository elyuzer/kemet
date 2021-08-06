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

<body>
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
        <a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="https://www.w3schools.com/images/w3schools.png" style="width:80%;"></a>
        <a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
        <a class="w3-bar-item w3-button w3-theme w3-hover-light-blue" href="#">Home</a>
        <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link 1</a>
        <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link 2</a>
        <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link 3</a>
        <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link 4</a>
        <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link 5</a>
        <div>
            <a class="w3-bar-item w3-button  w3-hover-light-blue" onclick="myAccordion('demo')" href="javascript:void(0)">Dropdown <i class="fa fa-caret-down"></i></a>
            <div id="demo" class="w3-hide w3-white w3-card w3-margin-left w3-leftbar w3-border-grey">
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link</a>
                <a class="w3-bar-item w3-button w3-hover-light-blue" href="#">Link</a>
            </div>
        </div>
    </nav>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

    {{$slot}}

    <script src="{{asset('js/app.js')}}"></script>
     
</body>
</html>