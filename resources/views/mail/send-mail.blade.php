<x-mail::message>

<h2>Full Name <br>{{  $sendmail->name }}</h2> <br>
<h2>Email <br>{{  $sendmail->email }}</h2> <br>
{{-- <h2>Phone Number <br>{{  $sendmail->phone }}</h2> <br> --}}
{{-- <h2>Subject <br>{{  $sendmail->subject }}</h2> <br> --}}
<p>Message <br>{{  $sendmail->message }}</p>


</x-mail::message>
