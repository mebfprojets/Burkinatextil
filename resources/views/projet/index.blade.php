@extends('layouts.backend')
@section('souscription', 'active')
@section('souscription-liste', 'active')
@section('content')
<div class="block full">
    <div class="block-title">
        <h2><strong>Liste</strong> des souscriptions</h2>
        {{-- <a href="{{ route('parametres.create') }}" class="btn btn-success pull-right"><span><i class="fa fa-plus"></i></span>Parametres</a> --}}
    </div>

    <div class="table-responsive">
        <table id="" class="table table-vcenter table-condensed table-bordered listepdf">
            <thead>
                <tr>
                    <th class="text-center">Numéro</th>
                    <th class="text-center">Nom & Prénom</th>^
                    <th class="text-center">Nationalité</th>
                    <th class="text-center">Pays de résidence</th>
                    <th class="text-center">Niveau d'instruction</th>
                    <th class="text-center">Région du promoteur</th>
                    <th class="text-center">Contacts</th>
                    <th class="text-center">Structure représentée</th>
                    <th class="text-center">Titre du projet</th>
                    <th class="text-center">Zone du projet</th>
                    <th class="text-center">Phase actuelle du projet</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Actions</th>
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
                    <tr>
                        <td class="text-center" style="width: 10%">{{ $i }}</td>

                        <td class="text-center">{{ $projet->porteur->nom }} {{ $projet->porteur->prenom }} </td>
                        <td class="text-center">{{ getlibelle($projet->porteur->nationalite) }}  </td>
                        <td class="text-center">{{ getlibelle($projet->porteur->pays_de_residence) }}  </td>
                        <td class="text-center">{{ getlibelle($projet->porteur->niveau_instruction) }}  </td>
                        <td class="text-center">{{ getlibelle($projet->porteur->region_residence) }} </td>
                        <td class="text-center">{{ $projet->porteur->telephone }}/ {{ $projet->porteur->telephone_secondaire }}  </td>
                        <td class="text-center">
                        @if($projet->porteur->type_personne=='M')
                        {{ $projet->porteur->represente->raison_sociale }}
                        @else
                        Néant
                        @endif
                        </td>

                        <td class="text-center">{{ $projet->titre }}</td>
                        <td class="text-center">{{ getlibelle($projet->region)  }}/{{ getlibelle($projet->province)  }}/ {{ getlibelle($projet->commune)  }}</td>
                        <td class="text-center">{{ getlibelle($projet->phase_actuelle_projet)  }}</td>
                        <td class="text-center">{{ $projet->description_projet }}</td>
                        
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route("projet.show", $projet) }}" data-toggle="tooltip" title="afficher les details du projets" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a>
                                <a href="{{ route("resume", $projet) }}" data-toggle="tooltip" title="télécharger le dossier de souscription" class="btn btn-xs btn-default"><i class="fa fa-print"></i></a>

                                {{-- <a  href="#modal-confirm-delete" onclick="delConfirm({{ $parametre->id }});" data-toggle="modal" title="Supprimer" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a> --}}
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

