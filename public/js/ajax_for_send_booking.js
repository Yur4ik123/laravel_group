
document.addEventListener('DOMContentLoaded', function (){
    const bookingForm = document.getElementById('booking-form');
    const sendBtn = bookingForm.querySelector('.btn');

    // getting data from form
    sendBtn.addEventListener('click', async function(){
       const bookingData = {
            service_id:  document.getElementById('service-reserv').value,
            date:        document.getElementById('date-reserv').value,
            time:        document.getElementById('time-reserv').value,
            client_name: document.getElementById('client-name').value,
            last_name:   document.getElementById('last-name').value,
            email:       document.getElementById('client-email').value,
            phone:       document.getElementById('client-phone').value,
            comment:     document.getElementById('message-text').value,
       }

       // sending the request
        try {
            const responce = await fetch('api/bookings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(bookingData)
            });

            const data = await responce.json();

            // Laravel return 422 if validation is failed
            if (response.status === 422) {
                let errorMessages = '';

                // data.errors - object with laravel errors
                for (let field in data.errors) {
                    errorMessages += data.errors[field].join('\n') + '\n';
                }

                alert('Errors:\n' + errorMessages);
                return;
            }

            // handling other errors
            alert('Error: ' + (data.message || 'Unknown error'));

            return;

        }

        console.log('Успешный ответ от сервера:', data);

        // Показываем сообщение об успехе
        alert('Бронирование успешно создано!');
    });
});
