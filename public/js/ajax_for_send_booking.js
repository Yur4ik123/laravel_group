
document.addEventListener('DOMContentLoaded', function (){
    const bookingForm = document.getElementById('booking-form');
    const sendBtn = bookingForm.querySelector('.btn');

    // getting data from form
    sendBtn.addEventListener('click', async function(e){
        e.preventDefault();
        document.querySelectorAll('.input-error').forEach(item=>item.remove())
       // const bookingData = {
       //      // service_id:  document.getElementById('service-reserv').value,
       //      // date:        document.getElementById('date-reserv').value,
       //      // time:        document.getElementById('time-reserv').value,
       //      // client_name: document.getElementById('client-name').value,
       //      // last_name:   document.getElementById('last-name').value,
       //      // email:       document.getElementById('client-email').value,
       //      // phone:       document.getElementById('client-phone').value,
       //      // comment:     document.getElementById('message-text').value,
       // }

       // sending the request
        try {
            const response = await fetch('/api/bookings', {
                method: 'POST',
                body: new FormData(bookingForm),
            });

            const data = await response.json();


            // Laravel return 422 if validation is failed
            if (!response.success) {
                // data.errors - object with laravel errors
                for (let field in data.errors) {
                    // errorMessages += data.errors[field].join('\n') + '\n';

                    let errorBlock = document.createElement('div');
                    errorBlock.classList.add('input-error');
                    errorBlock.textContent = data.errors[field]
                    document.querySelector(`input[name=${field}]`)?.after(errorBlock);
                }

                return;
            }




            console.log('Успешный ответ от сервера:', data);

            window.location.href = '/thanks';
        } catch (error){
           console.log('error');

        }


    });
});
