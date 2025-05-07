<x-customer-layout>

    @section('title', 'Our Services - Pawmilya')


    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    @endpush



    <main>
        <section class="services-hero">
            <div class="services-hero-content">
                <h1>Our Professional Pet Services</h1>
                <p>Comprehensive care for your furry family members</p>
            </div>
        </section>

        <section class="services-container">
            <div class="services-intro">
                <h2>Exceptional Care for Your Pets</h2>
                <p>At Pawmilya, we offer a full range of services to keep your pets healthy, happy, and looking their
                    best. Our experienced team provides compassionate care with your pet's wellbeing as our top
                    priority.</p>
            </div>

            <div class="services-grid">
                <!-- Services -->
                @foreach ($services as $service)
                    <div class="service-card" data-name="{{ $service->name }}" data-schedule="{{ $service->schedule }}"
                        data-duration="{{ $service->duration }}" data-description="{{ $service->description }}"
                        data-price="{{ $service->price }}" data-image="{{ $service->image }}">
                        <div class="service-image">
                            <!-- Display the image dynamically from the database -->
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }} Image">
                        </div>
                        <div class="service-info">
                            <h3>{{ $service->name }}</h3>
                            <p><i class="fas fa-clock"></i> {{ $service->schedule }}</p>
                            <p><i class="fas fa-stopwatch"></i> {{ $service->duration }} minutes</p>
                            <div class="tags">
                                <span class="price-tag">Php {{ number_format($service->price, 2) }}</span>
                            </div>
                            <!-- Description, Price, and Additional Info in the card -->
                            <div class="service-details">
                                <div class="detail-row">
                                    <div class="detail-value">{{ ucfirst($service->description) }}</div>
                                </div>
                            </div>
                            <a href="{{ route('client.service-form', ['id' => $service->service_id]) }}">
                                <button class="btn btn-primary book-now">Book Now</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="service-cta">
                <h2>Ready to Schedule a Service?</h2>
                <p>Contact us today to book an appointment or learn more about our offerings.</p>
                <div class="cta-buttons">
                    <a href="#" class="service-btn">Call Now</a>

                    <a href="mailto:services@pawmilya.org" class="cta-btn email">Email Us</a>
                </div>
            </div>
        </section>

        <script>
            // View details functionality
            document.querySelectorAll('.view-details').forEach(button => {
                button.addEventListener('click', function() {
                    const serviceId = this.getAttribute('data-service');
                    const details = document.getElementById(`service-details-${serviceId}`);

                    // Toggle the details display
                    details.classList.toggle('active');

                    // Change button text
                    this.textContent = details.classList.contains('active') ? 'Hide Details' : 'View Details';
                });
            });
        </script>
    </main>

</x-customer-layout>
