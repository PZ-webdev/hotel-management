@component('mail::message')
# Potwierdzenie Rezerwacji

Drogi {{$email->first_name}}  {{$email->last_name}},

W celu potwierdzenia rezerwacji, kliknij w poniższy przycisk: 

@component('mail::button', ['url' => route('index'), 'color' => 'success'])
    Potwierdź
@endcomponent

@component('mail::subcopy')
    Jeśli to nie Ty dokonałeś rezerwacji prosimy o zignorowanie wiadomości, lub skontaktowanie się z administratorem naszej strony. 
@endcomponent

Dziękujemy,<br>
{{ config('app.name') }}
@endcomponent