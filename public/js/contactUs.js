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
        const response = await fetch('http://localhost:3000//api/contact_us', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();
        console.log('Response:', data);

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
    document.getElementById('contact-form').addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(event.target);

        try {
            const response = await fetch('http://localhost:3000//api/contact_us', {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json',
                },
            });

            if (response.ok) {
                const data = await response.json();
                alert('Registration successful! Redirecting to login...');
                
                
            } else {
                const error = await response.json();
                alert('Registration failed: ' + (error.message || 'Please try again.'));
            }

            const data = await response.json();
            alert('Success: ' + data.message); // Tambahkan pesan alert untuk sukses
        } catch (error) {
            console.error('Error:', error);
            alert('Error submitting contact form: ' + error.message);
        }
    });
});