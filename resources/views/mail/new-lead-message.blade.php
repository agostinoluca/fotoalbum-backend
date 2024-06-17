<x-mail::message>
    # Hello {{ $lead->name }}!

    With your email address {{ $lead->email }}, you sent us the following message:

    {{ $lead->message }}


    We will get back to you as soon as possible!

    Goodbye,
    {{ config('app.name') }}
</x-mail::message>
