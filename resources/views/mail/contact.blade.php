@component('mail::message')
    <strong>Name:</strong>
    {{$data['name']}}
    <strong>Email Address:</strong>
    {{$data['email']}}
    <strong>Compose Message:</strong>
    {{$data['message']}}
@endcomponent
