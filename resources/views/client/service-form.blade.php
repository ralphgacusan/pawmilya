<x-customer-layout>

    @section('title', 'Service Form - Pawmilya')

    @push('styles')
        @vite(['resources/css/about.css', 'resources/css/form.css'])
    @endpush

    <main class="main-content">
        <section class="form-hero">
            <div class="hero-content">
                <h1 class="hero-title">Service Application</h1>
                <p class="hero-subtitle">Only the best care for our furry friends!</p>
                <div class="progress-indicator">
                    <div class="progress-bar" style="width: 0%"></div>
                </div>
            </div>
        </section>

        <div class="form-container">
            <form id="bookServiceForm" class="rehoming-form" novalidate>

                <!-- SECTION 1: Service Info (Read-Only) -->
                <fieldset class="form-section">
                    <legend class="section-title">
                        <span class="section-number">1</span>
                        Service Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" id="serviceName" name="serviceName" class="form-input" readonly
                                value="Pet Grooming">
                        </div>

                        <div class="form-group">
                            <label for="serviceDuration" class="form-label">Duration</label>
                            <input type="text" id="serviceDuration" name="serviceDuration" class="form-input"
                                readonly value="45 minutes">
                        </div>

                        <div class="form-group">
                            <label for="serviceCost" class="form-label">Cost</label>
                            <input type="text" id="serviceCost" name="serviceCost" class="form-input" readonly
                                value="₱500">
                        </div>

                        <div class="form-group">
                            <label for="service_schedule" class="form-label">Schedule</label>
                            <input type="text" id="service_schedule" name="service_schedule" class="form-input"
                                readonly value="Monday to when">
                        </div>

                        <div class="form-group full-width">
                            <label for="serviceDescription" class="form-label">Description</label>
                            <textarea id="serviceDescription" name="serviceDescription" class="form-input" readonly rows="3">A relaxing grooming session including bath, haircut, and nail trimming.</textarea>
                        </div>
                    </div>
                </fieldset>

                <!-- SECTION 2: User Info (Read-Only) -->
                <fieldset class="form-section personal-info">
                    <legend class="section-title">
                        <span class="section-number">2</span>
                        Your Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name*</label>
                            <input type="text" id="fullName" name="fullName" class="form-input" value="John Doe"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" id="email" name="email" class="form-input"
                                value="your@email.com" readonly>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="tel" id="phone" name="phone" class="form-input" value="09123456789"
                                readonly>
                        </div>
                    </div>
                </fieldset>

                <!-- SECTION 3: Pet Info (Input Fields) -->
                <fieldset class="form-section pet-info">
                    <legend class="section-title">
                        <span class="section-number">3</span>
                        Pet Information
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="petName" class="form-label">Pet's Name*</label>
                            <input type="text" id="petName" name="petName" class="form-input" required
                                placeholder="Max">
                        </div>

                        <div class="form-group">
                            <label for="petType" class="form-label">Pet Type*</label>
                            <input type="text" id="petType" name="petType" class="form-input" required
                                placeholder="Dog">
                        </div>

                        <div class="form-group">
                            <label for="petBreed" class="form-label">Breed*</label>
                            <input type="text" id="petBreed" name="petBreed" class="form-input" required
                                placeholder="Labrador Mix">
                        </div>

                        <div class="form-group">
                            <label for="petSize" class="form-label">Size*</label>
                            <input type="text" id="petSize" name="petSize" class="form-input" required
                                placeholder="Medium">
                        </div>

                        <div class="form-group">
                            <label for="petAge" class="form-label">Age*</label>
                            <input type="text" id="petAge" name="petAge" class="form-input" required
                                placeholder="2 years">
                        </div>

                    </div>
                </fieldset>

                <!-- SECTION 4: Date & Time (Input Fields) -->
                <fieldset class="form-section">
                    <legend class="section-title">
                        <span class="section-number">4</span>
                        Desired Appointment Schedule
                    </legend>

                    <div class="form-grid">
                        <div class="form-group">
                            <label for="appointmentDate" class="form-label">Date*</label>
                            <input type="date" id="appointmentDate" name="appointmentDate" class="form-input"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="appointmentTime" class="form-label">Time*</label>
                            <input type="time" id="appointmentTime" name="appointmentTime" class="form-input"
                                required>
                        </div>
                    </div>
                </fieldset>

                <!-- Submit Button -->
                <div class="form-navigation">
                    <button type="submit" class="submit-btn">
                        <i class="icon-submit"></i> Submit Application
                    </button>
                </div>
            </form>
        </div>
    </main>

</x-customer-layout>
