document.addEventListener('DOMContentLoaded', function() {
    var searchButton = document.getElementById('btnNavbarSearch');

    searchButton.addEventListener('click', function() {
        var searchInput = document.querySelector('.form-control');
        var searchTerm = searchInput.value;

        // Vous pouvez personnaliser cette partie pour effectuer votre action de recherche
        // Par exemple, vous pouvez envoyer une requête AJAX pour récupérer les résultats du serveur
        console.log('Recherche effectuée avec le terme :', searchTerm);
    });
});
