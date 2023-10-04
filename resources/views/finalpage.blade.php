@extends('layouts.frontend')
@section('content')
<div class="block-content" style="margin-top: 50px; margin-bottom:35%;">
    <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <center><h2><strong>Validation</strong></h2></center>
                </div>
                <p>Votre candidature a été réalisée avec success</p>
                <p>Votre Recépissé vous sera envoyé dans votre boite email.</p>
                <a href="{{ route("generer.recepisse", $projet) }}" class="btn btn-success">Generer le recepissé</a>
                <a href="{{ route("accueil") }}" class="btn btn-danger">Terminer</a>
            </div>
    </div>
</div>

@endsection
