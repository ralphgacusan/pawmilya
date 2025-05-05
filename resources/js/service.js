// View details functionality
document.querySelectorAll('.view-details').forEach(button => {
    button.addEventListener('click', function () {
        const serviceId = this.getAttribute('data-service');
        const details = document.getElementById(`service-details-${serviceId}`);

        // Toggle the details display
        details.classList.toggle('active');

        // Change button text
        this.textContent = details.classList.contains('active') ? 'Hide Details' : 'View Details';
    });
});