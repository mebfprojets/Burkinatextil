@extends('layouts.backend')
@section('souscription', 'active')
@section('souscription-liste', 'active')

    @section('content')
    @section('blank')
    <li>Accueil</li>
    <li>Souscription</li>
    <li><a href="">Détails</a></li>
@endsection
@section('content')
            <div class=" col-xs-11 block-content ">
                {{-- @if($entreprise->conforme== null)
                @can('avisqualitative_ugp', Auth::user())
                    <a href="#modal-confirm-ugp" data-toggle="modal" onclick="recupererentreprise_id({{$entreprise->id}}, 2)" title="non conforme" class="btn btn-md btn-warning">Non conforme<i class="gi gi-remove_2"></i></a>
                    <a href="#modal-confirm-ugp" data-toggle="modal" onclick="recupererentreprise_id({{$entreprise->id}}, 1)"  title="conforme" class="btn btn-md btn-success">Conforme<i class="fa fa-check"></i></a>
                @endcan
                @endif
             @if($entreprise->conforme!=null && $entreprise->decision_ugp==null)
             @can('avisfinal_ugp', Auth::user())
                <a href="#modal-decision-de-ugp" data-toggle="modal" onclick="recupererentreprise_id({{$entreprise->id}})" title="La décision de l'ugp" class="btn btn-md btn-danger avis_ugp">Avis final UGP<i class="fa fa-check-square-o"></i></a>
             @endcan
           @endif
        @can('souscription.statuerSurSouscription', Auth::user())
            @if(!$aStatuer)
                <a href="#modal-confirm-rejet" data-toggle="modal" onclick="confirmChangeStatus1({{$entreprise->id}}, {{ Auth::user()->id }})" title="rejeter" class="btn btn-md btn-danger">Défavorable<i class="fa fa-times"></i></a>
                <a href="#modal-confirm-changestatus" data-toggle="modal" onclick="confirmChangeStatus1({{$entreprise->id}}, {{ Auth::user()->id }})" title="Valider" class="btn btn-md btn-success">Favorable<i class="fa fa-check"></i></a>
           @endif
       @endcan --}}

                            <div class="block full">
                                <!-- Block Tabs Title -->
                                <div class="block-title">

                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active"><a href="#example-tabs2-activity">Identication du porteur</a></li>
                                        <li><a href="#example-tabs2-profile">Identification du projet </a></li>
                                        <li><a href="#example-tabs2-pieces">Pièces Jointes</a></li>
                                        <li><a href="#indicateurs-entreprise">Le coût du projet</a></li>
                                        <li><a href="#example-tabs2-options" data-toggle="tooltip" title="Les details de l'entreprise">Le chiffre d'affaire prévisionnel</a></li>

                                         <a onclick="history.back()" class="btn btn-success pull-right" style="float: right;"><span><i class="fa fa-repeat"></i></span> Fermer </a>
                                    </ul>
                                </div>
                                <!-- END Block Tabs Title -->

                                <!-- Tabs Content -->
                                <div class="tab-content" >
                            <div class="tab-pane active" id="example-tabs2-activity" style="height:100%;background: #fff">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div  id="condanation" class="form-group row">
                                            <p class="col-md-4 control-label labdetail"> <span class="labdetail">Code Personne: </span> </p>
                                            <p class="col-md-6" >
                                            <span class="valdetail">
                                                @empty($projet->porteur->code_personne)
                                                    Informations non disponible
                                                @endempty
                                                {{$projet->porteur->code_personne}}
                                            </span>
                                        </p>
                                    </div>
                                        <div  id="condanation" class="form-group row">
                                            <p class="col-md-4 control-label labdetail"> <span class="labdetail">Nom & prénom: </span> </p>
                                            <p class="col-md-6" >
                                            <span class="valdetail">
                                                @empty($projet->porteur->nom)
                                                    Informations non disponible
                                                @endempty
                                                {{$projet->porteur->nom}} {{$projet->porteur->prenom}}
                                            </span>
                                        </p>
                                    </div>
                                            <div  class="form-group row">
                                                <p class="col-md-4 control-label labdetail"> <span >Sexe :  </span> </p>
                                                <p class="col-md-6" >
                                                    <span class="valdetail">
                                                        @empty($projet->porteur->sexe)
                                                        Informations non disponible
                                                        @endempty
                                                        @if ($projet->porteur->sexe=='F')
                                                        Féminin
                                                    @endif
                                                      @if ($projet->porteur->sexe=='M')
                                                       Masculin
                                                    @endif
                                                    </span>
                                                 </p>
                                            </div>
                                    <div  id="condanation" class="form-group row" >
                                        <p class="col-md-4 control-label labdetail"> <span >Date de naissance : </span> </p>
                                        <p class="col-md-6" >
                                        <span class="valdetail">
                                            @empty($projet->porteur->date_naissance)
                                                    Informations non disponible
                                                    @endempty
                                            {{format_date($projet->porteur->date_naissance)}}
                                    </span></p>
                                    </div>
                                    <div  id="condanation" class="form-group row" >
                                        <p class="col-md-4 control-label labdetail"> <span >Lieu de naissance : </span> </p>
                                        <p class="col-md-6" >
                                        <span class="valdetail">
                                            @empty($projet->porteur->lieu_naissance)
                                                    Informations non disponible
                                                    @endempty
                                            {{$projet->porteur->lieu_naissance}}
                                    </span></p>
                                    </div>

                                <div  id="condanation" class="form-group row">
                                    <p class="col-md-4 control-label labdetail"><span class=""> Niveau d'instruction : </span> </p>
                                        <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($projet->porteur->niveau_instruction)
                                                    Informations non disponible
                                                    @endempty
                                                    {{getlibelle($projet->porteur->niveau_instruction)}}
                                    </span></p>
                                </div>
                                <div  id="condanation" class="form-group row">
                                    <p class="col-md-4 control-label labdetail"><span class="">Type de contrat: </span> </p>
                                        <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($projet->porteur->type_contrat)
                                                    Informations non disponible
                                                    @endempty
                                                    {{getlibelle($projet->porteur->type_contrat)}}
                                    </span></p>
                                </div>
                                <div  id="condanation" class="form-group row " >
                                    <p class="col-md-4 control-label"> <span class="labdetail">Nationalité : </span></p>
                                    <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($projet->porteur->nationalite)
                                                    Informations non disponible
                                                    @endempty
                                            {{getlibelle($projet->porteur->nationalite)}}
                                    </span>
                                </p>
                                </div>
                                <div  id="condanation" class="form-group row " >
                                    <p class="col-md-4 control-label"> <span class="labdetail">Pays de residence : </span></p>
                                    <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($projet->porteur->pays_de_residence)
                                                    Informations non disponible
                                        @endempty
                                            {{getlibelle($projet->porteur->pays_de_residence)}}
                                    </span>
                                </p>
                                </div>
                            
                                <div  id="condanation" class="form-group row" >
                                    <p class="col-md-4 control-label"> <span class="labdetail">Niveau d'instruction : </span> </p>
                                    <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($projet->porteur->niveau_instruction)
                                                    Informations non disponible
                                                    @endempty
                                            {{getlibelle($projet->porteur->niveau_instruction)}}
                                </span></p>
                                </div>
                                <div  id="condanation" class="form-group row" >
                                    <p class="col-md-4 control-label"> <span class="labdetail">Statut Professionnel : </span> </p>
                                    <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($projet->porteur->statut_professionnel)
                                                    Informations non disponible
                                        @endempty
                                            {{getlibelle($projet->porteur->statut_professionnel)}}
                                </span></p>
                                </div>
                                
                        </div>
                    <div class="col-md-6">
                        <div  id="condanation" class="form-group row" >
                            <p class="col-md-4 control-label labdetail"> <span class=""> Région de résidence: </span> </p>
                            <p class="col-md-6" >
                            <span class="valdetail">
                                @empty($projet->porteur->region_residence )
                                            Informations non disponible
                                            @endempty
                                    {{getlibelle($projet->porteur->region_residence) }}
                        </span></p>
                        </div>
                        <hr>

                        <div  id="condanation" class="form-group row " >
                            <p class="col-md-4 control-label labdetail"> <span class="">Province de residence : </span> </p>
                            <p class="col-md-6" >
                            <span class="valdetail">
                                @empty($projet->porteur->province_residence )
                                            Informations non disponible
                                            @endempty
                                    {{getlibelle($projet->porteur->province_residence)}}
                        </span></p>
                        </div>

                    <div  id="condanation" class="form-group row" >
                        <p class="col-md-4 control-label labdetail"> <span class="">Commune de residence : </span> </p>
                        <p class="col-md-6" >
                        <span class="valdetail">
                            @empty($projet->porteur->commune_residence)
                                        Informations non disponible
                                        @endempty
                                {{getlibelle($projet->porteur->commune_residence)}}
                    </span></p>
                    </div>
                    <div  id="condanation" class="form-group row" >
                        <p class="col-md-4 control-label labdetail"> <span class="">Secteur/village : </span> </p>
                        <p class="col-md-6" >
                        <span class="valdetail">
                            @empty($projet->porteur->secteur_residence)
                                        Informations non disponible
                                        @endempty
                                {{getlibelle($projet->porteur->secteur_residence)}}
                    </span></p>
                    </div>
                        <div  id="" class="form-group row" >
                            <p class="col-md-4 control-label labdetail"> <span> Téléphone : </span> </p>
                                <p class="col-md-6" >
                                <span class="valdetail">
                                    @empty($projet->porteur->telephone )
                                    Informations non disponible
                                    @endempty
                                    {{$projet->porteur->telephone}}/ {{$projet->porteur->telephone_whatsap}}
                                </span></p>
                        </div>
                        <div  id="" class="form-group row" >
                            <p class="col-md-4 control-label labdetail"> <span> Email : </span> </p>
                                <p class="col-md-6" >
                                <span class="valdetail">
                                    @empty($projet->porteur->email )
                                    Informations non disponible
                                    @endempty
                                    {{$projet->porteur->email}}
                                </span></p>
                        </div>
                        <div  id="" class="form-group row" >
                            <p class="col-md-4 control-label labdetail"> <span> Réf. d'identite : </span> </p>
                                <p class="col-md-6" >
                                <span class="valdetail">
                                    @empty($projet->porteur->numero_identite )
                                    Informations non disponible
                                    @endempty
                                    {{$projet->porteur->numero_identite}}
                                </span></p>
                        </div>
                        <div  id="" class="form-group row" >
                            <p class="col-md-4 control-label labdetail"> <span class="">Type Personne</span></p>
                            <p class="col-md-6" >
                                <span class="valdetail">
                                    @empty($projet->porteur->type_personne)
                                        Informations non disponible
                                    @endempty
                        @if($projet->porteur->type_personne=="P")
                                    Personne physique
                            @else
                               Personne Morale
                            @endif
                                </span>
                            </p>
                    </div>
                    
                    @if($projet->porteur->type_personne=="M")
                    <div  id="" class="form-group row" >
                            <p class="col-md-4 control-label labdetail"> <span>Raison sociale : </span> </p>
                            <p class="col-md-6">
                            <span class="valdetail">
                                @empty($projet->porteur->represente->raison_sociale)
                                            Informations non disponible
                                            @endempty
                                 {{ $projet->porteur->represente->raison_sociale }}
                            </span>
                            </p>
                        </div>
                    @else
                    <div  id="condanation" class="form-group row" >
                        <p class="col-md-4 control-label labdetail"> <span class="">Entreprise formalisée? : </span> </p>
                        <p class="col-md-6" >
                        <span class="valdetail">
                            @empty($projet->porteur->entreprise_formalise)
                                        Informations non disponible
                                        @endempty
                            @if($projet->porteur->entreprise_formalise==1)
                                Oui formalisée le {{ $projet->porteur->date_de_formalisation }}
                            @else
                                Non
                            @endif
                    </span></p>
                    </div>
                    <div  id="condanation" class="form-group row" >
                        <p class="col-md-4 control-label labdetail"> <span class="">Entreprise formalisée? : </span> </p>
                        <p class="col-md-6" >
                        <span class="valdetail">
                            @empty($projet->porteur->entreprise_formalise)
                                        Informations non disponible
                                        @endempty
                                {{ $projet->porteur->nom_entreprise }}
                    </span></p>
                    </div>
                    @endif
                    </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                                <table class="table table-vcenter table-condensed table-bordered">
                                    <tr>
                                        <th>Sexe</th>
                                        <th>Emplois permanent</th>
                                        <th>Emplois Temploraire</th>
                                    </tr>
                                    <tr>
                                        <td>Homme</td>
                                        <td>{{ $projet->porteur->nbre_emp_perm_femme }}</td>
                                        <td>{{ $projet->porteur->nbre_temp_perm_femme}}</td>

                                    </tr>
                                    <tr>
                                        <td>Femme</td>
                                        <td>{{ $projet->porteur->nbre_emp_perm_femme }}</td>
                                        <td>{{ $projet->porteur->nbre_temp_perm_homme}}</td>

                                    </tr>

                                </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-vcenter table-condensed table-bordered">
                                <tr>
                                    <th>CA 2020</th>
                                    <th>CA 2021</th>
                                    <th>CA 2022</th>
                                </tr>
                                <tr>
                                    <td>{{ format_prix($projet->porteur->ca_2020)  }}</td>
                                    <td>{{ format_prix($projet->porteur->ca_2021)  }}</td>
                                    <td>{{ format_prix($projet->porteur->ca_2022)  }}</td>


                                </tr>
                            </table>
                            
                        </div>
                     </div>

                          </div>
                               <div class="tab-pane" id="example-tabs2-profile" style="height:100%;background: #fff">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-6 control-label labdetail"><span class="">Titre du projet : </span> </p>
                                                        <p class="col-md-6" >
                                                        <span class="valdetail">
                                                        @empty($projet->titre)
                                                                 Informations non disponible
                                                        @endempty
                                                             {{$projet->titre}}
                                                    </span></p>
                                                </div>
                                               
                                                

                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-6 control-label labdetail"><span class="">Région : </span> </p>
                                                        <p class="col-md-6" >
                                                        <span class="valdetail">
                                                        @empty($projet->region)
                                                                Informations non disponible
                                                                            @endempty
                                                             {{getlibelle($projet->region)}}
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-6 control-label labdetail"><span class="">Province : </span> </p>
                                                        <p class="col-md-6" >
                                                        <span class="valdetail">
                                                        @empty($projet->province)
                                                            Informations non disponible
                                                                            @endempty
                                                             {{getlibelle($projet->province)}}
                                                    </span></p>
                                                </div>

                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-6 control-label labdetail"><span class="">Commune : </span> </p>
                                                        <p class="col-md-6" >
                                                        <span class="valdetail">
                                                        @empty($projet->commune)
                                                              Informations non disponible
                                                                            @endempty
                                                             {{getlibelle($projet->commune)}}
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-6 control-label labdetail"><span class="">Secteur/village: </span> </p>
                                                        <p class="col-md-6" >
                                                        <span class="valdetail">
                                                        @empty($projet->secteur_village)
                                                                Informations non disponible
                                                                            @endempty
                                                             {{getlibelle($projet->secteur_village )}}
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-6 control-label labdetail"><span class="">Phase actuelle : </span> </p>
                                                        <p class="col-md-6" >
                                                        <span class="valdetail">
                                                        @empty($projet->phase_actuelle_projet)
                                                                Informations non disponible
                                                                            @endempty
                                                             {{getlibelle($projet->phase_actuelle_projet)}}
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Description du projet : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                        @empty($projet->description_projet)
                                                                Informations non disponible
                                                            @endempty
                                                        {{ $projet->description_projet }}
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Génèse du projet : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                        @empty($projet->genese_projet )
                                                                Informations non disponible
                                                            @endempty
                                                        {{ $projet->genese_projet  }}
                                                    </span></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Technologie utilisés : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                        @empty($projet->technologie_utilise)
                                                                    Informations non disponible
                                                          @endempty
                                                             {{$projet->technologie_utilise}}
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Coût du projet : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                       {{format_prix($projet->evaluation_financieres->sum('cout')) }} Fcfa
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Fond Propre : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                       {{format_prix($projet->evaluation_financieres->sum('fond_propre')) }} Fcfa
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Subvention demandée : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                       {{format_prix($projet->evaluation_financieres->sum('subvention_montant')) }} Fcfa
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Emprunt : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                       {{format_prix($projet->evaluation_financieres->sum('emprunt')) }} Fcfa
                                                    </span></p>
                                                </div>
                                                <div  id="condanation" class="form-group row">
                                                    <p class="col-md-4 control-label labdetail"><span class="">Chiffre d'affaire prévisionnel : </span> </p>
                                                        <p class="col-md-8" >
                                                        <span class="valdetail">
                                                       {{format_prix(return_chiffre_daffaire($projet->id)) }} Fcfa
                                                    </span></p>
                                                </div>
                                                
                                


                                            </div>
                                           
                                        </div>
                                        <hr>
                                        <div class="row">
                                                <p>Les phases du projet</p>
                                                <table class="table table-vcenter table-condensed table-bordered">
                                                    <tr>
                                                        <th>Phases</th>
                                                        <th>Statut </th>
                                                    </tr>
                                                    @foreach ($projet->phases as $phase )
                                                        <tr>
                                                            <td>{{ getlibelle($phase->phase) }}</td>
                                                            <td>{{ $phase->statut }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="indicateurs-entreprise" style="height:100%;">
                                        <div class="row mt-6" >

                                        <h4>Evaluation financière</h4>
                                        <table class="table table-condensed table-bordered" style="text-align: center">
                                        <thead style="text-align: center !important">
                                                <tr>
                                                    <th style="text-align: center; width:5%">Catégorie</th>
                                                    <th style="text-align: center; width:5%">Activités</th>
                                                    <th style="text-align: center; width:5%">Coût</th>
                                                    <th style="text-align: center; width:5%">Montant promoteur</th>
                                                    <th style="text-align: center; width:5%">Montant crédit</th>
                                                    <th style="text-align: center; width:5%">Montant subvention</th>
                                                </tr>
                                        </thead>
                                        <tbody id="tbadys">
                                    @foreach($projet->evaluation_financieres as $key => $evaluation_financiere)
                                    <tr>
                                                <td>
                                                    @if($evaluation_financiere->categorie==1)
                                                        Investissemment
                                                    @else
                                                        Fonds de roulement
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$evaluation_financiere->designation}}
                                                </td>
                                                <td>
                                                    {{format_prix($evaluation_financiere->cout)}}
                                                </td>
                                                <td>
                                                    {{format_prix($evaluation_financiere->fond_propre )}}
                                                </td>
                                                <td>
                                                    {{format_prix($evaluation_financiere->emprunt )}}
                                                </td>
                                                <td>
                                                    {{format_prix($evaluation_financiere->subvention_montant  )}}
                                                </td>
                                                
                                            </tr>
                                            
                                        @endforeach
                                        <tr style="font-weight: 600">
                                            <td></td>
                                            <td></td>
                                            <td>
                                                {{format_prix($projet->evaluation_financieres->sum('cout'))}}
                                            </td>
                                            <td>
                                                {{format_prix($projet->evaluation_financieres->sum('fond_propre') )}}
                                            </td>
                                            <td>
                                                {{format_prix($projet->evaluation_financieres->sum('emprunt') )}}
                                            </td>
                                            <td>
                                                {{format_prix($projet->evaluation_financieres->sum('subvention_montant') )}}
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                 </div>
            </div>
            <div class="tab-pane" id="example-tabs2-options" style="height:100%;">
                <div class="row mt-6" >

                <h4>Chiffre d'affaire previsionnel</h4>
                <table class="table table-condensed table-bordered" style="text-align: center">
                <thead style="text-align: center !important">
                        <tr>
                            <th style="text-align: center; width:5%">Produits</th>
                            <th style="text-align: center; width:5%">Unité de mesure</th>
                            <th style="text-align: center; width:5%">Quantité</th>
                            <th style="text-align: center; width:5%">Cout unitaire</th>
                            <th style="text-align: center; width:5%">Cout Total</th>
                        </tr>
                </thead>
                <tbody id="tbadys">
            @foreach($projet->chiffre_daffaire_previsionnels as $key => $chiffre_daffaire_previsionnel)
            <tr>
                        <td>
                            {{$chiffre_daffaire_previsionnel->produit}}
                        </td>
                        <td>
                            {{$chiffre_daffaire_previsionnel->unite_de_mesure}}
                        </td>
                        <td>
                            {{$chiffre_daffaire_previsionnel->quantite}}
                        </td>
                        <td>
                            {{format_prix($chiffre_daffaire_previsionnel->cout_unit  )}}
                        </td>
                        <td>
                            {{format_prix($chiffre_daffaire_previsionnel->cout_unit * $chiffre_daffaire_previsionnel->quantite)}}
                        </td>
                       

                    </tr>
                @endforeach
            </tbody>
            </table>
</div>
</div>
    {{-- <div class="tab-pane" id="example-tabs2-options" style="height:100%;">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div  id="condanation" class="form-group">
                                                    <p class="col-md-2 control-label"><span class="labdetail">L'idee de projet : </span> </p>
                                                        <p class="col-md-10" style="text-align: justify;">
                                                        <span style="text-align: justify;" class="valdetail">
                                                        @empty($entreprise->description_du_projet)
                                                                Informations non disponible
                                                                            @endempty
                                                             {{$entreprise->description_du_projet}}
                                                    </span></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div> --}}
                                    <div class="tab-pane" id="example-tabs2-pieces" style="height:400px;">
                                    <div class="control-label">
                                        <h1 class="labdetail">Pièces jointes</h1>
                                        <table class="table table-vcenter table-condensed table-bordered listepdf valdetail"   >
                                                <thead>
                                                        <tr>
                                                            <th>N°</th>
                                                            <th>Type</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                  </thead>
                                                  <tbody id="tbadys">
                                            @foreach($piecejointes as $key => $piecejointe)
                                            <tr>
                                                    <td>
                                                    {{ $key + 1 }}
                                                    </td>
                                                         <td>
                                                            {{getlibelle($piecejointe->type_piece)}}
                                                        </td>
                                            <td>
                                                <a href="{{ route('telechargerpiecejointe',$piecejointe->id)}}"title="télécharger" class="btn btn-xs btn-default"  target="_blank"><i class="fa fa-download"></i> </a>
                                                <a href="{{ route('detaildocument',$piecejointe->id)}}"title="Visualiser le document" class="btn btn-xs btn-default" ><i class="fa fa-eye"></i> </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                 </tbody>
                                </table>
                            </div>
                                    </div>
                                {{-- <div class="tab-pane" id="example-tabs2-decisions" style="height:500px;">
                                    <div class="col-md-6">
                                        <h4>Notation</h4>
                                    @foreach ( $entreprise->evaluations as $evaluation )
                                        <div class="row">
                                            <div  id="condanation" class="form-group">
                                                <p class="col-md-7 control-label labdetail"><span class="">{{ $evaluation->indicateur }} : </span> </p>
                                                    <p class="col-md-5" >
                                                    <span class="valdetail">
                                                    @empty($evaluation->note)
                                                    @endempty
                                                        {{$evaluation->note}}
                                                </span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div  id="condanation" class="form-group">
                                            <p class="col-md-7 control-label labdetail"><span class="">Total : </span> </p>
                                                <p class="col-md-5" >
                                                <span class="valdetail">
                                                @empty($entreprise->noteTotale)
                                                     Informations non disponible
                                                        @endempty
                                                    {{$entreprise->noteTotale}}
                                            </span></p>
                                        </div>

                                </div>
                            <div class="col-md-6">
                                <div  id="condanation" class="form-group">
                                    <p class="col-md-7 control-label labdetail"><span class="">Conformité au règlements du bailleur : </span> </p>
                                        <p class="col-md-5" >
                                        <span class="valdetail">
                                        @empty($entreprise->conforme)
                                            Information non disponible
                                        @else
                                        @if($entreprise->conforme==1)
                                             Conforme
                                        @endif
                                        @if($entreprise->conforme==2)
                                            Non conforme
                                        @endif
                                        @endempty
                                    </span></p>
                                </div>
                                <div  id="condanation" class="form-group">
                                    <p class="col-md-6 control-label labdetail"><span class="">Avis de l'UGP : </span> </p>
                                        <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($entreprise->decision_ugp)
                                            Informations non disponible
                                        @endempty
                                             {{$entreprise->decision_ugp}}
                                    </span></p>
                                </div>
				<div  id="condanation" class="form-group">
                                    <p class="col-md-6 control-label labdetail"><span class="">Observations de l'UGP : </span> </p>
                                        <p class="col-md-6" >
                                        <span class="valdetail">
                                        @empty($entreprise->observation_ugp )
                                            Informations non disponible
                                        @endempty
                                             {{$entreprise->observation_ugp}}
                                    </span></p>
                                </div>

                                    <div  id="condanation" class="form-group">
                                        <p class="col-md-6 control-label labdetail"><span class="">Decison du comité : </span> </p>
                                            <p class="col-md-6" >
                                            <span class="valdetail">
                                            @empty($entreprise->decision_du_comite_phase1)
                                                                Informations non disponible
                                                                @endempty
                                                 {{$entreprise->decision_du_comite_phase1}}
                                        </span></p>
                                    </div>
                            </div>
                        </div> --}}
                        <div style="clear:bot"></div>
                                </div>
                                <div style="clear:bot"></div>
                            </div>
            <div style="clear:bot"></div>
    </div>
<script src={{ asset("js/vendor/jquery.min.js") }}></script>

@stop



@section('modalSection')
{{-- modal de transmission --}}
<div id="modal-confirm-etape" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-pencil"></i> Confirmation</h2>
                </div>
                <!-- END Modal Header -->

                <!-- Modal Body -->
                <div class="modal-body">
                           <input type="hidden" name="id_table" id="id_table">
                            <p>Voulez-vous vraiment transmettre le dossier ?</p>
                        <div class="form-group form-actions">
                            <div class="text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-sm btn-primary" onclick="trans_id();">OUI</button>
                            </div>
                        </div>

                </div>
                <!-- END Modal Body -->
            </div>
        </div>
</div>


{{-- modal de transmission --}}


<!-- debut Modal Chambre concerné. -->




<!-- debut Modal Valider Etat juge. -->



<!-- debut Modal Valider Conseiller rapporteur. -->

<!-- Modal de génération de convocation -->



<!-- Modal d'enregistrement de decision -->



<!-- debut Modal Valider Avocat général. -->

@stop
{{-- <script>
     function recupererentreprise_id(id_entreprise,conforme){
            document.getElementById("id_entreprise").setAttribute("value", id_entreprise);
            document.getElementById("conformite").setAttribute("value", conforme);
    }
    function saveconformite_souscription(){
        $(function(){
            var id_entreprise= $("#id_entreprise").val();
            var conforme= $("#conformite").val();
            var url = "{{ route('souscription.saveconformite') }}";
            $.ajax({
                url: url,
                type:'GET',
                data: {id_entreprise: id_entreprise, conforme : conforme} ,
                error:function(){alert('error');},
                success:function(){
                    $('#modal-confirm-changestatus').hide();
                    location.reload();
                }
            });
            });
    }
    function save_avis_ugp(avis){
        var id_entreprise= $("#id_entreprise").val();
        var observation= $("#observation").val();
        var url = "{{ route('souscription.savedecisionugp') }}";
        $.ajax({
                url: url,
                type:'GET',
                data: {id_entreprise: id_entreprise, observation:observation, avis:avis} ,
                error:function(){alert('error');},
                success:function(){
                    $('#modal-confirm-rejet').hide();
                    location.reload();
                }
            });

    }
    function confirmChangeStatus1(id_entreprise, id_user){
            document.getElementById("id_entreprise").setAttribute("value", id_entreprise);
            document.getElementById("id_user").setAttribute("value", id_user);
    }
    function validerdossier(){
        $(function(){
            var id_entreprise= $("#id_entreprise").val();
            var id_user= $("#id_user").val();
            var url = "{{ route('entreprise.statuermembrecomite') }}";
            $.ajax({
                url: url,
                type:'GET',
                data: {id_entreprise: id_entreprise, id_user : id_user} ,
                error:function(){alert('error');},
                success:function(){
                    $('#modal-confirm-changestatus').hide();
                    location.reload();
                }
            });
            });
    }

    function rejeterdossier(){
        $(function(){
            var id_entreprise= $("#id_entreprise").val();
            var id_user= $("#id_user").val();
            var raison= $("#raison_du_rejet").val();
            var url = "{{ route('entreprise.statuermembrecomite') }}";
            $.ajax({
                url: url,
                type:'GET',
                data: {id_entreprise: id_entreprise, id_user : id_user, raison:raison} ,
                error:function(){alert('error');},
                success:function(){
                    $('#modal-confirm-rejet').hide();
                    location.reload();
                }
            });
            });
    }
</script> --}}
