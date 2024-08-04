function nextStep(currentStep) {
    document.getElementById('step' + currentStep).style.display = 'none';
    document.getElementById('step' + (currentStep + 1)).style.display = 'block';
}

function prevStep(currentStep) {
    document.getElementById('step' + currentStep).style.display = 'none';
    document.getElementById('step' + (currentStep - 1)).style.display = 'block';
}

// document.getElementById('bookingForm').addEventListener('submit', function(event) {
//     event.preventDefault();
//     alert('Booking submitted! An admin will contact you shortly.');
// });
