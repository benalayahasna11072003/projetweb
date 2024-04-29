document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        var nameInput = document.querySelector('#name');
        var emailInput = document.querySelector('#email');
        var dateDepartInput = document.querySelector('#date_d');
        var dateFinInput = document.querySelector('#date_f');

        var isValid = true;

        // Validation du nom sans numérotation
        if (!/^\D+$/.test(nameInput.value.trim())) {
            isValid = false;
            alert('Veuillez saisir un nom valide sans numérotation.');
        }

        // Validation de l'email
        if (emailInput.value.trim() === '' || !isValidEmail(emailInput.value)) {
            isValid = false;
            alert('Veuillez saisir une adresse e-mail valide.');
        }

        // Validation de la date de départ
        var selectedDateDepart = new Date(dateDepartInput.value);
        var currentDate = new Date();

        if (selectedDateDepart <= currentDate) {
            isValid = false;
            alert('La date de départ doit être supérieure à la date actuelle.');
        }

        // Validation de la date de fin
        var selectedDateFin = new Date(dateFinInput.value);

        if (selectedDateFin <= selectedDateDepart) {
            isValid = false;
            alert('La date de fin doit être postérieure à la date de départ.');
        }

        // Si le formulaire n'est pas valide, empêcher son envoi
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Fonction pour valider un email
    function isValidEmail(email) {
        var emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }
});
