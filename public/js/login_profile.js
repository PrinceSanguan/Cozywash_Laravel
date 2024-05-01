/*<!-- Add this script tag to your login_profile.html -->
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        // Function to fetch user data
        function fetchUserData() {
            fetch('fetch_user_data.php') // Change this URL to the endpoint that fetches user data
            .then(response => response.json())
            .then(data => {
                // Populate form fields with user data
                document.getElementById('firstName').value = data.firstName;
                document.getElementById('lastName').value = data.lastName;
                document.getElementById('email').value = data.email;
                document.getElementById('contact').value = data.contact;
                document.getElementById('addressHouseNumber').value = data.addressHouseNumber;
                document.getElementById('addressStreet').value = data.addressStreet;
                document.getElementById('addressSubdivision').value = data.addressSubdivision;
                document.getElementById('addressBarangay').value = data.addressBarangay;
                document.getElementById('addressCity').value = data.addressCity;
                document.getElementById('addressZipCode').value = data.addressZipCode;
            })
            .catch(error => console.error('Error fetching user data:', error));
        }

        // Call fetchUserData function when the page loads
        fetchUserData();

        // Add event listener to form submission for saving changes
        document.getElementById('profileForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Fetch form data
            const formData = new FormData(this);

            // Send form data to backend for saving changes
            fetch('save_profile_changes.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    alert('Changes saved successfully!');
                } else {
                    alert('Failed to save changes. Please try again.');
                }
            })
            .catch(error => console.error('Error saving changes:', error));
        });
    });
</script>
*/