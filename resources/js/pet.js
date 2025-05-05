// Tab functionality
document.querySelectorAll('.pet-tab').forEach(tab => {
    tab.addEventListener('click', function () {
        // Remove active class from all tabs
        document.querySelectorAll('.pet-tab').forEach(t => t.classList.remove('active'));
        // Add active class to clicked tab
        this.classList.add('active');

        const tabType = this.getAttribute('data-tab');
        const pets = document.querySelectorAll('.pet-card');

        pets.forEach(pet => {
            if (tabType === 'all') {
                pet.style.display = 'block';
            } else if (tabType === 'dogs') {
                pet.style.display = pet.getAttribute('data-type') === 'dog' ? 'block' : 'none';
            } else if (tabType === 'cats') {
                pet.style.display = pet.getAttribute('data-type') === 'cat' ? 'block' : 'none';
            } else if (tabType === 'special') {
                pet.style.display = pet.getAttribute('data-special') === 'yes' ? 'block' : 'none';
            }
        });
    });
});





// View details functionality
document.querySelectorAll('.view-details').forEach(button => {
    button.addEventListener('click', function () {
        const petId = this.getAttribute('data-pet');
        const details = document.getElementById(`pet-details-${petId}`);

        // Toggle the details display
        details.classList.toggle('active');

        // Change button text
        this.textContent = details.classList.contains('active') ? 'Hide Details' : 'View Details';
    });
});

// Update breed options based on pet type
document.getElementById('petType').addEventListener('change', function () {
    const petType = this.value;
    const breedSelect = document.getElementById('breed');

    if (petType === 'dog') {
        document.getElementById('dog-breeds').style.display = 'block';
        document.getElementById('cat-breeds').style.display = 'none';
        breedSelect.value = 'all';
    } else if (petType === 'cat') {
        document.getElementById('dog-breeds').style.display = 'none';
        document.getElementById('cat-breeds').style.display = 'block';
        breedSelect.value = 'all';
    } else {
        document.getElementById('dog-breeds').style.display = 'block';
        document.getElementById('cat-breeds').style.display = 'block';
        breedSelect.value = 'all';
    }
});

// Get all "View Details" buttons
const viewDetailsButtons = document.querySelectorAll('.view-details');

// Add event listeners to each button
viewDetailsButtons.forEach(button => {
    button.addEventListener('click', () => {
        const petId = button.getAttribute('data-pet');
        const petDetails = document.getElementById(`pet-details-${petId}`);

        // Toggle the display of pet details
        if (petDetails.style.display === 'none' || petDetails.style.display === '') {
            petDetails.style.display = 'block';
            button.textContent = 'Hide Details';  // Change button text when details are shown
        } else {
            petDetails.style.display = 'none';
            button.textContent = 'View Details';  // Change button text back to original
        }
    });
});
