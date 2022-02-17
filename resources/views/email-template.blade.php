
        <div style="padding: 1rem; background: #f7f7f7;color:#EA84EB;text-align:center;">
            <img style="padding: 1rem;width: 200px;" src="{{ asset('/assets/images/email-logo.png') }}">
<h1 style="margin:auto;width:600px;">{{$Subject}}</h1>
</div>
    <div style="padding: 1rem;color:#EA84EB;font-size: 16px;font-weight: 500;width:600px;margin:auto;">
        
        {{$Message}}

</div>
<div style="display:flex; width:600px;margin:auto;text-align: center;">
    <div style="padding: 1rem;color:#EA84EB;font-size: 16px;width: 50%;">
        <img style="padding: 1rem;width: 200px;" src="{{ asset('/assets/images/reviewss.png') }}">
        <a style="color:#EA84EB;font-size: 16px;display:block;font-weight: 500;text-align: center;" href="{{$googleLink}}">Click here for Google</a>
    </div>
    <div style="padding: 1rem;color:#EA84EB;font-size: 16px;width: 50%;">
        <img style="padding: 1rem;width: 200px;" src="{{ asset('/assets/images/facebook-rev.png') }}">
        <a style="color:#EA84EB;font-size: 16px;display:block;font-weight: 500;text-align: center;" href="{{$facebookLink}}">Click here for facebook</a>
    </div>
</div>
