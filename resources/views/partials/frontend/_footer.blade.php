 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Burkina Textile</h3>
              <p>
              132, Avenue de Lyon 11 BP 379 Ouagadougou 11 | Burkina Faso<br>              
                <strong>Phone:</strong> +226 25 39 80 60 / 61<br>
                <strong>Email:</strong>info@burkinatextile.bf<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Liens Utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('accueil')}}">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://burkinatextile.bf/" target="_blank" >Burkina Textile</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://me.bf/" target="_blank" >MEBF</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://creerentreprise.me.bf/" target="_blank" >E-création</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://www.cci.bf" target="_blank" >CCI-BF</a></li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Newsletter</h4>

            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="S'inscrire">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MEBF</span></strong>. Tout droit réservé
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mybiz-free-business-bootstrap-theme/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  {{-- Debut des modals dans le frontend --}}
  <div id="choix_type_personne" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="gi gi-pen"></i> Type Personne</h3>
            </div>
            <div class="modal-body">
                <a href="{{ route('inscrire') }}?typepersonne=physique" class="btn btn-primary"> Personne physique</a>
                <a href="{{ route('inscrire') }}?typepersonne=morale" class="btn btn-primary">Personne morale</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<div id="mode" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><i class="gi gi-pen"></i> Mode de souscription</h3>
            </div>
            <div class="modal-body">
                <h4 class="sub-header">1.1 | Cliquer sur «S'inscrire» </h4>
                <p>•	Cliquer sur « personne physique » si vous soumettez le projet en votre nom personnel </p>
                <!-- <h4 class="sub-header">1.2 | Account</h4> -->
                <p>•	Cliquer sur « personne morale » si vous soumettez le projet au nom de votre entreprise ou de votre organisation</p>
                <!-- <h4 class="sub-header">1.3 | Service</h4> -->
                <p>•	Renseigner les champs</p>
               <!-- <h4 class="sub-header">1.4 | Payments</h4>-->
                <p>•	Les champs mentionnés en étoile (*), signifie que l’information est obligatoire et vous ne pouviez pas valider à la fin sans avoir complété tous ces champs</p>
                <p>•	Cliquez sur « lire et accepter les conditions »</p>
                <p>•	Relisez les informations renseignées avant de cliquer sur « valider » </p>
                <p>•	Si vous ne voulez pas continuez, cliquer sur « annuler » </p>
                <p>•	Si vous voulez poursuivre, cliquer sur « valider » </p>
                <p>•	Renseigner les donner sur votre projet à la page suivante </p>
                <p>•	Avant de cliquer sur le bouton « soumettre » relisez bien votre projet </p>

                <p style="color: red">NB : Nous sommes en compétition ; donc seuls les meilleurs projets seront retenus pour la suite</p>
            <p>Bonne chance à vous ! </p>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('form_asset/assets/js/main.js')}}"></script>
  <script src="{{asset('form_asset/js/vendor/jquery.min.js')}}"></script>
  <script src="{{asset('form_asset/js/vendor/bootstrap.min.js')}}"></script>
  <script src="{{asset('form_asset/js/plugins.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.fr.min.js"></script>
  <script src="{{asset('form_asset/js/app.js')}}"></script>

  <!-- Load and execute javascript code used only in this page -->
  <script src="{{asset('form_asset/js/pages/formsValidation.js')}}"></script>
  <script>$(function(){ FormsValidation.init(); });</script>
  <script src="{{asset('form_asset/js/pages/formsWizard.js')}}"></script>
    <script>$(function(){ FormsWizard.init(); });</script>
  {{-- <script src="{{asset('formasset/vendor/jquery/jquery.min.js')}}"></script>--}}
    <script src="{{asset('formasset/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('formasset/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('formasset/vendor/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('formasset/vendor/minimalist-picker/dobpicker.js')}}"></script>
    <script src="{{asset('formasset/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('formasset/vendor/wnumb/wNumb.js')}}"></script>
    <script src="{{asset('formasset/js/main.js')}}"></script>
    <script>
              $(document).ready(function(){
        $('.datepicker').datepicker({
                autoclose: true,
               // startDate: new Date(),
                endDate:new Date() ,
      });
    });
    </script>
    <script>
       function format_montant(id){
          var val= $('#'+id).val();
          //alert(val);
          var index = val.indexOf("XOF");
          if(index !== -1){
              newval= val;
          }
          else{
              var val1= val.split(" ").join("");
              // var newval= new Intl.NumberFormat('fr', {unitDisplay: 'long'}).format(val1);
              var newval= new Intl.NumberFormat('fr', {
              style: 'currency',
            currency: 'XOF',
              }).format(val1);
          }

          $('#'+id).val(newval);
}
    </script>
    <script>
function return_cout_total(quantite,cout_unitaire,cout_total){
  var valquantite= $("#"+quantite).val();
  var valcout_unitaire= $("#"+cout_unitaire).val();
  var total=  parseInt(valcout_unitaire)* parseInt(valquantite)
   $("#"+cout_total).val(total);
   format_montant(cout_unitaire);
   format_montant(cout_total);

}
function verifier_ligne_produit(montant1, montant2, montant3, somme){
    var valmontant1= $("#"+montant1).val();
    // alert(valmontant1);
    var valmontant2= $("#"+montant2).val();
    var valmontant3= $("#"+montant3).val();
    var valsomme= $("#"+somme).val();
    if(parseInt(valmontant1) + parseInt(valmontant2) +  parseInt(valmontant3) != parseInt(valsomme) ){
     // $("#tester").prop('disabled', true);
      alert("Attention la somme de la subvention, du crédit et du montant du promoteur doit être égale au cout du produit!!!");
      $("#"+montant1).val(' ');
      $("#"+montant3).val(' ');
      $("#"+montant2).val(' ');
    }
    else{
     // alert('okko');
          format_montant(montant2);
          format_montant(montant1);
          format_montant(montant3);
          format_montant(somme);
    }
 
  }
    </script>
    <script>
 $(document).ready(function(){
var today = new Date();
   var  EndDate= new Date(today.getFullYear()-25, today.getMonth(), today.getDate());
   var startDate= new Date(today.getFullYear()-55, today.getMonth(), today.getDate());
    $('.date_naiss_pp').datepicker({
            autoclose: true,
            startDate: startDate,
            endDate: EndDate,
            language: 'fr',
            dateFormat: 'dd-mm-yy',
});
}); 
    </script>
    <script>
    $('.date_de_formalisation').hide();
    $('.pret_a_se_formaliser').hide();
    // function afficherSiOui(champinit, champdep){
    //     var contenuchampinit= $('#'+champinit).val();
    //     if((contenuchampinit==1) || (contenuchampinit=="oui") ){
    //         $('.'+champdep).show();
    //     }
    //     else{
    //         $('.'+champdep).hide();
    //     }
    // }
    function afficherSiOui(champinit, champdep){
            var contenuchampinit= $('#'+champinit).val();
            //alert(contenuchampinit);
            if((contenuchampinit==1) || (contenuchampinit=="oui") ){
                $('.'+champdep).show();
            }
            else{
                $('.'+champdep).hide();
            }
        }
    function entreprise_formalisee(){
      //alert('ok');
        var contenuchampinit= $('#entrprise_formalise').val();
        if((contenuchampinit==1) || (contenuchampinit=="oui") ){
            $('.date_de_formalisation').show();
        }
        else{
            $('.date_de_formalisation').hide();
            $('#pret_a_se_formaliser').show();
        }
    }
   
        function changeValue(parent, child, niveau)
          {
             // alert("okok");
              var idparent_val = $("#"+parent).val();
              var id_param = parseInt(niveau);
              //alert(niveau);

              var url = '{{ route('valeur.selection') }}';

              $.ajax({
                      url: url,
                      type: 'GET',
                      data: {idparent_val: idparent_val, id_param:id_param, parent:parent},
                      dataType: 'json',
                      error:function(data){alert("Erreur");},
                      success: function (data) {
                          var options = '<option></option>';
                          for (var x = 0; x < data.length; x++) {
                              options += '<option value="' + data[x]['id'] + '">' + data[x]['name'] + '</option>';
                          }
                         $('#'+child).html(options);
                      }
              });
          }
    </script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
       // var fieldHTML = '<div class="form-group" style="margin-left: 10px;"><select  name="categorie[]" class="form-control entete_eval_fin "><option value=""></option><option value="1">BFR</option><option value="2">Investissement</option></select><input class="entete_eval_fin"  type="text" name="activite[]" value="" placeholder="activite" required title="Champ obligatoire"/> <input class="entete_eval_fin"  type="number" name="cout[]" value="" placeholder="Coût" required title="Champ obligatoire"/>  <input  class="entete_eval_fin" type="number" name="subvention_montant[]" value="" placeholder="Montant de la subvention" required title="Champ obligatoire"/> <input  class="entete_eval_fin"  type="number" name="credit_montant[]" value="" placeholder="Montant du crédit" required title="Champ obligatoire"/><input  class="entete_eval_fin"  type="number" name="promoteur_montant[]" value="" placeholder="Montant du promoteur" required title="Champ obligatoire"/> <a href="javascript:void(0);" class="remove_button"><span> <i class="gi gi-minus"></i></a></div>';
        //var fieldHTML = '<div class="form-group"><input class="col-md-2" style="margin-left: 10px;" type="text" name="activite[]" value="" placeholder="activite" required title="Champ obligatoire"/> <input class="col-md-2" style="margin-left: 10px;" type="number" name="cout[]" value="" placeholder="Coût" required title="Champ obligatoire"/>  <input  class="col-md-2" style="margin-left: 10px;" type="number" name="subvention_montant[]" value="" placeholder="Montant de la subvention" required title="Champ obligatoire"/> <input  class="col-md-2" style="margin-left: 10px;" type="number" name="credit_montant[]" value="" placeholder="Montant du crédit" required title="Champ obligatoire"/><input  class="col-md-2" style="margin-left: 10px;" type="number" name="promoteur_montant[]" value="" placeholder="Montant du promoteur" required title="Champ obligatoire"/> <a href="javascript:void(0);" class="remove_button"><span> <i class="gi gi-minus"></i></a></div>';
        //var fieldHTML2 = '<div><input type="text" name="field_name1[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++;
                var subvention="subvention"+x;
                var credit_montant='credit_montant'+x ;
                var promoteur_montant='promoteur_montant'+x ;
                var cout='cout'+x ;
               var fieldHTML = '<div class="form-group" style="margin-left: 10px;"><select  name="categorie[]" class="form-control entete_eval_fin "><option value=""></option><option value="1">BFR</option><option value="2">Investissement</option></select><input class="entete_eval_fin"  type="text" name="activite[]" value="" placeholder="activite" required title="Champ obligatoire"/> <input class="entete_eval_fin"  type="text" name="cout[]" value="" id="' + cout + '" placeholder="Coût" required title="Champ obligatoire"/>  <input  class="entete_eval_fin" type="text" name="subvention_montant[]" id="' + subvention + '"  value="" placeholder="Montant de la subvention" required title="Champ obligatoire"/> <input  class="entete_eval_fin"  type="text" name="credit_montant[]" id="' + credit_montant + '"  value="" placeholder="Montant du crédit" required title="Champ obligatoire"/><input  class="entete_eval_fin"  type="text" name="promoteur_montant[]" value="" id="' + promoteur_montant + '"  placeholder="Montant du promoteur" required title="Champ obligatoire"  onChange=verifier_ligne_produit("' + subvention + '","' + credit_montant + '","' + promoteur_montant + '","' + cout + '") /> <a href="javascript:void(0);" class="remove_button"><span> <i class="gi gi-minus"></i></a></div>';
                $(wrapper).append(fieldHTML);
                
            }
        });
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_line'); //Add button selector
        var wrapper = $('.chiffre_daffaire'); //Input field wrapper
        var fieldHTML = '<div class="form-group row" style="margin-left: 10px;"><input class="entete_prev_fin"  type="text" name="produits[]" value="" placeholder="produit/service" required title="Champ obligatoire"/><input class="entete_prev_fin"  type="text" name="unites[]" value="" placeholder="unité de mesure" required title="Champ obligatoire"/><input class="entete_prev_fin"  type="number" name="quantite[]" value="" placeholder="quantite" required title="Champ obligatoire"/><input class="entete_prev_fin" type="number" name="cu[]" value="" placeholder="Coût unitaire" required title="Champ obligatoire"/><a href="javascript:void(0);" class="remove_button"><span> <i class="gi gi-minus"></i></a></div>';
        //var fieldHTML = '<div class="form-group"><input class="col-md-2" style="margin-left: 12px;" type="text" name="produits[]" value="" placeholder="produit/service" required title="Champ obligatoire"/><input class="col-md-2" style="margin-left: 10px;" type="text" name="unites[]" value="" placeholder="unité de mesure" required title="Champ obligatoire"/><input class="col-md-1" style="margin-left: 10px;" type="number" name="quantite_an1[]" value="" placeholder="quantite" required title="Champ obligatoire"/><input class="col-md-1" style="margin-left: 3px;" type="number" name="cu_an1[]" value="" placeholder="Coût unitaire" required title="Champ obligatoire"/><input  class="col-md-1" style="margin-left: 10px;" type="number" name="quantite_an2[]" value="" placeholder="quantité" required title="Champ obligatoire"/><input  class="col-md-1" style="margin-left: 3px;" type="number" name="cu_an2[]" value="" placeholder="CU" required title="Champ obligatoire"/><input  class="col-md-1" style="margin-left: 10px;" type="number" name="quantite_an3[]" value="" placeholder="CU" required title="Champ obligatoire"/><input  class="col-md-1" style="margin-left: 3px;" type="number" name="cu_an3[]" value="" placeholder="Cout unitaire" required title="Champ obligatoire"/><a href="javascript:void(0);" class="remove_button"><span> <i class="gi gi-minus"></i></a></div>';
        //var fieldHTML2 = '<div><input type="text" name="field_name1[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                var cout_unitaire='cout_unitaire'+x ;
                var quantite='quantite'+x ;
                var cout_total='cout_total'+x ;

                var fieldHTML = '<div class="form-group row" style="margin-left: 10px;"><input class="entete_prev_fin"  type="text" name="produits[]" value="" placeholder="produit/service" required title="Champ obligatoire"/><input class="entete_prev_fin"  type="text" name="unites[]" value="" placeholder="unité de mesure" required title="Champ obligatoire"/><input class="entete_prev_fin"  type="number" name="quantite[]"  id="' + quantite + '" value="" placeholder="quantite" required title="Champ obligatoire"/><input class="entete_prev_fin" type="text" name="cu[]"  id="' + cout_unitaire + '" value="" placeholder="Coût unitaire" required title="Champ obligatoire" onChange=return_cout_total("'+ quantite + '","' + cout_unitaire + '","' + cout_total + '") /><input class="entete_prev_fin" type="text" name="total[]" disabled  id="' + cout_total + '" value="" placeholder="Total"/><a href="javascript:void(0);" class="remove_button"><span> <i class="gi gi-minus"></i></a></div>';
                $(wrapper).append(fieldHTML);
                //$(wrapper).append(fieldHTML2);//Add field html
            }
        });
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
    </script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script>
   function cacher_region_si_non_au_burkina()
    {
        if($('#pays_de_residence').val() != 7395)
        {
          $('.block_decoupage_bf').hide();
        }
        else{
          $('.block_decoupage_bf').show();
        }
    }
  </script>

<script type="text/javascript"> 
$(function () {
            var t = 100; // rafraîchissement en millisecondes
            setTimeout('showDate()',t)
        });
       function showDate() {
            var date1 = new Date("08/23/2022");
            var date2 = new Date();
          diff = dateDiff(date2,date1);
            var time= 'Clôture dans: '+diff.day+' Jours'+ ' ' +diff.hour +' Heures'+ ' '+diff.min+' minutes';
            document.getElementById('horloge').innerHTML = time;
            var t = 100; // rafraîchissement en millisecondes
            setTimeout('showDate()',t)
    }; 
function dateDiff(date1, date2){
    var diff = {}                           // Initialisation du retour
    var tmp = date2 - date1;
 
    tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
    diff.sec = tmp % 60;                    // Extraction du nombre de secondes
 
    tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
    diff.min = tmp % 60;                    // Extraction du nombre de minutes
 
    tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
    diff.hour = tmp % 24;                   // Extraction du nombre d'heures
     
    tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
    diff.day = tmp;
    return diff;
}
</script>

<!-- 
<script type="text/javascript"> 
        function refresh(){
            var t = 1000; // rafraîchissement en millisecondes
            setTimeout('showDate()',t)
        }
        $(function () {
            var date1 = new Date("08/18/2022");
            var date2 = new Date();
          diff = dateDiff(date2,date1);
            var time= 'Clôture dans: '+diff.day+' Jours'+ ' ' +diff.hour +' Heures'+ ' '+diff.min+' minutes';
            document.getElementById('horloge').innerHTML = time;
            refresh();
    }); 
function dateDiff(date1, date2){
    var diff = {}                           // Initialisation du retour
    var tmp = date2 - date1;
 
    tmp = Math.floor(tmp/1000);             // Nombre de secondes entre les 2 dates
    diff.sec = tmp % 60;                    // Extraction du nombre de secondes
 
    tmp = Math.floor((tmp-diff.sec)/60);    // Nombre de minutes (partie entière)
    diff.min = tmp % 60;                    // Extraction du nombre de minutes
 
    tmp = Math.floor((tmp-diff.min)/60);    // Nombre d'heures (entières)
    diff.hour = tmp % 24;                   // Extraction du nombre d'heures
     
    tmp = Math.floor((tmp-diff.hour)/24);   // Nombre de jours restants
    diff.day = tmp;
    return diff;
}
</script> -->
<script>
   function dispos(){
      //alert('ok');
      var val=$('.dispo').val();
      if(val==1){
        //alert('ok');
        $('.lequel').show();
      }
      else{
        $('.lequel').hide();
      }
    }
</script>
</body>

</html>
