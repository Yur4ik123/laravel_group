import './bootstrap';
import * as bootstrap from 'bootstrap';
import './modules/burger.js'

// Import modules
import {initPhoneMasks} from './modules/phoneMask';

/**
 * Gets available slots for the given date.
 * @param date
 * @param serviceId
 * @returns {Promise<any>}
 */
async function getSlots(date, serviceId) {
    let slots = [];
    const response = await axios.get('/api/slots', {
        params: {
            date: date,
            serviceId: serviceId
        }
    })
    return response.data;
}

/**
 * Renders available slots on the page.
 * @param slots
 */
function renderSlots(slots) {
    const timeslotsGrid = document.getElementById('timeslotsGrid')?.querySelector('.row');
    let slotHtml = '';
    slots.forEach(slot => {
        slotHtml += `<div class="col-6 col-sm-4 col-md-3 col-lg-2">
                                    <button class="btn w-100 timeslot-btn" data-slot-id="${slot?.id}" ${slot?.available ? '' : 'disabled'}>
                                        <i class="bi bi-clock me-1"></i> ${slot?.slot}
                                    </button>
                                </div>`;
    });
    timeslotsGrid.innerHTML = slotHtml;

}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', async function () {
    // Initialize phone masks
    initPhoneMasks();
    // get slots for service page
    const dateSelector = document.getElementById('dateSelector');
    if (dateSelector) {

        dateSelector.addEventListener('click', (e) => {
            const button = e.target.closest('button');
            dateSelector.querySelector('button.active').classList.remove('active');
            if (button) {
                button.classList.toggle('active');
                const date = button?.dataset.date;
                const serviceId = button?.dataset.serviceId;
                getSlots(date, serviceId).then(slots => renderSlots(slots));
            }
        })
        const date = dateSelector.querySelector('button.active').dataset.date;
        const serviceId = dateSelector.querySelector('button.active').dataset.serviceId;
        getSlots(date, serviceId).then(slots => renderSlots(slots));

    }

});

