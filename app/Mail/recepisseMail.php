<?php

namespace App\Mail;

use App\Models\Entreprise;
use App\Models\PersonneMorale;
use App\Models\PersonnePhysique;
use App\Models\Projet;
use App\Models\Promotrice;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class recepisseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $personne_id;

    public function __construct($id)
    {
        $this->personne_id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id_promo = $this->personne_id;
        $personne= PersonnePhysique::where("id", $id_promo)->first();
        if($personne->type_personne=="M"){
            $personne_morale= PersonneMorale::where("representant_id", $personne->id)->first();
        }
        $projet= Projet::where("personne_id",$personne->id)->first();
        $data["email"] = $personne->email;
        $pdf = PDF::loadView('pdf.recepisse', compact('personne','projet'));
        $details['email'] = $personne->email;
        $details['nom'] = $personne->nom;
        $details['prenom'] = $personne->prenom;
        return $this->view('recepisse',compact('details'))->attachData($pdf->output(), "recépissé.pdf");
    }
}
