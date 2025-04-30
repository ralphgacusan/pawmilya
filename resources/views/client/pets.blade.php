<x-customer-layout>

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
                <div class="pet-card" data-type="dog" data-breed="labrador" data-age="young" data-gender="male"
                    data-size="large" data-special="no">
                    <div class="pet-image">
                        <img src="/Asset/dog1.png" alt="Buddy">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Buddy <span class="pet-type">Dog</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 2 years old</p>
                        <div class="tags">
                            <span class="breed-tag">Pug</span>
                            <span class="size-tag">Small</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="1">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-1" style="display: none;">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">Labrador Retriever</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Male</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Size:</div>
                            <div class="detail-value">Large (65 lbs)</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Friendly, Outgoing, Active</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Kids, Dogs, Cats</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Buddy is a playful and energetic lab who loves fetch and
                                swimming. He's house-trained and knows basic commands.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>

                <!-- Dog 2 (Special Needs) -->
                <div class="pet-card" data-type="dog" data-breed="poodle" data-age="adult" data-gender="female"
                    data-size="medium" data-special="yes">
                    <div class="pet-image">
                        <img src="/Asset/dog2.png" alt="Daisy">
                        <span class="pet-badge">Available</span>
                        <span class="special-needs-badge">Special Needs</span>
                    </div>
                    <div class="pet-info">
                        <h3>Daisy <span class="pet-type">Dog</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 5 years old</p>
                        <div class="tags">
                            <span class="breed-tag">Dogue de Bourdeaux</span>
                            <span class="size-tag">Large</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="2">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-2">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">Standard Poodle</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Female</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Size:</div>
                            <div class="detail-value">Medium (40 lbs)</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Special Needs:</div>
                            <div class="detail-value">Requires daily medication for thyroid condition</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Gentle, Intelligent, Calm</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Kids, Dogs, Cats</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Daisy is a sweet senior poodle who was surrendered when her owner
                                passed away. She's well-trained and loves cuddles.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>

                <!-- Dog 3 (New Breed) -->
                <div class="pet-card" data-type="dog" data-breed="german-shepherd" data-age="adult"
                    data-gender="male" data-size="large" data-special="no">
                    <div class="pet-image">
                        <img src="/Asset/dog3.png" alt="Rex ">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Rex <span class="pet-type">Dog</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 3 years old</p>
                        <div class="tags">
                            <span class="breed-tag">American Eskimo</span>
                            <span class="size-tag">Small</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="3">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-3">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">German Shepherd</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Male</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Size:</div>
                            <div class="detail-value">Large (75 lbs)</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Loyal, Intelligent, Protective</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Kids, Dogs</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Rex is a trained German Shepherd who would make an excellent
                                companion or guard dog. He knows advanced commands and loves to work.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>

                <!-- Cat 1 -->
                <div class="pet-card" data-type="cat" data-breed="siamese" data-age="young" data-gender="male"
                    data-special="no">
                    <div class="pet-image">
                        <img src="/Asset/cat1.jpg" alt="Oliver the Siamese">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Oliver <span class="pet-type">Cat</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 1.5 years old</p>
                        <div class="tags">
                            <span class="breed-tag">Siamese</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="4">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-4">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">Siamese</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Male</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Vocal, Affectionate, Playful</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Kids, Cats</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Oliver is a talkative Siamese who loves attention. He enjoys
                                playing with feather toys and sitting in sunny spots.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>

                <!-- Cat 2 (Special Needs) -->
                <div class="pet-card" data-type="cat" data-breed="persian" data-age="senior" data-gender="female"
                    data-special="yes">
                    <div class="pet-image">
                        <img src="/Asset/cat2.png" alt="Mittens the Persian">
                        <span class="pet-badge">Available</span>
                        <span class="special-needs-badge">Special Needs</span>
                    </div>
                    <div class="pet-info">
                        <h3>Mittens <span class="pet-type">Cat</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 10 years old</p>
                        <div class="tags">
                            <span class="breed-tag">Persian</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="5">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-5">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">Persian</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Female</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Special Needs:</div>
                            <div class="detail-value">Requires daily grooming and has mild arthritis</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Calm, Gentle, Affectionate</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Quiet households</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Mittens is a sweet senior Persian who was surrendered when her
                                owner moved overseas. She prefers a quiet home without small children.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>

                <!-- Cat 3 (New Breed) -->
                <div class="pet-card" data-type="cat" data-breed="scottish-fold" data-age="young"
                    data-gender="female" data-special="no">
                    <div class="pet-image">
                        <img src="/Asset/cat3.png" alt="Luna the Scottish Fold">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Luna <span class="pet-type">Cat</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 1 year old</p>
                        <div class="tags">
                            <span class="breed-tag">Scottish Fold</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="6">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-6">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">Scottish Fold</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Female</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Sweet, Playful, Adaptable</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Kids, Dogs, Cats</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Luna is a friendly Scottish Fold who enjoys cuddles and playing
                                with other pets. She has a calm demeanor but loves interactive play.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>
                <!--Chromeranz-->
                <div class="pet-card" data-type="Exotic" data-breed="bearded-dragon" data-age="young"
                    data-gender="male" data-size="large" data-special="no">
                    <div class="pet-image">
                        <img src="/Asset/pet1.png" alt="Chrome">
                        <span class="pet-badge">Available</span>
                    </div>
                    <div class="pet-info">
                        <h3>Chromeranz <span class="pet-type">Blue Iguana</span></h3>
                        <p><i class="fas fa-birthday-cake"></i> 2 years old</p>
                        <div class="tags">
                            <span class="breed-tag">Lizard</span>
                            <span class="size-tag">Small</span>
                        </div>
                        <br>
                        <button class="btn btn-primary view-details" data-pet="1">View Details</button>
                    </div>

                    <div class="pet-details" id="pet-details-1" style="display: none;">
                        <div class="detail-row">
                            <div class="detail-label">Breed:</div>
                            <div class="detail-value">Blue Iguana </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Gender:</div>
                            <div class="detail-value">Male</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Size:</div>
                            <div class="detail-value">Large (65 lbs)</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Temperament:</div>
                            <div class="detail-value">Friendly, Outgoing, Active</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Good with:</div>
                            <div class="detail-value">Kids, Dogs, Cats</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">Buddy is a playful and energetic lab who loves fetch and
                                swimming. He's house-trained and knows basic commands.</div>
                        </div>
                        <a href="/Webpages/adoptform.html">
                            <button class="btn btn-secondary" style="margin-top: 15px;">Apply to Adopt</button>
                        </a>
                    </div>
                </div>
    </section>

</x-customer-layout>
