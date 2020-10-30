<h1>Bonjour {{ $_name }},</h1>
<p>
    @if($is_actived) Félicitation,  votre publication vient
    d'être activée. @else Oups!!! désolé , votre publication vient
    d'être désactivée. <br>
    Veuillez contacter l'administrateur pour savoir le
    motif. @endif <br>

    Titre de la publication: {{ $_title }} <br>
    

    L'équipe service client KUIAH 
</p>
