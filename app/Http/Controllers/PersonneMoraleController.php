<?php
namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use App\Mail\NotifyMail;
use App\Models\PersonneMorale;
use App\Models\PersonnePhysique;
use App\Models\ProfessionPersonne;
use App\Models\Piecejointe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersonneMoraleController extends Controller
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
       // dd($request->all());
    //    $validated= $request->validate([
    //     'numero_identite'=>'unique:personne_morales|max:255',
    //     'telephone'=>'unique:personne_morales|max:255',
    //     ]);
    if($request->hasFile('docidentite') && $request->hasFile('formulaire_de_souscription')){
        $dateTime = new \DateTime();
        $dateTime= $dateTime->format('is');
        $code_personne = 'BT-'.$request->numero_identite.'-'.$dateTime;
        $datenaissance= date('Y-m-d', strtotime($request->date_naissance));
        if($request->date_de_demarrage)
        $date_de_demarrage=date('Y-m-d', strtotime($request->date_de_demarrage));
            else
        $date_de_demarrage= null;
        if($request->date_creation)
        $date_creation=date('Y-m-d', strtotime($request->date_creation));
            else
        $date_creation= null;
        $personne= PersonnePhysique::create([
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'sexe'=>$request->sexe,
        'date_naissance'=>$datenaissance,
        'lieu_naissance'=>$request->lieu_de_naissance,
        'nationalite'=>$request->nationalite,
        'pays_de_residence'=>$request->pays_de_residence,
        'niveau_instruction'=>$request->niveau_instruction,
        'region_residence'=>$request->region,
        'province_residence'=>$request->province,
        'commune_residence'=>$request->commune,
        'secteur_residence'=>$request->secteur_village,
        'telephone'=>$request->telephone,
        'telephone_whatsap'=>$request->telephone_whatsapp,
        'email'=>$request->email,
        'type_personne'=>'M',
        'code_personne'=>$code_personne,
        'ca_2020'=>$request->ca_2020,
        'ca_2021'=>$request->ca_2021,
        'ca_2022'=>$request->ca_2022,
        'numero_identite'=>$request->numero_identite,
        'experience'=>$request->experience


        ]);
        $personneMorale=PersonneMorale::create([
            'raison_sociale'=>$request->raison_sociale,
            'type_es'=>$request->type,
            'date_de_formalisation'=>$date_creation,
            'numero_du_doc_de_reconnaissance'=>$request->rccm,
            'numero_ifu'=>$request->ifu,
            'email'=>$request->email,
            'nbre_ass_homme'=>$request->nombre_homme,
            'nbre_ass_femme'=>$request->nombre_femme,
            'nbre_ass_jeune'=>$request->nombre_jeune,
            'nbre_emp_perm_homme'=>$request->nombre_homme_per,
            'nbre_emp_perm_femme'=>$request->nombre_femme_per,
            'nbre_emp_perm_jeune'=>$request->nombre_jeune_per,
            'nbre_temp_perm_homme'=>$request->nombre_homme_temp,
            'nbre_temp_perm_femme'=>$request->nombre_femme_temp,
            'nbre_tem_perm_jeune'=>$request->nombre_jeune_temp,
            'representant_id'=>$personne->id,
            'date_de_demarrage_activite'=>$date_de_demarrage,
            'region'=>$request->region,
            'province'=>$request->province,
            'commune'=>$request->commune,
            'secteur'=>$request->secteur_village,
            'ca_2020'=>$request->ca_2020,
            'ca_2021'=>$request->ca_2021,
            'ca_2022'=>$request->ca_2022,
            'telephone'=>$request->telephone_entreprise,
            'telephone_whatsap'=>$request->telephone_whatsapp_entreprise,
            'experience'=>$request->experience
            
        ]);
        if ($request->hasFile('acte_de_creation')){
            //dd($request->acte_de_creation);
            $file=$request->file('acte_de_creation');
                $emplacement='public/docactedecreation';
                $extension=$file->getClientOriginalExtension();
                $fileName = $personne->id.'-'.'acte_de_creation'.'.'.$extension;
                $file_url= $request['acte_de_creation']->storeAs($emplacement, $fileName);
            //$url_acte_de_creation= $request->acte_de_creation->store('public/docactedecreation');
            Piecejointe::create([
                'type_piece'=>env("VALEUR_ID_DOCUMENT_ACTE_DE_CREATION"),
                  'personne_physiques_id'=>$personne->id,
                  'url'=>$file_url,
              ]);
        }
        if ($request->hasFile('diplome_attestation')) {
            $file=$request->file('diplome_attestation');
            $emplacement='public/diplome_attestation';
            $extension=$file->getClientOriginalExtension();
            $fileName = $personne->id.'-'.'diplome_attestation'.'.'.$extension;
            $file_url= $request['diplome_attestation']->storeAs($emplacement, $fileName);
            //$url_diplome_attestation= $request->diplome_attestation->store('public/diplome_attestation');
            Piecejointe::create([
                'type_piece'=>env("VALEUR_ID_DOCUMENT_DIPLOME"),
                  'personne_physiques_id'=>$personne->id,
                  'url'=>$file_url,
              ]);
        }
        $file=$request->file('formulaire_de_souscription');
        $emplacement='public/formulaire';
        $extension=$file->getClientOriginalExtension();
        $fileName = $personne->id.'-'.'formulaire'.'.'.$extension;
        $file_url= $request['formulaire_de_souscription']->storeAs($emplacement, $fileName);
        //$urlformulaire_de_souscription= $request->formulaire_de_souscription->store('public/formulaire');
        Piecejointe::create([
            'type_piece'=>env("VALEUR_ID_DOCUMENT_FORMULAIRE"),
            'personne_physiques_id'=>$personne->id,
            'url'=>$file_url,
        ]);
        $file=$request->file('docidentite');
        $emplacement='public/docidentification';
        $extension=$file->getClientOriginalExtension();
        $fileName = $personne->id.'-'.'docidentification'.'.'.$extension;
        $file_url= $request['formulaire_de_souscription']->storeAs($emplacement, $fileName);
        //$url_docidentite= $request->docidentite->store('public/docidentification');
        Piecejointe::create([
            'type_piece'=>env("VALEUR_ID_DOCUMENT_IDENTITE"),
                'personne_physiques_id'=>$personne->id,
                'url'=>$file_url,
            ]);
            $activite=$request->activite;
            for($i=0; $i<count($activite); $i++){
                if($activite[$i]!=""){
                    ProfessionPersonne::create([
                    'personne_physique_id'=>$personne->id,
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
       // dd($request->hasFile('acte_de_creation'));
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PersonneMorale  $personneMorale
     * @return \Illuminate\Http\Response
     */
    public function show(PersonneMorale $personneMorale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PersonneMorale  $personneMorale
     * @return \Illuminate\Http\Response
     */
    public function edit(PersonneMorale $personneMorale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PersonneMorale  $personneMorale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersonneMorale $personneMorale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PersonneMorale  $personneMorale
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersonneMorale $personneMorale)
    {
        //
    }
}
