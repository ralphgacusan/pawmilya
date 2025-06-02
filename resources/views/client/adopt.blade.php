<x-customer-layout>

    @section('title', 'Adopt a Pet - Pawmilya')


    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/adopt.css') }}">
        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    @endpush

    <!-- Adoption Page Hero -->
    <section class="page-hero adopt-hero">
        <div class="herocontainer">
            <h1>Find your new friend here!</h1>
            <p class="subtitle">Browse our available pets waiting for their forever homes</p>
        </div>
    </section>

    <!-- Available Pets Section -->
    <section class="section pets-section">
        <div class="container">
            <h2><i class="fas fa-paw"></i> Available Pets</h2>
            <div class="pets-grid">
                @foreach ($pets as $pet)
                    <div class="pet-card">
                        <div class="pet-image">
                            <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}">
                            <span class="pet-badge">Available</span>
                        </div>
                        <div class="pet-info">
                            <h3>{{ $pet->name }}</h3>
                            <p>{{ ucfirst(str_replace('_', ' ', $pet->type)) }} -
                                {{ ucfirst(str_replace('_', ' ', $pet->breed)) }}</p>

                            <a href="{{ route('client.adopt-form', ['id' => $pet->id]) }}">
                                <button class="btn btn-secondary">Adopt Me</button>
                            </a>

                        </div>
                    </div>
                @endforeach


            </div>
            <!-- Pagination links -->
            @if ($pets->hasPages())
                <div class="pagination-container">
                    <ul class="pagination">
                        @if ($pets->onFirstPage())
                            <li class="disabled"><span>&laquo;</span></li>
                        @else
                            <li><a href="{{ $pets->previousPageUrl() }}">&laquo;</a></li>
                        @endif

                        @foreach ($pets->getUrlRange(1, $pets->lastPage()) as $page => $url)
                            <li class="{{ $page == $pets->currentPage() ? 'active' : '' }}">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        @if ($pets->hasMorePages())
                            <li><a href="{{ $pets->nextPageUrl() }}">&raquo;</a></li>
                        @else
                            <li class="disabled"><span>&raquo;</span></li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </section>

    <!-- Adoption Process Section -->
    <section class="section process-section">
        <div class="container">
            <h2><i class="fas fa-question-circle"></i> Adoption FAQ</h2>
            <h3>How to adopt?</h3>

            <div class="process-steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Submit Application</h4>
                        <p>Complete our online adoption form with your details</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Zoom Interview</h4>
                        <p>We'll schedule a virtual meeting to discuss your application</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Shelter Visit</h4>
                        <p>Meet our animals in person at our facility</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Confirm Choice</h4>
                        <p>Visit your chosen pet to finalize your decision</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h4>Vet Clearance</h4>
                        <p>Wait for medical clearance and schedule pickup</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h4>Adoption Fee</h4>
                        <p>Pay the adoption fee (P500 for cats / P1000 for dogs)</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">7</div>
                    <div class="step-content">
                        <h4>Take Home</h4>
                        <p>Bring your new family member home!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Requirements Section -->
    <section class="section requirements-section">
        <div class="container">
            <h2><i class="fas fa-clipboard-check"></i> Adoption Requirements</h2>
            <div class="requirements-grid">
                <div class="requirement-card">
                    <i class="fas fa-id-card"></i>
                    <h4>Valid I.D.</h4>
                    <p>Government-issued identification</p>
                </div>

                <div class="requirement-card">
                    <i class="fas fa-phone"></i>
                    <h4>Contact Info</h4>
                    <p>Current address and phone number</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section class="section stories-section">
        <div class="container">
            <h2><i class="fas fa-heart"></i> Success Stories</h2>
            <div class="story-card">
                <div class="story-content">
                    <h3>Read Lee and Bacon's hopeful story here!</h3>
                    <p>Discover how this pair found their forever home through Pawmilya's adoption program.</p>
                    <a href="#" class="btn btn-secondary">Read Story</a>
                </div>

            </div>
        </div>
    </section>

</x-customer-layout>
