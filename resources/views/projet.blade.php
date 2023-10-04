@extends('layouts.frontend')
@section('content')

<div class="block-content" style="margin-top: 60px;">
<div class="col-md-12 content-form">
    <!-- Form Validation Example Block -->

        <!-- END Form Validation Example Title -->

        <!-- Form Validation Example Content -->
        <div class="block">
            <!-- Clickable Wizard Title -->
            <div class="block-title"> 
                <center><h2><strong>INFORMATIONS SUR LE PROJET</strong></h2></center>
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
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-first"><strong>1. Identification du projet</strong></a></li>
                                <li ><a href="#" ><strong>2. Justification du projet</strong></a></li>
                                <li ><a href="#"><strong>3. Evaluation financière</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                    <input type="hidden" name="personne" value="{{ $personne_id }}">
                <div class="row">
                    <div class="col-md-10" style="margin-left:15px;">
                        <div class="form-group">
                            <label class=" control-label" for="val_username">Titre du projet <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" id="titre_du_projet" name="titre" class="form-control" placeholder="Intitulé titre du projet" required>
                                    <span class="input-group-addon"><i class="gi gi-"></i></span>
                                </div>
                        </div>
                    </div>
                </div>
    <fieldset>
        <div class="row">
            <legend><i class="fa fa-angle-right"></i>Localisation du projet</legend>
            <div class="col-md-5" style="margin-left:15px;">
                <div class="form-group ">
                    <label class="control-label" for="val_username">Region du projet <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <select id="region_residence" name="region" class="select-select2" required title="Le champs region est obligatoire" data-placeholder="Choisir votre residence .." value="{{old("region")}}" onchange="changeValue('region_residence', 'province_residence', {{ env('PARAMETRE_ID_PROVINCE') }});"   style="width:400px;" required>
                                <option value="">Choisir la region</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                    <div class="form-group">
                        <label class=" control-label" for="val_username">Province du projet <span class="text-danger">*</span></label>
                            <div class="input-group" >
                                <select id="province_residence" name="province" class="select-select2 " required title="Le champs province est obligatoire" onchange="changeValue('province_residence', 'commune_residence', {{ env('PARAMETRE_ID_COMMUNE') }});" data-placeholder="Choisir la province" style="width:400px;" >
                                    <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="col-md-5"  style="margin-right:10px;">
                    <div class="form-group">
                        <label class=" control-label" for="val_username">Commune du projet <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select id="commune_residence" name="commune"  required title="Le champs commune est obligatoire" class="select-select2" data-placeholder="  Choisir la commune ..." onchange="changeValue('commune_residence', 'arrondissement_residence', {{ env('PARAMETRE_ID_ARRONDISSEMENT') }});" style="width:400px;" required>
                                    <option  value="{{ old('province') }}" {{ old('province') == old('province') ? 'selected' : '' }}>{{ getlibelle(old('province')) }}</option>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label" for="val_username">Secteur/Village <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <select id="arrondissement_residence" class="select-select2" name="secteur_village"  data-placeholder="Selcetioner secteur ou village" required title="Ce champ est obligatoire" onchange="changeValue('arrondissement_residence', 'secteur_residence', {{ env('PARAMETRE_ID_SECTEUR') }});" style="width:400px;" required>
                                    <option  value="{{ old('arrondissement') }}" {{ old('arrondissement') == old('arrondissement') ? 'selected' : '' }}>{{ getlibelle(old('arrondissement')) }}</option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </fieldset>
    <fieldset>
        <div class="row">
            <legend><i class="fa fa-angle-right"></i> Description du projet</legend>
            <div class="col-md-5"  style="margin-left:15px;">
               <div class="form-group">
                <label class="control-label" for="val_bio">Genèse du projet   <span class="text-danger">*</span></label>
                <div class="input-group">
                    <textarea id="val_bio" name="genese_projet" maxlength="500" rows="5" class="form-control" placeholder="(Origine de l’idée, premières étapes réalisées )" required title="Le champs objectif est obligatoire" style="width:400px;"></textarea>
                </div>
            </div> 
            {{-- <div class="form-group">
                <label class="control-label" for="val_bio">Produits ou services   <span class="text-danger">*</span></label>
                <div class="input-group">
                    <textarea id="val_bio" name="produits" maxlength="500" rows="5" class="form-control" placeholder="( Produits ou services )" required title="Le champs objectif est obligatoire" style="width:400px;"></textarea>
                </div>
            </div> --}}
            <div class="form-group">
                <label class="control-label" for="val_skill">Votre produit/service est-il innovant ?<span class="text-danger">*</span></label>
                <div class="input-group">
                    <select id="service_innovant" name="service_innovant" class="form-control- select-select2" onchange="afficherSiOui('service_innovant','complementaire_innovation')" style="width: 400px">
                        <option value=""></option>
                        <option value="1">Oui</option>
                        <option value="2">Non</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label class="control-label" for="val_bio">Technologie/savoir-faire utilisé  <span class="text-danger">*</span></label>
                <div class="input-group">
                    <textarea id="val_bio" name="technologie_utilise" maxlength="500" rows="5" class="form-control" placeholder="(technologie ou savoir-faire est mis en œuvre dans la réalisation de votre produit/service )" required title="Le champs objectif est obligatoire" style="width:400px;"></textarea>
                </div>
            </div>
            
            
        </div>
            <div class="col-md-5" >
             <div class="form-group">
                 <label class="control-label" for="val_bio">Résumé/brève description du projet<span class="text-danger">*</span></label>
                 <div class="input-group">
                     <textarea id="val_bio" name="description" maxlength="500" rows="5" class="form-control" placeholder="(Attirez un investisseur ou partenaire d'en savoir plus et convainquez-le de l'intérêt du projet)" required title="Le champs objectif est obligatoire" style="width:400px;"></textarea>
                 </div>
             </div>
             <div class="form-group">
                <label class="control-label" for="val_bio">A quel besoin votre produit/service répond-t-il ?<span class="text-danger">*</span></label>
                <div class="input-group">
                    <textarea id="val_bio" name="besoins_service" maxlength="500" rows="5" class="form-control" placeholder="(A quel besoin votre produit ou service répond-t-il ?)" required title="Le champs objectif est obligatoire" style="width:400px;"></textarea>
                </div>
            </div>
            <div class="form-group complementaire_innovation" style="display: none">
                <label class="control-label" for="val_bio"> Decrire en quoi c'est une innovation<span class="text-danger">*</span></label>
                <div class="input-group">
                    <textarea id="val_bio" name="description_innovation" maxlength="500" rows="5" class="form-control" placeholder="(Décrire l'innovation ?)" required title="Le champs objectif est obligatoire" style="width:400px;"></textarea>
                </div>
            </div>
            <div class="form-group complementaire_innovation" style="display: none;">
                <label class="control-label" for="val_skill">Avez-vous protégé votre innovation ?<span class="text-danger">*</span></label>
            <div class="input-group">
                    <select id="innovant" name="innovation_protege" class="form-control select-select2 " style="width: 400px">
                        <option value=""></option>
                        <option value="1">Oui</option>
                        <option value="2">Non</option>
                    </select>
                </div>
            </div>
            </div>
            
        </div>
        </fieldset>
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
                                <li><a href="#" ><i class="fa fa-check"></i> <strong>I. Présentation du projet</strong></a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-second"><strong>II. Etat d’avancement du projet </strong></a></li>
                                <li><a href="#"><strong>III. Evaluation financière</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- END Step Info -->
                <div class="row">
                    <div class="col-md-10" style="margin-left:15px; ">
                        <div class="form-group">
                            <label class=" control-label" for="">A quelle phase de développement êtes-vous ? <span data-toggle="tooltip" title="A quelle phase de développement êtes-vous"><i class="fa fa-info-circle"></i></span> </label>
                            <div class="input-group">
                                @foreach ($phase_de_dev_projets as $phase_de_dev_projet)
                                <div class="col-lg-6 checkbox">
                                    <label><input type="radio" name='phase_developpment_actuelle' value="{{ $phase_de_dev_projet->id }}"> {{ $phase_de_dev_projet->libelle }}</label>
                                </div>
                                @endforeach
                            </div>
                            </select>
                        </div>
                    </div>
                </div>
                    
                    <fieldset>
                       
                            <legend>Etat d’avancement du projet</legend>
                    <div class="row">
                 @foreach ($etats_davancements as $etats_davancement)
                        <div class="col-md-11" style="margin-left:10px;">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="val_skill">{{ $etats_davancement->libelle }}<span class="text-danger">*</span></label>
                                    <div class=" col-md-8 input-group">
                                            <label class="col-md-3"><input type="radio" name='{{ $etats_davancement->id }}' value="termine" required>Terminé</label>
                                            <label class="col-md-3"><input type="radio" name='{{ $etats_davancement->id }}' value="en cours">En cours</label>
                                            <label class="col-md-3"><input type="radio" name='{{ $etats_davancement->id }}' value="a faire">A faire</label>
                                            <label class="col-md-3"><input type="radio" name='{{ $etats_davancement->id }}' value="ne s'applique pas">Ne s'applique pas</label>
                                       
                                    </div>
                            </div>
                        </div>
                    @endforeach
                    </fieldset>
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
                                <li><a href="#"><i class="fa fa-check"></i> <strong>1. Présentation du projet</strong></a></li>
                                <li><a href="#"><i class="fa fa-check"></i> <strong>2. Justification du projet</strong></a></li>
                                <li class="active"><a href="javascript:void(0)" data-gotostep="clickable-third"><strong>3. Evaluation financière</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="field_wrapper">
                        <h3>Plan de financement prévisionnel</h3>
                       <div class="row" style="margin-left: 10px;">
                         {{-- <label class="entete_eval_fin control-label" style="text-align: center; margin-left: 12px;" for="">Activite</label> <label class="unitai control-label" for="">Coût</label> <label class="unitai control-label" for="">Montant de la subvention</label><label class="unitai control-label" for="">Crédit attendue</label> <label class="unitai control-label" for="">Montant du promoteur</label> --}}
                         <span class="control-label entete_eval_fin"  for="">Catégorie</span><span class="control-label entete_eval_fin"  for="">Désignation</span> <span  class="control-label entete_eval_fin" for="">Coût de l'activite</span> <span  class="control-label entete_eval_fin" for="">Montant de la subvention</span><span class="control-label entete_eval_fin"  for="">Crédit attendue</span> <span class="control-label entete_eval_fin" for="">Montant du promoteur</span>
                       </div>
                            <div class="form-group row" style="margin-left: 10px;">
                                <select name="categorie[]" class="form-control entete_eval_fin ">
                                    <option value=""></option>
                                    <option value="1">BFR</option>
                                    <option value="2">Investissement</option>
                                </select>
                                 <input class="entete_eval_fin"  type="text" name="activite[]" value="" placeholder="activite" required title="Champ obligatoire"/>
                                 <input class="entete_eval_fin" id="cout"  type="text" name="cout[]" value="" placeholder="Coût" required title="Champ obligatoire"/>
                                 <input  class="entete_eval_fin" id="subvention" type="text" name="subvention_montant[]" value="" placeholder="Montant de la subvention" required title="Champ obligatoire"/>
                                 {{-- <input  class="col-md-1" style="margin-left: 10px;" type="text" name="pourcentage_subvention[]" value="" placeholder="Pourcentage de la subvention" required title="Champ obligatoire"/> --}}
                                 <input  class="entete_eval_fin" id="credit_montant" type="text" name="credit_montant[]" value="" placeholder="Crédit attendue de l’institution financière" required title="Champ obligatoire"/>
                                 {{-- <input  class="col-md-1" style="margin-left: 10px;" type="text" name="pourcentage_credit[]" value="" placeholder="Pourcentage de crédit attendue de l’institution financière" required title="Champ obligatoire"/> --}}
                                 <input  class="entete_eval_fin" id="promoteur_montant" type="text" name="promoteur_montant[]" value="" placeholder="Montant du promoteur" onchange="verifier_ligne_produit('subvention','credit_montant','promoteur_montant','cout')" required title="Champ obligatoire"/>
                                 {{-- <input  class="col-md-1" style="margin-left: 10px;" type="text" name="pourcentage_promoteur[]" value="" placeholder="Pourcentage du montant du promoteur" required title="Champ obligatoire"/> --}}
                                <a href="javascript:void(0);" class="add_button" title="Ajouter une nouvelle ligne"><span><i class="gi gi-plus"></i></span></a>
                            </div>
                    </div>
                        <div class="chiffre_daffaire">
                            <h3>Le chiffre d'affaires prévisionnel</h3>
                            <div class="row" style="margin-left: 10px;">
                              <label class="control-label entete_prev_fin"  for="">Produit/Service</label> <label  class="entete_prev_fin control-label" for="">Unité de mesure</label> <label  class="entete_prev_fin control-label" for="">Quantité</label> <label  class="entete_prev_fin control-label" for="">Coût unitaire</label>  <label  class="entete_prev_fin control-label" for="">Coût Total</label>  
                            </div>
                                 <div class="form-group row" style="margin-left: 10px;">
                                    <input class="entete_prev_fin" type="text" name="produits[]" value="" placeholder="Produits/Services" required title="Champ obligatoire"/>
                                    <input class="entete_prev_fin"  type="text" name="unites[]" value="" placeholder="Unité de mésure" required title="Champ obligatoire"/>
                                    <input  class="entete_prev_fin" type="number" name="quantite[]" id="quantite" value="" placeholder="quantité" required title="Champ obligatoire"/>
                                    <input  class="entete_prev_fin" type="text" name="cu[]" value="" id="cout_unitaire" placeholder="coût unitaire" required title="Champ obligatoire" onchange="return_cout_total('quantite','cout_unitaire','cout_total')"/>
                                    <input  class="entete_prev_fin" type="text" @disabled(true) name="cout_total[]" id="cout_total" value="" placeholder="coût total" required title="Champ obligatoire"/>
                                   <a href="javascript:void(0);" class="add_line" title="Ajouter une nouvelle ligne"><span><i class="gi gi-plus"></i></span></a>
                               </div>
                         </div>
                        <div class="row">
                            <div class="col-md-8 form-group{{ $errors->has('plan_dffaire') ? ' has-error' : '' }}" style="margin-left:15px;">
                                <label class=" control-label" for="">Joindre le plan d'affaire <span class="text-success">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="file" name="plan_daffaire"    placeholder="Charger copie du plan d'affaire" >
                                        <span class="input-group-addon"><i class="gi gi-file"></i></span>
                                        @if ($errors->has('plan_daffaire'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('plan_daffaire') }}</strong>
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
