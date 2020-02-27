@extends('layout')
@section('title', "Termes & Conditions")
@section('css')

@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('accueil')}}">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('accueil')}}" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('reservation/chambre')}}">Chambre</a>
                        <a class="dropdown-item" href="{{route('reservation/evenement')}}">Evenement</a>
                    </div>
                </li>
                <li class="nav-item active"><a href="{{route('services')}}" class="nav-link">Services</a></li>
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
            <h1>Termes & Conditions</h1>
        </div>
    </div>
    <div class="third about-img js-fullheight">
    </div>
</section>

<section style="margin-top: 3em;" class="text-center">
    <div class="container">
        <div class="row">
                <div class="text-center">
                    <h1 class="text-center">Terms et conditions d'utilisations</h1>
                </div>
                <div style="text-align:justify;">CONDITIONS D’UTILISATION DE GOOGLE
Date de la dernière modification : 25 octobre 2017 (voir les versions archivées)<br>

Bienvenue sur Google !<br>
Merci d’avoir choisi nos produits et services (les « Services »). Les Services sont fournis par la société Google LLC (ci-après « Google »), sise au 1600 Amphitheatre Parkway, Mountain View, CA 94043, États-Unis.<br>

L’utilisation de nos Services implique votre acceptation des présentes Conditions d’Utilisation. Nous vous invitons à les lire attentivement.<br>

Nos Services sont très variés : il se peut donc que des conditions additionnelles ou particulières à certains Services (p. ex. des conditions de limite d’âge) s’appliquent. Ces conditions additionnelles seront mises à votre disposition avec les Services concernés. Si vous choisissez d’utiliser ces Services, vous acceptez que ces conditions additionnelles fassent alors également partie de votre engagement contractuel avec nous.<br>

Utilisation de nos Services<br>
Vous devez respecter les règles applicables aux Services que vous utilisez.<br>

N’utilisez pas nos Services de façon impropre. Ne tentez pas, par exemple, de produire des interférences avec nos Services ou d’y accéder en utilisant une méthode autre que l’interface et les instructions que nous mettons à votre disposition. Vous ne devez utiliser nos Services que dans le respect des lois en vigueur, y compris les lois et réglementations applicables concernant le contrôle des exportations et ré-exportations. Nous pouvons suspendre ou cesser la fourniture de nos Services si vous ne respectez pas les conditions ou règlements applicables, ou si nous examinons une suspicion d’utilisation impropre.<br>

L’utilisation de nos Services ne vous confère aucun droit de propriété intellectuelle sur nos Services ni sur les contenus auxquels vous accédez. Vous ne devez utiliser aucun contenu obtenu par l’intermédiaire de nos Services sans l’autorisation du propriétaire dudit contenu, à moins d’y être autorisé par la loi. Ces Conditions d’Utilisation ne vous confèrent pas le droit d’utiliser une quelconque marque ou un quelconque logo présent dans nos Services. Vous n’êtes pas autorisé à supprimer, masquer ou modifier les notices juridiques affichées dans ou avec nos Services.<br>

Nos Services affichent des contenus n’appartenant pas à Google. Ces contenus relèvent de l’entière responsabilité de l’entité qui les a rendus disponibles. Nous pouvons être amenés à vérifier les contenus pour s’assurer de leur conformité à la loi ou à nos conditions d’utilisation. Nous nous réservons le droit de supprimer ou de refuser d’afficher tout contenu que nous estimons raisonnablement être en violation de la loi ou de notre règlement. Le fait que nous nous réservions ce droit ne signifie pas nécessairement que nous vérifions les contenus. Dès lors, veuillez ne pas présumer que nous vérifions les contenus.<br>

Dans le cadre de votre utilisation des Services et de l’exécution de notre engagement contractuel, nous sommes susceptibles de vous adresser des messages liés au fonctionnement ou à l’administration des Services ainsi que d’autres informations. Vous pouvez choisir de ne plus recevoir certains de ces messages.<br>

Certains de nos Services sont disponibles sur les appareils mobiles. Ne les utilisez pas d’une manière susceptible de vous distraire et de vous empêcher de respecter le code de la route et les règles de sécurité en matière de conduite.
<br>
Votre compte Google<br>
Vous pouvez avoir besoin d’un compte Google pour utiliser certains de nos Services. Votre compte Google peut être créé par vous-même ou vous être attribué par un administrateur (par exemple, votre employeur ou votre établissement d’enseignement). Si votre compte Google vous a été attribué par un administrateur, il se peut que des conditions d’utilisation différentes ou additionnelles s’appliquent et que votre administrateur puisse accéder à votre compte ou le désactiver.
<br>
Pour protéger votre compte Google, préservez la confidentialité de votre mot de passe. Vous êtes responsable de l’activité exercée dans votre compte Google ou par le biais de celui-ci. Veillez à ne pas réutiliser le même mot de passe que celui associé à votre compte Google, dans des applications tierces. Si vous découvrez que votre mot de passe ou votre compte Google a fait l’objet d’une utilisation non autorisée, suivez ces instructions.
<br>
Protection de la vie privée et des droits d’auteur<br>
Les Règles de confidentialité de Google expliquent comment nous traitons vos données à caractère personnel et protégeons votre vie privée lors de votre utilisation de nos Services. En utilisant nos Services, vous acceptez que Google puisse utiliser ces données conformément à ces Règles de confidentialité de Google.
<br>
Nous répondons aux notifications d’atteinte présumée aux droits d’auteur et désactivons les comptes des utilisateurs ayant plusieurs fois porté atteinte à ces droits, conformément à la procédure établie par la loi américaine dénommée « Digital Millennium Copyright Act ».
<br>
Nous fournissons aux titulaires de droits d’auteur les informations nécessaires pour les aider à gérer leur propriété intellectuelle en ligne. Si vous pensez qu’un utilisateur porte atteinte à vos droits d’auteur et que vous souhaitez nous en avertir, veuillez suivre les instructions disponibles dans notre Centre d’aide concernant la communication de notifications. Vous y trouverez également des informations sur les règles appliquées par Google concernant la réponse à de telles notifications.
<br>
Vos contenus et nos Services<br>
Certains de nos Services vous permettent d'importer, de soumettre, de stocker, d'envoyer ou de recevoir des contenus. Vous conservez tous vos droits de propriété intellectuelle sur ces contenus. En somme, ce qui est à vous reste à vous.
<br>
Lorsque vous importez, soumettez, stockez, envoyez ou recevez des contenus à ou à travers de nos Services, vous accordez à Google (et à toute personne travaillant avec Google) une licence, dans le monde entier, d'utilisation, d'hébergement, de stockage, de reproduction, de modification, de création d'œuvres dérivées (des traductions, des adaptations ou d'autres modifications destinées à améliorer le fonctionnement de vos contenus par le biais de nos Services), de communication, de publication, de représentation publique, d'affichage public ou de distribution publique desdits contenus. Les droits que vous accordez dans le cadre de cette licence sont limités à l'exploitation, la promotion ou à l'amélioration de nos Services, ou au développement de nouveaux Services. Cette autorisation demeure pour toute la durée légale de protection de votre contenu, même si vous cessez d'utiliser nos Services (par exemple, pour une fiche d'entreprise que vous avez ajoutée à Google Maps). Certains Services vous proposent le moyen d'accéder aux contenus que vous avez soumis à ce Service et de les supprimer. Certains Services prévoient par ailleurs des conditions ou des paramètres restreignant la portée de notre droit d'utilisation des contenus que vous avez soumis aux Services en question. Assurez-vous que vous disposez de tous les droits vous permettant de nous accorder cette licence concernant les contenus que vous soumettez à nos Services.
<br>
Nos systèmes automatisés analysent vos contenus (y compris les e-mails) afin de vous proposer des fonctionnalités pertinentes sur les produits, telles que des résultats de recherche personnalisés, des publicités sur mesure et la détection des spams et des logiciels malveillants. Cette analyse a lieu lors de l'envoi, de la réception et du stockage des contenus.
<br>
Si vous disposez d’un compte Google, nous pouvons faire apparaître le nom et la photo de votre profil, et toute activité que vous exercez sur Google ou sur des applications tierces connectées à votre compte Google (telles que les +1 que vous attribuez, les avis que vous rédigez ou les commentaires que vous postez) au sein de nos Services, y compris dans le cadre de la diffusion d’annonces ou dans d’autres contextes commerciaux. Nous nous conformerons aux paramètres de partage ou de visibilité que vous définissez dans votre compte Google. Par exemple, vous pouvez définir vos paramètres pour que votre nom et votre photo n’apparaissent pas dans une annonce.
<br>
Vous trouverez des informations additionnelles sur la manière dont Google utilise et stocke les contenus dans les Règles de confidentialité ou éventuellement dans les conditions d’utilisation additionnelles associées à des Services particuliers. Lorsque vous nous soumettez des réactions ou des suggestions relatives à nos Services, nous sommes en droit de les utiliser sans solliciter votre autorisation.
<br>
À propos des logiciels utilisés par ou présents dans nos Services
Si un Service nécessite ou inclut l’utilisation d’un logiciel téléchargeable, les mises à jour de ce logiciel (nouvelles versions ou fonctionnalités) peuvent s’effectuer automatiquement sur votre appareil. Certains Services vous permettent de modifier vos paramètres de mise à jour automatique.
<br>
Google vous concède, à titre gratuit, une licence personnelle, non-cessible, non-exclusive et pour le monde entier, d’utilisation du logiciel qui vous est fourni par Google dans le cadre des Services. Cette licence est exclusivement destinée à vous permettre d’utiliser et de bénéficier des Services fournis par Google, dans le respect des présentes Conditions d’Utilisation. Vous n’êtes pas autorisé à copier, modifier, distribuer, vendre ou louer une partie ou la totalité de nos Services ou des logiciels qui en font partie. De même, vous n’êtes pas autorisé à décompiler ou tenter d’extraire le code source de ces logiciels, hormis dans les cas où le droit de décompilation est autorisé par la loi et dans les limites édictées par cette loi, ou que vous avez obtenu notre autorisation préalable écrite.
<br>
L’utilisation de logiciels Open Source est importante pour nous. Certains des logiciels utilisés par nos Services peuvent être proposés sous une licence Open Source que nous mettrons à votre disposition. La licence Open Source peut contenir des dispositions qui ont expressément priorité sur certaines de ces conditions.
<br>
Modification et résiliation de nos Services<br>
Google n’a de cesse de modifier et d’améliorer ses Services. Nous sommes donc susceptibles d’ajouter ou de supprimer des fonctionnalités ou des fonctions, et il peut également arriver que nous suspendions ou interrompions complètement un Service.
<br>
Vous pouvez cesser d’utiliser nos Services à tout moment. Nous espérons cependant que vous continuerez de les utiliser. Google est en droit de cesser de vous fournir tout ou partie des Services, ou d’ajouter ou de créer de nouvelles limites à l’utilisation des Services et ce, à tout moment.
<br>
Pour nous, vous restez propriétaire des données que vous nous confiez et nous pensons qu’il est important que vous puissiez y accéder. Si nous devons interrompre un Service, dans la mesure du possible, nous vous en avertissons dans un délai raisonnable et vous donnons la possibilité de récupérer des informations de ce Service.
<br>
Garanties et clauses de non-responsabilité<br>
Notre offre de Services est soumise à une obligation de moyens, dans les limites de ce qui est commercialement raisonnable. Nous espérons que vous trouverez plaisir à les utiliser. Nos Services font cependant l’objet d’une limitation de garantie.
<br>
Sauf tel qu’expressément prévu par les présentes Conditions d’Utilisation ou des conditions d’utilisation additionnelles, ni Google, ni ses fournisseurs ou distributeurs, ne font aucune promesse spécifique concernant les Services. Par exemple, nous ne contractons aucun engagement concernant le contenu des Services, les fonctionnalités spécifiques disponibles par le biais des Services, leur fiabilité, leur disponibilité ou leur adéquation à vos besoins. Nous fournissons nos Services « en l’état ».
<br>
Certaines juridictions n’autorisent pas l’exclusion de certaines garanties, telles que la garantie implicite de qualité marchande, d’adéquation à répondre à un usage particulier et de conformité. Dans les limites permises par la loi, nous excluons toute garantie.
<br>
Responsabilité pour nos Services<br>
Dans les limites permises par la loi, Google, ses fournisseurs et distributeurs, déclinent toute responsabilité pour les pertes de bénéfices, de revenus ou de données, ou les dommages et intérêts indirects, spéciaux, consécutifs, exemplaires ou punitifs.
<br>
Dans les limites permises par la loi, la responsabilité totale de Google, de ses fournisseurs et distributeurs, pour toute réclamation dans le cadre des présentes Conditions d’Utilisation, y compris pour toute garantie implicite, est limitée au montant que vous nous avez payé pour utiliser les Services (ou, si tel est notre choix, pour que nous vous fournissions à nouveau ces Services).
<br>
En aucun cas, Google, ses fournisseurs et distributeurs, ne seront tenus responsables pour toute perte ou dommage qui n’aurait pas été raisonnablement prévisible.
<br>
Nous reconnaissons que, dans certains pays, vous pouvez jouir de certains droits en tant que consommateur. Si vous utilisez les Services pour un usage personnel, aucune disposition des présentes Conditions d’Utilisation ou des conditions d’utilisation supplémentaires ne limite les droits légaux du consommateur auxquels aucun contrat ne peut déroger.
<br>
Utilisation de nos Services par une entreprise<br>
Si vous utilisez nos Services pour le compte d’une entreprise, cette dernière doit accepter les présentes Conditions d’Utilisation. Elle doit en outre dégager de toute responsabilité Google, ses sociétés affiliées, ses agents et ses salariés et les garantir contre toute réclamation, poursuite ou action en justice résultant de ou liée à son utilisation des Services ou faisant suite à une violation des présentes Conditions d’Utilisation, y compris toute responsabilité et charge financière résultant de réclamations, de pertes ou de dommages constatés, de poursuites engagées et de jugements prononcés, et des frais de justice et d’avocat afférents.
<br>
À propos de ces Conditions d’Utilisation<br>
Nous sommes susceptibles de modifier ces Conditions d’Utilisation ou toute autre condition d’utilisation complémentaire s’appliquant à un Service, par exemple, pour refléter des modifications de la loi ou de nos Services. Nous vous recommandons de consulter régulièrement les Conditions d’Utilisation. Les modifications apportées à ces Conditions d’Utilisation seront signalées sur cette page. Nous publierons un avis de modification des conditions d’utilisation additionnelles dans le Service concerné. Les modifications ne s’appliqueront pas de façon rétroactive et entreront en vigueur au moins quatorze (14) jours après leur publication. Toutefois, les modifications spécifiques à une nouvelle fonctionnalité d’un Service ou les modifications apportées pour des raisons juridiques s’appliqueront immédiatement. Si vous n’acceptez pas les modifications apportées aux Conditions d’Utilisation d’un Service donné, vous devez cesser toute utilisation de ce Service.
<br>
En cas de conflit entre ces Conditions d’Utilisation et des conditions d’utilisation additionnelles, ce sont ces dernières qui prévalent.
<br>
Ces Conditions d’Utilisation régissent votre relation avec Google. Elles ne créent pas de droit pour des tiers bénéficiaires.
<br>
Si vous ne respectez pas ces Conditions d’Utilisation et que nous ne prenons pas immédiatement de mesure à ce sujet, cela ne signifie pas que nous renonçons à nos droits (par exemple, à prendre une mesure ultérieurement).
<br>
S’il s’avère qu’une condition particulière n’est pas applicable, cela sera sans incidence sur les autres conditions de ces Conditions d’Utilisation.
<br>
Dans certains pays, des tribunaux pourraient refuser d’appliquer la loi de l’État de Californie dans certains cas de litiges. Si vous résidez dans l’un de ces pays, les lois de votre pays s’appliqueront à tout litige résultant des présentes, en cas de non application de la loi de l’État de Californie. Dans le cas contraire, vous reconnaissez que les éventuels litiges liés aux présentes Conditions d’Utilisation seront régis par les lois de l’État de Californie, États-Unis, à l’exclusion des règles de conflit de lois de cet État. Si la justice de votre pays ne vous autorise pas à vous pourvoir devant les tribunaux du comté de Santa Clara, Californie, États-Unis, les litiges relevant des présentes seront portés devant les tribunaux compétents de votre lieu de résidence. Dans le cas contraire, toute action en justice liée aux présentes Conditions d’Utilisation ou aux Services relèvera exclusivement de la juridiction des tribunaux fédéraux ou des tribunaux d’État du comté de Santa Clara, Californie, États-Unis. Google et vous-même acceptez par les présentes de vous soumettre à la compétence de ces tribunaux.
<br>
Pour toute information sur la procédure à suivre pour contacter Google, veuillez consulter la page de prise de contact.</div><br>
            </div>
    </div>
</section><br>

@endsection
@section('js')

@endsection
