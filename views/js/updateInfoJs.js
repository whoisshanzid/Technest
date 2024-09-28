function updateInfo(form) {
    let isValid = true;

    // Clear previous errors
    document.getElementById('rerr1').textContent = '';
    document.getElementById('rerr2').textContent = '';
    document.getElementById('rerr4').textContent = '';

    // Validate full name
    const fullName = form.fname.value.trim();
    if (fullName === '') {
        document.getElementById('rerr1').textContent = 'Full name is required.';
        isValid = false;
    }

    // Validate contact number
    const contactNumber = form.cnum.value.trim();
    const phonePattern = /^[0-9]{10}$/; // Example pattern: 10 digits
    if (contactNumber === '') {
        document.getElementById('rerr2').textContent = 'Contact number is required.';
        isValid = false;
    } else if (!phonePattern.test(contactNumber)) {
        document.getElementById('rerr2').textContent = 'Enter a valid 10-digit contact number.';
        isValid = false;
    }

    // Validate gender selection
    const gender = form.gender.value;
    if (gender === '') {
        document.getElementById('rerr4').textContent = 'Please select your gender.';
        isValid = false;
    }

    return isValid;
}
