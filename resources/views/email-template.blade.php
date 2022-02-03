

<h1 style="padding: 1rem; background: #f7f7f7;color:#EA84EB;">{{$Subject}}</h1>
    <p style="padding: 1rem;color:#EA84EB;font-size: 16px;">
        <!-- Welcome to Laravel. This is a demo of sending emails through
        the Mailgun email service.https://ibb.co/9Ydkjmc a style="color:#EA84EB;font-size: 14px;" href='{{ url($Linked) }}'-->
        
        
        {{$Message}}
       
    </p>
    
    <img style="padding: 1rem;width: 200px;" src="{{ asset('/assets/images/reviewss.png') }}">
 <div style="padding: 1rem;color:#EA84EB;font-size: 16px;">
    <a style="color:#EA84EB;font-size: 16px;" href="{{$Linked}}">Click here for a review</a></div>