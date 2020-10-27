<h1>Bonjour {{ $_name }},</h1>
<p>
    @if($is_actived) Félicitation,  votre publication vient
    d'être activée. @else Oups!!! désolé , votre publication vient
    d'être désactivée.
    Veuillez contacter l'administrateur pour savoir le
    motif. @endif

    Titre : {{ $_title }} <br>
    
    {{ $_img }}
    <!-- <img src="{{ $_img }}" alt=""> <br> -->

    {{ $_description }}
    

    L'équipe service client KUIAH 
</p>
