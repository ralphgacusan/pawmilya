<x-customer-layout>

    @section('title', 'Browse Pets - Pawmilya')

    @push('styles')
        @vite(['resources/css/pet.css', 'resources/css/about.css'])
    @endpush

    <!-- Pets Browsing Section -->
    <section class="section pets-browsing">
        <div class="container">
            <h1><i class="fas fa-paw"></i> Find Your Perfect Companion</h1>
            <p class="subtitle">Browse our available dogs and cats waiting for their forever homes</p>

            <!-- Pet Type Tabs -->
            <div class="pet-tabs">
                <div class="pet-tab active" data-tab="all">All Pets</div>
                <div class="pet-tab" data-tab="dogs">Dogs</div>
                <div class="pet-tab" data-tab="cats">Cats</div>
                <div class="pet-tab" data-tab="special">Exotic Pets</div>
                <div class="pet-tab" data-tab="special">Special Needs</div>
            </div>

            <!-- Filter Form -->
            <div class="pet-filter">
                <h3><i class="fas fa-filter"></i> Filter Pets</h3>
                <form id="petFilterForm">
                    <div class="filter-row">
                        <div class="filter-group">
                            <label for="petType">Pet Type</label>
                            <select id="petType" name="petType">
                                <option value="all">All Pets</option>
                                <option value="dog">Dogs</option>
                                <option value="cat">Cats</option>
                                <option value="cat">Exotic</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="breed">Breed</label>
                            <select id="breed" name="breed">
                                <option value="all">All Breeds</option>
                                <optgroup label="Dogs" id="dog-breeds">
                                    <option value="labrador">Labrador</option>
                                    <option value="poodle">Poodle</option>
                                    <option value="beagle">Beagle</option>
                                    <option value="bulldog">Bulldog</option>
                                    <option value="shih-tzu">Shih Tzu</option>
                                    <option value="german-shepherd">German Shepherd</option>
                                    <option value="golden-retriever">Golden Retriever</option>
                                </optgroup>
                                <optgroup label="Cats" id="cat-breeds">
                                    <option value="persian">Persian</option>
                                    <option value="siamese">Siamese</option>
                                    <option value="maine-coon">Maine Coon</option>
                                    <option value="bengal">Bengal</option>
                                    <option value="ragdoll">Ragdoll</option>
                                    <option value="scottish-fold">Scottish Fold</option>
                                    <option value="british-shorthair">British Shorthair</option>
                                </optgroup>
                                <optgroup label="Exotic Pets" id="exotic-pets">
                                    <option value="macaw">Macaw</option>
                                    <option value="ball-python">Ball Python</option>
                                    <option value="leopard-gecko">Leopard Gecko</option>
                                    <option value="iguana">Iguana</option>
                                    <option value="chameleon">Chameleon</option>
                                    <option value="hedgehog">Hedgehog</option>
                                    <option value="fennec-fox">Fennec Fox</option>
                                    <option value="sugar-glider">Sugar Glider</option>
                                    <option value="turtle">Turtle</option>
                                    <option value="axolotl">Axolotl</option>
                                    <option value="african-grey-parrot">African Grey Parrot</option>
                                    <option value="ferret">Ferret</option>
                                    <option value="exotic-fish">Exotic Fish</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="age">Age</label>
                            <select id="age" name="age">
                                <option value="all">Any Age</option>
                                <option value="puppy-kitten">Puppy/Kitten (0-1 year)</option>
                                <option value="young">Young (1-3 years)</option>
                                <option value="adult">Adult (3-8 years)</option>
                                <option value="senior">Senior (8+ years)</option>
                            </select>
                        </div>
                    </div>

                    <div class="filter-row">
                        <div class="filter-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender">
                                <option value="all">Any Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="size">Size (Dogs)</label>
                            <select id="size" name="size">
                                <option value="all">Any Size</option>
                                <option value="small">Small (0-20 lbs)</option>
                                <option value="medium">Medium (20-50 lbs)</option>
                                <option value="large">Large (50+ lbs)</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label for="special-needs">Special Needs</label>
                            <select id="special-needs" name="special-needs">
                                <option value="all">All Pets</option>
                                <option value="yes">Special Needs Only</option>
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
                                <div class="detail-label">Description:</div>
                                <div class="detail-value">{{ ucfirst($pet->description) }}</div>
                            </div>

                            <div class="pets-button-group">
                                <a href="{{ route('client.adopt-form') }}">
                                    <button class="btn btn-secondary">Apply to Adopt</button>
                                </a>
                                <a href="{{ route('client.specific-pet') }}">
                                    <button class="btn btn-primary" data-pet="{{ $pet->id }}">View More</button>
                                </a>
                            </div>



                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>

</x-customer-layout>
