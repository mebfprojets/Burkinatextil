<?php

namespace App\Http\Controllers;

use App\Mail\recepisseMail;
use App\Models\Valeur;
use App\Models\Projet;
use App\Models\EvaluationFinanciere;
use App\Models\PersonneMorale;
use App\Models\PersonnePhysique;
use App\Models\Prevision_chiffre_daffaire;
use App\Models\Piecejointe;
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
        $statuts= Valeur::where("parametre_id",34)->get();
        $niveaux = Valeur::where("parametre_id", 5)->get();
        $regions = Valeur::where("parametre_id", 1)->get();
        $experiences=Valeur::where("parametre_id",37)->get();
        if($type_personne=='physique'){
            return view('inscription', compact('niveaux','regions','experiences'));
        }
        else{
            return view('personnemorale', compact("statuts","regions","experiences","niveaux"));
        }
        return view('inscription');
    }
    public function createprojet($code_personne)
    {
        $personne= PersonnePhysique::where('code_personne',$code_personne)->first();
        $personne_id=$personne->id;
        $regions = Valeur::where("parametre_id", 1)->get();
        $filieres= Valeur::where("parametre_id", 36)->get();
        $maillons= Valeur::where("parametre_id", 7)->get();

        return view('projet', compact('filieres','regions','maillons',"personne_id"));
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
        if(isset($personne) && isset($projet_existe))
            {
                return view('finpoursuivre', compact('projet_existe'));
            }
        else
            {
                return view('projet', compact('filieres','regions','maillons',"personne_id"));
            }

    }

    public function store(Request $request)
    {

        $produits=$request->produits;
        $activites=$request->activite;
        $couts=$request->cout;
        $unites=$request->unites;
        $quantite_an1=$request->quantite_an1;
        $cu_an1=$request->cu_an1;
        $quantite_an2=$request->quantite_an2;
        $cu_an2=$request->cu_an2;
        $quantite_an3=$request->quantite_an3;
        $cu_an3=$request->cu_an3;
        $promoteur_montant=$request->promoteur_montant;
        $subvention_montants=$request->subvention_montant;
        $credit_montant=$request->credit_montant;
        //$promoteur_montant=$request->promoteur_montant;
       //dd($request->all());
        $projet=Projet::create([
            'titre'=>$request->titre,
            'filiere'=>$request->filiere,
            'maillon'=>$request->maillon,
            'region'=>$request->region,
            'province'=>$request->province,
            'commune'=>$request->commune,
            'secteur_village'=>$request->secteur_village,
            //'objectif'=>$request->objectif,
            'description_projet'=>$request->description_projet,
            'objectif'=>$request->objectif,
            'resultat_attendu'=>$request->resultat_attendu,
            'produit_service'=>$request->produit_service,
            'clients'=>$request->clients,
            'concurrence'=>$request->concurrence,
            'founisseurs'=>$request->fournisseurs,
            'impacts'=>$request->impacts,
            'risques_difficultes'=>$request->risques_difficultes,
            'personne_id'=>$request->personne,
        ]);
            for($i=0; $i<count($produits); $i++){
                if($produits[$i]!="" && $unites[$i]!="" && $quantite_an1[$i]!=""&& $quantite_an2[$i]!=""){
                    Prevision_chiffre_daffaire::create([
                        'produit'=>$request->produits[$i],
                        'unite_de_mesure'=>$request->unites[$i],
                        'quantite_an1'=>$request->quantite_an1[$i],
                        'cu_an1'=>$request->cu_an1[$i],
                        'quantite_an2'=>$request->quantite_an2[$i],
                        'cu_an2'=>$request->cu_an2[$i],
                        'quantite_an3'=>$request->quantite_an3[$i],
                        'cu_an3'=>$request->cu_an3[$i],
                        'projet_id'=>$projet->id,
                   ]);
                   }
               }
               for($i=0; $i<count($activites); $i++){
                if($activites[$i]!="" && $couts[$i]!="" && $subvention_montants[$i]!="" && $credit_montant[$i]!=""){
                    EvaluationFinanciere::create([
                     'activite'=>$request->activite[$i],
                     'cout'=>$request->cout[$i],
                     'subvention_montant'=>$request->subvention_montant[$i],
                     'credit_montant'=>$request->credit_montant[$i],
                     'promoteur_montant'=>$request->promoteur_montant[$i],
                     'total_projet'=>$request->subvention_montant[$i]+$request->promoteur_montant[$i],
                     'projet_id'=>$projet->id,
                ]);
                }
            }
               if ($request->hasFile('docsituationfonciere')) {
                $urldocfoncier= $request->docsituationfonciere->store('public/docfoncier');
                Piecejointe::create([
                    'type_piece'=>env("VALEUR_ID_DOCUMENT_FONCIER"),
                      'projet_id'=>$projet->id,
                      'url'=>$urldocfoncier,
                  ]);
            }

            $personne= PersonnePhysique::where("id",$projet->personne_id)->first();
       // dd($personne);
        $email= $personne->email;
        //dd($email);
        $pdf = PDF::loadView('pdf.recepisse', compact('projet','personne'));
        //Mail::to($email)->queue(new recepisseMail($personne->id));
        Mail::to($email)->send(new recepisseMail($personne->id));

                return view("finalpage", compact('projet'));
    }
    public function genererRecepise(Request $request, $projet){
        $projet=Projet::find($projet);
        $personne= PersonnePhysique::where("id",$projet->personne_id)->first();
       // dd($personne);
        $email= $personne->email;
        //dd($email);
        $pdf = PDF::loadView('pdf.recepisse', compact('projet','personne'));
        //Mail::to($email)->queue(new recepisseMail($personne->id));
        Mail::to($email)->send(new recepisseMail($personne->id));
        return  $pdf->download('récépissé preca.pdf');
    }
    public function liste_projets(){
        $projets= Projet::orderBy('updated_at', 'desc')->get();
        $personnes= PersonnePhysique::all();
        foreach($projets as $projet){
            if(!$projet->porteur->represente and $projet->porteur->type_personne=="M"){
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

}

