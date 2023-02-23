@component('mail::message')
# Մարդու իրավունքների պաշտպան 

Մենք ստացել ենք ձեր դիմումը, {{ $applicant->name }}

Էլ֊հասցե: {{ $applicant->email }}

Թեմա: {{ $applicant->subject }}

Բովանդակություն:<br>
{{ $applicant->message }}

[Կցված ֆայլ]({{ asset('uploads/applicants/' . $applicant->file) }}) 

Շնորհակալություն, ՄԻՊ
@endcomponent