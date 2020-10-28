<h1>Bonjour {{ $_name }},</h1>
<p>
    @if($is_actived) Congratulations,  your publication
    has just been activated.
    @else Oops!!! sorry, , publication
    has just been deactivated..  <br>
    Please contact the administrator to know the reason . @endif <br>

    Title : {{ $_title }} <br>

    The KUIAH customer service team 
</p>
