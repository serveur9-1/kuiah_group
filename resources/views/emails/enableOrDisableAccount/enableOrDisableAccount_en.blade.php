<h1>Hello {{ $_name }}</h1>

@if($is_first_activation)

    <p>Congratulations! <br> Your account has been
    activated, so you can log in and view projects or
    publish a project. <br>
    Once logged in, please update your profile to
    better manage your announcements, option
    emails, notification emails and more from the
    KUIAH my account area.
@else
    <p>Your KUIAH account has been @if($is_actived)  reactivated. <br>
    You can now log in and post your ads in accordance with
    our terms of use @else deactivated .<br>
    We have noticed a breach of our terms
    of use, rules and policy.
    Please contact us for more information.@endif
@endif
<br> The KUIAH customer service team</p>