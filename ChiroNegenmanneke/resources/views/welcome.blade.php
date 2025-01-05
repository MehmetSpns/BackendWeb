@extends('layouts.app')

@section('content')
<div class="hero-section" style="background: url('{{ asset('images/chiroBackground.jpg') }}') no-repeat center center/cover;">
    <div class="hero-content">
        <h1 class="hero-title">Welkom bij Chiro Negenmanneke</h1>
        <p class="hero-description">Een spetterende zondag vol spel en plezier voor kinderen van 6 tot 18 jaar.</p>
    </div>
</div>

<div id="about-chiro" class="about-section">
    <div class="section-content">
        <h2 class="section-title">Wat is Chiro?</h2>
        <p class="section-description">
            In de Chiro spelen we samen en beleven we het hele jaar door een leuke zondagnamiddag. Het liefst kom je elke week. 
            Hoe meer je komt, hoe meer vrienden je maakt en hoe leuker Chiro is. Tijdens de Chironamiddag spelen we samen in groep, 
            per leeftijd, met zes afdelingen die elk hun eigen kleur en leiding hebben. 
        </p>
        <p class="section-description">
            Iedere zondag van 14u tot 18u nodigen wij alle kinderen uit voor een knotsgekke, toffe maar soms ook vreemde namiddag. 
            Samen met vrienden lachen, spannende avonturen beleven, of creatief bezig zijn. Kom erbij en ontdek hoe leuk het is!
        </p>
    </div>
</div>

<div id="info" class="info-section">
    <div class="section-content">
        <h2 class="section-title">Praktische Informatie</h2>
        <ul class="info-list">
            <li class="info-item"><strong>Wanneer?</strong> Iedere zondag van 14u – 18u</li>
            <li class="info-item"><strong>Wat?</strong> Een zondag vol spel en plezier</li>
            <li class="info-item"><strong>Voor wie?</strong> Kinderen van 6 – 18 jaar</li>
            <li class="info-item"><strong>Waar?</strong> Gustaaf Gibonstraat 1A, 1600 Sint-Pieters-Leeuw</li>
        </ul>
        <p class="info-cost">Het inschrijvingsgeld bedraagt jaarlijks €40. Dit omvat verzekering en deelname aan alle Chiro-activiteiten.</p>
        <a href="#contact" class="btn btn-contact">Contacteer ons</a>
    </div>
</div>

<div id="history" class="history-section">
    <div class="section-content">
        <h2 class="section-title">Geschiedenis</h2>
        <p class="section-description">
            Chiro Negenmanneke werd opgericht in 1940 en heeft sindsdien vele uitdagingen doorstaan, waaronder de Tweede Wereldoorlog. 
            Ondanks tegenslagen, zoals de tijdelijke sluiting en verlies van locaties, is de Chiro altijd blijven bestaan dankzij 
            de inzet en toewijding van haar leden en leiding. Vandaag staat Chiro Negenmanneke bekend als een warme gemeenschap waar 
            kinderen en jongeren samenkomen voor vriendschap en avontuur.
        </p>
    </div>
</div>

<div id="contact" class="contact-section">
    <div class="section-content">
        <h2 class="section-title">Contacteer Ons</h2>
        <p class="contact-description">
            Voor meer informatie kan je ons bereiken via e-mail op 
            <a href="mailto:chiro.9manneke@gmail.com" class="contact-link">chiro.9manneke@gmail.com</a> of onze contactpagina.
            Volg ons ook op <a href="https://www.facebook.com/chiro9manneke/" class="contact-link">Facebook</a> en <a href="https://www.instagram.com/chiro9manneke/" class="contact-link">Instagram</a> voor updates en foto's van onze activiteiten.
        </p>
    </div>
</div>
@endsection
