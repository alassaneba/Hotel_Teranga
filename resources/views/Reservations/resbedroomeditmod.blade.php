@extends('layouts.moderator')
@section('title', "Edition Reservation Chambre")
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hotel Teranga</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Moderator</a></li>
              <li class="breadcrumb-item active">Reservation Chambre</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification de chambre</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/resbedroomupdate/{{$resbedroomedit->id}}"  method="post">
            @csrf
            @method('patch')
            <div><label>Date d'arriver</label>
                <input type="date" name="Date_arriver" class="form-control" placeholder="Date d'arriver" value="{{$resbedroomedit->Date_arriver}}">
            </div>
            <div><label>Heure d'arriver</label>
                <input type="time" name="Heure_arriver" class="form-control" placeholder="Heure d'arriver" value="{{$resbedroomedit->Heure_arriver}}">
            </div>
            <div><label>Date d'arriver</label>
                <input type="date" name="Date_depart" class="form-control" placeholder="Date depart" value="{{$resbedroomedit->Date_depart}}">
            </div>
            <div><label>Nombre de chambre</label>
                <input type="number" name="Nombre_chambre" class="form-control" placeholder="Nombre de chambre" value="{{$resbedroomedit->Nombre_chambre}}">
            </div>
            <div><label>Nombre adulte</label>
                <input type="number" name="Nombre_adulte" class="form-control" placeholder="Nombre adulte" value="{{$resbedroomedit->Nombre_adulte}}">
            </div>
            <div><label>Nombre enfant</label>
                <input type="number" name="Nombre_enfant" class="form-control" placeholder="Nombre enfant" value="{{$resbedroomedit->Nombre_enfant}}">
            </div>
            <div><label>Type de chambre</label>
                <select name="Type_chambre" id="Type_chambre" class="form-control" value="{{$resbedroomedit->Type_chambre}}">
                    @foreach($bedrooms as $id => $value)
                        <option value="{{$value}}" {{ $value == $reservationbedroom->Type_chambre ? 'selected="selected"':''}}>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div><label>Numero chambre</label>
                <input type="text" name="Numero_chambre" class="form-control" value="{{$resbedroomedit->Numero_chambre}}">
            </div>
            <div><label>Civilite</label>
                <select type="text" name="Civilite" class="form-control">
                    <option ></option>
                    <option value="Mr." {{$resbedroomedit->Civilite==="Mr."?'selected="selected"':''}}>Mr.</option>
                    <option value="Mme." {{$resbedroomedit->Civilite==="Mme."?'selected="selected"':''}}>Mme.</option>
                    <option value="Mlle." {{$resbedroomedit->Civilite==="Mlle."?'selected="selected"':''}}>Mlle.</option>
                </select>
            </div>
            <div><label>Prenom</label>
                <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{$resbedroomedit->Prenom}}">
            </div>
            <div><label>Nom</label>
                <input type="text" name="Nom" class="form-control" placeholder="Nom" value="{{$resbedroomedit->Nom}}">
            </div>
            <div><label>Nationalite</label>
                <select type="text" name="Nationalite" class="form-control" placeholder="Nationalite" value="{{$resbedroomedit->Nationalite}}">
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
            <div><label>Identifiant</label>
                <input type="text" name="Identifiant" class="form-control" placeholder="Numero Passeport ou Cni"  value="{{$resbedroomedit->Identifiant}}">
            </div>
            <div><label>Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email" value="{{$resbedroomedit->Email}}">
            </div>
            <div><label>Telephone</label>
                <input type="text" name="Telephone" class="form-control" placeholder="Telephone" value="{{$resbedroomedit->Telephone}}">
            </div>
            <div><label>Montant a payer</label>
                <input type="text" name="Montant_payer" class="form-control" placeholder="Montant a payer" value="{{$resbedroomedit->Montant_payer}}">
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control">
                  <option value="En attente" {{$resbedroomedit->Statut==="En attente"?'selected="selected"':''}}>En attente</option>
                  <option value="Confirmer" {{$resbedroomedit->Statut==="Confirmer"?'selected="selected"':''}}>Confirmer</option>
                  <option value="Valider" {{$resbedroomedit->Statut==="Valider"?'selected="selected"':''}}>Valider</option>
                  <option value="Annuler" {{$resbedroomedit->Statut==="Annuler"?'selected="selected"':''}}>Annuler</option>
              </select>
                </select>
            </div>
            <div><label>Responsable</label>
              <select type="text" name="User_id"  class="form-control" readonly>
              <option value="{{ Auth::user()->id }}" >{{ Auth::user()->name }}</option>
              </select>
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Modifier</button>
            </div>
              <br>
        </form>
    </div>

@endsection
