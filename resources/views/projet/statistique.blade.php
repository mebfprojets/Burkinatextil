@extends('layouts.backend')
@section('administration', 'active')
@section('administration-valeur', 'active')
@section('content')
    <div class="col-md-10">
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                </div>
                <h2><strong>Statistique</strong> des souscriptions</h2>
            </div>
            <!-- END Form Elements Title -->

            <!-- Basic Form Elements Content -->
        <div class="row">
            <h2>Souscription par region</h2>
            @foreach ($souscriptionsParregion as $souscriptionsParregion )
            <div class="col-sm-6 col-lg-2">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background">
                        <h4 class="widget-content-light"><strong></strong> {{ $souscriptionsParregion->libelle}}</strong></h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $souscriptionsParregion->nombre}}</span></div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <h2>Souscription par Filière</h2>
            @foreach ($souscriptionsParfiliere as $souscriptionsParfiliere )
            <div class="col-sm-6 col-lg-2">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background-dark">
                        <h4 class="widget-content-light"><strong></strong> {{ $souscriptionsParfiliere->libelle}}</strong></h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $souscriptionsParfiliere->nombre}}</span></div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <h2>Souscription par Maillon</h2>
            @foreach ($souscriptionsParmaillon as $souscriptionsParmaillon )
            <div class="col-sm-6 col-lg-2">
                <a href="javascript:void(0)" class="widget widget-hover-effect2">
                    <div class="widget-extra themed-background">
                        <h4 class="widget-content-light"><strong></strong> {{ $souscriptionsParmaillon->libelle}}</strong></h4>
                    </div>
                    <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{ $souscriptionsParmaillon->nombre}}</span></div>
                </a>
            </div>
            @endforeach
        </div>
            <!-- END Basic Form Elements Content -->
        </div>
    </div>
@endsection
