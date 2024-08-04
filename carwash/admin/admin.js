// admin.js
function updateStatus(bookingId, status) {
    if (confirm("Are you sure you want to change the status to " + status + "?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_booking_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle response here
                location.reload(); // Refresh the page to see updated status
            }
        };
        xhr.send("id=" + bookingId + "&status=" + status);
    }
}
[]