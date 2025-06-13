<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old School Barber - Prenota il tuo taglio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Background Animation */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.1;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Header */
        .header {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo i {
            font-size: 2rem;
            color: #d4af37;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .header-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: rgba(212, 175, 55, 0.1);
            color: #d4af37;
            text-decoration: none;
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .header-btn:hover {
            background: rgba(212, 175, 55, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .header-btn.cancel {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.2);
        }

        .header-btn.cancel:hover {
            background: rgba(239, 68, 68, 0.2);
        }

        .header-btn.verify {
            background: rgba(59, 130, 246, 0.1);
            color: #60a5fa;
            border-color: rgba(59, 130, 246, 0.2);
        }

        .header-btn.verify:hover {
            background: rgba(59, 130, 246, 0.2);
        }

        /* Main Container */
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3rem 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
        }

        .main-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.5), transparent);
        }

        .card-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .card-title {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-subtitle {
            color: #a0a0a0;
            font-size: 1.1rem;
            font-weight: 400;
        }

        /* Form Styles */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            margin-bottom: 0.5rem;
            color: #e0e0e0;
            font-weight: 600;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group label i {
            color: #d4af37;
            font-size: 1rem;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .form-group input::placeholder {
            color: #a0a0a0;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #d4af37;
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
            transform: translateY(-1px);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #a0a0a0;
            font-size: 1rem;
            z-index: 2;
        }

        /* Select Styling */
        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2214%22%20height%3D%2210%22%20viewBox%3D%220%200%2014%2010%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M1%200l6%206%206-6%22%20stroke%3D%22%23d4af37%22%20stroke-width%3D%222%22%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 14px 10px;
            cursor: pointer;
        }

        .form-group select option {
            background: #1a1a2e;
            color: #ffffff;
            padding: 0.5rem;
        }

        /* Date and Time Grid */
        .datetime-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        /* Time Slots */
        .time-slots {
            margin-bottom: 2rem;
        }

        .time-slots h3 {
            color: #e0e0e0;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .time-slots h3 i {
            color: #d4af37;
        }

        .time-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 0.8rem;
        }

        .time-slot {
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
        }

        .time-slot:hover {
            background: rgba(212, 175, 55, 0.1);
            border-color: rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }

        .time-slot.selected {
            background: rgba(212, 175, 55, 0.2);
            border-color: #d4af37;
            color: #d4af37;
        }

        .time-slot.unavailable {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
            color: #f87171;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .time-slot.unavailable:hover {
            transform: none;
            background: rgba(239, 68, 68, 0.1);
        }

        .availability-info {
            font-size: 0.8rem;
            margin-top: 0.3rem;
            opacity: 0.8;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1.2rem 2rem;
            background: linear-gradient(135deg, #d4af37 0%, #ffd700 100%);
            border: none;
            border-radius: 12px;
            color: #1a1a2e;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px -5px rgba(212, 175, 55, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:disabled {
            background: rgba(255, 255, 255, 0.1);
            color: #a0a0a0;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .submit-btn:disabled::before {
            display: none;
        }

        /* Loading States */
        .loading {
            display: none;
            text-align: center;
            color: #a0a0a0;
            font-style: italic;
            margin: 1rem 0;
        }

        .loading.show {
            display: block;
        }

        /* Error Messages */
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            text-align: center;
        }

        /* Success Messages */
        .success-message {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #4ade80;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                max-width: 600px;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                padding: 0 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .header-actions {
                flex-wrap: wrap;
                justify-content: center;
            }

            .main-card {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }

            .card-title {
                font-size: 1.8rem;
            }

            .card-subtitle {
                font-size: 1rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .datetime-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .time-grid {
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                gap: 0.6rem;
            }

            .time-slot {
                padding: 0.8rem 0.5rem;
                font-size: 0.9rem;
            }

            .header-btn {
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }

            .main-card {
                padding: 1.5rem 1rem;
                border-radius: 16px;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .card-subtitle {
                font-size: 0.9rem;
            }

            .form-group input,
            .form-group select {
                padding: 0.8rem 0.8rem 0.8rem 2.5rem;
                font-size: 0.9rem;
            }

            .submit-btn {
                padding: 1rem 1.5rem;
                font-size: 1rem;
            }

            .time-grid {
                grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
                gap: 0.5rem;
            }

            .time-slot {
                padding: 0.6rem 0.3rem;
                font-size: 0.8rem;
            }

            .header-actions {
                gap: 0.5rem;
            }

            .header-btn {
                padding: 0.5rem 0.8rem;
                font-size: 0.75rem;
            }

            .logo h1 {
                font-size: 1.4rem;
            }

            .logo i {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 360px) {
            .main-card {
                padding: 1rem 0.8rem;
            }

            .card-title {
                font-size: 1.3rem;
            }

            .form-group input,
            .form-group select {
                padding: 0.7rem 0.7rem 0.7rem 2.2rem;
                font-size: 0.85rem;
            }

            .submit-btn {
                padding: 0.9rem 1.2rem;
                font-size: 0.95rem;
            }

            .time-slot {
                padding: 0.5rem 0.2rem;
                font-size: 0.75rem;
            }

            .header-btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.7rem;
            }
        }

        /* Touch device optimizations */
        @media (hover: none) and (pointer: coarse) {
            .time-slot, .submit-btn, .header-btn {
                min-height: 44px;
            }

            .form-group input, .form-group select {
                min-height: 44px;
            }
        }

        /* Accessibility improvements */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }

            .bg-animation::before {
                animation: none;
            }
        }

        /* High contrast mode */
        @media (prefers-contrast: high) {
            .main-card {
                border: 2px solid #ffffff;
            }

            .form-group input,
            .form-group select {
                border: 2px solid #ffffff;
            }

            .time-slot {
                border: 2px solid #ffffff;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation"></div>

    <header class="header">
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-cut"></i>
                <h1>Old School Barber</h1>
            </div>
            <div class="header-actions">
                <a href="admin.php" class="header-btn">
                    <i class="fas fa-user-shield"></i>
                    Admin
                </a>
                <a href="cancel_booking.php" class="header-btn cancel">
                    <i class="fas fa-times-circle"></i>
                    Cancella una prenotazione
                </a>
                <a href="verify_booking.php" class="header-btn verify">
                    <i class="fas fa-search"></i>
                    Verifica Prenotazioni
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="main-card">
            <div class="card-header">
                <h1 class="card-title">Prenota il tuo taglio</h1>
                <p class="card-subtitle">Scegli il servizio, la data e l'orario che preferisci</p>
            </div>

            <form method="POST" action="prenota.php" id="bookingForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nome">
                            <i class="fas fa-user"></i>
                            Nome completo
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-user"></i>
                            <input type="text" name="nome" id="nome" placeholder="Il tuo nome" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono">
                            <i class="fas fa-phone"></i>
                            Telefono
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-phone"></i>
                            <input type="tel" name="telefono" id="telefono" placeholder="+39 123 456 7890">
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="email">
                            <i class="fas fa-envelope"></i>
                            Email (opzionale)
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-envelope"></i>
                            <input type="email" name="email" id="email" placeholder="la-tua-email@esempio.com">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="servizio">
                            <i class="fas fa-scissors"></i>
                            Servizio
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-scissors"></i>
                            <select name="servizio" id="servizio" required>
                                <option value="">Seleziona un servizio</option>
                                <?php
                                include 'connessione.php';
                                $servizi = $conn->query("SELECT nome FROM servizi ORDER BY nome");
                                if ($servizi && $servizi->num_rows > 0) {
                                    while ($row = $servizi->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row['nome']) . "'>" . htmlspecialchars($row['nome']) . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="operatore_id">
                            <i class="fas fa-user-tie"></i>
                            Operatore (opzionale)
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-user-tie"></i>
                            <select name="operatore_id" id="operatore_id">
                                <option value="">Nessuna preferenza</option>
                                <?php
                                $operatori = $conn->query("SELECT id, nome, cognome FROM operatori WHERE attivo = 1 ORDER BY nome, cognome");
                                if ($operatori && $operatori->num_rows > 0) {
                                    while ($row = $operatori->fetch_assoc()) {
                                        echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['nome'] . ' ' . $row['cognome']) . "</option>";
                                    }
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="datetime-grid">
                    <div class="form-group">
                        <label for="data_prenotazione">
                            <i class="fas fa-calendar"></i>
                            Data
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-calendar"></i>
                            <input type="date" name="data_prenotazione" id="data_prenotazione" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            <i class="fas fa-clock"></i>
                            Orario selezionato
                        </label>
                        <div class="input-wrapper">
                            <i class="input-icon fas fa-clock"></i>
                            <input type="text" id="selected_time_display" placeholder="Seleziona un orario" readonly>
                            <input type="hidden" name="orario" id="orario" required>
                        </div>
                    </div>
                </div>

                <div class="time-slots">
                    <h3>
                        <i class="fas fa-clock"></i>
                        Orari disponibili
                    </h3>
                    <div class="loading" id="timeLoading">
                        Caricamento orari disponibili...
                    </div>
                    <div class="time-grid" id="timeSlots">
                        <!-- Time slots will be loaded here -->
                    </div>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn" disabled>
                    <i class="fas fa-calendar-check"></i>
                    Prenota Appuntamento
                </button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('data_prenotazione');
            const timeSlotsContainer = document.getElementById('timeSlots');
            const timeLoading = document.getElementById('timeLoading');
            const selectedTimeDisplay = document.getElementById('selected_time_display');
            const orarioInput = document.getElementById('orario');
            const submitBtn = document.getElementById('submitBtn');

            // Set minimum date to today
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            dateInput.min = tomorrow.toISOString().split('T')[0];

            // Set maximum date to 3 months from now
            const maxDate = new Date(today);
            maxDate.setMonth(maxDate.getMonth() + 3);
            dateInput.max = maxDate.toISOString().split('T')[0];

            dateInput.addEventListener('change', function() {
                const selectedDate = this.value;
                if (selectedDate) {
                    checkWorkingDay(selectedDate);
                } else {
                    clearTimeSlots();
                }
            });

            function checkWorkingDay(date) {
                timeLoading.classList.add('show');
                timeSlotsContainer.innerHTML = '';
                
                fetch(`check_working_day.php?date=${date}`)
                    .then(response => response.json())
                    .then(data => {
                        timeLoading.classList.remove('show');
                        if (data.isWorkingDay) {
                            loadTimeSlots(date);
                        } else {
                            timeSlotsContainer.innerHTML = '<div style="text-align: center; color: #f87171; padding: 2rem;">Giorno non lavorativo. Seleziona un\'altra data.</div>';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        timeLoading.classList.remove('show');
                        timeSlotsContainer.innerHTML = '<div style="text-align: center; color: #f87171; padding: 2rem;">Errore nel caricamento. Riprova.</div>';
                    });
            }

            function loadTimeSlots(date) {
                fetch('get_time_slots.php')
                    .then(response => response.json())
                    .then(timeSlots => {
                        if (timeSlots.length === 0) {
                            timeSlotsContainer.innerHTML = '<div style="text-align: center; color: #a0a0a0; padding: 2rem;">Nessun orario configurato.</div>';
                            return;
                        }

                        const promises = timeSlots.map(slot => 
                            fetch(`check_availability.php?date=${date}&time=${slot.orario}`)
                                .then(response => response.json())
                                .then(availability => ({
                                    time: slot.orario,
                                    availability: availability
                                }))
                        );

                        Promise.all(promises)
                            .then(results => {
                                displayTimeSlots(results);
                            })
                            .catch(error => {
                                console.error('Error checking availability:', error);
                                timeSlotsContainer.innerHTML = '<div style="text-align: center; color: #f87171; padding: 2rem;">Errore nel caricamento disponibilità.</div>';
                            });
                    })
                    .catch(error => {
                        console.error('Error loading time slots:', error);
                        timeSlotsContainer.innerHTML = '<div style="text-align: center; color: #f87171; padding: 2rem;">Errore nel caricamento orari.</div>';
                    });
            }

            function displayTimeSlots(timeSlots) {
                timeSlotsContainer.innerHTML = '';
                
                timeSlots.forEach(slot => {
                    const timeSlot = document.createElement('div');
                    timeSlot.className = 'time-slot';
                    
                    const time = slot.time.substring(0, 5); // Format HH:MM
                    const availability = slot.availability;
                    
                    if (availability.available) {
                        timeSlot.innerHTML = `
                            <div>${time}</div>
                            <div class="availability-info">${availability.message}</div>
                        `;
                        timeSlot.addEventListener('click', () => selectTimeSlot(timeSlot, slot.time));
                    } else {
                        timeSlot.classList.add('unavailable');
                        timeSlot.innerHTML = `
                            <div>${time}</div>
                            <div class="availability-info">${availability.message}</div>
                        `;
                    }
                    
                    timeSlotsContainer.appendChild(timeSlot);
                });
            }

            function selectTimeSlot(element, time) {
                // Remove selection from all time slots
                document.querySelectorAll('.time-slot').forEach(slot => {
                    slot.classList.remove('selected');
                });
                
                // Select clicked time slot
                element.classList.add('selected');
                
                // Update form values
                const formattedTime = time.substring(0, 5);
                selectedTimeDisplay.value = formattedTime;
                orarioInput.value = time;
                
                // Enable submit button
                updateSubmitButton();
            }

            function clearTimeSlots() {
                timeSlotsContainer.innerHTML = '';
                selectedTimeDisplay.value = '';
                orarioInput.value = '';
                updateSubmitButton();
            }

            function updateSubmitButton() {
                const hasDate = dateInput.value !== '';
                const hasTime = orarioInput.value !== '';
                const hasName = document.getElementById('nome').value.trim() !== '';
                const hasService = document.getElementById('servizio').value !== '';
                
                submitBtn.disabled = !(hasDate && hasTime && hasName && hasService);
            }

            // Add event listeners for form validation
            document.getElementById('nome').addEventListener('input', updateSubmitButton);
            document.getElementById('servizio').addEventListener('change', updateSubmitButton);

            // Form submission
            document.getElementById('bookingForm').addEventListener('submit', function(e) {
                if (submitBtn.disabled) {
                    e.preventDefault();
                    return false;
                }
                
                // Show loading state
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Prenotazione in corso...';
                submitBtn.disabled = true;
            });

            // Touch device optimizations
            if ('ontouchstart' in window) {
                document.body.classList.add('touch-device');
            }

            // Viewport height fix for mobile browsers
            function setViewportHeight() {
                const vh = window.innerHeight * 0.01;
                document.documentElement.style.setProperty('--vh', `${vh}px`);
            }

            setViewportHeight();
            window.addEventListener('resize', setViewportHeight);
            window.addEventListener('orientationchange', () => {
                setTimeout(setViewportHeight, 100);
            });
        });
    </script>
</body>
</html>