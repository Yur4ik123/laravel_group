import './bootstrap';
import * as bootstrap from 'bootstrap';
import './modules/burger.js'
import 'animate.css';
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

/**
 * Updates the booking summary block with selected date and time.
 * @param date - formatted date string
 * @param time - time string
 */
function updateBookingSummary(date, time) {
    const bookingSummary = document.getElementById('bookingSummary');
    const selectedDateEl = document.getElementById('selectedDate');
    const selectedTimeEl = document.getElementById('selectedTime');
    if (date && time) {
        selectedDateEl.textContent = date;
        selectedTimeEl.textContent = time;
        bookingSummary.style.display = 'block';
    } else {
        bookingSummary.style.display = 'none';
    }
}

/**
 * Formats date from YYYY-MM-DD to readable format based on current locale.
 * @param dateString
 * @returns {string}
 */
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = { day: 'numeric', month: 'long' };
    const locale = document.documentElement.lang || 'uk';
    return date.toLocaleDateString(locale, options);
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', async function () {
    // Initialize phone masks
    initPhoneMasks();

    // Hide booking summary initially
    const bookingSummary = document.getElementById('bookingSummary');
    if (bookingSummary) {
        bookingSummary.style.display = 'none';
    }

    let selectedDate = null;
    // get slots for service page
    const dateSelector = document.getElementById('dateSelector');
    if (dateSelector) {

        dateSelector.addEventListener('click', (e) => {
            const button = e.target.closest('button');
            dateSelector.querySelector('button.active').classList.remove('active');
            if (button) {
                button.classList.add('active');
                let selectedDate = button?.dataset.date;
                const serviceId = button?.dataset.serviceId;
                getSlots(selectedDate, serviceId).then(slots => {
                    renderSlots(slots);
                    updateBookingSummary(null, null);
                });
            }
        })
        const activeButton = dateSelector.querySelector('button.active');
        selectedDate = activeButton.dataset.date;
        const serviceId = activeButton.dataset.serviceId;
        getSlots(selectedDate, serviceId).then(slots => renderSlots(slots));
    }

    const selectedSlots = document.getElementById('timeslotsGrid');
    if (selectedSlots) {
        selectedSlots.addEventListener('click', (e) => {
            const slot = e.target.closest('.timeslot-btn');
            if (slot && !slot.disabled) {
                selectedSlots.querySelector('.timeslot-btn.active')?.classList.remove('active');
                slot.classList.add('active');
                let selectedTime = slot.textContent.trim().replace(/\s+/g, ' ').split(' ').pop();
                const formattedDate = formatDate(dateSelector.querySelector('button.active')?.dataset.date);
                updateBookingSummary(formattedDate, selectedTime);
            }
        })
    }

});

