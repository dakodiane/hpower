<!-- resources/views/vendor/notifications/loading_updated.blade.php -->

@component('mail::message')
    # Modification du Loading {{ $loading->id_loading }}

    Hello ,

    Un chargement a été mis à jour.

    @component('mail::button', ['url' => url("/loadingclient")])
        Voir la liste
    @endcomponent

    Merci !
@endcomponent
