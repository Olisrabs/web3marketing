<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Book a Meeting - Web3 Marketing with Joy</title>
    <meta
        content="Book a free strategy call with Web3 Marketing with Joy's crypto marketing experts. Discuss your Web3 project's growth goals and discover our proven marketing solutions."
        name="description" />
    <meta content="Book a Meeting - Web3 Marketing with Joy" property="og:title" />
    <meta
        content="Book a free strategy call with Web3 Marketing with Joy's crypto marketing experts. Discuss your Web3 project's growth goals and discover our proven marketing solutions."
        property="og:description" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="assets/img/favicon.svg" rel="shortcut icon" type="image/x-icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <style>
        /* General Reset and Base Styles */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
            background-color: #f4f4f4;
            color: #000;
        }

        /* --- PRELOADER STYLES --- */
        .preloader-block {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            z-index: 1000;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }

        .preloader-block.hide {
            opacity: 0;
            visibility: hidden;
        }

        .lunar-logo-block {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .lunar-logo-grid {
            display: grid;
            grid-template-columns: repeat(3, 20px);
            grid-template-rows: repeat(3, 20px);
            gap: 2px;
            margin-bottom: 10px;
        }

        .empty-squere {
            background-color: transparent;
        }

        .black-squere {
            background-color: #000;
            opacity: 0;
            transition: opacity 0.3s ease-in;
        }

        .lunar-logo-text-block {
            font-size: 24px;
            font-weight: 500;
        }

        .lunar-logo-text-block span {
            opacity: 0;
            transition: opacity 0.1s;
        }

        /* --- BOOKING LAYOUT STYLES (New Two-Column Layout) --- */
        .book-meeting-block {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .booking-container {
            display: flex;
            width: 100%;
            max-width: 950px; /* Adjusted max width for compactness */
            min-height: 600px;
            max-height: 90vh; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
        }

        /* Left Side: Company Info */
        .company-info {
            flex: 1;
            background-color: #000;
            color: #fff;
            padding: 25px; /* Adjusted padding */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .company-info h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .company-info p, .company-info ul li {
            font-size: 0.95em;
        }

        .company-info ul {
            list-style: none;
            padding: 0;
        }

        .company-info ul li {
            margin-bottom: 5px;
        }

        /* Right Side: Wizard Form Container */
        .booking-wizard {
            flex: 1.2;
            padding: 25px; /* Adjusted padding */
            position: relative;
            display: flex;
            flex-direction: column;
            overflow-y: hidden;
        }

        .wizard-step {
            display: none;
            flex-direction: column;
            flex-grow: 1;
            height: 100%;
        }

        .wizard-step.active {
            display: flex;
        }

        .wizard-header {
            font-size: 1.3em;
            margin-bottom: 15px;
            border-bottom: 1px solid #eee;
            padding-bottom: 8px;
            padding-top: 10px; 
        }

        /* Back Arrow Styling */
        .back-arrow {
            position: absolute;
            top: 25px;
            left: 25px;
            font-size: 1em;
            cursor: pointer;
            color: #000;
            font-weight: 500;
            padding: 5px;
            transition: color 0.2s;
        }
        .back-arrow:hover {
            color: #333;
        }
        
        /* Inner scrollable area for Step 2 */
        .form-scroll-area {
            max-height: calc(100% - 100px); 
            overflow-y: auto;
            padding-right: 15px;
            margin-bottom: 10px;
        }


        /* --- STEP 1 LAYOUT (Calendar + Time Slots) --- */
        .step1-content {
            display: flex;
            /* Flex container for calendar and time slots */
            gap: 15px;
            flex-grow: 1;
        }

        .calendar-side {
            flex: 2;
        }

        .timeslot-side {
            flex: 1;
            border-left: 1px solid #eee;
            padding-left: 15px;
            display: flex;
            flex-direction: column;
            gap: 5px;
            max-height: 100%;
            overflow-y: auto; 
        }

        .timeslot-side h4 {
            margin-top: 0;
            font-size: 1em;
        }

        /* --- CALENDAR STYLES --- */
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .calendar-header button {
            background: none;
            border: 1px solid #ccc;
            padding: 5px 10px;
            cursor: pointer;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 1px;
            text-align: center;
        }

        .day-name {
            font-weight: bold;
            padding: 5px 0;
            font-size: 0.9em;
        }

        .date-cell {
            padding: 8px 0;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
            user-select: none;
            font-weight: 500;
            font-size: 0.9em;
        }

        .date-cell.today {
            border: 2px solid #000;
        }

        .date-cell:not(.disabled):hover {
            background-color: #e0e0e0;
        }

        .date-cell.disabled {
            color: #ccc;
            cursor: not-allowed;
            background-color: #f9f9f9;
        }

        .date-cell.selected {
            background-color: #000;
            color: #fff;
        }

        /* Time Slot Buttons (Vertical Display) */
        .time-slot {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s, border-color 0.2s;
            text-align: center;
            white-space: nowrap;
            font-size: 0.85em;
        }

        .time-slot:hover:not(.selected) {
            background-color: #e0e0e0;
        }

        .time-slot.selected {
            background-color: #000;
            color: #fff;
            border-color: #000;
        }

        /* --- FORM ELEMENTS STYLES --- */
        .form-group {
            margin-bottom: 12px;
        }

        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
            color: #333;
            font-size: 0.95em;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Checkbox/Radio Layout */
        .checkbox-group, .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .checkbox-option, .radio-option {
            display: inline-flex;
            align-items: center;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s;
            font-size: 0.85em;
        }

        .checkbox-option:hover, .radio-option:hover {
            background-color: #f0f0f0;
        }
        
        .checkbox-option input[type="checkbox"], .radio-option input[type="radio"] {
            width: auto;
            margin-right: 8px;
        }

        /* Guest Emails */
        .guest-email-input {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Button Styling */
        button.next-button,
        button.submit-button {
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        button.next-button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        
        button.next-button:hover:not(:disabled),
        button.submit-button:hover {
            background-color: #333;
        }

        /* --- RESPONSIVENESS (Mobile/Tablet) --- */
        @media (max-width: 800px) {
            .booking-container {
                flex-direction: column;
                max-height: none;
                min-height: auto;
            }

            .company-info {
                padding: 20px;
            }

            .booking-wizard {
                padding: 20px;
                overflow-y: auto;
            }
            
            .step1-content {
                flex-direction: column;
            }
            
            .timeslot-side {
                border-left: none;
                padding-left: 0;
                margin-top: 10px;
                max-height: 150px; 
            }

            .form-scroll-area {
                max-height: none;
            }
            
            .back-arrow {
                top: 15px;
                left: 15px;
                font-size: 0.9em;
            }
        }
    </style>
</head>

<body>
    <!-- Preloader Block -->
    <div id="preloader" class="preloader-block">
        <div class="lunar-logo-block">
            <img src="assets/img/favicon.svg" style="width: 60px; height: 60px;" alt="Web3 Marketing with Joy Logo">
            <div class="lunar-logo-text-block" id="lunar-text">
                <span data-idx="0">w</span>
                <span data-idx="1">e</span>
                <span data-idx="2">b</span>
                <span data-idx="3">3</span>
                <span data-idx="4" style="margin-left: 0.25em;">w</span>
                <span data-idx="5">i</span>
                <span data-idx="6">t</span>
                <span data-idx="7">h</span>
                <span data-idx="8" style="margin-left: 0.25em;">j</span>
                <span data-idx="9">o</span>
                <span data-idx="10">y</span>
            </div>
        </div>
    </div>

    <!-- Booking Content Block - Two-Column Layout -->
    <div class="book-meeting-block">
        <div class="booking-container">
            <!-- Left Column: Company Information -->
            <div class="company-info">
                <h2>Web3 Marketing Discovery Call</h2>
                <p>Book a free, 30-minute strategy session with the crypto marketing experts at Lunar Strategy (Web3
                    Marketing with Joy).</p>
                <p>We'll discuss your Web3 project's growth challenges and tailor a solution for your immediate needs.</p>
                <ul>
                    <li>✅ Discuss project strategy</li>
                    <li>✅ Identify growth bottlenecks</li>
                    <li>✅ Receive tailored campaign ideas</li>
                    <li>✅ No obligation, just expert advice</li>
                </ul>
            </div>

            <!-- Right Column: Wizard Form -->
            <div class="booking-wizard">
                <form id="discovery-call-form"> <!-- Removed method/action attributes as JS handles submission -->

                    <!-- Step 1: Calendar, Time Zone, and Time Slots -->
                    <div class="wizard-step active" data-step="1">
                        <h3 class="wizard-header">1. Select Date & Time (30 Min)</h3>
                        
                        <div class="form-group">
                            <label for="timezone-select">Select Your Time Zone *</label>
                            <select id="timezone-select" name="timezone" required>
                                <option value="UTC+1">UTC+1 (WAT, CET)</option>
                                <option value="UTC-5">UTC-5 (EST, CDT)</option>
                                <option value="UTC+8">UTC+8 (CST, AWST)</option>
                                <option value="UTC+0">UTC+0 (GMT, BST)</option>
                                <!-- Add more common time zones as needed -->
                            </select>
                        </div>
                        
                        <div class="step1-content">
                            <div class="calendar-side">
                                <div class="calendar-header">
                                    <button type="button" id="prevMonthBtn">←</button>
                                    <span id="currentMonthYear" style="font-weight: bold;"></span>
                                    <button type="button" id="nextMonthBtn">→</button>
                                </div>
                                <div class="calendar-grid" id="calendarGrid">
                                    <div class="day-name">Sun</div>
                                    <div class="day-name">Mon</div>
                                    <div class="day-name">Tue</div>
                                    <div class="day-name">Wed</div>
                                    <div class="day-name">Thu</div>
                                    <div class="day-name">Fri</div>
                                    <div class="day-name">Sat</div>
                                    <!-- Dates injected by JavaScript -->
                                </div>
                            </div>
    
                            <div class="timeslot-side">
                                <h4>Available Slots (<span id="selected-tz">UTC+1</span>)</h4>
                                <div id="timeSlotsGrid" style="flex-grow: 1;">
                                    <p style="text-align: center; color: #666;">Select a date to see times.</p>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: auto; text-align: right;">
                            <button type="button" class="next-button" id="step1Next" disabled>Next</button>
                        </div>
                    </div>

                    <!-- Step 2: Attendee & Project Details -->
                    <div class="wizard-step" data-step="2">
                        <!-- Back Arrow -->
                        <div class="back-arrow" data-goto="1">← Back to Time</div>
                        <h3 class="wizard-header">2. Attendee & Project Details</h3>
                        
                        <div class="form-scroll-area">
                            
                            <div class="form-group">
                                <label for="name">Your Name *</label>
                                <input type="text" id="name" name="name" required placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required placeholder="name@example.com">
                            </div>
                            
                            <!-- Guest Emails -->
                            <div class="form-group">
                                <label>Add Guest(s)?</label>
                                <select id="add-guest-select" style="width: auto;">
                                    <option value="no">No</option>
                                    <option value="yes">Yes</option>
                                </select>
                                <div id="guest-email-container" class="guest-email-input" style="display:none;">
                                    <label for="guest-emails">Guest Email(s) (separate by comma or newline)</label>
                                    <textarea id="guest-emails" name="guest_emails" placeholder="guest1@domain.com, guest2@domain.com"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="telegram">Telegram Handle (Optional)</label>
                                <input type="text" id="telegram" name="telegram" placeholder="@YourHandle">
                            </div>
                            <div class="form-group">
                                <label for="website">Project Website (Optional)</label>
                                <input type="url" id="website" name="website" placeholder="https://www.yourproject.com">
                            </div>

                            <!-- Checkbox for Project Field -->
                            <div class="form-group">
                                <label>Project Sector *</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="DeFi"> DeFi</label>
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="NFTs"> NFTs/Collectibles</label>
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="Gaming"> Gaming/Metaverse</label>
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="Infrastructure"> Infrastructure/Tools</label>
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="Layer1/2"> Layer 1/Layer 2</label>
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="DEX/CEX"> DEX/CEX</label>
                                    <label class="checkbox-option"><input type="checkbox" name="sector[]" value="Other"> Other</label>
                                </div>
                            </div>
                            
                            <!-- Checkbox for Market Service -->
                            <div class="form-group">
                                <label>Service(s) of Interest *</label>
                                <div class="checkbox-group">
                                    <label class="checkbox-option"><input type="checkbox" name="service[]" value="Community Management"> Community Management</label>
                                    <label class="checkbox-option"><input type="checkbox" name="service[]" value="Influencer/KOL"> Influencer/KOL Marketing</label>
                                    <label class="checkbox-option"><input type="checkbox" name="service[]" value="PR/Content"> PR & Content Strategy</label>
                                    <label class="checkbox-option"><input type="checkbox" name="service[]" value="PPC/Performance"> PPC/Performance Ads</label>
                                    <label class="checkbox-option"><input type="checkbox" name="service[]" value="Strategy/Consulting"> Strategy/Consulting</label>
                                </div>
                            </div>

                            <!-- Radio Button for Monthly Budget -->
                            <div class="form-group">
                                <label>Anticipated Monthly Marketing Budget *</label>
                                <div class="radio-group">
                                    <label class="radio-option"><input type="radio" name="budget" value="< $5K" required> < $5K</label>
                                    <label class="radio-option"><input type="radio" name="budget" value="$5K - $15K"> $5K - $15K</label>
                                    <label class="radio-option"><input type="radio" name="budget" value="$15K - $30K"> $15K - $30K</label>
                                    <label class="radio-option"><input type="radio" name="budget" value="$30K+"> $30K+</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="additional_info">Any Additional Information?</label>
                                <textarea id="additional_info" name="additional_info" placeholder="Stage of the project, specific questions, etc."></textarea>
                            </div>

                        </div>

                        <div style="margin-top: auto; text-align: right;">
                            <button type="submit" class="submit-button">Confirm Booking</button>
                        </div>
                    </div>

                    <!-- Step 3: Confirmation/Thank You -->
                    <div class="wizard-step" data-step="3" style="text-align: center; justify-content: center;">
                        <h3 class="wizard-header">🎉 Booking Confirmed!</h3>
                        <p style="font-size: 1.1em; color: green; font-weight: bold;">
                            Your Discovery Call has been successfully requested.
                        </p>
                        <p id="summaryText">
                            We will send a calendar invitation to your email with the details of your session on the
                            selected date.
                        </p>
                        <p style="margin-top: 30px;">Thank you for choosing Lunar Strategy!</p>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Custom JavaScript for Preloader, Wizard, and Calendar -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /* ------------------------------------
               PRELOADER LOGIC
            ------------------------------------ */
            const preloader = document.getElementById('preloader');
            const letters = document.querySelectorAll('#lunar-text span');

            // Simplified preloader animation for demo
            letters.forEach((letter, index) => {
                setTimeout(() => { letter.style.opacity = 1; }, 800 + index * 50);
            });
            setTimeout(() => { preloader.classList.add('hide'); }, 3000);

            /* ------------------------------------
               WIZARD FORM & STEP LOGIC
            ------------------------------------ */
            const form = document.getElementById('discovery-call-form');
            let currentStep = 1;
            let selectedDate = null;
            let selectedTime = null;
            let selectedTimeZone = 'UTC+1'; // Default value

            // Mock Available Time Slots (in base time zone, e.g., UTC+1 / WAT)
            const baseTimeSlots = ["9:00 AM", "10:30 AM", "1:00 PM", "2:30 PM", "4:00 PM"];
            
            // Simplified Time Zone Offset Mapping (minutes difference from UTC+1)
            const timeZoneOffsets = {
                'UTC+1': 0,    // Base
                'UTC-5': -360, // e.g., EST (UTC-5 is 6 hours behind UTC+1)
                'UTC+8': 420,  // e.g., CST (UTC+8 is 7 hours ahead of UTC+1)
                'UTC+0': -60   // e.g., GMT (UTC+0 is 1 hour behind UTC+1)
            };

            const step1NextButton = document.getElementById('step1Next');
            
            function showStep(step) {
                document.querySelectorAll('.wizard-step').forEach(s => s.classList.remove('active'));
                document.querySelector(`.wizard-step[data-step="${step}"]`).classList.add('active');
                currentStep = step;
            }

            // Step 1 Next Button Validation and Navigation
            step1NextButton.addEventListener('click', () => {
                if (selectedDate && selectedTime) {
                    showStep(2);
                } else {
                    alert('Please select both a date and a time to continue.'); 
                }
            });
            
            // Back Arrow Navigation
            document.querySelector('.booking-wizard').addEventListener('click', (e) => {
                if (e.target.classList.contains('back-arrow') && currentStep === 2) {
                    showStep(1);
                }
            });


            // Guest Email Visibility Toggle
            const addGuestSelect = document.getElementById('add-guest-select');
            const guestEmailContainer = document.getElementById('guest-email-container');
            const guestEmailsTextarea = document.getElementById('guest-emails');
            
            addGuestSelect.addEventListener('change', (e) => {
                guestEmailContainer.style.display = e.target.value === 'yes' ? 'flex' : 'none';
                if (e.target.value === 'yes') {
                    guestEmailsTextarea.required = true;
                } else {
                    guestEmailsTextarea.required = false;
                }
            });
            
            // Form Submission (Final Step)
            form.addEventListener('submit', async function (e) {
                e.preventDefault();
                
                // Client-side validation for Step 2
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const sectorChecked = document.querySelectorAll('input[name="sector[]"]:checked').length > 0;
                const serviceChecked = document.querySelectorAll('input[name="service[]"]:checked').length > 0;
                const budgetChecked = document.querySelector('input[name="budget"]:checked')?.value;

                if (!name || !email || !sectorChecked || !serviceChecked || !budgetChecked) {
                    alert('Please fill out all required fields (Name, Email, Sector, Service, and Monthly Budget).');
                    return;
                }
                
                // Get data from checkboxes and radio buttons
                const getCheckedValues = (name) => Array.from(document.querySelectorAll(`input[name="${name}"]:checked`)).map(input => input.value);
                const getRadioValue = (name) => document.querySelector(`input[name="${name}"]:checked`)?.value;

                // Prepare data object for PHP submission
                const formData = {
                    selectedDate: selectedDate,
                    selectedTime: selectedTime,
                    selectedTimeZone: selectedTimeZone,
                    name: name,
                    email: email,
                    guest_emails: guestEmailsTextarea.required ? guestEmailsTextarea.value : '',
                    telegram: document.getElementById('telegram').value,
                    website: document.getElementById('website').value,
                    sector: getCheckedValues('sector[]'), // Note the array notation here
                    service: getCheckedValues('service[]'), // Note the array notation here
                    budget: getRadioValue('budget'),
                    additional_info: document.getElementById('additional_info').value,
                };

                // Show a simple loading indicator
                const submitButton = document.querySelector('.submit-button');
                const originalText = submitButton.textContent;
                submitButton.textContent = 'Submitting...';
                submitButton.disabled = true;

                try {
                    const response = await fetch('submit-booking.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(formData)
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Success response
                        const formattedDate = selectedDate ? new Date(selectedDate).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : 'an unspecified date';
                        
                        document.getElementById('summaryText').innerHTML = `
                            Your **30-minute Discovery Call** is confirmed for:<br>
                            **${formattedDate} at ${selectedTime} (${selectedTimeZone}).**<br>
                            A confirmation email will be sent to **${email}**.
                        `;
                        showStep(3);
                    } else {
                        // Error response from PHP script
                        alert('Submission Failed: ' + result.message);
                    }

                } catch (error) {
                    // Network or parsing error
                    alert('An unexpected error occurred. Please try again.');
                    console.error('Submission Error:', error);
                } finally {
                    // Restore button state
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                }
            });


            /* ------------------------------------
               CALENDAR & TIME ZONE LOGIC
            ------------------------------------ */
            const today = new Date();
            let currentCalendarDate = new Date(today.getFullYear(), today.getMonth(), 1); 

            function convertTimeToSelectedTZ(timeStr, baseOffset, targetOffset) {
                const [time, period] = timeStr.split(' ');
                let [hours, minutes] = time.split(':').map(Number);
                if (period === 'PM' && hours !== 12) hours += 12;
                if (period === 'AM' && hours === 12) hours = 0;

                const timeDiffMinutes = targetOffset - baseOffset;
                const totalMinutes = hours * 60 + minutes + timeDiffMinutes;
                
                let newHours = Math.floor(totalMinutes / 60) % 24;
                let newMinutes = totalMinutes % 60;
                
                if (newHours < 0) newHours += 24; 
                
                const newPeriod = newHours >= 12 ? 'PM' : 'AM';
                newHours = newHours % 12;
                if (newHours === 0) newHours = 12;

                const newMinutesStr = newMinutes < 10 ? '0' + newMinutes : newMinutes;
                
                return `${newHours}:${newMinutesStr} ${newPeriod}`;
            }
            
            function renderTimeSlots() {
                const slotsGrid = document.getElementById('timeSlotsGrid');
                slotsGrid.innerHTML = '';
                
                if (!selectedDate) {
                    slotsGrid.innerHTML = '<p style="text-align: center; color: #666;">Select a date to see times.</p>';
                    step1NextButton.disabled = true;
                    return;
                }
                
                const baseOffset = timeZoneOffsets['UTC+1']; 
                const targetOffset = timeZoneOffsets[selectedTimeZone]; 

                baseTimeSlots.forEach(baseTime => {
                    const convertedTime = convertTimeToSelectedTZ(baseTime, baseOffset, targetOffset);
                    const isSelected = (selectedTime === convertedTime);
                    
                    const [hours, period] = convertedTime.split(' ');
                    let h = parseInt(hours.split(':')[0]);
                    if (period === 'PM' && h !== 12) h += 12;
                    if (period === 'AM' && h === 12) h = 0;
                    
                    const isAvailable = h >= 9 && h <= 18; 

                    slotsGrid.insertAdjacentHTML('beforeend',
                        `<div class="time-slot ${isSelected ? 'selected' : ''} ${isAvailable ? '' : 'disabled'}" data-time="${convertedTime}">
                            ${convertedTime}
                        </div>`
                    );
                });
                
                if (!document.querySelector('.time-slot.selected')) {
                    selectedTime = null;
                }
                step1NextButton.disabled = !selectedTime;
            }
            
            function renderCalendar() {
                const year = currentCalendarDate.getFullYear();
                const month = currentCalendarDate.getMonth();
                const monthName = currentCalendarDate.toLocaleString('en-US', { month: 'long' });
                document.getElementById('currentMonthYear').textContent = `${monthName} ${year}`;

                const calendarGrid = document.getElementById('calendarGrid');
                calendarGrid.innerHTML = `
                    <div class="day-name">Sun</div><div class="day-name">Mon</div><div class="day-name">Tue</div>
                    <div class="day-name">Wed</div><div class="day-name">Thu</div><div class="day-name">Fri</div>
                    <div class="day-name">Sat</div>
                `;

                const firstDayOfMonth = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const todayMidnight = new Date(today.getFullYear(), today.getMonth(), today.getDate()).getTime();

                for (let i = 0; i < firstDayOfMonth; i++) {
                    calendarGrid.insertAdjacentHTML('beforeend', '<div class="date-cell disabled"></div>');
                }

                for (let day = 1; day <= daysInMonth; day++) {
                    const date = new Date(year, month, day);
                    const isToday = date.toDateString() === today.toDateString();
                    const isDisabled = date.getTime() < todayMidnight; 
                    
                    let classes = 'date-cell';
                    if (isDisabled) classes += ' disabled';
                    if (isToday) classes += ' today';
                    if (selectedDate && date.toDateString() === new Date(selectedDate).toDateString()) classes += ' selected';

                    calendarGrid.insertAdjacentHTML('beforeend',
                        `<div class="${classes}" data-date="${date.toISOString()}">${day}</div>`
                    );
                }

                document.getElementById('prevMonthBtn').disabled = (currentCalendarDate.getMonth() === today.getMonth() && currentCalendarDate.getFullYear() === today.getFullYear());
            }

            // Event Listeners for Calendar Navigation
            document.getElementById('prevMonthBtn').addEventListener('click', () => {
                if (!document.getElementById('prevMonthBtn').disabled) {
                    currentCalendarDate.setMonth(currentCalendarDate.getMonth() - 1);
                    renderCalendar();
                }
            });

            document.getElementById('nextMonthBtn').addEventListener('click', () => {
                currentCalendarDate.setMonth(currentCalendarDate.getMonth() + 1);
                renderCalendar();
            });

            // Event Listener for Time Zone Change
            document.getElementById('timezone-select').addEventListener('change', (e) => {
                selectedTimeZone = e.target.value;
                document.getElementById('selected-tz').textContent = selectedTimeZone;
                selectedTime = null; 
                renderTimeSlots();
            });

            // Event Listener for Date Selection
            document.getElementById('calendarGrid').addEventListener('click', (e) => {
                if (e.target.classList.contains('date-cell') && !e.target.classList.contains('disabled')) {
                    document.querySelectorAll('.date-cell.selected').forEach(c => c.classList.remove('selected'));
                    e.target.classList.add('selected');
                    selectedDate = e.target.dataset.date;
                    selectedTime = null; 
                    renderTimeSlots();
                }
            });

            // Event Listener for Time Slot Selection
            document.getElementById('timeSlotsGrid').addEventListener('click', (e) => {
                if (e.target.classList.contains('time-slot') && !e.target.classList.contains('disabled')) {
                    document.querySelectorAll('.time-slot.selected').forEach(t => t.classList.remove('selected'));
                    e.target.classList.add('selected');
                    selectedTime = e.target.dataset.time;
                    step1NextButton.disabled = false;
                }
            });

            // Initial render
            document.getElementById('selected-tz').textContent = selectedTimeZone;
            renderCalendar();
            renderTimeSlots();
        });
    </script>
</body>

</html>