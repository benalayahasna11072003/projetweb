document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById('myForm');

    form.addEventListener('submit', function(event) {
        var nameInput = document.querySelector('#exampleInputName1');
        var prixInput = document.querySelector('#exampleInputPrice');
        var dateInput = document.querySelector('[name="date"]');

        // Validation du nom
        if (!nameInput.value.trim()) {
            alert('Veuillez saisir un nom.');
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validation du prix
        if (!/^\d+(\.\d+)?$/.test(prixInput.value.trim())) {
            alert('Veuillez saisir un prix valide.');
            event.preventDefault(); // Prevent form submission
            return;
        }

        // Validation de la date
        var selectedDate = new Date(dateInput.value);
        var currentDate = new Date();
        if (selectedDate <= currentDate) {
            alert('Veuillez choisir une date ultérieure à aujourd\'hui.');
            event.preventDefault(); // Prevent form submission
            return;
        }
    });
});
