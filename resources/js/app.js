import './bootstrap';
import * as bootstrap from 'bootstrap';

// Import modules
import { initPhoneMasks } from './modules/phoneMask';


// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize phone masks
    initPhoneMasks();
});

