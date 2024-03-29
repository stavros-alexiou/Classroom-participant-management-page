
// Function to fetch and display logged-in users
function fetchLoggedInUsers() {
    $.ajax({
        url: "logged_in_users.php",
        type: "GET",
        success: function(response) {
            // Display the list of logged-in users in the 'logged-in-users' div
            $('#logged-in-users').html(response);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching logged-in users:", error);
        }
    });
}

// Function to handle disconnect button click
function handleDisconnect() {
    $.ajax({
        url: "logout.php", // PHP script to handle logout
        type: "POST",
        success: function(response) {
            // Fetch and display updated list of logged-in users after logout
            fetchLoggedInUsers();
            // Redirect user to login page
            window.location.href = "index.html";
        },
        error: function(xhr, status, error) {
            console.error("Error disconnecting:", error);
        }
    });
}

// Call the function initially when the page loads
$(document).ready(function() {
    fetchLoggedInUsers();
    
    // Fetch and display logged-in users every 5 seconds (for real-time updates)
    setInterval(fetchLoggedInUsers, 5000); // 5 seconds interval

    // Attach click event handler to the disconnect button
    $('#disconnect-btn').click(handleDisconnect);
});

$(document).ready(function() {
    $('#toggleRaiseHand').click(function() {
        $.ajax({
            type: 'POST',
            url: 'raise_hand.php', // Specify the path to your PHP script
            success: function(response) {
              window.alert("Hand Raised"); // Alert the response from the server
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log any errors to the console
            }
        });
    });
});
