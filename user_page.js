
function User_Shares(){
		document.getElementById('left-column').innerHTML = '<div class="user-content-area"><h2>Αρχεία Εκπαιδευόμενου </h2><div id="usercontentList"></div></div>';
			Content_Load();

}
function Content_Load(){
	    fetch('list_user_files.php').then(response => response.json()).then(data => {
	        const usercontentList = document.getElementById('usercontentList');
	        data.forEach(file => {
	            const link = document.createElement('a');
	            const link1=file;
	            link.href = 'User_sharing/' + link1;
	            link.download = file;
	            link.textContent = file;
	            link.className = 'content-link';
	            usercontentList.appendChild(link);
	            console.log(link);
	        
	    });
	});
}


// Function to get the user ID from the session
function getUserId() {
    // Assuming the user ID is stored in a session variable named 'userId'
    // Modify this according to how you're storing the user ID in your session
    return sessionStorage.getItem('id');
}

// Function to update class in the database
function updateClass(value) {
    // Get the user ID from the session
    var userId = getUserId();

    // Make AJAX request to update class in the database
    $.ajax({
        url: 'classroom.php',
        method: 'POST',
        data: { class: value, id: userId }, // Send selected class value and user ID to the server
        success: function(response) {
            console.log('Database updated successfully');
        },
        error: function(xhr, status, error) {
            console.error('Error updating database:', error);
        }
    });
}
function hideButtons(){
    document.getElementById("Aithousa-1").style.display='none';
    document.getElementById("Aithousa-2").style.display='none';
    document.getElementById("Aithousa-3").style.display='none';
    document.getElementById("Aithousa-4").style.display='none';
}

function showButtons(){
    if(window.getComputedStyle(document.getElementById("Aithousa-1")).display==='none')
    {
    document.getElementById("Aithousa-1").style.display='block';
    document.getElementById("Aithousa-2").style.display='block';
    document.getElementById("Aithousa-3").style.display='block';
    document.getElementById("Aithousa-4").style.display='block';
    }
    else{
        hideButtons();
    }


}
// Event listener for radio button changes
$(document).ready(function() {
    $('button.Classes').click(function() {
        var selectedValue = $(this).val();
        updateClass(selectedValue);
    });
});
