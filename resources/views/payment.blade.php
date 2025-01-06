<!-- filepath: /v:/tubes/tubes/resources/views/payment.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <title>Payment Details</title>
</head>
<body>
    <div class="background-decoration">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
    </div>

    <div class="container">
        <h1>Payment Details</h1>
        
        <div class="card">
            <div class="detail-row">
                <span class="label">Campaign</span>
                <span class="value">{{ $campaign->name }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Nominal</span>
                <span class="value">{{ $nominal }}</span>
            </div>

            <div class="card">
                <div class="detail-row">
                    <span class="label">Payment status</span>
                    <span class="status-badge" id="paymentStatus">{{ $payment->status }}</span>
                </div>
                
                <div class="divider"></div>
            </div>

            <button class="pay-btn" id="payButton" onclick="updatePaymentStatus()">Pay</button>
        </div>
    </div>

    <script>
    function updatePaymentStatus() {
        const statusBadge = document.getElementById('paymentStatus');
        statusBadge.textContent = 'PAID';
        statusBadge.style.backgroundColor = '#4CAF50';
        statusBadge.style.color = 'white';
        
        // Disable the pay button after successful payment
        // document.getElementById('payButton').disabled = true;

        const payButton = document.getElementById('payButton');
        payButton.textContent = 'Continue';

        // Send POST request to update payment status
        fetch('{{ route('payment.updateStatus') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id: '{{ $payment->id }}',
                status: 'PAID'
            })
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                //   console.log('Payment status updated successfully');
                  // Provide feedback to the user
                //   alert('Payment status updated successfully');
                  // Enable the "Continue" button to redirect to the homepage
                  payButton.onclick = function() {
                      window.location.href = '{{ route('homepage.login') }}'; // Redirect to homepage
                  };
              } else {
                  console.error('Failed to update payment status');
                  alert('Failed to update payment status');
              }
          });
    }
    </script>
</body>
</html>