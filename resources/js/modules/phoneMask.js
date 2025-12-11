import IMask from 'imask';

export function initPhoneMasks() {
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        IMask(input, {
            mask: '+{38} (000) 000-00-00',
            lazy: false,
            placeholderChar: '_'
        });
    });
}
