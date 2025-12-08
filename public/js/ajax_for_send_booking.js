
document.addEventListener('DOMContentLoaded', function (){
    const bookingForm = document.getElementById('booking-form');
    const sendBtn = bookingForm.querySelector('.btn');

    sendBtn.addEventListener('click', async function(e){
        e.preventDefault();
        document.querySelectorAll('.input-error').forEach(item=>item.remove())

        try {
            const response = await fetch('/api/bookings', {
                method: 'POST',
                body: new FormData(bookingForm),
            });

            const data = await response.json();

            if (!response.success) {
                for (let field in data.errors) {
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
