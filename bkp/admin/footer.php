</body>
<script>
const userForm = document.getElementById('userForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const phoneInput = document.getElementById('phone');

function clearForm() {
    nameInput.value = '';
    emailInput.value = '';
    phoneInput.value = '';
}

userForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const name = nameInput.value;
    const email = emailInput.value;
    const phone = phoneInput.value;

    // Here, you can add your backend functionality to store the user data,
    // such as sending the data to a server using fetch or making an API call.

    // For this example, we will simply display the data in an alert.
    alert(`User added successfully!\nName: ${name}\nEmail: ${email}\nPhone: ${phone}`);

    // Clear the form after adding the user
    clearForm();
});
</script>
</html>