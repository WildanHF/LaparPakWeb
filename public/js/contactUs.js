async function submitContactForm(event) {
    event.preventDefault();

    const formData = {
        first_name: document.getElementById('firstName').value,
        last_name: document.getElementById('lastName').value,
        email: document.getElementById('email').value,
        phone_number: document.getElementById('phoneNumber').value,
        message: document.getElementById('message').value
    };

    try {
        const response = await fetch('/api/contact_us', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();

        if (response.ok) {
            alert('Message sent successfully!');
            document.getElementById('contactForm').reset();
        } else {
            alert('Failed to send message: ' + data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while sending the message');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    form.addEventListener('submit', submitContactForm);
});