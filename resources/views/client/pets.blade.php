<x-customer-layout>

    @section('title', 'Browse Pets - Pawmilya')

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/pet.css') }}">
        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    @endpush

    <!-- Pets Browsing Section -->
    <section class="section pets-browsing">
        <div class="container">
            <h1><i class="fas fa-paw"></i> Find Your Perfect Companion</h1>
            <p class="subtitle">Browse our available dogs and cats waiting for their forever homes</p>



            <!-- Filter Form -->
            <div class="pet-filter">
                <h3><i class="fas fa-filter"></i> Filter Pets</h3>
                <form id="petFilterForm" method="GET" action="{{ route('client.pets') }}">
                    <div class="filter-row">
                        <div class="filter-group">
                            <label for="petType">Pet Type</label>
                            <select id="petType" name="petType">
                                <option value="all"
                                    {{ old('petType', request('petType')) == 'all' ? 'selected' : '' }}>All Pets
                                </option>
                                <option value="dog"
                                    {{ old('petType', request('petType')) == 'dog' ? 'selected' : '' }}>Dogs</option>
                                <option value="cat"
                                    {{ old('petType', request('petType')) == 'cat' ? 'selected' : '' }}>Cats</option>
                                <option value="exotic"
                                    {{ old('petType', request('petType')) == 'exotic' ? 'selected' : '' }}>Exotic
                                </option>
                                <option value="special_needs"
                                    {{ old('petType', request('petType')) == 'special_needs' ? 'selected' : '' }}>
                                    Special Needs
                                </option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="breed">Breed</label>
                            <select id="breed" name="breed">
                                <option value="all" {{ old('breed', request('breed')) == 'all' ? 'selected' : '' }}>
                                    All Breeds</option>
                                <optgroup label="Dogs" id="dog-breeds">
                                    <option value="labrador"
                                        {{ old('breed', request('breed')) == 'labrador' ? 'selected' : '' }}>Labrador
                                    </option>
                                    <option value="poodle"
                                        {{ old('breed', request('breed')) == 'poodle' ? 'selected' : '' }}>Poodle
                                    </option>
                                    <option value="beagle"
                                        {{ old('breed', request('breed')) == 'beagle' ? 'selected' : '' }}>Beagle
                                    </option>
                                    <option value="bulldog"
                                        {{ old('breed', request('breed')) == 'bulldog' ? 'selected' : '' }}>Bulldog
                                    </option>
                                    <option value="shih_tzu"
                                        {{ old('breed', request('breed')) == 'shih_tzu' ? 'selected' : '' }}>Shih Tzu
                                    </option>
                                    <option value="german_shepherd"
                                        {{ old('breed', request('breed')) == 'german_shepherd' ? 'selected' : '' }}>
                                        German Shepherd</option>
                                    <option value="golden_retriever"
                                        {{ old('breed', request('breed')) == 'golden_retriever' ? 'selected' : '' }}>
                                        Golden Retriever</option>
                                </optgroup>
                                <optgroup label="Cats" id="cat-breeds">
                                    <option value="persian"
                                        {{ old('breed', request('breed')) == 'persian' ? 'selected' : '' }}>Persian
                                    </option>
                                    <option value="siamese"
                                        {{ old('breed', request('breed')) == 'siamese' ? 'selected' : '' }}>Siamese
                                    </option>
                                    <option value="maine_coon"
                                        {{ old('breed', request('breed')) == 'maine_coon' ? 'selected' : '' }}>Maine
                                        Coon</option>
                                    <option value="bengal"
                                        {{ old('breed', request('breed')) == 'bengal' ? 'selected' : '' }}>Bengal
                                    </option>
                                    <option value="ragdoll"
                                        {{ old('breed', request('breed')) == 'ragdoll' ? 'selected' : '' }}>Ragdoll
                                    </option>
                                    <option value="scottish_fold"
                                        {{ old('breed', request('breed')) == 'scottish_fold' ? 'selected' : '' }}>
                                        Scottish Fold</option>
                                    <option value="british_shorthair"
                                        {{ old('breed', request('breed')) == 'british_shorthair' ? 'selected' : '' }}>
                                        British Shorthair</option>
                                </optgroup>
                                <optgroup label="Exotic Pets" id="exotic-pets">
                                    <option value="macaw"
                                        {{ old('breed', request('breed')) == 'macaw' ? 'selected' : '' }}>Macaw
                                    </option>
                                    <option value="ball_python"
                                        {{ old('breed', request('breed')) == 'ball_python' ? 'selected' : '' }}>Ball
                                        Python</option>
                                    <option value="leopard_gecko"
                                        {{ old('breed', request('breed')) == 'leopard_gecko' ? 'selected' : '' }}>
                                        Leopard Gecko</option>
                                    <option value="iguana"
                                        {{ old('breed', request('breed')) == 'iguana' ? 'selected' : '' }}>Iguana
                                    </option>
                                    <option value="chameleon"
                                        {{ old('breed', request('breed')) == 'chameleon' ? 'selected' : '' }}>Chameleon
                                    </option>
                                    <option value="hedgehog"
                                        {{ old('breed', request('breed')) == 'hedgehog' ? 'selected' : '' }}>Hedgehog
                                    </option>
                                    <option value="fennec_fox"
                                        {{ old('breed', request('breed')) == 'fennec_fox' ? 'selected' : '' }}>Fennec
                                        Fox</option>
                                    <option value="sugar_glider"
                                        {{ old('breed', request('breed')) == 'sugar_glider' ? 'selected' : '' }}>Sugar
                                        Glider</option>
                                    <option value="turtle"
                                        {{ old('breed', request('breed')) == 'turtle' ? 'selected' : '' }}>Turtle
                                    </option>
                                    <option value="axolotl"
                                        {{ old('breed', request('breed')) == 'axolotl' ? 'selected' : '' }}>Axolotl
                                    </option>
                                    <option value="african_grey-parrot"
                                        {{ old('breed', request('breed')) == 'african_grey-parrot' ? 'selected' : '' }}>
                                        African Grey Parrot</option>
                                    <option value="ferret"
                                        {{ old('breed', request('breed')) == 'ferret' ? 'selected' : '' }}>Ferret
                                    </option>
                                    <option value="exotic_fish"
                                        {{ old('breed', request('breed')) == 'exotic_fish' ? 'selected' : '' }}>Exotic
                                        Fish</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender">
                                <option value="all"
                                    {{ old('gender', request('gender')) == 'all' ? 'selected' : '' }}>Any Gender
                                </option>
                                <option value="male"
                                    {{ old('gender', request('gender')) == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female"
                                    {{ old('gender', request('gender')) == 'female' ? 'selected' : '' }}>Female
                                </option>
                            </select>
                        </div>

                        <!-- New filter group for Oldest and Newest Pets -->
                        <div class="filter-group">
                            <label for="dateAdded">Date Listed for Adoption</label>
                            <select id="dateAdded" name="dateAdded">
                                <option value="all"
                                    {{ old('dateAdded', request('dateAdded')) == 'all' ? 'selected' : '' }}>Any Date
                                </option>
                                <option value="oldest"
                                    {{ old('dateAdded', request('dateAdded')) == 'oldest' ? 'selected' : '' }}>Oldest
                                    First</option>
                                <option value="newest"
                                    {{ old('dateAdded', request('dateAdded')) == 'newest' ? 'selected' : '' }}>Newest
                                    First</option>
                            </select>
                        </div>

                    </div>



                    <div class="filter-actions">
                        <button type="reset" class="btn btn-outline">Reset</button>
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
            </div>

            <!-- Pets Grid -->
            <div class="pets-grid">
                <!-- Dog 1 -->
                @foreach ($pets as $pet)
                    <div class="pet-card" data-type="{{ $pet->type }}" data-breed="{{ $pet->breed }}"
                        data-age="{{ $pet->age }}" data-gender="{{ $pet->gender }}"
                        data-size="{{ $pet->size }}" data-special="{{ $pet->special_needs }}">
                        <div class="pet-image">
                            <!-- Display the image dynamically from the database -->
                            <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }} Image">
                        </div>
                        <div class="pet-info">
                            <h3>{{ $pet->name }} <span class="pet-type">{{ ucfirst($pet->type) }}</span></h3>
                            <p><i class="fas fa-birthday-cake"></i> {{ \Carbon\Carbon::parse($pet->birth_date)->age }}
                                years old</p>
                            <div class="tags">
                                <span class="breed-tag">{{ ucfirst($pet->breed) }}</span>
                                <span class="size-tag">{{ ucfirst($pet->size) }}</span>
                            </div>
                            <br>
                            <button class="btn btn-primary view-details" data-pet="{{ $pet->id }}">View
                                Details</button>
                        </div>

                        <div class="pet-details" id="pet-details-{{ $pet->id }}" style="display: none;">
                            <div class="detail-row">
                                <div class="detail-label">Breed:</div>
                                <div class="detail-value">{{ ucfirst($pet->breed) }}</div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Gender:</div>
                                <div class="detail-value">{{ ucfirst($pet->gender) }}</div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Weight:</div>
                                <div class="detail-value">{{ ucfirst($pet->weight) }} lbs</div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Date listed for adoption:</div>
                                <div class="detail-value">{{ ucfirst($pet->created_at->format('F j, Y')) }}</div>
                            </div>
                            <div class="detail-row">
                                <div class="detail-label">Description:</div>
                                <div class="detail-value">{{ ucfirst($pet->description) }}</div>
                            </div>

                            <div class="pets-button-group">
                                <a href="{{ route('client.adopt-form', ['id' => $pet->id]) }}">
                                    <button class="btn btn-secondary">Apply to Adopt</button>
                                </a>
                                <a href="{{ route('client.specific-pet', ['id' => $pet->id]) }}">
                                    <button class="btn btn-primary" data-pet="{{ $pet->id }}">View More</button>
                                </a>
                            </div>



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
        <script>
            // Tab functionality
            document.querySelectorAll('.pet-tab').forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    document.querySelectorAll('.pet-tab').forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    this.classList.add('active');

                    const tabType = this.getAttribute('data-tab');
                    const pets = document.querySelectorAll('.pet-card');

                    pets.forEach(pet => {
                        if (tabType === 'all') {
                            pet.style.display = 'block';
                        } else if (tabType === 'dogs') {
                            pet.style.display = pet.getAttribute('data-type') === 'dog' ? 'block' :
                                'none';
                        } else if (tabType === 'cats') {
                            pet.style.display = pet.getAttribute('data-type') === 'cat' ? 'block' :
                                'none';
                        } else if (tabType === 'special') {
                            pet.style.display = pet.getAttribute('data-special') === 'yes' ? 'block' :
                                'none';
                        }
                    });
                });
            });





            // View details functionality
            document.querySelectorAll('.view-details').forEach(button => {
                button.addEventListener('click', function() {
                    const petId = this.getAttribute('data-pet');
                    const details = document.getElementById(`pet-details-${petId}`);

                    // Toggle the details display
                    details.classList.toggle('active');

                    // Change button text
                    this.textContent = details.classList.contains('active') ? 'Hide Details' : 'View Details';
                });
            });

            // Update breed options based on pet type
            document.getElementById('petType').addEventListener('change', function() {
                const petType = this.value;
                const breedSelect = document.getElementById('breed');

                if (petType === 'dog') {
                    document.getElementById('dog-breeds').style.display = 'block';
                    document.getElementById('cat-breeds').style.display = 'none';
                    breedSelect.value = 'all';
                } else if (petType === 'cat') {
                    document.getElementById('dog-breeds').style.display = 'none';
                    document.getElementById('cat-breeds').style.display = 'block';
                    breedSelect.value = 'all';
                } else {
                    document.getElementById('dog-breeds').style.display = 'block';
                    document.getElementById('cat-breeds').style.display = 'block';
                    breedSelect.value = 'all';
                }
            });

            // Get all "View Details" buttons
            const viewDetailsButtons = document.querySelectorAll('.view-details');

            // Add event listeners to each button
            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const petId = button.getAttribute('data-pet');
                    const petDetails = document.getElementById(`pet-details-${petId}`);

                    // Toggle the display of pet details
                    if (petDetails.style.display === 'none' || petDetails.style.display === '') {
                        petDetails.style.display = 'block';
                        button.textContent = 'Hide Details'; // Change button text when details are shown
                    } else {
                        petDetails.style.display = 'none';
                        button.textContent = 'View Details'; // Change button text back to original
                    }
                });
            });
        </script>

    </section>

</x-customer-layout>
