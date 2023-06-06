
<!DOCTYPE html>
<html lang="fr">

<head>
@include('layouts.partials.header')
<style rel="stylesheet">
 .vol{
    border:1px solid;
    border-radius: 20px;
 }
 </style>
</head>

<body onload="window.print();">  
<div class="container-fluid vol">
   
<br>
<!-- <center>
    <h1><img height="200" width="300" src="{{ url('assets/cup2.png')}}" />bundesliga <img height="200" width="300" src="{{ url('assets/cup2.png')}}" /></h1> 
   <h1>******************************</h1>
</center> -->
<div class="">     
    @foreach ($billet as $item)
        <div class="row">
            <div class="col-md-6">
                <h1>YOUR TICKET</h1>
                <h1>{{$item->client}}</h1>
            </div>           
            <div class="col-md-6">
                <img alt="CAA" src="{{ url('assets/qrcode2.png')}}" class="offset-4" width="250" height="130">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <h1>GAME DATE</h1>
                <h1><strong>{{$item->date_match}}</strong></h1>
            </div>        
          
            <div class="col-md-6">
                <h1 class="offset-5">GAME TIME</h1>
                <h1 class="offset-4"><strong>{{$item->heure_match}}</strong></h1>
            </div>
        </div>
        <hr/>
        
        <div class="row">
            <div class="col-md-6">
                <h1>TEAM TO PLAY</h1>
                <h1><strong>{{$item->equipe_principale}}</strong> VS <strong>{{$item->equipe_adverse}}</strong></h1>
            </div>
            <div class="col-md-6">
                <h1 class="offset-5">STADIUM</h1>
                <h1 class="offset-4"><strong>{{$item->stade}}</strong></h1>
            </div>           
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <h1>CHAMPIONSHIP</h1>
                <h1><strong>{{$item->champions}}</strong></h1>
            </div>
            <div class="col-md-6">
                <img height="100" class="offset-7" width="100" src="{{ url('assets/cup2.png')}}" />
                <h3 class="offset-6">fifa.com</h3>
            </div>           
        </div>
        <hr/>
        @endforeach
    </div>

</div>
    @include('layouts.partials.scripts')
</body>

</html>
