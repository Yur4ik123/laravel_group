

const exampleModal = document.getElementById('exampleModal')
if (exampleModal) {
    exampleModal.addEventListener('show.bs.modal', event => {
        let selectDate = null;
        let selectTime = null;

        const dateButton = document.querySelector('.btn-date.active');
        if (dateButton){
            selectDate = dateButton.getAttribute('data-date');
            if (selectDate){
                document.getElementById('date-reserv').value = selectDate;
            }
        }

        const timeButton = document.querySelector('.timeslot-btn.active');
        if (timeButton){
            selectTime = timeButton.getAttribute('data-slot-id');
            if (selectTime){
                document.getElementById('time-reserv').value = selectTime;
            }
        }



    })
}
