@extends('layouts.frontend')
@section('content')
<div class="block-content" style="margin-top: 50px; margin-bottom:35%;">
    <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <center><h2 style="color:red;"><strong>candidature déjà enregistrée !</strong></h2></center>
                </div>
                <p>Vous avez dejà effectué une candidature avec ce code.</p>
                <p>Veuillez régénérer votre récépissé</p>
                
                <p style="color:green;"><strong>Merci et Bonne Chance !</strong></p>
                <a href="{{ route("generer.recepisse", $projet_existe) }}" class="btn btn-success">Générer le récépissé</a>
            </div>
    </div>
</div>

@endsection
