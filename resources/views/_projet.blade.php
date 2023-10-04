@extends('layouts.frontend')
@section('content')

<div class="block-content" style="margin-top: 50px;">
<div class="col-md-12 content-form">
    <!-- Form Validation Example Block -->

        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <div class="block">
            <!-- Clickable Wizard Title -->
            <div class="block-title"> 
                <center><h2><strong>INFORMATIONS SUR LE SOUS PROJET</strong></h2></center>
            </div>
            <!-- END Clickable Wizard Title -->

            <!-- Clickable Wizard Content -->
            <form id="clickable-wizard" action="{{route('projet.create')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            @csrf <!-- First Step -->
                <div id="clickable-first" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>1. Présentation du sous projet</strong></a></li>
                                <li ><a href="#" ><strong>2. Justification du sous projet</strong></a></li>
                                <li ><a href="#"><strong>3. Evaluation financière</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <input type="hidden" name="personne" value="{{ $personne_id }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-username">Titre</label>
                        <div class="col-md-6">
                            <input type="text" id="val_username" name="titre" class="form-control" placeholder="Le nom du projet" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-username">Filière</label>
                        <div class="col-md-6">
                            <select id="val_skill" name="filiere" class="form-control select-select2" required title="Le champs filière est obligatoire">
                            <option value=""></option>
                                @foreach ($filieres as $filiere)
                                    <option value="{{ $filiere->id }}">{{ $filiere->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val_skill">Maillon <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="val_skill" name="maillon" class="form-control select-select2" required title="Le champs maillon est obligatoire">
                            <option value=""></option>
                                @foreach ($maillons as $maillon)
                                    <option value="{{ $maillon->id }}">{{ $maillon->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val_skill" >Région <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="region_residence" name="region" class="select-select2" required title="Le champs region est obligatoire" data-placeholder="Choisir votre residence .." value="{{old("region")}}" onchange="changeValue('region_residence', 'province_residence', {{ env('PARAMETRE_ID_PROVINCE') }});"   style="width:100%;" required>
                                <option value="">Choisir</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val_skill" >Province <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="province_residence" name="province" class="select-select2" required title="Le champs province est obligatoire" onchange="changeValue('province_residence', 'commune_residence', {{ env('PARAMETRE_ID_COMMUNE') }});" data-placeholder="Choisir la province"  style="width: 100%;">
                                <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val_skill">Commune <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="commune_residence" name="commune"  required title="Le champs commune est obligatoire" class="select-select2" data-placeholder="Choisir la commune ..." onchange="changeValue('commune_residence', 'arrondissement_residence', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});" style="width: 100%;" required>
                                <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-4 control-label" for="val_skill" onchange="changeValue('commune_residence', 'arrondissement_residence', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});">Secteur/Village <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="arrondissement_residence" class="select-select2" name="secteur_village"  data-placeholder="Arrondissment ou village" required title="Ce champ est obligatoire" onchange="changeValue('arrondissement_residence', 'secteur_residence', {{ env('PARAMETRE_ID_SECTEUR') }});" style="width: 100%;" required>
                                <option  value="{{ old('arrondissement') }}" {{ old('arrondissement') == old('arrondissement') ? 'selected' : '' }}>{{ getlibelle(old('arrondissement')) }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="reset" class="btn btn-sm btn-warning" id="back4">Précédent</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="next4">Suivant</button>
                    </div>
                    </div>
                </div>
                <div id="clickable-second" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li><a href="#" ><i class="fa fa-check"></i> <strong>1. Présentation du sous projet</strong></a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>2. Justification du sous projet</strong></a></li>
                                <li><a href="#"><strong>3. Evaluation financière</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Brève description du sous-projet <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="description_projet" maxlength="500" rows="6" class="form-control" placeholder="(Qu’est-ce que vous visez à travers la réalisation de ce projet ?)" required title="Ce Champ est obligatoire"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Objectifs du sous-projet <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="objectif" maxlength="500" rows="6" class="form-control" placeholder="(Qu’est-ce que vous visez à travers la réalisation de ce projet ?)" required title="Le champs objectif est obligatoire"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Résultats attendus <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" required title="Ce champ est obligatoire" name="resultat_attendu" maxlength="500" rows="6" required title="Ce champ est obligatoire" class="form-control" placeholder="(Quels sont les produits que vous attendez :         i) augmentation de la productivité ;
                            ii) création d’emplois ;
                            iii) création de revenus ;)
                            (Quels sont les problèmes que le sous-projet contribuera à résoudre ?
                            Qu’est-ce que le projet amènera de plus à la filière? A l’économie locale)">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Produit et/ou service offert </label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="produit_service" required title="Ce champ est obligatoire" maxlength="500" rows="6" class="form-control" placeholder="(Décrivez de façon sommaire les produits et/ou services offerts par votre entreprise)"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Clients <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="clients" required title="Ce champ est obligatoire" maxlength="500" rows="6" class="form-control" placeholder="(Donnez le profil de vos clients actuels et ceux potentiels ?)"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Concurrence<span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="concurrence"  required title="Ce champ est obligatoire" maxlength="500" rows="6" class="form-control" placeholder="(Qui sont vos principaux concurrents actuels et potentiels ?)"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Fournisseurs<span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="fournisseurs" required title="Ce champ est obligatoire" maxlength="500" rows="6" class="form-control" placeholder="(Quels sont ou seront vos principaux fournisseurs ?)"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Impact environnemental et social  <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="impacts"  required title="Ce champ est obligatoire" rows="6" maxlength="400" class="form-control" placeholder="(Quels sont les impacts négatifs prévisibles sur le plan environnemental ou social et quelles sont les mesures que vous comptez mettre en œuvre pour atténuer, corriger ou éliminer ces impacts négatifs ? Quelle est la situation foncière du site du sous-projet ?)"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_bio">Risques/Difficultés éventuels et solutions possibles <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <textarea id="val_bio" name="risques_difficultes"  required title="Ce champ est obligatoire" rows="6" maxlength="500" class="form-control" placeholder="(Selon vous, quels sont les risques ou les difficultés éventuelles qui pourraient affecter la réalisation de votre sous-projet ? Quels sont les conditions extérieures qui doivent exister pour la réussite de votre sous-projet ?)"></textarea>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="reset" class="btn btn-sm btn-warning" id="back4">Précédent</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="next4">Suivant</button>
                    </div>
                    </div>
                </div>

                <!-- END Second Step -->

                <!-- Third Step -->
                <div id="clickable-third" class="step">
                    <!-- Step Info -->
                    <div class="form-group">
                        <div class="col-xs-12">
                            <ul class="nav nav-pills nav-justified clickable-steps">
                                <li><a href="#"><i class="fa fa-check"></i> <strong>1. Présentation du sous projet</strong></a></li>
                                <li><a href="#"><i class="fa fa-check"></i> <strong>2. Justification du sous projet</strong></a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Evaluation financière</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="field_wrapper">
                        <h3>Plan de financement prévisionnel</h3>
                       <div class="row" style="margin-left: 12px;">
                         {{-- <label class="col-md-2 control-label" style="text-align: center; margin-left: 12px;" for="">Activite</label> <label class="col-md-2 control-label" for="">Coût</label> <label class="col-md-2 control-label" for="">Montant de la subvention</label><label class="col-md-2 control-label" for="">Crédit attendue</label> <label class="col-md-2 control-label" for="">Montant du promoteur</label> --}}
                         <label class="col-md-2 control-label" style="text-align: center; margin-left: 12px;" for="">Activite</label> <label style="text-align: center;" class="col-md-2 control-label" for="">Coût de l'activite</label> <label style="text-align: center;" class="col-md-2 control-label" for="">Montant de la subvention</label><label class="col-md-2 control-label"  style="text-align: center;" for="">Crédit attendue</label> <label class="col-md-2 control-label" for="">Montant du promoteur</label>
                       </div>
                            <div class="form-group row">
                                 <input class="col-md-2" style="margin-left: 12px;" type="text" name="activite[]" value="" placeholder="activite" required title="Champ obligatoire"/>
                                 <input class="col-md-2" style="margin-left: 10px;" type="number" name="cout[]" value="" placeholder="Coût" required title="Champ obligatoire"/>
                                 <input  class="col-md-2" style="margin-left: 10px;" type="number" name="subvention_montant[]" value="" placeholder="Montant de la subvention" required title="Champ obligatoire"/>
                                 {{-- <input  class="col-md-1" style="margin-left: 10px;" type="number" name="pourcentage_subvention[]" value="" placeholder="Pourcentage de la subvention" required title="Champ obligatoire"/> --}}
                                 <input  class="col-md-2" style="margin-left: 10px;" type="number" name="credit_montant[]" value="" placeholder="Crédit attendue de l’institution financière" required title="Champ obligatoire"/>
                                 {{-- <input  class="col-md-1" style="margin-left: 10px;" type="number" name="pourcentage_credit[]" value="" placeholder="Pourcentage de crédit attendue de l’institution financière" required title="Champ obligatoire"/> --}}
                                 <input  class="col-md-2" style="margin-left: 10px;" type="number" name="promoteur_montant[]" value="" placeholder="Montant du promoteur" required title="Champ obligatoire"/>
                                 {{-- <input  class="col-md-1" style="margin-left: 10px;" type="number" name="pourcentage_promoteur[]" value="" placeholder="Pourcentage du montant du promoteur" required title="Champ obligatoire"/> --}}
                                <a href="javascript:void(0);" class="add_button" title="Ajouter une nouvelle ligne"><span><i class="gi gi-plus"></i></span></a>
                            </div>
                    </div>
                        <div class="chiffre_daffaire">
                            <h3>Le chiffre d'affaires prévisionnel</h3>
                            <div class="row" style="margin-left: 12px;">
                              <label class="col-md-2 control-label" style="text-align: center; margin-left: 12px;" for="">Produit/Service</label> <label style="text-align: center;" class="col-md-2 control-label" for="">Unité de mesure</label> <label style="text-align: center;" class="col-md-2 control-label" for="">Année1(2023)<span data-toggle="tooltip" title="Pour les trois (03) années avenir renseigner vos prévisions en quantité du produit vendu ainsi que le coût unitaire"><i class="fa fa-info-circle"></i></span></label> <label style="text-align: center;" class="col-md-2 control-label" for="">Année 2(2024) <span data-toggle="tooltip" title="Pour les trois (03) années avenir renseigner vos prévisions en quantité du produit vendu ainsi que le coût unitaire"><i class="fa fa-info-circle"></i></span></label> <label style="text-align: center;" class="col-md-2 control-label" for="">Année 3(2025)<span data-toggle="tooltip" title="Pour les trois (03) années avenir renseigner vos prévisions en quantité du produit vendu ainsi que le coût unitaire"><i class="fa fa-info-circle"></i></span></label>
                            </div>
                                 <div class="form-group row">
                                    <input class="col-md-2" style="margin-left: 12px;" type="text" name="produits[]" value="" placeholder="Produits/Services" required title="Champ obligatoire"/>
                                    <input class="col-md-2" style="margin-left: 10px;" type="text" name="unites[]" value="" placeholder="Unité de mésure" required title="Champ obligatoire"/>
                                    <input  class="col-md-1" style="margin-left: 10px;" type="number" name="quantite_an1[]" value="" placeholder="quantité" required title="Champ obligatoire"/>
                                    <input  class="col-md-1" style="margin-left: 3px;" type="number" name="cu_an1[]" value="" placeholder="CU" required title="Champ obligatoire"/>
                                    <input  class="col-md-1" style="margin-left: 10px;" type="number" name="quantite_an2[]" value="" placeholder="quantite" required title="Champ obligatoire"/>
                                    <input  class="col-md-1" style="margin-left: 3px;" type="number" name="cu_an2[]" value="" placeholder="CU" required title="Champ obligatoire"/>
                                    <input  class="col-md-1" style="margin-left: 10px;" type="number" name="quantite_an3[]" value="" placeholder="quantité" required title="Champ obligatoire"/>
                                    <input  class="col-md-1" style="margin-left: 3px;" type="number" name="cu_an3[]" value="" placeholder="CU" required title="Champ obligatoire"/>
                                   <a href="javascript:void(0);" class="add_line" title="Ajouter une nouvelle ligne"><span><i class="gi gi-plus"></i></span></a>
                               </div>
                         </div>
                        <div class="row">

                            <div class="col-md-8 form-group{{ $errors->has('docsituationfonciere') ? ' has-error' : '' }}" style="margin-left:15px;">
                                <label class=" control-label" for="">Joindre le document sur la situation foncière du site <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="docsituationfonciere"    placeholder="Charger une copie du document d'identification" required>
                                        <span class="input-group-addon"><i class="gi gi-file"></i></span>
                                        @if ($errors->has('docidentite'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('docsituationfonciere') }}</strong>
                                                                        </span>
                                                                        @endif
                                    </div>
                            </div>
                        </div>
                        {{-- <div class="field_wrapper">
                            <div class="form-group">
                                <label for="">Activite</label> <input type="text" name="activite[]" value="" placeholder="activite"/>
                                <label for="">Coût</label> <input type="number" name="cout[]" value="" placeholder="Coût" />
                                <label for="">Montant de la subvention</label> <input type="text" name="subvention_montant[]" value="" placeholder="activite"/>
                                <label for="">Montant du promoteur</label> <input type="text" name="promoteur_montant[]" value="" placeholder="activite"/>
                                <a href="javascript:void(0);" class="add_button" title="Add field"><span><i class="gi gi-plus"></i></span></a>
                            </div>
                        </div> --}}

                    <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="reset" class="btn btn-sm btn-warning" id="back4">Précédent</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="next4">Soumettre</button>
                    </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-bio">Bio</label>
                        <div class="col-md-8">
                            <textarea id="example-clickable-bio" name="example-clickable-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-clickable-newsletter">Newsletter</label>
                        <div class="col-md-8">
                            <div class="checkbox">
                                <label for="example-clickable-newsletter">
                                    <input type="checkbox" id="example-clickable-newsletter" name="example-clickable-newsletter">  Sign up
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                        <div class="col-md-8">
                            <label class="switch switch-primary" for="example-clickable-terms">
                                <input type="checkbox" id="example-clickable-terms" name="example-clickable-terms" value="1">
                                <span data-toggle="tooltip" title="I agree to the terms!"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- END Third Step -->

                <!-- Form Buttons -->

                <!-- END Form Buttons -->
            </form>
            <!-- END Clickable Wizard Content -->
        </div>
        <!-- END Form Validation Example Content -->

        <!-- Terms Modal -->
        <div id="choix_typ_personne" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title"><i class="gi gi-pen"></i> Service Terms</h3>
                    </div>
                    <div class="modal-body">
                        <h4 class="sub-header">1.1 | General</h4>
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


@endsection
