@extends('layouts.frontend')
@section('content')

<div class="block-content" style="margin-top: 50px;">
<div class="col-md-12 content-form">
<a href={{ asset('assets/docs/Formulaire-de-candidature-BT_Personne-morale.docx') }} download="Formulaire-de-candidature-BT_Personne-morale.docx">Télécharger formulaire type</a>

    <!-- Form Validation Example Block -->
    <div class="block">
        <!-- Form Validation Example Title -->
        <div class="block-title">
            <h2 style="font-size: 30px; color: #e92d27;"><strong>Formulaire Personne Morale</strong></h2>
        </div>
        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
<form id="form-validation" action="{{route('personne_morale.create')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
@csrf
<fieldset>
    <div class="row">
        
        <div class="col-md-10" style="margin-left:15px;">
            <div class="form-group{{ $errors->has('formulaire_de_candidature') ? ' has-error' : '' }}">
                <label class=" control-label" for="">Joindre le formulaire de candidature renseigné (en version PDF) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="formulaire_de_candidature"  accept="image/jpeg,image/gif,image/png,application/pdf"   placeholder="Joindre le formulaire de candidature renseigné" required text="Ce champ est obligatoire">
                        <span class="input-group-addon"><i class="gi gi-file"></i></span>
                        @if ($errors->has('formulaire_de_candidature'))
                            <span class="help-block">
                                <strong>{{ $errors->first('formulaire_de_candidature') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
        </div>
</fieldset>
<div class="row">
    <div class="col-md-5" style="margin-left:15px;">
        <fieldset>
            <legend><i class="fa fa-angle-right"></i>Présentation de l'entreprise</legend>
            <div class="form-group">
                        <label class=" control-label" for="example-clickable-username">Raison sociale ou dénomination<span class="text-danger">*</span></label>
                            <input type="text" id="example-clickable-username" name="raison_sociale" class="form-control" placeholder="Raison sociale ou dénomination" required>
                    </div>
                    <div class="form-group">
                    <label class="control-label" for="val_skill">Type Entreprise <span class="text-danger">*</span></label>
                            <select id="val_skill" name="type" class="form-control select-select2" required>
                                <option value=""></option>
                                @foreach ($types as $type )
                                    <option value="{{  $type->id }} ">{{ $type->libelle }}</option>
                                @endforeach
                            </select>
                    </div>
        <div class="form-group">
            <label class=" control-label" for="val_username">Date de démarrage des activités <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="text" id="val_username" name="date_de_demarrage" max="2022-07-08" class="form-control datepicker" required>
                    <span class="input-group-addon"><i class="gi gi-calendar"></i></span>
                </div>
    </div>
    <div class="form-group">
        <label class="control-label" for="val_username">Date de création <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" id="val_username" name="date_creation" max="2022-07-08" class="form-control datepicker" required>
                <span class="input-group-addon"><i class="gi gi-calendar"></i></span>
            </div>
</div>
    <div class="form-group">
        <label class=" control-label" for="val_username">Numéro RCCM/ Recepissé <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" id="val_username" name="rccm" class="form-control" title="Renseigner le numéro du document d'identité" required>
                <span class="input-group-addon"><i class="gi gi-file"></i></span>
            </div>
            @if ($errors->has('numero_de_document_reconnaissance'))
                    <span class="help-block">
                        <strong>{{ $errors->first('numero_de_document_reconnaissance') }}</strong>
                    </span>
            @endif
    </div>
    <div class="form-group">
        <label class=" control-label" for="val_username">Numéro IFU <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="text" id="val_username" name="ifu" class="form-control" title="Renseigner le numéro du document d'identité" required>
                <span class="input-group-addon"><i class="gi gi-file"></i></span>
            </div>
            @if ($errors->has('numero_de_document_reconnaissance'))
                    <span class="help-block">
                        <strong>{{ $errors->first('numero_de_document_reconnaissance') }}</strong>
                    </span>
            @endif
    </div>
    <div class="form-group{{ $errors->has('acte_de_creation') ? ' has-error' : '' }}">
        <label class=" control-label" for="">Joindre l'acte officiel de création de l'entreprise <span class="text-danger">*</span></label>
            <div class="input-group">
                <input class="form-control" type="file" name="acte_de_creation" placeholder="Charger une copie du document d'identification" required>
                <span class="input-group-addon"><i class="gi gi-user"></i></span>
            </div>
    </div>
</fieldset>
</div>
<div class="col-md-5 col-md-offset-1">
<fieldset>
    <legend>Siège social</legend>
    <div class="form-group">
        <label class=" control-label" for="val_skill" >Région <span class="text-danger">*</span></label>
                <select id="region_residence" name="region_siege" class="select-select2" data-placeholder="Choisir votre residence .." value="{{old("region")}}" onchange="changeValue('region_residence', 'province_residence', {{ env('PARAMETRE_ID_PROVINCE') }});"   style="width:100%;"  title="Ce champ est obligatoire" required>
                    <option value="">Choisir</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->libelle }}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="val_skill" >Province <span class="text-danger">*</span></label>
                    <select id="province_residence" name="province_siege" class="select-select2" onchange="changeValue('province_residence', 'commune_residence', {{ env('PARAMETRE_ID_COMMUNE') }});" data-placeholder="Choisir la province"  style="width: 100%;" required>
                        <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                    </select>
        </div>
            <div class="form-group">
                <label class=" control-label" for="val_skill">Commune <span class="text-danger">*</span></label>
                        <select id="commune_residence" name="commune_siege" class="select-select2" data-placeholder="Choisir la commune ..." onchange="changeValue('commune_residence', 'arrondissement_residence', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});" style="width: 100%;"  title="Ce champ est obligatoire" required>
                            <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                        </select>
            </div>
            <div class="form-group">
                <label class=" control-label" for="val_skill" onchange="changeValue('commune_residence', 'arrondissement_residence', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});">Secteur/Village<span class="text-danger">*</span></label>
                        <select id="arrondissement_residence" class="select-select2" name="secteur_village_siege"  data-placeholder="Arrondissment ou village" onchange="changeValue('arrondissement_residence', 'secteur_residence', {{ env('PARAMETRE_ID_SECTEUR') }});" style="width: 100%;"  title="Ce champ est obligatoire" required>
                            <option  value="{{ old('arrondissement') }}" {{ old('arrondissement') == old('arrondissement') ? 'selected' : '' }}>{{ getlibelle(old('arrondissement')) }}</option>
                        </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="val_username">N° Téléphone Entreprise<span class="text-danger">*</span></label>
                <div class="input-group">
                        <input type="text" id="val_username" name="telephone_entreprise" class="form-control" placeholder="70 00 00 00"  title="Ce champ est obligatoire" required>
                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                </div>
                @if ($errors->has('telephone'))
                    <span class="help-block text-danger">
                        <strong>Une personne a déja été enregistrée avec ce numéro de telephone</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                        <label class="control-label" for="val_username">N° de Téléphone Whatsapp Entreprise<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" id="val_username" name="telephone_whatsapp_entreprise" class="form-control" placeholder="70 00 00 00">
                                <span class="input-group-addon"><i class="gi gi-earphone"></i></span>
                            </div>
            </div>
            <div class="form-group">
                        <label class="control-label" for="val_username">Expériences <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select id="val_skill" name="experience" class="form-control select-select2" data-placeholder="Choisir expérience .." required>
                                <option value=""></option>
                                    @foreach ($experiences as $experience )
                                                <option value="{{  $experience->id }} ">{{ $experience->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
            </div>

    </fieldset>
    </div>
</div>
<div class="col-md-12">
    <label class="control-label" for="val_username">Activités principales actuelles(Choix multiple) <span class="text-danger">*</span></label>
    <div class="form-group">
                @foreach ($activites as $activite)
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="checkbox" id="" name="activite[]" value="{{ $activite->id }}">
                        {{ $activite->libelle }}<br>
                    </div>
                </div>
                @endforeach
    </div> 
</div>
<div class="col-md-12">
    <legend>Nombre d'associés</legend>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Homme<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_homme" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Femme<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_femme" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Jeune<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_jeune" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
</div>
<div class="col-md-12">
    <legend>Nombre d'employés</legend>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Permanent Homme<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_homme_per" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Permanent Femme<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_femme_per" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Permanent Jeune<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_jeune_per" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Temporaire Homme<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_homme_temp" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>         
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Temporaire Femme<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_femme_temp" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
                        
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">Temporaire Jeune<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="nombre_jeune_temp" class="form-control" placeholder="Renseigner le nombre"  title="Ce champ est obligatoire" required>
        </div>
    </div>
</div>
<div class="col-md-12">
    <legend>Chiffre d'affaire(s) des 3 dernières années * </legend>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">2020<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="ca_2020" class="form-control" placeholder="03"  title="Ce champ est obligatoire" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">2021<span class="text-danger">*</span></label>
            <input type="number" min="0" id="example-clickable-username" name="ca_2021" class="form-control" placeholder="03"  title="Ce champ est obligatoire" required>
             
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-clickable-username">2022<span class="text-danger">*</span></label>
             <input type="number" min="0" id="example-clickable-username" name="ca_2022" class="form-control" placeholder="03"  title="Ce champ est obligatoire" required>  
        </div>
    </div>
</div>
<div class="row">



</div>
<div class="row">
    <fieldset>
        <legend><i class="fa fa-angle-right"></i> Représentant pour le micro projet</legend>
        <div class="col-md-5" style="margin-left:15px">
            <div class="form-group">
                <label class="control-label" for="example-clickable-username">Nom</label>
                    <input type="text" id="example-clickable-username" name="nom" class="form-control" placeholder="Nom"  title="Ce champ est obligatoire" required>
            </div>
            <div class="form-group">
                <label class=" control-label" for="example-clickable-username">Prénom</label>
                    <input type="text" id="example-clickable-username" name="prenom" class="form-control" placeholder="Prénom"  title="Ce champ est obligatoire" required>
            </div>
            <div class="form-group">
        <label class="control-label" for="">Sexe <span class="text-danger">*</span></label>
            <select id="val_skill" name="sexe" class="form-control select-select2"  title="Ce champ est obligatoire"  title="Ce champs est obligatoire" required>
                <option value=""></option>
                <option value="M">Masculin</option>
                <option value="F">Feminin</option>
            </select>
    </div>
            <div class="form-group">
                <label class="control-label" for="val_username">Date de naissance <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" id="date_naiss" name="date_naissance" data-date-format="dd-mm-yyyy" class="form-control date_naiss_pp" required>
                        <span class="input-group-addon"><i class="gi gi-calendar"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="val_username">Lieu de naissance <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" id="val_username" name="lieu_de_naissance" class="form-control" placeholder="Votre Ouagadougou Secteur 10.." required>
                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                    </div>
            </div>
    <div class="form-group">
                <label class="control-label" for="val_skill">Type document <span class="text-danger">*</span></label>
                    <select id="type_doc" name="type_document_identite" class="form-control" required>
                        <option value=""></option>
                        <option value="cnib">CNIB</option>
                        <option value="passeport">Passport</option>
                    </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="val_username">Reférence identité <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" id="val_username" name="numero_identite" class="form-control" placeholder="Votre numéro identité.."  accept="image/jpeg,image/gif,image/png,application/pdf" required>
                        <span class="input-group-addon"><i class="gi gi-user"></i></span>
                    </div>
                    @if ($errors->has('numero_identite'))
                    <span class="help-block">
                        <strong>{{ $errors->first('numero_identite') }}</strong>
                    </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('docidentite') ? ' has-error' : '' }}">
                <label class=" control-label" for="">Document d'identité <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="docidentite" placeholder="Charger une copie du document d'identification" required   accept="image/jpeg,image/gif,image/png,application/pdf"  >
                        <span class="input-group-addon"><i class="gi gi-file"></i></span>                        
                    </div>
            </div>
</div>
<div class="col-md-5 col-md-offset-1">
    <div class="form-group">
        <label class="control-label" for="niveau_instruction">Niveau d'instruction <span class="text-danger">*</span></label>
            <select id="val_skill" name="niveau_instruction" class="form-control select-select2"  title="Ce champ est obligatoire" required>
            <option value=""></option>
                        @foreach ($niveaux as $niveau )
                            <option value="{{  $niveau->id }} ">{{ $niveau->libelle }}</option>
                        @endforeach
            </select>
    </div>
    <div class="form-group{{ $errors->has('diplome_attestation') ? ' has-error' : '' }}">
        <label class=" control-label" for="">Joindre le Diplôme/Attestation<span class="text-danger">*</span></label>
            <div class="input-group">
                <input class="form-control" type="file" name="diplome_attestation"  accept="image/jpeg,image/gif,image/png,application/pdf"   placeholder="Joindre le diplôme ou l'attestation" required>
                <span class="input-group-addon"><i class="gi gi-file"></i></span>
                @if ($errors->has('diplome_attestation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('diplome_attestation') }}</strong>
                    </span>
                @endif
            </div>
    </div>
    <div class="form-group">
        <label class="control-label" for="val_username">N° Téléphone principal <span class="text-danger">*</span></label>
        <div class="input-group">
                <input type="text" id="val_username" name="telephone" class="form-control" placeholder="70 00 00 00"  title="Ce champ est obligatoire" required>
                <span class="input-group-addon"><i class="gi gi-user"></i></span>
        </div>
        @if ($errors->has('telephone'))
             <span class="help-block text-danger">
                <strong>Une personne a déja été enregistrée avec ce numéro de telephone</strong>
             </span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label" for="val_username">N° de Téléphone Whatsapp <span class="text-success">*</span></label>
          <div class="input-group">
             <input type="text" id="val_username" name="telephone_whatsapp" class="form-control" placeholder="70 00 00 00">
             <span class="input-group-addon"><i class="gi gi-earphone"></i></span>
           </div>
    </div>
<div class="form-group">
            <label class=" control-label" for="val_email">Email <span class="text-danger">*</span></label>
            <div class="input-group">
                    <input type="email" id="val_email" name="email" class="form-control" placeholder="test@example.com"  title="Ce champ est obligatoire" required>
                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
            </div>
</div>
</div>
</fieldset>
<div class="row">
    <fieldset style="margin-left: 35px;">
        <legend>Lieu de residence du répresentant</legend>
    <div class="col-md-5" >
    <div class="form-group">
                <label class=" control-label" for="val_skill" >Nationalité <span class="text-danger">*</span></label>
                        <select id="" name="nationalite" class="select-select2" data-placeholder="Choisir votre residence .." style="width:100%;" required>
                            @foreach ($nationalites as $nationalite )
                                <option value="{{  $nationalite->id }} ">{{ $nationalite->libelle }}</option>
                            @endforeach                           
                        </select>
            </div>
            <div class="form-group">
                <label class=" control-label" for="val_skill" >Pays de résidence <span class="text-danger">*</span></label>
                        <select id="pays_de_residence" name="pays_de_residence" class="select-select2" data-placeholder="Choisir votre residence .." onchange="cacher_region_si_non_au_burkina()" style="width:100%;" required>
                            <option value="">Choisir</option>
                            @foreach ($pays as $pay )
                                <option value="{{  $pay->id }} ">{{ $pay->libelle }}</option>
                            @endforeach                           
                        </select>
            </div>
        <div class="form-group block_decoupage_bf">
            <label class=" control-label" for="val_skill" >Région <span class="text-danger">*</span></label>
                    <select id="region" name="region" class="select-select2" data-placeholder="Choisir votre residence .." value="{{old("region")}}" onchange="changeValue('region', 'province', {{ env('PARAMETRE_ID_PROVINCE') }});"   style="width:100%;"  title="Ce champ est obligatoire" required>
                        <option value="">Choisir</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->libelle }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="form-group block_decoupage_bf">
                <label class="control-label" for="val_skill" >Province <span class="text-danger">*</span></label>
                        <select id="province" name="province" class="select-select2" onchange="changeValue('province', 'commune', {{ env('PARAMETRE_ID_COMMUNE') }});" data-placeholder="Choisir la province"  style="width: 100%;"  title="Ce champ est obligatoire" required>
                            <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                        </select>
            </div>
    </div>
<div class="col-md-5 col-md-offset-1">
    <div class="form-group block_decoupage_bf">
        <label class=" control-label" for="val_skill">Commune <span class="text-danger">*</span></label>
                <select id="commune" name="commune" class="select-select2" data-placeholder="Choisir la commune ..." onchange="changeValue('commune', 'arrondissement', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});" style="width: 100%;" required>
                    <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                </select>
        </div>
        <div class="form-group block_decoupage_bf">
        <label class=" control-label" for="val_skill" onchange="changeValue('commune', 'arrondissement', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});">Secteur/Village<span class="text-danger">*</span></label>
                <select id="arrondissement" class="select-select2" name="secteur_village"  data-placeholder="Arrondissment ou village" onchange="changeValue('arrondissement', 'secteur', {{ env('PARAMETRE_ID_SECTEUR') }});" style="width: 100%;" required>
                    <option  value="{{ old('arrondissement') }}" {{ old('arrondissement') == old('arrondissement') ? 'selected' : '' }}>{{ getlibelle(old('arrondissement')) }}</option>
                </select>
        </div>
</div>
</fieldset>
</div>
<div class="row">
    <div class="form-group">
        <label class="col-md-4 control-label"><a href="#mode" data-toggle="modal">Lire et accepter les conditions</a> <span class="text-danger">*</span></label>
        <div class="col-md-5">
            <label class="switch switch-primary" for="val_terms">
                <input type="checkbox" id="val_terms" name="val_terms" value="1">
                <span data-toggle="tooltip" title="Je suis d'accord avec les termes!"></span>
            </label>
        </div>
    </div>
</div>
    <div class="form-group form-actions" style="margin-left: 0px; margin-right: 0px;">
        <div class="col-md-8 col-md-offset-4">
            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Annuler</button>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Valider</button>

        </div>
    </div>
</div>
</div>
</div>
</div>

</form>
        <!-- END Form Validation Example Content -->

        <!-- Terms Modal -->
        <div id="choix_typ_personne" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><i class="gi gi-pen"></i> Lire et accepter les conditions</h3>
                    </div>
                    <div class="modal-body">
                        <h4 class="sub-header"><strong>CONDITIONNALITES DE SOUMMISSION DES SOUS-PROJETS DU GUICHET 2 DU PReCA</strong></h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="sub-header">1.2 | Account</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="sub-header">1.3 | Service</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="sub-header">1.4 | Payments</h4>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Ok, I've read them!</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Terms Modal -->
    </div>
    <!-- END Validation Block -->
</div>
<div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="gi gi-pen"></i> Lire et Accepter les conditions</h3>
            </div>
            <div class="modal-body">
                <h4 class="sub-header"><strong>CONDITIONNALITES DE SOUMMISSION DES SOUS-PROJETS DU GUICHET 2 DU PReCA</strong></h4>
                <p>En plus des conditions générales d’éligibilité et de financement du Guichet 2 du PRéCA, je m’engage à accepter et respecter les conditionnalités ci-dessous : </p>
             
                <p>1.	Nous sommes dans une compétition, je m’engage à accepter les résultats du comité de sélection des sous-projets.</p>
               
                <p>2.	En cas d’incompréhension ou de plainte, je m’engage à régler le différend avec l’équipe projet du Guichet 2 de la Maison de l’Entreprise du Burkina Faso (MEBF).</p>
             
                <p>3.	La Maison de l’Entreprise du Burkina Faso se désengage de tout autre moyen de communication ou de revendication utilisé par un porteur de sous-projet dans le cadre de la présente compétition.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


@endsection
