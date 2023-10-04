<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Detail sur le dossier de souscription</title>

    <style type="text/css">
    table, td, th {
  border: 1px solid;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

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
        .labdetail{
    font-weight: bold;
}
    </style>
</head>
<body>

        <div class="enteteGauche" >MEBF <br> ----------- <br> Guichet2-PReCA </div>
        <div class="entetedroite">Burkina Faso <br> -----------  <br> Unité-Progres-Justice </div>
        <div class="entete"> Fiche de dossier d'avant projet Dossier N°: {{ $projet->porteur->code_personne }}<hr> </div>
            <h3>Enregistrement du dossier (réservée à la Maison de l’Entreprise du Burkina Faso)</h3>
    <table>
        <tr>
            <td>Dossier N° : {{ $projet->porteur->code_personne }}</td>
            <td>Date d'enregistrement N° : {{ format_date($projet->created_at) }}</td>
        </tr>
    </table>
        <h2>I.	INFORMATIONS GENERALES </h2>
        <table id="">
            <tr>
                <td> Titre du projet</td>
                <td>{{ $projet->titre }}</td>
            </tr>
            <tr>
                <td>Filière</td>
                <td>{{ getlibelle($projet->filiere) }}</td>
            </tr>
            <tr>
                <td>Maillon</td>
                <td>{{ getlibelle($projet->maillon) }}</td>
            </tr>
            <tr>
                <td>Localisation</td>
                <td>Région : {{ getlibelle($projet->region) }} Province: {{ getlibelle($projet->province) }} Commune: {{ getlibelle($projet->commune) }} Secteur/Village: {{ getlibelle($projet->secteur_village) }}</td>
            </tr>

        </table>
       <h2>II.	Présentation du promoteur</h2>
       @if($projet->porteur->type_personne=='P')
        <table>

            <tr>
                <td class="labdetail">Nom & Prénom</td>
                <td>{{ $projet->porteur->nom }} {{ $projet->porteur->prenom }}</td>
            </tr>
            <tr>
                <td class="labdetail" >Date de naissance</td>
                <td>{{ format_date($projet->porteur->date_naissance) }}</td>
            </tr>
            <tr>
                <td class="labdetail" >Sexe</td>
                <td>
                   @if($projet->porteur->sexe=='M')
                    Masculin
                @else
                    Féminin
                @endif
                </td>
            </tr>
            <tr>
                <td class="labdetail">Référence de la CNIB</td>
                <td>{{ $projet->porteur->numero_identite  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Lieu de residence</td>
                <td>Region: {{ getlibelle($projet->porteur->region_residence)  }} Province: {{ getlibelle($projet->porteur->province_residence) }}  Commune: {{ getlibelle($projet->porteur->commune_residence) }} Secteur: {{ getlibelle($projet->porteur->secteur_residence) }} </td>
            </tr>
            <tr>
                <td class="labdetail">Numéro de téléphone principal</td>
                <td>{{ $projet->porteur->telephone  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Numéro de téléphone secondaire</td>
                <td>{{ $projet->porteur->telephone_secondaire  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Email</td>
                <td>{{ $projet->porteur->email  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Niveau instruction</td>
                <td>{{ getlibelle($projet->porteur->niveau_instruction)  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Activité principale actuelle</td>
                <td>{{ $projet->porteur->activite  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Date de démarrage des activités</td>
                <td>{{ $projet->porteur->date_de_demarrage_de_activite  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Expérience dans l’activité proposée par le sous-projet</td>
                <td>{{ $projet->porteur->niveau_instruction  }} ans</td>
            </tr>
            <tr>
                <td class="labdetail">Entreprise créée (formalisée) </td>
                <td>@if($projet->porteur->entrprise_formalise==1)
                    Formalisé
                    @else
                    Non formalisée
                   @endif
            </tr>
            @if($projet->porteur->entrprise_formalise==1)
            <tr>
                <td class="labdetail">Date de création (formalisation)  </td>
                <td>{{ $projet->porteur->date_de_formalisation  }}</td>
            </tr>
            <tr>
                <td class="labdetail">Nom de l’entreprise</td>
                <td>{{ $projet->porteur->nom_entreprise  }}</td>
            </tr>
           @else
            <tr>
                <td class="labdetail">Disposer à se formaliser  </td>
                <td>{{ $projet->porteur->pret_a_se_formaliser  }}</td>
            </tr>
            @endif

        </table>
    @else
    <table>
        <tr>
            <td class="labdetail">Raison sociale/Denomination : </td>
            <td>{{ $projet->porteur->represente->raison_sociale }}</td>
        </tr>
        <tr>
            <td class="labdetail">Date de démarrage des activités</td>
            <td>{{ format_date($projet->porteur->date_de_demarrage_de_activite)  }}</td>
        </tr>
        <tr>
            <td class="labdetail">Date de création (formalisation)  </td>
            <td>{{ format_date($projet->porteur->represente->date_creation)  }}</td>
        </tr>
        <tr>
            <td class="labdetail">Numéro de document de reconnaissance</td>
            <td>{{ $projet->porteur->represente->numero_du_doc_de_reconnaissance  }}</td>
        </tr>
        <tr>
            <td class="labdetail">Siège Social</td>
            <td>Region: {{ getlibelle($projet->porteur->represente->region_siege) }} Province: {{ getlibelle($projet->porteur->represente->province_siege) }}  Commune: {{ getlibelle($projet->porteur->represente->commune_siege)}} Secteur: {{ getlibelle($projet->porteur->represente->secteur_siege) }} </td>
        </tr>
        <tr>
            <td class="labdetail">Activité pricipale</td>
            <td>{{ format_date($projet->porteur->represente->activite_principale) }}</td>
        </tr>
        <tr>
            <td class="labdetail">Nombre associé/membre</td>
            <td>{{ $projet->porteur->represente->nombre_homme }} hommes  {{ $projet->porteur->represente->nombre_femme }} femmes {{ $projet->porteur->represente->nombre_jeune }} jeunes</td>
        </tr>
        <tr>Informations sur le responsable du membre</tr>
        <tr>
            <td class="labdetail">Nom & Prénom</td>
            <td>{{ $projet->porteur->nom }}  {{ $projet->porteur->prenom }} </td>
        </tr>
        <tr>
            <td class="labdetail">Date de naissance</td>
            <td>{{ $projet->porteur->date_naissance }} </td>
        </tr>
        <tr>
            <td class="labdetail">Sexe</td>
            <td>
               @if($projet->porteur->sexe=='M')
                Masculin
            @else
                Féminin
            </td>
        @endif
        </tr>
        <tr>
            <td class="labdetail">Niveau instruction</td>
            <td>{{ getlibelle($projet->porteur->niveau_instruction)  }}</td>
        </tr>
        <tr>
            <td class="labdetail">Fonction</td>
            <td>{{ getlibelle($projet->porteur->fonction_representant)  }}</td>
        </tr>
        <td class="labdetail"> Informations sur le promoteur</td>
        <td> Informations sur le promoteur</td>
        <tr>
            <td class="labdetail">Lieu de residence</td>
            <td>Region: {{ getlibelle($projet->porteur->region_residence) }} Province: {{ getlibelle($projet->porteur->province_residence) }}  Commune: {{ getlibelle($projet->porteur->commune_residence) }} Secteur: {{ getlibelle($projet->porteur->secteur_residence) }} </td>
        </tr>
        <tr>
            <td class="labdetail">Numéro de téléphone principal</td>
            <td>{{ $projet->porteur->telephone  }}</td>
        </tr>
        <tr>
            <td class="labdetail">Email</td>
            <td>{{ $projet->porteur->email  }}</td>
        </tr>

    </table>
    @endif
    <h2>II.	JUSTIFICATION DU SOUS-PROJET </h2>
    <table>
        <tr>
            <td class="labdetail">Brève description du sous-projet </td>
            <td>{{ $projet->description_projet }}</td>
        </tr>
        <tr>
            <td class="labdetail">Objectifs du sous-projet  </td>
            <td>{{ $projet->objectif }}</td>
        </tr>
        <tr>
            <td class="labdetail">Résultats attendus </td>
            <td>{{ $projet->resultat_attendu }}</td>
        </tr>
        <tr>
            <td class="labdetail">Produit et/ou service offert </td>
            <td>{{ $projet->produit_service }}</td>
        </tr>
        <tr>
            <td class="labdetail">Clients </td>
            <td>{{ $projet->clients }}</td>
        </tr>
        <tr>
            <td class="labdetail">Concurrence </td>
            <td>{{ $projet->concurrence }}</td>
        </tr>
        <tr>
            <td class="labdetail">Fournisseurs </td>
            <td>{{ $projet->founisseurs }}</td>
        </tr>
        <tr>
            <td class="labdetail">Impact environnemental et social </td>
            <td>{{ $projet->impacts }}</td>
        </tr>
    </table>
      <h2>III.	EVALUATION FINANCIERE SOMMAIRE </h2>
    <table>
        <tr>
            <th>N</th>
            <th>Rubrique/Activités</th>
            <th>Coût total en FCFA</th>
            <th>Subvention attendue du du PReCA</th>
            <th>Crédit attendue de l’institution financière</th>
            <th>Contribution du promoteur</th>
        </tr>
        @php
        $i=0;
      @endphp
@foreach ( $projet->evaluation_financieres as $evaluation_financiere )
@php
$i++;
@endphp
<tr>
    <td>{{ $i }}</td>
    <td>{{ $evaluation_financiere->activite }}</td>
    <td>{{ format_prix($evaluation_financiere->total_projet) }}</td>
    <td>{{ format_prix($evaluation_financiere->subvention_montant)  }}</td>
    <td>{{ format_prix($evaluation_financiere->credit_montant)  }}</td>
    <td>{{ format_prix($evaluation_financiere->promoteur_montant) }}</td>
</tr>
@endforeach
<tr>
    <td></td>
    <td>Total</td>
    <td>
      {{ format_prix($projet->evaluation_financieres->sum('cout')) }}
    </td>
    <td>
        {{ format_prix($projet->evaluation_financieres->sum('subvention_montant')) }}
    </td>
    <td>
        {{ format_prix($projet->evaluation_financieres->sum('credit_montant'))}}
    </td>
    <td>
        {{ format_prix($projet->evaluation_financieres->sum('promoteur_montant')) }}
    </td>
</tr>
</table>
<h2>IV.	 CHIFFRE D’AFFAIRES PREVISIONNEL</h2>
    <table>
        <tr>
            <th>N</th>
            <th>Produit/ Service</th>
            <th>Unité de mesure</th>
            <th>Quantité 2023</th>
            <th>Coût unitaire 2023</th>
            <th>Total 2023</th>
            <th>Quantité 2024</th>
            <th>Coût unitaire 2024</th>
            <th>Total 2024</th>
            <th>Quantité 2025</th>
            <th>Coût unitaire 2025</th>
            <th>Total 2025</th>
        </tr>
        @php
        $i=0;
        $totat_an1=0;
        $totat_an2=0;
        $totat_an3=0;
      @endphp
@foreach ( $projet->chiffre_daffaire_previsionnels as $chiffre_daffaire_previsionnel )
@php
$i++;
$totat_an1 += $chiffre_daffaire_previsionnel->quantite_an1 * $chiffre_daffaire_previsionnel->cu_an1;
$totat_an2 += $chiffre_daffaire_previsionnel->quantite_an2 * $chiffre_daffaire_previsionnel->cu_an2;
$totat_an3 += $chiffre_daffaire_previsionnel->quantite_an3 * $chiffre_daffaire_previsionnel->cu_an3;
@endphp
<tr>
    <th>{{ $i }}</th>
    <td>{{ $chiffre_daffaire_previsionnel->produit }}</td>
    <td>{{ $chiffre_daffaire_previsionnel->unite_de_mesure }}</td>
    <td>{{ $chiffre_daffaire_previsionnel->quantite_an1 }}</td>
    <td>{{format_prix($chiffre_daffaire_previsionnel->cu_an1) }}</td>
    <td style="width: 65px;">{{format_prix($chiffre_daffaire_previsionnel->quantite_an1 * $chiffre_daffaire_previsionnel->cu_an1 ) }} </td>
    <td>{{ $chiffre_daffaire_previsionnel->quantite_an2 }}</td>
    <td>{{ format_prix($chiffre_daffaire_previsionnel->cu_an2) }}</td>
    <td style="width: 65px;">{{format_prix($chiffre_daffaire_previsionnel->quantite_an2 * $chiffre_daffaire_previsionnel->cu_an2 ) }} </td>
    <td>{{ $chiffre_daffaire_previsionnel->quantite_an3 }}</td>
    <td>{{ format_prix($chiffre_daffaire_previsionnel->cu_an3) }}</td>
    <td style="width: 65px;">{{format_prix($chiffre_daffaire_previsionnel->quantite_an3 * $chiffre_daffaire_previsionnel->cu_an3 ) }} </td>
</tr>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>{{ format_prix($totat_an1) }}</td>
    <td style="border-left:0px;"></td>
    <td style="border-left:0px;"></td>
    <td>{{ format_prix($totat_an2) }}</td>
    <td></td>
    <td></td>
    <td>{{ format_prix($totat_an3) }}</td>


</tr>
</table>
<h2>V.	RISQUES/DIFFICULTÉS EVENTUELS ET SOLUTIONS POSSIBLES</h2>
    <div> {{ $projet->risques_difficultes }}</div>
</body>
</html>

