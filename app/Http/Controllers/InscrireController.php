<?php

namespace App\Http\Controllers;

use App\Mail\recepisseMail;
use App\Models\Evaluation;
use App\Models\Valeur;
use App\Models\Projet;
use App\Models\EvaluationFinanciere;
use App\Models\PersonneMorale;
use App\Models\PersonnePhysique;
use App\Models\Prevision_chiffre_daffaire;
use App\Models\Piecejointe;
use App\Models\PhaseProjet;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
class InscrireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','store','create','createprojet',
        'createpoursuivre','poursuivre','genererRecepise','saisie']);
    }
    function createevaluation($idprojet,$critere, $note ){
        Evaluation::create([
            "idprojet"=>$idprojet,
            "note"=>$note,
            "critere"=> $critere
        ]);
    }
    public function index()
    {
        $souscriptionsParzone= DB::select('select  e.region, v.libelle, COUNT(e.id) as nombre FROM projets e , valeurs v where e.region = v.id  GROUP by e.region, v.libelle');
        //dd($souscriptionsParzone);
        $projet= Projet::all();
        $nombreprojet=count($projet);
        //dd($nombreprojet);
        return view('index', compact('souscriptionsParzone', 'nombreprojet'));
    }
    
    // Pour la saisie des données
    public function saisie()
    {
        $souscriptionsParzone= DB::select('select  e.region, v.libelle, COUNT(e.id) as nombre FROM projets e , valeurs v where e.region = v.id  GROUP by e.region, v.libelle');
        //dd($souscriptionsParzone);
        $projet= Projet::all();
        $nombreprojet=count($projet);
        //dd($nombreprojet);
        return view('ok_index', compact('souscriptionsParzone', 'nombreprojet'));
    }

    public function create(Request $request)
    {
        $type_personne= $request->typepersonne;
        $statuts= Valeur::where("parametre_id",44)->get();
        $types= Valeur::where("parametre_id",34)->get();
        $niveaux = Valeur::where("parametre_id", 5)->get();
        $regions = Valeur::where("parametre_id", 1)->get();
        $pays = Valeur::where("parametre_id", 42)->get();
        $nationalites = Valeur::where("parametre_id", 41)->get();
        $activites=Valeur::where("parametre_id",43)->get();
        $contrats=Valeur::where("parametre_id",45)->get();
        $experiences=Valeur::where("parametre_id",37)->get();

        if($type_personne=='physique'){
            return view('personnephysique', compact('experiences','types','niveaux','regions','activites','nationalites','pays','contrats','statuts'));
        }
        else{
            return view('personnemorale', compact("experiences","types","statuts","regions","activites","niveaux","nationalites","pays","contrats","statuts"));
        }
        return view('personnephysique');
    }
    public function createprojet($code_personne)
    {
        $personne= PersonnePhysique::where('code_personne',$code_personne)->first();
        $personne_id=$personne->id;
        $regions = Valeur::where("parametre_id", 1)->get();
        $phase_de_dev_projets= Valeur::where("parametre_id", 38)->get();
        $etats_davancements= Valeur::where("parametre_id", 40)->get();
       // $maillons= Valeur::where("parametre_id", 7)->get();
        return view('projet', compact('etats_davancements','phase_de_dev_projets','regions',"personne_id"));
    }
    public function evaluation(){
        $projets=Projet::all();
        foreach($projets as $projet){
            if($projet->evaluation_financieres->sum('total_projet')>11680000){
                $note_cout_du_projet=15;
            }
            else{
                $note_cout_du_projet=0;
            }

            if($projet->maillon=15){
                $note_maillon_du_projet=15;
            }
            elseif($projet->maillon=14){
                $note_maillon_du_projet=10;
            }
            else{
                $note_maillon_du_projet=5;
            }


        }
    }

    public function createpoursuivre()
    {
        return view('poursuivre');
    }

    public function poursuivre(Request $request)
    {
        $code_poursuivre=$request->code_promoteur;
        $personne= PersonnePhysique::where('code_personne',$code_poursuivre)->first();
        $personne_id=$personne->id;
        $projet_existe= Projet::where('personne_id',$personne_id)->first();
        $regions = Valeur::where("parametre_id", 1)->get();
        $filieres= Valeur::where("parametre_id", 36)->get();
        $maillons= Valeur::where("parametre_id", 7)->get();
        $phase_de_dev_projets= Valeur::where("parametre_id", 38)->get();
        $etats_davancements= Valeur::where("parametre_id", 40)->get();
        if(isset($personne) && isset($projet_existe))
            {
                return view('finpoursuivre', compact('projet_existe'));
            }
        else
            {
                return view('projet', compact('etats_davancements','phase_de_dev_projets','filieres','regions','maillons',"personne_id"));
            }

    }

    public function store(Request $request)
    {
        //dd($request->all());

        $projet=Projet::where('personne_id', $request->personne)->first();
        if(!$projet){

        $produits=$request->produits;
        $categories=$request->categorie;
        $activites=$request->activite;
        $couts=$request->cout;
        $unites=$request->unites;
        $quantite=$request->quantite;
        $cu=$request->cu;
        $quantite_an2=$request->quantite_an2;
        $cu_an2=$request->cu_an2;
        $quantite_an3=$request->quantite_an3;
        $cu_an3=$request->cu_an3;
        $promoteur_montant=$request->promoteur_montant;
        $subvention_montants=$request->subvention_montant;
        $credit_montant=$request->credit_montant;
        $projet=Projet::create([
            'titre'=>$request->titre,
            'region'=>$request->region,
            'province'=>$request->province,
            'commune'=>$request->commune,
            'secteur_village'=>$request->secteur_village,
            'phase_actuelle_projet'=>$request->phase_developpment_actuelle,
            'genese_projet'=>$request->genese_projet,
            'service_innovant'=>$request->service_innovant,
            'description_innovation'=>$request->description_innovation,
            'technologie_utilise'=>$request->technologie_utilise,
            'description_projet'=>$request->description,
            'description_innovation'=>$request->description_innovation,
            'innovation_protege'=>$request->innovant_protege,
            'personne_id'=>$request->personne,
        ]);
        $etats_davancements= Valeur::where("parametre_id", 40)->get();
        foreach($etats_davancements as $etats_davancement){
           $variable=$etats_davancement->id;
            if($request->$variable){
                PhaseProjet::create([
                    'phase'=>$etats_davancement->id,
                    'statut'=>$request->$variable,
                    'projet_id'=>$projet->id
                ]);
            }
        }
            for($i=0; $i<count($produits); $i++){
                if($produits[$i]!="" && $unites[$i]!="" && $quantite[$i]!=""&& $cu[$i]!=""){
                    Prevision_chiffre_daffaire::create([
                        'produit'=>$request->produits[$i],
                        'unite_de_mesure'=>$request->unites[$i],
                        'cout_unit'=>reformater_montant2($request->cu[$i]),
                        'quantite'=>$request->quantite[$i],
                        'projet_id'=>$projet->id,
                   ]);
                   }
               }
               for($i=0; $i<count($activites); $i++){
                if($categories[$i]!=""&&$activites[$i]!="" && $couts[$i]!="" && $subvention_montants[$i]!="" && $credit_montant[$i]!=""){
                    EvaluationFinanciere::create([
                    'categorie'=>$request->categorie[$i],
                     'designation'=>$request->activite[$i],
                     'cout'=> reformater_montant2($request->cout[$i]),
                     'subvention_montant'=>reformater_montant2($request->subvention_montant[$i]),
                     'emprunt'=>reformater_montant2($request->credit_montant[$i]),
                     'fond_propre'=>reformater_montant2($request->promoteur_montant[$i]),
                     'projet_id'=>$projet->id,
                ]);
                }
            }
               if ($request->hasFile('plan_daffaire')) {
                $file=$request->file('plan_daffaire');
                $emplacement='public/plan_daffaire';
                $extension=$file->getClientOriginalExtension();
                $fileName = $projet->personne_id.'-'.'plan_daffaire'.'.'.$extension;
                $file_url= $request['plan_daffaire']->storeAs($emplacement, $fileName);                
                $acte_de_creation= $request->plan_daffaire->store('public/plan_daffaire');
                Piecejointe::create([
                      'type_piece'=>env("VALEUR_ID_DOCUMENT_BUSINESS_PLAN"),
                      'projet_id'=>$projet->id,
                      'url'=>$file_url,
                  ]);
            }
        $personne= PersonnePhysique::where("id",$projet->personne_id)->first();
        $email= $personne->email;
        $pdf = PDF::loadView('pdf.recepisse', compact('projet','personne'));
        return view("finalpage", compact('projet'));
    }
    else{
        return view("finalpage", compact('projet'));
    }
    }
    public function genererRecepise(Request $request, $projet){
        $projet=Projet::find($projet);
        $personne= PersonnePhysique::where("id",$projet->personne_id)->first();
        $email= $personne->email;
        $pdf = PDF::loadView('pdf.recepisse', compact('projet','personne'));
        //Mail::to($email)->queue(new recepisseMail($personne->id));
        return  $pdf->download('récépissé burkina_textile.pdf');
        //return view('pdf.recepisse', compact('projet','personne'));
        //Mail::to($email)->queue(new recepisseMail($personne->id));
        Mail::to($email)->send(new recepisseMail($personne->id));

    }
    public function liste_projets(){
        $projets= Projet::orderBy('updated_at', 'desc')->get();
        $personnes= PersonnePhysique::all();
        foreach($projets as $projet){
            if(!$projet->porteur){
                dd($projet->id);
            }
        }

        return view("projet.index", compact("projets"));
    }
    public function show(Projet $projet){
        $piecejointes=Piecejointe::where("projet_id",$projet->id)->orWhere("personne_physiques_id", $projet->porteur->id )->orderBy('updated_at', 'desc')->get();
        return view("projet.detail", compact("projet","piecejointes"));
    }
    public function telecharger($id)
    {
        $piecejointe= Piecejointe::where('id', $id)->first();
       return $path = Storage::download($piecejointe->url);
    }
    public function detaildocument(Piecejointe $piecejointe){
        return view("document.show", compact('piecejointe'));
    }
   public function accueil_admin(){
       return redirect()->route('projet.liste');
   }
   public function logout(){
        Auth::logout();
        return redirect()->route('login');
   }
   public function statistique(){
    $souscriptionsParregion= DB::select('select  e.region, v.libelle, COUNT(e.id) as nombre FROM projets e , valeurs v where e.region = v.id  GROUP by e.region, v.libelle');
    $souscriptionsParfiliere= DB::select('select  e.filiere, v.libelle, COUNT(e.id) as nombre FROM projets e , valeurs v where e.filiere = v.id  GROUP by e.filiere, v.libelle');
    $souscriptionsParmaillon= DB::select('select  e.maillon, v.libelle, COUNT(e.id) as nombre FROM projets e , valeurs v where e.maillon = v.id  GROUP by e.maillon, v.libelle');
    return view("projet.statistique", compact("souscriptionsParfiliere","souscriptionsParmaillon","souscriptionsParregion"));
   }
   public function resume(Projet $projet){
    $resume = PDF::loadView('projet.resume', compact('projet'));
   // $docfonciere= Piecejointe::where('projet_id', $projet->id)->first();
    //if($projet->porteur->type_personne=='P'){
    // $doccnib= Piecejointe::where('personne_physiques_id', $projet->porteur->id)->first();
    //     $doccnib = Storage::download($doccnib->url);
    // }
    $resume= $resume->download("resume"." ". $projet->porteur->code_personne . ".pdf");
    return  $resume;
    //return $this->view('recepisse',compact('details'))->attachData($resume->output(), "resume"+" "+$projet->code_personne+".pdf");
   }
   public function generer_liste(){
    $projets= Projet::orderBy('updated_at', 'desc')->get();
    return view("projet.generer", compact("projets"));
   }
   public function generer_liste_preselectionne(){
    $i=0;
    $j=0;
    $grde_entreprises=[];
    $pte_entreprises=[];
 $projets= Projet::orderBy('updated_at', 'desc')->get();
 foreach($projets as $projet){
    $cout_du_projet=$projet->evaluation_financieres->sum('cout');
    $subvention_montant=$projet->evaluation_financieres->sum('subvention_montant');
    if($cout_du_projet!=0){
        $taux_subvention= $subvention_montant / $cout_du_projet * 100;
    }
    else{
        $taux_subvention=0;
    }
    $age_representant= calculer_age($projet->porteur->date_naissance);
     if(($cout_du_projet >= 11680000 && $cout_du_projet < 175000000)){
            if((($projet->porteur->sexe=='F' || $age_representant<35) && $taux_subvention<=60) || (($projet->porteur->sexe=='M' && $taux_subvention<=50)) )
            {
                $pte_entreprises[$i]= $projet;
                $i++;
            }
        }
    elseif($cout_du_projet > 175000000 ){
        if($taux_subvention<=30){
            $pte_entreprises[$i]= $projet;
                $i++;
        }
    }
    }
foreach($pte_entreprises as $pte_entreprise){
    $pte_entreprise->update([
        "preselectionne"=>1
    ]);
}
return redirect()->route('projet.generer_liste');
 //return view("projet.generer", compact("projets"));
}
public function annuler_liste_preselectionne() {
    $projets= Projet::orderBy('updated_at', 'desc')->get();
foreach($projets as $projet){
    $projet->update([
        "preselectionne"=>0
    ]);
}
return redirect()->route('projet.generer_liste');
//return view("projet.generer", compact("projets"));
}

}

