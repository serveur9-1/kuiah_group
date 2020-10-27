<h1>Salut {{ $_name }}</h1>

@if($is_first_activation)

    <p>Félicitations ! <br> Votre compte a été activé, donc vous
    pouvez vous connecter et consulter les projets ou
    publier un projet.
    Une fois connecté, veuillez mettre à jour votre profil
    afin de mieux gérer vos annonces, vos courriels
    d'option, vos courriels de notification et plus à partir
    de l’espace mon compte de KUIAH.
@else
    <p>Votre compte sur KUIAH a bien été @if($is_actived)  réactivé. <br>
    Vous pouvez à présent vous connecter et publier vos
    annonce en accord avec nos conditions d’utilisation. @else désactivé .<br>
    Nous avons constaté le non-respect de nos conditions
    d’utilisation, de nos règles et de notre politique.
    Veuillez nous contacter pour en savoir plus
    kuiah@gmail.com.@endif
@endif
<br> L'équipe service client KUIAH</p>