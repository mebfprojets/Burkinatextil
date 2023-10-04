<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\NotifyMail;
use App\Models\PersonnePhysique;
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
        //dd($request->all());
        $validated= $request->validate([
            'numero_identite'=>'unique:personne_physiques|max:255',
            'telephone'=>'unique:personne_physiques|max:255',
            ]);
        $dateTime = new \DateTime();
        $dateTime= $dateTime->format('is');
        $code_personne = 'PRECA-GUICHET2-'.$request->telephone.'-'.$dateTime;
       $personnephysique=PersonnePhysique::create([
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'sexe'=>$request->sexe,
        'date_naissance'=>$request->date_naissance,
        'niveau_instruction'=>$request->niveau_instruction,
        'activite'=>$request->activite,
        'experience'=>$request->experience, 
        'numero_identite'=>$request->numero_identite,
        'adresse'=>$request->adresse,
        'telephone'=>$request->telephone,
        'email'=>$request->email,
        'region_residence'=>$request->region_residence,
        'province_residence'=>$request->province_residence,
        'commune_residence'=>$request->commune_residence,
        'secteur_residence'=>$request->secteur_village,
        'type_personne'=>'P',
        'code_personne'=>$code_personne,
        'entrprise_formalise'=>$request->entrprise_formalise,
        'date_de_formalisation'=>$request->date_de_formalisation,
        'date_de_demarrage_de_activite'=>$request->date_de_demarrage_de_activite,
        'pret_a_se_formaliser'=>$request->pret_a_se_formaliser,
        'nom_entreprise'=>$request->nom_entreprise,
        'telephone_secondaire'=>$request->telephone_secondaire,
       ]);
       //dd("àkok");
       if ($request->hasFile('docidentite')) {
        $urldocidentite= $request->docidentite->store('public/docidentification');
        Piecejointe::create([
            'type_piece'=>env("VALEUR_ID_DOCUMENT_IDENTITE"),
              'personne_physiques_id'=>$personnephysique->id,
              'url'=>$urldocidentite,
          ]);
    }
    $details['email'] = $request->email;
    $details['nom'] = $request->nom;
    $details['prenom'] =$request->prenom;
    $details['code'] = $code_personne;
    //$dest=dispatch(new SendEmailJob($details));
    Mail::to( $request->email)->send(new NotifyMail($details));
return view("validatePage",compact("code_personne"));

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
