/*
---------------------------------------------------------------------------
| Reserva.js
| author: 	Alvaro Casillas
| date: 	2025-04-04
| version: 	1.0
| description: 	Funciones para la gestión de reservas
|              en el sistema de gestión de reservas.
----------------------------------------------------------------------------
AREAS SCRIPT:
--------------------------------------------------------------------------*/

console.log('Reserva.js loaded dfgfdgdfg');

document.addEventListener('DOMContentLoaded', function() {
    
    const fechaSelect = document.getElementById('fecha');
    const areaSelect = document.getElementById('area');
    const availabilityPanel = document.getElementById('availability-panel');
    const availabilityDetails = document.getElementById('availability-details');
    const personasInput = document.getElementById('personas');

    function checkAvailability() {
        const selectedOption = areaSelect.options[areaSelect.selectedIndex];
        const available = parseInt(selectedOption.dataset.available, 10);
        const minPeople = window.reservationConfig ? window.reservationConfig.minPeoplePerReservation : 4;

        if (personasInput.value > available) {
            alert(`No hay suficientes espacios disponibles. Solo hay ${available} disponibles.`);
            personasInput.value = available; // Set to max if more than available
            personasInput.max = available; // Set max to available  
            personasInput.min = available;
        }else{
            personasInput.value = minPeople; // Set to minimum value from config
            personasInput.setAttribute('min', minPeople); // Set min from config
            personasInput.setAttribute('max', available); // Set max to the available spots
        }
        const personasCount = parseInt(personasInput.value, 10) || minPeople; // Get the number of persons or default to min
        return personasCount;
    }

    // Cargar áreas cuando se selecciona una fecha
    fechaSelect.addEventListener('change', function() {
        const businessDayId = this.value;

        //Si no hay fecha seleccionada, deshabilitar el dropdown de áreas y mostrar mensaje
        if (!businessDayId) {
            areaSelect.innerHTML = '<option value="" disabled selected>Primero selecciona una fecha</option>';
            areaSelect.disabled = true;
            availabilityPanel.classList.add('hidden');
            return;
        }
        // Mostrar carga
        areaSelect.innerHTML = '<option value="" disabled selected>Cargando áreas...</option>';
        areaSelect.disabled = true;

        // Hacer la petición para cargar las áreas disponibles
        fetch(`/api/game-areas/${businessDayId}`)
            .then(response => {
                if (!response.ok) throw new Error('Error al cargar áreas');
                return response.json();
            })
            .then(data => {
                // Store day_type for later use
                areaSelect.dataset.dayType = data.day_type || 1;
                
                // Actualizar dropdown de áreas
                areaSelect.innerHTML = '<option value="" disabled selected>Selecciona un área</option>';
                
                data.areas.forEach(area => {
                    const option = document.createElement('option');
                    option.value = area.id;
                    option.textContent = `${area.name} - $${area.price} (${area.available} disponibles)`;
                    option.dataset.price = area.price;
                    option.dataset.capacity = area.capacity;
                    option.dataset.reserved = area.reserved;
                    option.dataset.available = area.available;
                    option.dataset.description = area.description;
                    
                    // Deshabilitar si no hay disponibilidad
                    option.disabled = area.available <= 0;
                    
                    areaSelect.appendChild(option);
                });

                areaSelect.disabled = false;
                availabilityPanel.classList.add('hidden');
            })
            .catch(error => {
                console.error('Error:', error);
                areaSelect.innerHTML = '<option value="" disabled selected>Error al cargar áreas</option>';
            });
    });
    

    // Mostrar disponibilidad cuando se selecciona un área
    areaSelect.addEventListener('change', function() {
        console.log(this.value);
        const selectedOption = this.options[this.selectedIndex];
        const personasInput = document.getElementById('personas');

        if (!this.value || !selectedOption.dataset.available) {
            availabilityPanel.classList.add('hidden');
            personasInput.removeAttribute('max'); // Remove max if no area is selected
            return;
        }

        const dayType = parseInt(areaSelect.dataset.dayType, 10) || 1;
        
        // If it's a special event (type 2), show warning modal first
        if (dayType === 2) {
            openSpecialEventModal(selectedOption);
        } else {
            // For regular events, show availability directly
            const personasCount = checkAvailability();
            changeHTML(personasCount, selectedOption);
            availabilityPanel.classList.remove('hidden');
        }
    });

    personasInput.addEventListener('input', function() {
        const selectedOption = areaSelect.options[areaSelect.selectedIndex];
        const personasCount = parseInt(this.value, 10) || 1; // Get the number of persons or default to 1        

        if (selectedOption && selectedOption.dataset.price) {
            changeHTML(personasCount, selectedOption); // Call the function to update HTML
        }
    });

    function changeHTML(personasCount, selectedOption) {
        const available = parseInt(selectedOption.dataset.available, 10);
        const totalPrice = (parseFloat(selectedOption.dataset.price) * personasCount).toFixed(2);
        const baseTicketCost = window.reservationConfig ? window.reservationConfig.baseTicketCost : 0;
        const minPeople = window.reservationConfig ? window.reservationConfig.minPeoplePerReservation : 4;
        const totalConsumption = ((parseFloat(selectedOption.dataset.price) - baseTicketCost) * personasCount).toFixed(2);
        const dayType = parseInt(areaSelect.dataset.dayType, 10) || 1;

        // Generate HTML based on day_type
        if (dayType === 1) {
            availabilityDetails.innerHTML = generateType1HTML(
                selectedOption.dataset.description, 
                minPeople, 
                available, 
                personasCount, 
                totalPrice, 
                totalConsumption
            );
        } else if (dayType === 2) {
            availabilityDetails.innerHTML = generateType2HTML(
                selectedOption.dataset.description, 
                minPeople, 
                available, 
                personasCount, 
                totalPrice, 
                totalConsumption
            );
        } else {
            // Default to type 1 if day_type is unknown
            availabilityDetails.innerHTML = generateType1HTML(
                selectedOption.dataset.description, 
                minPeople, 
                available, 
                personasCount, 
                totalPrice, 
                totalConsumption
            );
        }
    }

    function generateType1HTML(description, minPeople, available, personasCount, totalPrice, totalConsumption) {
        return `
            <div class="bg-white p-4 rounded-xl shadow-md">
                <div class="mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-blue-600">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                        </svg>
                        <h4 class="font-bold text-gray-900">Detalles del Área</h4>
                    </div>
                    <p class="text-sm text-gray-600">${description}</p>
                </div>
                <div class="bg-blue-50 rounded-lg p-3 mb-4">
                    <p class="text-sm text-blue-800 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline mr-1">
                           Store day_type for later use
                        areaSelect.dataset.dayType = data.day_type || 1;
                        
                        // Actualizar dropdown de áreas
                        areaSelect.innerHTML = '<option value="" disabled selected>Selecciona un área</option>';
                        
                        data.areas
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-4 rounded-lg text-center border-2 border-blue-200">
                        <p class="text-xs text-blue-600 font-semibold mb-1">Disponibles</p>
                        <p class="font-bold text-2xl text-blue-800">${available}</p>
                    </div>
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-lg text-center border-2 border-purple-200">
                        <p class="text-xs text-purple-600 font-semibold mb-1">Tu Reserva</p>
                        <p class="font-bold text-2xl text-purple-800">${personasCount}</p>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-lg border-2 border-green-300">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Precio Total:</span>
                            <span class="text-xl font-bold text-green-700">$${totalPrice}</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-green-200">
                            <span class="text-sm font-medium text-gray-700">Consumo Incluido:</span>
                            <span class="text-lg font-bold text-green-600">$${totalConsumption}</span>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    function generateType2HTML(description, minPeople, available, personasCount, totalPrice, totalConsumption) {
        return `
            <div class="bg-white p-4 rounded-xl shadow-md">
                <div class="mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-purple-600">
                            <path fill-rule="evenodd" d="M9.638 1.093a.75.75 0 0 1 .724 0l2 1.104a.75.75 0 1 1-.724 1.313L10 2.607l-1.638.903a.75.75 0 1 1-.724-1.313l2-1.104ZM5.403 4.287a.75.75 0 0 1-.295 1.019l-.805.444.805.444a.75.75 0 0 1-.724 1.314L3.5 7.02v.73a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 1 .388-.657l1.996-1.1a.75.75 0 0 1 1.019.294Zm9.194 0a.75.75 0 0 1 1.019-.294l1.996 1.1A.75.75 0 0 1 18 5.75v2a.75.75 0 0 1-1.5 0v-.73l-.884.488a.75.75 0 1 1-.724-1.314l.806-.444-.806-.444a.75.75 0 0 1-.295-1.02ZM7.343 8.284a.75.75 0 0 1 1.02-.294L10 8.893l1.638-.903a.75.75 0 1 1 .724 1.313l-1.612.89v1.557a.75.75 0 0 1-1.5 0v-1.557l-1.612-.89a.75.75 0 0 1-.295-1.019ZM2.75 11.5a.75.75 0 0 1 .75.75v1.557l1.608.887a.75.75 0 0 1-.724 1.314l-1.996-1.101A.75.75 0 0 1 2 14.25v-2a.75.75 0 0 1 .75-.75Zm14.5 0a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-.388.657l-1.996 1.1a.75.75 0 1 1-.724-1.313l1.608-.887V12.25a.75.75 0 0 1 .75-.75Zm-7.25 4a.75.75 0 0 1 .75.75v.73l.888-.49a.75.75 0 0 1 .724 1.313l-2 1.104a.75.75 0 0 1-.724 0l-2-1.104a.75.75 0 1 1 .724-1.313l.888.49v-.73a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                        <h4 class="font-bold text-purple-900">Evento Especial - Serie del Caribe</h4>
                    </div>
                    <p class="text-sm text-gray-600">${description}</p>
                </div>
                <div class="bg-purple-50 rounded-lg p-3 mb-4 border border-purple-200">
                    <p class="text-sm text-purple-800 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline mr-1">
                            <path d="M10 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM6 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM1.49 15.326a.78.78 0 0 1-.358-.442 3 3 0 0 1 4.308-3.516 6.484 6.484 0 0 0-1.905 3.959c-.023.222-.014.442.025.654a4.97 4.97 0 0 1-2.07-.655ZM16.44 15.98a4.97 4.97 0 0 0 2.07-.654.78.78 0 0 0 .357-.442 3 3 0 0 0-4.308-3.517 6.484 6.484 0 0 1 1.907 3.96 2.32 2.32 0 0 1-.026.654ZM18 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0ZM5.304 16.19a.844.844 0 0 1-.277-.71 5 5 0 0 1 9.947 0 .843.843 0 0 1-.277.71A6.975 6.975 0 0 1 10 18a6.974 6.974 0 0 1-4.696-1.81Z" />
                        </svg>
                        Reserva mínima para ${minPeople} personas
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-lg text-center border-2 border-purple-300">
                        <p class="text-xs text-purple-600 font-semibold mb-1">Espacios Disponibles</p>
                        <p class="font-bold text-2xl text-purple-800">${available}</p>
                    </div>
                    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-4 rounded-lg text-center border-2 border-indigo-300">
                        <p class="text-xs text-indigo-600 font-semibold mb-1">Personas</p>
                        <p class="font-bold text-2xl text-indigo-800">${personasCount}</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 p-4 rounded-lg border-2 border-purple-300">
                        <div class="flex justify-between items-center">
                            <span class="text-base font-bold text-purple-900">Total a Pagar:</span>
                            <span class="text-2xl font-black text-purple-700">$${totalPrice}</span>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-amber-50 to-yellow-50 p-3 rounded-lg border border-amber-300">
                        <div class="flex items-start gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <p class="text-sm font-bold text-amber-900">Evento Especial</p>
                                <p class="text-xs text-amber-800 mt-1">Este es un evento especial con condiciones diferentes. Se requerirá un consumo de $250 MXN por persona en Área General y $500 MXN por persona en Área Diamante. El costo actual solo incluye tus boletos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }


    // Add event listener for selecting a day
    function setupDaySelection() {
        document.querySelectorAll('.day-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove 'selected' state from all cards
                document.querySelectorAll('.day-card').forEach(el => {
                    el.removeAttribute('data-selected');
                });

                // Add 'selected' state to the clicked card
                this.setAttribute('data-selected', 'true');

                // Update the hidden input or select field with the selected date
                document.getElementById('fecha').value = this.dataset.dayId;

                const businessDayId = this.dataset.dayId;
                
                areaSelect.innerHTML = '<option value="" disabled selected>Cargando áreas...</option>';
                areaSelect.disabled = true;

                fetch(`/api/game-areas/${businessDayId}`)
                    .then(response => {
                        if (!response.ok) throw new Error('Error al cargar áreas');
                        return response.json();
                    })
                    .then(data => {
                        // Store day_type for later use
                        areaSelect.dataset.dayType = data.day_type || 1;
                        
                        // Actualizar dropdown de áreas
                        areaSelect.innerHTML = '<option value="" disabled selected>Selecciona un área</option>';
                        
                        data.areas.forEach(area => {
                            const option = document.createElement('option');
                            option.value = area.id;
                            option.textContent = `${area.name} - $${area.price} (${area.available} disponibles)`;
                            option.dataset.price = area.price;
                            option.dataset.capacity = area.capacity;
                            option.dataset.reserved = area.reserved;
                            option.dataset.available = area.available;
                            option.dataset.description = area.description;
                            
                            // Deshabilitar si no hay disponibilidad
                            option.disabled = area.available <= 0;
                            
                            areaSelect.appendChild(option);
                        });

                        areaSelect.disabled = false;
                        availabilityPanel.classList.add('hidden');

                        // Scroll to the reservation form after data is loaded
                        setTimeout(() => {
                            const reservationForm = document.getElementById('reservation_form');
                            if (reservationForm) {
                                const yOffset = -80; // Offset for fixed headers if any
                                const y = reservationForm.getBoundingClientRect().top + window.pageYOffset + yOffset;
                                window.scrollTo({ top: y, behavior: 'smooth' });
                            }
                        }, 100);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        areaSelect.innerHTML = '<option value="" disabled selected>Error al cargar áreas</option>';
                    });
            });
        });
    }

    // Call the function after DOM content is loaded
    setupDaySelection();

    // Map Modal functionality
    const mapModal = document.getElementById('mapModal');
    const showMapBtn = document.getElementById('showMapBtn');
    const closeMapModal = document.getElementById('closeMapModal');
    const closeMapModalBtn = document.getElementById('closeMapModalBtn');
    const mapModalOverlay = document.getElementById('mapModalOverlay');

    function openMapModal() {
        mapModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeMap() {
        mapModal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Open modal when button is clicked
    if (showMapBtn) {
        showMapBtn.addEventListener('click', openMapModal);
    }

    // Close modal when X button is clicked
    if (closeMapModal) {
        closeMapModal.addEventListener('click', closeMap);
    }

    // Close modal when "Cerrar" button is clicked
    if (closeMapModalBtn) {
        closeMapModalBtn.addEventListener('click', closeMap);
    }

    // Close modal when clicking on overlay
    if (mapModalOverlay) {
        mapModalOverlay.addEventListener('click', closeMap);
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !mapModal.classList.contains('hidden')) {
            closeMap();
        }
    });

    // Email Confirmation Modal functionality
    const emailConfirmationModal = document.getElementById('emailConfirmationModal');
    const emailConfirmationOverlay = document.getElementById('emailConfirmationOverlay');
    const confirmEmailValue = document.getElementById('confirmEmailValue');
    const goBackBtn = document.getElementById('goBackBtn');
    const acceptEmailBtn = document.getElementById('acceptEmailBtn');
    const reservationForm = document.getElementById('reservation_form');

    function openEmailConfirmationModal(email) {
        confirmEmailValue.textContent = email;
        emailConfirmationModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeEmailConfirmationModal() {
        const emailConfirmContent = document.getElementById('emailConfirmContent');
        const emailConfirmLoading = document.getElementById('emailConfirmLoading');
        const goBackBtn = document.getElementById('goBackBtn');
        const emailConfirmationOverlay = document.getElementById('emailConfirmationOverlay');
        
        // Reset to normal state
        emailConfirmContent.classList.remove('hidden');
        emailConfirmLoading.classList.add('hidden');
        
        // Re-enable buttons
        if (acceptEmailBtn) acceptEmailBtn.disabled = false;
        if (goBackBtn) goBackBtn.disabled = false;
        
        // Re-enable overlay click
        if (emailConfirmationOverlay) {
            emailConfirmationOverlay.style.pointerEvents = 'auto';
        }
        
        emailConfirmationModal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Intercept form submission
    if (reservationForm) {
        reservationForm.addEventListener('submit', function(e) {
            const emailInput = document.getElementById('correo');
            const email = emailInput.value;

            // Check if we've already confirmed the email
            if (!reservationForm.dataset.emailConfirmed) {
                e.preventDefault();
                openEmailConfirmationModal(email);
            }
            // If emailConfirmed is set, let the form submit normally
        });
    }

    // Go back button - close modal and let user correct
    if (goBackBtn) {
        goBackBtn.addEventListener('click', function() {
            closeEmailConfirmationModal();
        });
    }

    // Accept button - mark as confirmed and submit form
    if (acceptEmailBtn) {
        acceptEmailBtn.addEventListener('click', function() {
            // Show loading state
            const emailConfirmContent = document.getElementById('emailConfirmContent');
            const emailConfirmLoading = document.getElementById('emailConfirmLoading');
            const goBackBtn = document.getElementById('goBackBtn');
            const emailConfirmationOverlay = document.getElementById('emailConfirmationOverlay');
            
            // Hide content and show loading
            emailConfirmContent.classList.add('hidden');
            emailConfirmLoading.classList.remove('hidden');
            
            // Disable buttons
            acceptEmailBtn.disabled = true;
            goBackBtn.disabled = true;
            
            // Prevent closing modal by clicking overlay
            if (emailConfirmationOverlay) {
                emailConfirmationOverlay.style.pointerEvents = 'none';
            }
            
            // Mark form as confirmed and submit
            reservationForm.dataset.emailConfirmed = 'true';
            reservationForm.submit();
        });
    }

    // Close modal when clicking on overlay
    if (emailConfirmationOverlay) {
        emailConfirmationOverlay.addEventListener('click', closeEmailConfirmationModal);
    }

    // Close email confirmation modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !emailConfirmationModal.classList.contains('hidden')) {
            closeEmailConfirmationModal();
        }
    });

    // Special Event Warning Modal functionality
    const specialEventModal = document.getElementById('specialEventModal');
    const specialEventOverlay = document.getElementById('specialEventOverlay');
    const closeSpecialEventBtn = document.getElementById('closeSpecialEventBtn');
    const acceptSpecialEventBtn = document.getElementById('acceptSpecialEventBtn');
    let pendingAreaSelection = null;

    function openSpecialEventModal(selectedOption) {
        // Store the selection for later use
        pendingAreaSelection = selectedOption;
        
        // Get area name from the option text
        const areaName = selectedOption.textContent.split(' - ')[0];
        const areaNameElement = document.getElementById('specialEventAreaName');
        if (areaNameElement) {
            areaNameElement.textContent = areaName;
        }
        
        if (specialEventModal) {
            specialEventModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeSpecialEventModal() {
        if (specialEventModal) {
            specialEventModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        // Reset area selection if user closes without accepting
        if (pendingAreaSelection) {
            areaSelect.value = '';
            pendingAreaSelection = null;
        }
    }

    function acceptSpecialEvent() {
        if (specialEventModal) {
            specialEventModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Now show the availability panel with the pending selection
        if (pendingAreaSelection) {
            const personasCount = checkAvailability();
            changeHTML(personasCount, pendingAreaSelection);
            availabilityPanel.classList.remove('hidden');
            pendingAreaSelection = null;
        }
    }

    // Close modal when clicking cancel/close button
    if (closeSpecialEventBtn) {
        closeSpecialEventBtn.addEventListener('click', closeSpecialEventModal);
    }

    // Accept and continue
    if (acceptSpecialEventBtn) {
        acceptSpecialEventBtn.addEventListener('click', acceptSpecialEvent);
    }

    // Close modal when clicking on overlay
    if (specialEventOverlay) {
        specialEventOverlay.addEventListener('click', closeSpecialEventModal);
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && specialEventModal && !specialEventModal.classList.contains('hidden')) {
            closeSpecialEventModal();
        }
    });
});