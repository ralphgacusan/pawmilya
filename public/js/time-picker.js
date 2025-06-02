document.addEventListener('DOMContentLoaded', function () {
    const inputField = document.getElementById('meetupTime');
    const timePickerContainer = document.createElement('div');
    timePickerContainer.classList.add('time-picker-container');
    const timeDropdown = document.createElement('div');
    timeDropdown.classList.add('time-picker-dropdown');

    const generateTimeSlots = (start, end, interval) => {
        const timeSlots = [];
        let currentTime = start;
        while (currentTime <= end) {
            let hours = currentTime.getHours();
            let minutes = currentTime.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            const formattedTime = `${hours}:${minutes} ${ampm}`;
            timeSlots.push(formattedTime);
            currentTime.setMinutes(currentTime.getMinutes() + interval);
        }
        return timeSlots;
    };

    const timeSlots = generateTimeSlots(new Date('1970-01-01 07:00'), new Date('1970-01-01 17:00'), 15); // 15-minute intervals

    timeSlots.forEach(time => {
        const button = document.createElement('button');
        button.textContent = time;
        button.addEventListener('click', function () {
            inputField.value = time;
            timeDropdown.style.display = 'none'; // Hide dropdown after selection
        });
        timeDropdown.appendChild(button);
    });

    timePickerContainer.appendChild(timeDropdown);
    inputField.parentElement.appendChild(timePickerContainer);

    // Show dropdown when input field is clicked
    inputField.addEventListener('click', function () {
        timeDropdown.style.display = timeDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function (event) {
        if (!timePickerContainer.contains(event.target)) {
            timeDropdown.style.display = 'none';
        }
    });
});