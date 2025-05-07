import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

flatpickr("#meetupTime", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "h:i K", // 'h:i K' gives 12-hour format with AM/PM (e.g., 7:00 AM)
    time_24hr: false,  // Use AM/PM format
    minTime: "07:00",  // 7:00 AM
    maxTime: "17:00",  // 5:00 PM
});
