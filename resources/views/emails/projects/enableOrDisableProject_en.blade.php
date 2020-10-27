<h1>Bonjour {{ $_name }},</h1>
<p>
    @if($is_actived) Congratulations,  your publication
    has just been activated. @else Oops!!! sorry, , publication
    has just been deactivated..
    Please contact the administrator to know the reason . @endif

    Title : {{ $_title }} <br>
    
    {{ $_img }}
    <!-- <img src="{{ $_img }}" alt=""> <br> -->

    {{ $_description }}

    The KUIAH customer service team 
</p>
