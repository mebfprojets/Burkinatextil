@extends('layouts.backend')
@section('souscription', 'active')
@section('souscription-liste', 'active')
@section('content')
<div class="block full">
    <div class="block-title">
        <h2><strong>Liste</strong> des souscriptions</h2>
        <a href="{{ route('projet.annulerpreselection') }}" class="btn btn-danger pull-right"><span><i class="fa fa-plus"></i></span> Annuler la préselection</a>
        <a href="{{ route('projet.preselectionnes') }}" class="btn btn-success pull-right"><span><i class="fa fa-plus"></i></span>Préselectionner</a>
        {{-- <a href="{{ route('parametres.create') }}" class="btn btn-success pull-right"><span><i class="fa fa-plus"></i></span>Parametres</a> --}}
    </div>

    <div class="table-responsive">
        <table id="" class="table table-vcenter table-condensed table-bordered listepdf">
            <thead>
                <tr>
                    <th class="text-center">Numéro</th>
                    <th class="text-center">Numéro SP</th>
                    <th class="text-center">Type Personne</th>
                    <th class="text-center">Titre du projet</th>
                    <th class="text-center">Filière</th>
                    <th class="text-center">Maillon</th>
                    <th class="text-center">Région du projet</th>
                    <th class="text-center">Province</th>
                    <th class="text-center">Commune</th>
                    <th class="text-center">Village/secteur</th>
                    <th class="text-center">Nom& Prénom</th>
                    <th class="text-center">Date de naissance</th>
                    <th class="text-center">Sexe</th>
                    <th class="text-center">CNIB</th>
                    <th class="text-center">Telephone</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Niveau d'instruction</th>
                    <th class="text-center">Activité principale</th>
                    <th class="text-center">Expérience </th>
                    <th class="text-center">Formalisé</th>
                    <th class="text-center">Statut</th>
                    <th class="text-center">Nbre homme</th>
                    <th class="text-center">Nbre femme</th>
                    <th class="text-center">Nbre jeune</th>
                    <th class="text-center">Coût projet</th>
                    <th class="text-center">Apport perso</th>
                    <th class="text-center">Apport IF</th>
                    <th class="text-center">Subvention</th>
                    <th class="text-center">Chiffre d'affaire 2023</th>
                    <th class="text-center">Chiffre d'affaire 2024</th>
                    <th class="text-center">Chiffre d'affaire 2025</th>
                    <th class="text-center">Resultat preselection</th>
                    {{-- <th class="text-center">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                  $i=0;
                @endphp
                @foreach ($projets as $projet)
                        @php
                           $i++;
                        @endphp
                    <tr @if($projet->preselectionne==1)
                        style="color:green;"
                        @endif>
                        <td class="text-center" style="width: 10%">{{ $i }}</td>
                        <td class="text-center">{{ $projet->porteur->code_personne }} </td>
                        <td class="text-center">
                            @if($projet->porteur->type_personne=='M')
                                   Personne Morale
                            @else
                                   Entreprise Individuelle
                            @endif
                        </td>

                        <td class="text-center">{{ $projet->titre }} </td>
                        <td class="text-center">{{ getlibelle($projet->filiere) }} </td>
                        <td class="text-center">{{ getlibelle($projet->maillon) }} </td>
                        <td class="text-center">{{ getlibelle($projet->region) }} </td>
                        <td class="text-center">{{ getlibelle($projet->province) }} </td>
                        <td class="text-center">{{ getlibelle($projet->commune) }} </td>
                        <td class="text-center">{{ getlibelle($projet->secteur_village) }} </td>
                        <td class="text-center">{{ $projet->porteur->nom }} {{ $projet->porteur->prenom }} </td>
                        <td class="text-center">{{ format_date($projet->porteur->date_naissance) }} </td>
                        <td class="text-center">
                            @if($projet->porteur->sexe=='M')
                            Masculin
                            @else
                            Féminin
                            @endif
                        </td>
                        <td class="text-center">{{ $projet->porteur->numero_identite  }} </td>
                        <td class="text-center">{{ $projet->porteur->telephone }} </td>
                        <td class="text-center">{{ $projet->porteur->email }} </td>
                        <td class="text-center">{{ getlibelle($projet->porteur->niveau_instruction) }} </td>
                        <td class="text-center">
                            @if($projet->porteur->type_personne=='M')
                            {{ $projet->porteur->represente->activite_principale }}
                            @else
                            {{ $projet->porteur->activite}}
                            @endif </td>
                        <td class="text-center">{{ $projet->porteur->experience }} </td>
                        <td class="text-center">
                            @if($projet->porteur->entrprise_formalise==1)
                            Oui
                            @else
                            Non
                        @endif
                        </td>
                        <td class="text-center">
                            @if($projet->porteur->type_personne=='M')
                            {{ getlibelle($projet->porteur->represente->statut)  }}
                            @else
                             null
                            @endif
                        </td>
                        <td class="text-center">
                            @if($projet->porteur->type_personne=='M')
                            {{ $projet->porteur->represente->nombre_homme  }}
                            @else
                             null
                            @endif
                            </td>
                        <td class="text-center">
                            @if($projet->porteur->type_personne=='M')
                            {{ $projet->porteur->represente->nombre_femme  }}
                            @else
                             null
                            @endif
                        </td>
                        <td class="text-center">
                            @if($projet->porteur->type_personne=='M')
                           {{ $projet->porteur->represente->nombre_jeune  }}
                            @else
                             null
                            @endif
                            </td>
                        <td class="text-center">{{ format_prix($projet->evaluation_financieres->SUM('cout')) }}</td>
                        <td class="text-center">{{ format_prix($projet->evaluation_financieres->SUM('promoteur_montant')) }}</td>
                        <td class="text-center">{{ format_prix($projet->evaluation_financieres->SUM('credit_montant')) }}</td>
                        <td class="text-center">{{ format_prix($projet->evaluation_financieres->SUM('subvention_montant'))  }}</td>
                        <td class="text-center">
                            @php
                                $chiffre_daffaire_an1=0;
                                foreach ($projet->chiffre_daffaire_previsionnels as $projet->chiffre_daffaire_previsionnel) {
                                    $chiffre_daffaire_an1 += $projet->chiffre_daffaire_previsionnel->quantite_an1 * $projet->chiffre_daffaire_previsionnel->cu_an1;
                                }
                            @endphp
                            {{ format_prix($chiffre_daffaire_an1) }}
                        </td>
                        <td class="text-center">
                            @php
                            $chiffre_daffaire_an2=0;
                            foreach ($projet->chiffre_daffaire_previsionnels as $projet->chiffre_daffaire_previsionnel) {
                                $chiffre_daffaire_an2 += $projet->chiffre_daffaire_previsionnel->quantite_an2 * $projet->chiffre_daffaire_previsionnel->cu_an2;
                            }
                            @endphp
                            {{ format_prix($chiffre_daffaire_an2) }}
                        </td>
                        <td class="text-center">
                            @php
                            $chiffre_daffaire_an3=0;
                            foreach ($projet->chiffre_daffaire_previsionnels as $projet->chiffre_daffaire_previsionnel) {
                                $chiffre_daffaire_an3 += $projet->chiffre_daffaire_previsionnel->quantite_an3 * $projet->chiffre_daffaire_previsionnel->cu_an3;
                            }
                            @endphp
                            {{ format_prix($chiffre_daffaire_an3) }}
                        </td>
                        <td class="text-center">
                            @if($projet->preselectionne==1)
                            Préselectionné
                            @else
                            Ajourné
                            @endif
                        </td>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
<script>
    function delConfirm(id){
            //alert(id);
            document.getElementById("id_table").setAttribute("value", id);
    }
    function supp_id(){
            var id= $("#id_table").val();

            $.ajax({
                url: url,
                type:'GET',
                data: {id: id} ,
                error:function(){alert('error');},
                success:function(){
                    $('#modal-confirm-delete').hide();
                    location.reload();

                }
            });
    }
    </script>

