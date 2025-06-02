document.addEventListener('DOMContentLoaded', function () {
    var timepicker = new TimePicker('#meetupTime', {
        minuteInterval: 15,
        timeFormat: 'h:mm a',
        maxTime: '5:00 PM',
        minTime: '7:00 AM'
    });
});