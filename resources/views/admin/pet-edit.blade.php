    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Account - Pawmilya</title>
        <link rel="stylesheet" href="{{ asset('css/user-account.css') }}">
        <link rel="icon" href="{{ asset('imgs/paw.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>

    <body>
        <div class="account-container">
            <div class="account-header" style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h1><i class="fas fa-user-circle"></i> Edit Account</h1>
                    <p>Update your personal information</p>
                </div>
            </div>

            <div class="account-content">
                <form method="POST" action="{{ route('admin.update-pet', ['pet' => $pet->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- You need this line -->

                    <div class="profile-section">
                        <div class="basic-info">
                            <h2>{{ $pet->name }}</h2>
                            <p class="user-id">Pet ID: {{ $pet->id }}</p>
                            <div class="account-status">
                                <span class="status-badge active"><i class="fas fa-paw"></i>
                                    {{ ucfirst($pet->status) }}</span>
                                <span class="member-since">Listed since: {{ $pet->created_at }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="details-section">
                        <div class="details-grid">
                            <div class="detail-group">
                                <label for="name">Pet Name</label>
                                <input type="text" id="name" name="name" value="{{ $pet->name }}"
                                    required>
                            </div>

                            <div class="detail-group">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" id="birth_date" name="birth_date"
                                    value="{{ \Carbon\Carbon::parse($pet->birth_date)->format('Y-m-d') }}" required>
                            </div>

                            <div class="detail-group">
                                <label for="pet-type">Type</label>
                                <select id="petType" name="type" class="form-control" required>
                                    <option value="" disabled>Select Pet Type</option>
                                    <option value="dog" {{ $pet->type == 'dog' ? 'selected' : '' }}>Dog</option>
                                    <option value="cat" {{ $pet->type == 'cat' ? 'selected' : '' }}>Cat</option>
                                    <option value="exotic" {{ $pet->type == 'exotic' ? 'selected' : '' }}>Exotic
                                    </option>
                                    <option value="special_needs"
                                        {{ $pet->type == 'special_needs' ? 'selected' : '' }}>Special Needs</option>
                                </select>
                            </div>


                            <div class="detail-group">
                                <label for="pet-breed">Breed</label>
                                <select id="petBreed" name="breed" class="form-control" required>
                                    <option value="" disabled>Select Breed</option>

                                    <!-- Dog Breeds -->
                                    <option data-type="dog" value="labrador"
                                        {{ $pet->breed == 'labrador' ? 'selected' : '' }}>Labrador</option>
                                    <option data-type="dog" value="poodle"
                                        {{ $pet->breed == 'poodle' ? 'selected' : '' }}>Poodle</option>
                                    <option data-type="dog" value="beagle"
                                        {{ $pet->breed == 'beagle' ? 'selected' : '' }}>Beagle</option>
                                    <option data-type="dog" value="bulldog"
                                        {{ $pet->breed == 'bulldog' ? 'selected' : '' }}>Bulldog</option>
                                    <option data-type="dog" value="shih_tzu"
                                        {{ $pet->breed == 'shih_tzu' ? 'selected' : '' }}>Shih Tzu</option>
                                    <option data-type="dog" value="german_shepherd"
                                        {{ $pet->breed == 'german_shepherd' ? 'selected' : '' }}>German Shepherd
                                    </option>
                                    <option data-type="dog" value="golden_retriever"
                                        {{ $pet->breed == 'golden_retriever' ? 'selected' : '' }}>Golden Retriever
                                    </option>

                                    <!-- Cat Breeds -->
                                    <option data-type="cat" value="persian"
                                        {{ $pet->breed == 'persian' ? 'selected' : '' }}>Persian</option>
                                    <option data-type="cat" value="siamese"
                                        {{ $pet->breed == 'siamese' ? 'selected' : '' }}>Siamese</option>
                                    <option data-type="cat" value="maine_coon"
                                        {{ $pet->breed == 'maine_coon' ? 'selected' : '' }}>Maine Coon</option>
                                    <option data-type="cat" value="bengal"
                                        {{ $pet->breed == 'bengal' ? 'selected' : '' }}>Bengal</option>
                                    <option data-type="cat" value="ragdoll"
                                        {{ $pet->breed == 'ragdoll' ? 'selected' : '' }}>Ragdoll</option>
                                    <option data-type="cat" value="scottish_fold"
                                        {{ $pet->breed == 'scottish_fold' ? 'selected' : '' }}>Scottish Fold</option>
                                    <option data-type="cat" value="british_shorthair"
                                        {{ $pet->breed == 'british_shorthair' ? 'selected' : '' }}>British Shorthair
                                    </option>

                                    <!-- Exotic Breeds -->
                                    <option data-type="exotic" value="macaw"
                                        {{ $pet->breed == 'macaw' ? 'selected' : '' }}>Macaw</option>
                                    <option data-type="exotic" value="ball_python"
                                        {{ $pet->breed == 'ball_python' ? 'selected' : '' }}>Ball Python</option>
                                    <option data-type="exotic" value="leopard_gecko"
                                        {{ $pet->breed == 'leopard_gecko' ? 'selected' : '' }}>Leopard Gecko</option>
                                    <option data-type="exotic" value="iguana"
                                        {{ $pet->breed == 'iguana' ? 'selected' : '' }}>Iguana</option>
                                    <option data-type="exotic" value="chameleon"
                                        {{ $pet->breed == 'chameleon' ? 'selected' : '' }}>Chameleon</option>
                                    <option data-type="exotic" value="hedgehog"
                                        {{ $pet->breed == 'hedgehog' ? 'selected' : '' }}>Hedgehog</option>
                                    <option data-type="exotic" value="fennec_fox"
                                        {{ $pet->breed == 'fennec_fox' ? 'selected' : '' }}>Fennec Fox</option>
                                    <option data-type="exotic" value="sugar_glider"
                                        {{ $pet->breed == 'sugar_glider' ? 'selected' : '' }}>Sugar Glider</option>
                                    <option data-type="exotic" value="turtle"
                                        {{ $pet->breed == 'turtle' ? 'selected' : '' }}>Turtle</option>
                                    <option data-type="exotic" value="axolotl"
                                        {{ $pet->breed == 'axolotl' ? 'selected' : '' }}>Axolotl</option>
                                    <option data-type="exotic" value="african_grey-parrot"
                                        {{ $pet->breed == 'african_grey-parrot' ? 'selected' : '' }}>African Grey
                                        Parrot</option>
                                    <option data-type="exotic" value="ferret"
                                        {{ $pet->breed == 'ferret' ? 'selected' : '' }}>Ferret</option>
                                    <option data-type="exotic" value="exotic_fish"
                                        {{ $pet->breed == 'exotic_fish' ? 'selected' : '' }}>Exotic Fish</option>
                                </select>
                            </div>


                            <div class="detail-group">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" required>
                                    <option value="male" {{ $pet->gender == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female" {{ $pet->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>

                            <div class="detail-group">
                                <label for="height">Height (cm)</label>
                                <input type="text" step="0.01" id="height" name="height"
                                    value="{{ $pet->height }}">
                            </div>

                            <div class="detail-group">
                                <label for="weight">Weight (lbs)</label>
                                <input type="text" step="0.01" id="weight" name="weight"
                                    value="{{ $pet->weight }}">
                            </div>

                            <div class="detail-group">
                                <label for="temperament">Temperament</label>
                                <input type="text" id="temperament" name="temperament"
                                    value="{{ $pet->temperament }}">
                            </div>

                            <div class="detail-group">
                                <label for="good_with">Good With</label>
                                <input type="text" id="good_with" name="good_with"
                                    value="{{ $pet->good_with }}">
                            </div>

                            <div class="detail-group">
                                <label for="spayed_neutered_status">Spayed/Neutered</label>
                                <select id="spayed_neutered_status" name="spayed_neutered_status" required>
                                    <option value="yes"
                                        {{ $pet->spayed_neutered_status == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no"
                                        {{ $pet->spayed_neutered_status == 'no' ? 'selected' : '' }}>No</option>
                                    <option value="unknown"
                                        {{ $pet->spayed_neutered_status == 'unknown' ? 'selected' : '' }}>Unknown
                                    </option>
                                </select>
                            </div>

                            <div class="detail-group">
                                <label for="vaccination_status">Vaccination Status</label>
                                <select id="vaccination_status" name="vaccination_status" required>
                                    <option value="up_to_date"
                                        {{ $pet->vaccination_status == 'vaccinated' ? 'selected' : '' }}>Vaccinated
                                    </option>
                                    <option value="not_vaccinated"
                                        {{ $pet->vaccination_status == 'not_vaccinated' ? 'selected' : '' }}>Not
                                        Vaccinated</option>

                                </select>
                            </div>

                            <div class="detail-group">
                                <label for="existing_conditions">Existing Conditions</label>
                                <input type="text" id="existing_conditions" name="existing_conditions"
                                    value="{{ $pet->existing_conditions }}">
                            </div>





                            <div class="detail-group full-width">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" rows="3"
                                    value="{{ $pet->description }}">
                            </div>

                            <div class="detail-group">
                                <label for="status">Adoption Status</label>
                                <select id="status" name="status" required>
                                    <option value="available" {{ $pet->status == 'available' ? 'selected' : '' }}>
                                        Available</option>
                                    <option value="adopted" {{ $pet->status == 'adopted' ? 'selected' : '' }}>Adopted
                                    </option>
                                    <option value="pending" {{ $pet->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                </select>
                            </div>



                        </div>
                    </div>

                    <div class="account-actions">
                        <a href="{{ url()->previous() }}" class="btn btn-cancel"
                            style="background-color: #ccc; color: #333; text-decoration: none; padding: 0.5rem 1rem; border-radius: 4px;">
                            <i class="fas fa-times"></i> Cancel
                        </a>

                        <button type="submit" class="btn btn-edit">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </form>


                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 1.2rem;">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </body>

    </html>
