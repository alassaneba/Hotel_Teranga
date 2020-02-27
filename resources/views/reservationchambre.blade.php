@extends('layout')
@section('title', "Reservation Chambre")
@section('css')
<style>
.loader {
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid #cd866c;
  border-bottom: 10px solid #cd866c;
  width: 40px;
  height: 40px;
  margin: auto;

  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;

}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<style>
.modal {
  display: none;
  position: fixed;
  padding-top: 100px; }
</style>
@endsection
@section('content')
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('accueil')}}">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('accueil')}}" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item active" href="{{route('reservation/chambre')}}">Chambre</a>
                        <a class="dropdown-item" href="{{route('reservation/evenement')}}">Evenement</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('services')}}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{route('a-propos')}}" class="nav-link">A propos</a></li>
                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('Backoffice')}}">Back-Office</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
    <section class="hero-wrap d-flex js-fullheight" style="background:url({{asset('app-assets/images/renai.jpg')}});height: 639px;background-position: top;background-size: cover;">
        <div class="overlay"></div>
        <div class="forth js-fullheight d-flex align-items-center">
            <div class="text text-center">
                <h1>Reservation de chambre</h1>
            </div>
        </div>
        <div class="third about-img js-fullheight">
        </div>
    </section>
    <br>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class=" container border">
        <spam><p class="text-center">Pour faire une reservation de chambre veuillez renseignez tous les champs</p></spam>
    </div>
    <div class="container border">
    <form action="{{route('reservation/chambre')}}" method="post" name="form1">
        @csrf
        <div><label>Date d'arriver</label>
            <input type="date" name="Date_arriver"  min="<?php echo date('Y-m-d'); ?>" id="Date_arriver"class="form-control">
        </div>
        <div><label>Heure d'arriver</label>
            <input type="time" name="Heure_arriver" class="form-control">
        </div>
        <div><label>Date depart</label>
            <input type="date" name="Date_depart" id="Date_depart" class="form-control" onchange="return calculer()">
        </div><label>Nombre de jour</label>
         <input type="text" name="jour" id="jour" value="1" class="form-control" readonly />
        <div><label>Nombre de chambre</label>
            <input type="number" name="Nombre_chambre" id="Nombre_chambre" class="form-control">
        </div>
        <div><label>Nombre adulte</label>
            <input type="number" name="Nombre_adulte" class="form-control">
        </div>
        <div><label>Nombre enfant</label>
            <input type="number" name="Nombre_enfant" class="form-control">
        </div>
        <div><label>Type de chambre</label>
         <select name="bedroom_id" id="Type_chambre" class="form-control">
                <option></option>
            @foreach($bedrooms as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
            @endforeach
          </select>
         </div>
        <div><label>Description</label>
         <textarea type="text" id="Description" value="Description" class="form-control" readonly /></textarea>
        </div>
        <div class="modal" id="infos">
           <div class="modal-dialog modal-sm">
           <div class="modal-content">
               <div class="loader"></div>
           </div>
         </div>
       </div>
       <div><label>Civilite</label>
            <select type="text" name="Civilite" class="form-control">
                <option></option>
                <option value="Mr.">Mr.</option>
                <option value="Mme.">Mme.</option>
                <option value="Mlle.">Mlle.</option>
            </select>
        </div>
        <div><label>Prenom</label>
            <input type="text" name="Prenom" class="form-control">
        </div>
        <div><label>Nom</label>
            <input type="text" name="Nom" class="form-control">
        </div>
        <div><label>Nationalite</label>
            <select type="text" name="Nationalite" class="form-control">
                <option value="AF">Afghanistan</option>
                <option value="ZA">Afrique du Sud</option>
                <option value="AL">Albanie</option>
                <option value="DZ">Algérie</option>
                <option value="DE">Allemagne</option>
                <option value="AS">American Samoa</option>
                <option value="MK">Ancienne république yougoslave de Macédoine (FYROM)</option>
                <option value="AD">Andorre</option>
                <option value="AO">Angola</option>
                <option value="AI">Anguilla</option>
                <option value="AQ">Antarctique</option>
                <option value="AG">Antigua-et-Barbuda</option>
                <option value="AN">Antilles Néerlandaises</option>
                <option value="SA">Arabie Saoudite</option>
                <option value="AR">Argentine</option>
                <option value="AM">Arménie</option>
                <option value="AW">Aruba</option>
                <option value="AU">Australie</option>
                <option value="AT">Autriche</option>
                <option value="AZ">Azerbaijan</option>
                <option value="BS">Bahamas</option>
                <option value="BH">Bahrain</option>
                <option value="BD">Bangladesh</option>
                <option value="BB">Barbades</option>
                <option value="BE">Belgique</option>
                <option value="BZ">Belize</option>
                <option value="BJ">Benin</option>
                <option value="BM">Bermudes</option>
                <option value="BT">Bhutan</option>
                <option value="BY">Biélorussie</option>
                <option value="BO">Bolivie</option>
                <option value="BA">Bosnie-Herzégovine</option>
                <option value="BW">Botswana</option>
                <option value="BN">Brunei Darussalam</option>
                <option value="BR">Brésil</option>
                <option value="BG">Bulgarie</option>
                <option value="BF">Burkina Faso</option>
                <option value="BI">Burundi</option>
                <option value="KH">Cambodge</option>
                <option value="CM">Cameroun</option>
                <option value="CA">Canada</option>
                <option value="CV">Cap Vert</option>
                <option value="CL">Chili</option>
                <option value="CN">Chine</option>
                <option value="CX">Christmas Island</option>
                <option value="CY">Chypre</option>
                <option value="VA">Cité du Vatican</option>
                <option value="CO">Colombie</option>
                <option value="KM">Comores</option>
                <option value="CG">Congo</option>
                <option value="CR">Costa Rica</option>
                <option value="CI">Cote d'Ivoire</option>
                <option value="HR">Croatie</option>
                <option value="CU">Cuba</option>
                <option value="DK">Danemark</option>
                <option value="DJ">Djibouti</option>
                <option value="DM">Dominique</option>
                <option value="ER">Erythrée</option>
                <option value="ES">Espagne</option>
                <option value="EE">Estonie</option>
                <option value="FJ">Fiji</option>
                <option value="FI">Finlande</option>
                <option value="FR">France</option>
                <option value="FX">France métropolitaine</option>
                <option value="RU">Fédération de Russie</option>
                <option value="GA">Gabon</option>
                <option value="GM">Gambie</option>
                <option value="GH">Ghana</option>
                <option value="GI">Gibraltar</option>
                <option value="GD">Grenade</option>
                <option value="GL">Groenland</option>
                <option value="GR">Grèce</option>
                <option value="GP">Guadeloupe</option>
                <option value="GU">Guam</option>
                <option value="GT">Guatemala</option>
                <option value="GN">Guinée</option>
                <option value="GQ">Guinée équatoriale</option>
                <option value="GW">Guinée-Bissau</option>
                <option value="GY">Guyane</option>
                <option value="GF">Guyane Française</option>
                <option value="GE">Géorgie</option>
                <option value="GS">Géorgie du Sud et Îles Sandwich du Sud</option>
                <option value="HT">Haiti</option>
                <option value="HN">Honduras</option>
                <option value="HK">Hong Kong</option>
                <option value="HU">Hongrie</option>
                <option value="IN">Inde</option>
                <option value="ID">Indonésie</option>
                <option value="IQ">Iraq</option>
                <option value="IE">Irlande</option>
                <option value="IS">Islande</option>
                <option value="IL">Israël</option>
                <option value="IT">Italie</option>
                <option value="JM">Jamaïque</option>
                <option value="JP">Japon</option>
                <option value="JO">Jordanie</option>
                <option value="KZ">Kazakhstan</option>
                <option value="KE">Kenya</option>
                <option value="KG">Kirghizistan</option>
                <option value="KI">Kiribati</option>
                <option value="KW">Koweït</option>
                <option value="RE">La Réunion</option>
                <option value="LS">Lesotho</option>
                <option value="LV">Lettonie</option>
                <option value="LB">Liban</option>
                <option value="LR">Liberia</option>
                <option value="LI">Liechtenstein</option>
                <option value="LT">Lituanie</option>
                <option value="LU">Luxembourg</option>
                <option value="MO">Macao</option>
                <option value="MG">Madagascar</option>
                <option value="MY">Malaisie</option>
                <option value="MW">Malawi</option>
                <option value="MV">Maldives</option>
                <option value="ML">Mali</option>
                <option value="MT">Malte</option>
                <option value="MA">Maroc</option>
                <option value="MQ">Martinique</option>
                <option value="MU">Maurice</option>
                <option value="MR">Mauritanie</option>
                <option value="YT">Mayotte</option>
                <option value="MX">Mexique</option>
                <option value="FM">Micronésie, États Fédérés de</option>
                <option value="MC">Monaco</option>
                <option value="MN">Mongolie</option>
                <option value="ME">Montenegro</option>
                <option value="MS">Montserrat</option>
                <option value="MZ">Mozambique</option>
                <option value="MM">Myanmar</option>
                <option value="NA">Namibie</option>
                <option value="NR">Nauru</option>
                <option value="NI">Nicaragua</option>
                <option value="NE">Niger</option>
                <option value="NG">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norvège</option>
                <option value="NC">Nouvelle-Calédonie</option>
                <option value="NZ">Nouvelle-Zélande</option>
                <option value="NP">Népal</option>
                <option value="OM">Oman</option>
                <option value="UG">Ouganda </option>
                <option value="PK">Pakistan</option>
                <option value="PW">Palaos</option>
                <option value="PA">Panama</option>
                <option value="PG">Papouasie-Nouvelle-Guinée</option>
                <option value="PY">Paraguay</option>
                <option value="NL">Pays-Bas</option>
                <option value="PH">Philippines</option>
                <option value="PN">Pitcairn</option>
                <option value="PL">Pologne</option>
                <option value="PF">Polynésie Française</option>
                <option value="PT">Portugal</option>
                <option value="PR">Puerto Rico</option>
                <option value="PE">Pérou</option>
                <option value="QA">Qatar</option>
                <option value="RO">Roumanie</option>
                <option value="GB">Royaume Uni</option>
                <option value="RW">Rwanda</option>
                <option value="SY">République arabe syrienne</option>
                <option value="CF">République Centrafricaine</option>
                <option value="KR">République de Corée</option>
                <option value="MD">République de Moldavie</option>
                <option value="DO">République Dominicaine</option>
                <option value="CD">République Démocratique du Congo</option>
                <option value="LA">République Démocratique Populaire Lao</option>
                <option value="IR">République islamique d'Iran</option>
                <option value="KP">République populaire démocratique de Corée</option>
                <option value="CZ">République Tchèque</option>
                <option value="TZ">République Unie de Tanzanie</option>
                <option value="EH">Sahara occidental</option>
                <option value="KN">Saint Christophe et Nevis</option>
                <option value="VC">Saint-Vincent et Les Grenadines</option>
                <option value="SH">Sainte-Hélène</option>
                <option value="LC">Sainte-Lucie</option>
                <option value="SV">Salvador</option>
                <option value="WS">Samoa</option>
                <option value="SM">San Marino</option>
                <option value="ST">Sao Tomé et Principe</option>
                <option value="RS">Serbie</option>
                <option value="SC">Seychelles</option>
                <option value="SL">Sierra Leone</option>
                <option value="SG">Singapour</option>
                <option value="SK">Slovaquie (République Slovaque)</option>
                <option value="SI">Slovénie</option>
                <option value="SO">Somalie</option>
                <option value="SD">Soudan</option>
                <option value="LK">Sri Lanka</option>
                <option value="PM">St-Pierre et Miquelon</option>
                <option value="CH">Suisse</option>
                <option value="SR">Suriname</option>
                <option value="SE">Suède</option>
                <option value="SZ">Swaziland</option>
                <option value="SN" selected="selected">Sénégal</option>
                <option value="TJ">Tadjikistan </option>
                <option value="TW">Taiwan</option>
                <option value="TD">Tchad</option>
                <option value="TF">Terres Australes Françaises</option>
                <option value="IO">Territoire britannique de l'océan Indien</option>
                <option value="TH">Thailande</option>
                <option value="TL">Timor oriental</option>
                <option value="TG">Togo</option>
                <option value="TK">Tokelau</option>
                <option value="TO">Tonga</option>
                <option value="TT">Trinidad et Tobago</option>
                <option value="TN">Tunisie</option>
                <option value="TM">Turkménistan</option>
                <option value="TR">Turquie</option>
                <option value="TV">Tuvalu</option>
                <option value="UA">Ukraine</option>
                <option value="UY">Uruguay</option>
                <option value="UZ">Uzbekistan</option>
                <option value="VU">Vanuatu</option>
                <option value="VE">Venezuela</option>
                <option value="VN">Vietnam</option>
                <option value="WF">Wallis et Futuna</option>
                <option value="YE">Yemen</option>
                <option value="YU">Yougoslavie</option>
                <option value="ZM">Zambie</option>
                <option value="ZW">Zimbabwe</option>
                <option value="EG">Égypte</option>
                <option value="AE">Émirats Arabes Unis</option>
                <option value="EC">Équateur</option>
                <option value="US">États-Unis</option>
                <option value="ET">Éthiopie</option>
                <option value="BV">Île Bouvet</option>
                <option value="NF">Île Norfolk</option>
                <option value="KY">Îles Caïmans</option>
                <option value="CC">Îles Cocos</option>
                <option value="CK">Îles Cook</option>
                <option value="FK">Îles Falkland (Maldives)</option>
                <option value="FO">Îles Féroé</option>
                <option value="MH">Îles Marshall</option>
                <option value="HM">Îles McDonald et Heard</option>
                <option value="UM">Îles Mineures éloignées des États-Unis</option>
                <option value="SB">Îles Salomon</option>
                <option value="SJ">Îles Svalbard et Jan Mayen</option>
                <option value="TC">Îles Turques et Caïques</option>
                <option value="VG">Îles Vierges (britanniques)</option>
                <option value="VI">Îles Vierges (U.S.)</option>
            </select>
        </div>
        <div><label>Email</label>
            <input type="email" name="Email" class="form-control">
        </div>
        <div><label>Telephone</label>
            <input type="text" name="Telephone" class="form-control">
        </div>
        <div><label>Montant a payer</label>
         <input type="number" id="Montant_payer" name="Montant_payer" value="0" class="form-control" readonly />
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-primary">Reserver</button>
        </div>
        <br>
    </form>
  </div><br>
  @endsection
  @section('js')
  <script type="text/javascript">
  document.getElementById('Date_arriver').valueAsDate = new Date();
  var d1 = new Date();
  var y1= d1.getFullYear();
  var m1 = d1.getMonth()+1;
  if(m1<10)
      m1="0"+m1;
  var dt1 = d1.getDate()+1;
  if(dt1<10)
  dt1 = "0"+dt1;
  var d2 = y1+"-"+m1+"-"+dt1;
  document.getElementById('Date_depart').value=d2;
  </script>
  <script type="text/javascript">
  function calculer()
  {
  var Date_arriver=document.forms['form1'].elements['Date_arriver'].value
  var Date_depart=document.forms['form1'].elements['Date_depart'].value

  var debut = Date.parse(Date_arriver);
  var fin = Date.parse(Date_depart);
  var nbjour = (fin - debut) / (1000 * 60 * 60 * 24); // + " jours";
  document.forms['form1'].elements['jour'].value=nbjour;
  }
  </script>
  <script type="text/javascript">
  $(function() {
  $("#Type_chambre").change(
    function(){
      $('#infos').modal('show');
      let typeChambre=$(this).val();
      $.ajax({
                method: "POST",
                url: "{{route('bedroomajax') }}",
                data: { Type_chambre: typeChambre,"_token": "{{ csrf_token() }}", },
                success:function(data)
                {
                  console.log(data)

                  var nbjour= $("#jour").val();
                  var Nombre_chambre= $("#Nombre_chambre").val();
                  var prix=data.prix*nbjour*Nombre_chambre;
                  $("#Montant_payer").val(prix);
                  $("#Description").val(data.description);
                      $('.modal').modal('hide');
                },
                error:function(ex,errorMsg,err)
                {
                  console.log(errorMsg)
                }
              })
})
});
</script>

  @endsection
