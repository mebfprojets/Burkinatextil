@extends('layouts.frontend')
@section('content')
<div class="block-content" style="margin-top: 50px; margin-bottom:35%;">
    <div class="col-md-12">
        <!-- Form Validation Example Block -->

            <!-- END Form Validation Example Title -->

            <!-- Form Validation Example Content -->
            <div class="block">
                <!-- Clickable Wizard Title -->
                <div class="block-title">
                    <center><h2><strong>Validation</strong></h2></center>
                </div>
                <p> Vous avez validé l'étape d'enregistrement de la personne</p>
                Votre code de suivi de la souscription est : {{ $code_personne}}
            <p style="color: rgb(199, 38, 38)"> Ce code est envoyé dans votre boite mail.</p>
            <p style="color: red;"><strong>Attention, copier et garder bien ce code, car il vous sera demandé dans la suite de votre souscription</strong></p>
            <a href="{{ route("inscrire.projet",$code_personne)}}" class="btn btn-success">Poursuivre</a>
            <!-- <a href="{{ route("accueil") }}" class="btn btn-danger">Suspendre</a> -->
            </div>
    </div>
</div>

@endsection
