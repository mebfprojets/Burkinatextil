<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use App\Mail\NotifyMail;
use App\Models\PersonnePhysique;
use App\Models\ProfessionPersonne;
use App\Models\Piecejointe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonnePhysiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated= $request->validate([
        //     'numero_identite'=>'unique:personne_physiques|max:255',
        //     'telephone'=>'unique:personne_physiques|max:255',
        //     ]);
        $dateTime = new \DateTime();
        $dateTime= $dateTime->format('is');
        $code_personne = 'BT-'.$request->numero_identite.'-'.$dateTime;
       // dd($request->all());
if($request->hasFile('docidentite') && $request->hasFile('formulaire_de_souscription') ){
    $datenaissance= date('Y-m-d', strtotime($request->date_naissance));
    if($request->date_de_formalisation)
        $date_formalisation=date('Y-m-d', strtotime($request->date_de_formalisation));
    else
        $date_formalisation= null;
    $personnephysique=PersonnePhysique::create([
     'nom'=>$request->nom,
     'prenom'=>$request->prenom,
     'sexe'=>$request->sexe,
     'date_naissance'=>$datenaissance,
     'niveau_instruction'=>$request->niveau_instruction,
     'lieu_naissance'=>$request->lieu_de_naissance,
     'nationalite'=>$request->nationalite,
     'pays_de_residence'=>$request->pays_de_residence,
     'numero_identite'=>$request->numero_identite,
     'telephone'=>$request->telephone,
     'email'=>$request->email,
     'region_residence'=>$request->region_residence,
     'province_residence'=>$request->province_residence,
     'commune_residence'=>$request->commune_residence,
     'secteur_residence'=>$request->secteur_village,
     'type_personne'=>'P',
     'code_personne'=>$code_personne,
     'entreprise_formalise'=>$request->entreprise_formalise,
     'date_de_formalisation'=>$date_formalisation,
     'nom_entreprise'=>$request->nom_entreprise,
     'telephone_whatsap'=>$request->telephone_whatsapp,
     'statut_professionnel'=>$request->statut,
     'type_contrat'=>$request->type_contrat,
     'deja_participer_dispositif_dappui'=>$request->dispositif,
     'dispositif_dappui'=>$request->lequel,
     'nbre_emp_perm_homme'=>$request->nombre_homme_per,
     'nbre_emp_perm_femme'=>$request->nombre_femme_per,
     'nbre_temp_perm_homme'=>$request->nombre_homme_temp,
     'nbre_temp_perm_femme'=>$request->nombre_femme_temp,
     'ca_2020'=>$request->ca_2020,
     'ca_2021'=>$request->ca_2021,
     'ca_2022'=>$request->ca_2022,
     'experience'=>$request->experience
    ]);
//    $url=file('formulaire_de_souscription');
//    dd($url);

    $file=$request->file('formulaire_de_souscription');
    $emplacement='public/formulaire';
    $extension=$file->getClientOriginalExtension();
    $fileName = $personnephysique->id.'-'.'formulaire'.'.'.$extension;
    $file_url= $request['formulaire_de_souscription']->storeAs($emplacement, $fileName);
    //$urlformulaire_de_souscription= $request->formulaire_de_souscription->store('public/formulaire');
    Piecejointe::create([
        'type_piece'=>env("VALEUR_ID_DOCUMENT_FORMULAIRE"),
          'personne_physiques_id'=>$personnephysique->id,
          'url'=>$file_url
      ]);
       $file=$request->file('docidentite');
        $emplacement='public/docidentification';
        $extension=$file->getClientOriginalExtension();
        $fileName = $personnephysique->id.'-'.'docidentification'.'.'.$extension;
        $file_url= $request['docidentite']->storeAs($emplacement, $fileName);
      //$urldocidentite= $request->docidentite->store('public/docidentification');
      Piecejointe::create([
          'type_piece'=>env("VALEUR_ID_DOCUMENT_IDENTITE"),
            'personne_physiques_id'=>$personnephysique->id,
            'url'=>$file_url,
        ]);
            if ($request->hasFile('diplome_attestation')) {
                $file=$request->file('diplome_attestation');
                $emplacement='public/diplome_attestation';
                $extension=$file->getClientOriginalExtension();
                $fileName = $personnephysique->id.'-'.'diplome_attestation'.'.'.$extension;
                $file_url= $request['diplome_attestation']->storeAs($emplacement, $fileName);
                //$url_diplome_attestation= $request->diplome_attestation->store('public/diplome_attestation');
                Piecejointe::create([
                    'type_piece'=>env("VALEUR_ID_DOCUMENT_DIPLOME"),
                    'personne_physiques_id'=>$personnephysique->id,
                    'url'=>$file_url,
                ]);
            }
        if ($request->hasFile('acte_de_creation')) {
            $file=$request->file('acte_de_creation');
                $emplacement='public/actecreation';
                $extension=$file->getClientOriginalExtension();
                $fileName = $personnephysique->id.'-'.'acte_de_creation'.'.'.$extension;
                $file_url= $request['acte_de_creation']->storeAs($emplacement, $fileName);
            //$url_acte_de_creation= $request->acte_de_creation->store('public/actecreation');
            Piecejointe::create([
                'type_piece'=>env("VALEUR_ID_DOCUMENT_ACTE_DE_CREATION"),
                  'personne_physiques_id'=>$personnephysique->id,
                  'url'=>$file_url,
              ]);
        }
        $activite=$request->activite;
        for($i=0; $i<count($activite); $i++){
            if($activite[$i]!=""){
                ProfessionPersonne::create([
                'personne_physique_id'=>$personnephysique->id,
                'profession_id'=>$activite[$i]
                ]);
            }
        } 
        $details['email'] = $request->email;
        $details['nom'] = $request->nom;
        $details['prenom'] =$request->prenom;
        $details['code'] = $code_personne;
        Mail::to( $request->email)->send(new NotifyMail($details));
        return view("validatePage",compact("code_personne"));
}
else{
    return redirect()->back();
}
   
    


        // Valeur::create([
        //     'parametre_id'=>$request->parametre,
        //     'valeur_id'=>$request->parent,
        //     'libelle'=>$request->libelle,
        //     'description'=>$request->description,


        // ]);
        // return redirect(route('valeurs.index'));

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonnePhysique  $personnePhysique
     * @return \Illuminate\Http\Response
     */
    public function show(PersonnePhysique $personnePhysique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonnePhysique  $personnePhysique
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonnePhysique $personnePhysique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonnePhysique  $personnePhysique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonnePhysique $personnePhysique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonnePhysique  $personnePhysique
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonnePhysique $personnePhysique)
    {
        //
    }
}
