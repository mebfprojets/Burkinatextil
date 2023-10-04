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
                    <center><h2><strong>Poursuivre son inscription</strong></h2></center>
                </div>
                <p> Vous avez validé l'étape d'enregistrement de la personne</p>
                Veuillez renseigner votre code de souscription pour poursuivre votre inscription :<br>
                <form method="post" action="{{route('poursuivre.inscrire')}}">
                @csrf
                    <br><input type="text" class="form-control" name="code_promoteur" placeholder="Ex: PRECA-GUICHET2-76767876-9878" required> <br><br>
                    <button type="submit" class="btn btn-success">Valider</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </form>
            
            </div>
    </div>
</div>

@endsection
