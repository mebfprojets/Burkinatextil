<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>BURKINA TEXTILE</title>

    <style type="text/css">
        .enteteGauche{
            float: left;
            width: 50%;
            text-align: center;
        }
        .entetedroite{
            float: left;
            width: 50%;
            text-align: center;
        }
        .entete{
            margin-top:90px;
            text-align: center;
            color:red;
            font-weight: blod;
            margin-bottom: 55px;
        }
        .titre{
            position:relative;
            margin-left:20px;
            width:50%;
            border:solid 2px black;
            padding-right:10px;
            text-align:center;

        }
        .contenu{
            position:relative;
            margin-right:20px;
            width:40%;
            text-align:center;
            padding-left:10px;
            display:inline-block;

        }
    </style>
</head>
<body>

        <!-- <div class="enteteGauche" >MEBF <br> ----------- <br> BURKINA TEXTILE </div> -->
        <div class="enteteGauche"><img style="width: 130; margin-top:auto;" src="{{asset('assets/img/logo-burkina.png')}}" alt="Logo Burkina Textile"></div>
        <div class="entetedroite">Burkina Faso <br> -----------  <br> Unité-Progres-Justice </div>
        <div class="entete"> Code postulant : {{ $personne->code_personne }} <hr> </div>
        <p class="contenu"><strong> Destinataire : </strong></p> <p class="contenu"> {{ $personne->nom }} {{ $personne->prenom }} </p> <br>
        <p class="contenu"> <strong>Numero d'identité : </strong></p> <p class="contenu"> {{ $personne->numero_identite }} </p> <br>
        <p class="contenu"><strong> Télephone  : </strong></p> <p class="contenu"> {{ $personne->telephone }} </p> <br>
        <p class="contenu"> <strong>Email: </strong></p> <p class="contenu">{{ $personne->email  }} </p> <br>
        <br>
        <p>A postuler au financement de BURKINA TEXTILE avec le projet <span style="font-weight: bold;">{{ $projet->titre }}</span> </p> <br>
        <p style="font-size: x-small;  text-align: justify;">Ce récépissé constitue la preuve que le promoteur a pris connaissance des conditions d'interventions du projet BURKINA TEXTILE auxquelles 
        il souscrit entièrement notamment le processus de selection des bénéficiaires.Le promoteur certifie voir pris acte et s'engage à se conformer au processus de selection des bénéficiaires et aux délibérations du jury.</p>
        {{-- <p style="font-size: x-small;"> Pour toute information contactez nous au : {{ $contact_chef_de_zone }} <br> NB: Ce récépissé constitue le depôt de cadidature au projet Burkina Textile .</p> --}}
        <span style="width: 40%; float: right;">Fait le : <span style="font-weight: bold;">{{ date("d-m-Y", strtotime($projet->created_at)) }}</span> </span> <br>
</body>
</html>

