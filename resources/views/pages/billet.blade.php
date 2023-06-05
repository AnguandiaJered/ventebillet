
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
    <!-- <img class="image" src="{{ asset('img/coordination.jpg')}}" alt=""> -->

<br>
<center>
    <h1>AGENCE DE VOYAGE <img height="200" width="300" src="{{ url('assets/cup2.png')}}" /></h1>
    
   
</center>
<div class="">     
    
        <div class="row">
            <div class="col-md-6">
                <h3>Class | Classe</h3>
                <h1>sdjhsdjsdjsdjsdj</h1>
            </div>           
            <div class="col-md-6">
                <img alt="CAA" src="qrcode2.png" class="offset-4" width="250" height="130">
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-5">
                <h3>Flight & Date | Vol et Date</h3>
                <h1><strong>assdsdsdjsdjhd</strong></h1>
            </div>           
            <div class="col-md-4">
                <h3>Nationalité</h3>
                <h1><strong>jhsdjsdjhsdjsd</strong></h1>
            </div>
            <div class="col-md-3">
                <h3>Money | Montant payer</h3>
                <h1><strong>jsdjsdjjhdsjh</strong></h1>
            </div>
        </div>
        <hr/>
        
        <div class="row">
            <div class="col-md-6">
                <h3>From | De</h3>
                <h1><strong>jhsdjsdjsdj</strong></h1>
            </div>
            <div class="col-md-6">
                <h3>To | Destination</h3>
                <h1><strong>jhsdjsdjhsdjs</strong></h1>
            </div>           
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                <h3>Name | Nom</h3>
                <h1><strong>jdjjsdsjsjs</strong></h1>
            </div>
            <div class="col-md-6">
                <h3>Airline use | A usage Interne</h3>
                <h1>Boarding time | Heure d'embarquement : <strong>hshshshhsh</strong></h1>
            </div>           
        </div>
        <hr/>
        <h1>Boarding Pass | Carte d'accès à bord</h1>
        <h3>musicairport.com</h3>
    </div>

</div>
    @include('layouts.partials.scripts')
</body>

</html>
