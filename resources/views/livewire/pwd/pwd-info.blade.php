<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-700 dark:text-gray-200">Person with Disability Information</h1>
        <p class="text-sm text-gray-500 dark:text-gray-300">Comprehensive profile of the registered PWD</p>
        <hr class="my-4 border-gray-300">

        <div class="flex gap-2 ml-280">
            <a href="{{ route('pwd.member.edit', ['id' => $pwd->id]) }}"
               class="cursor-pointer px-3 py-2 ml- text-xs font-medium text-white bg-blue-700 rounded-lg shadow-sm hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Update
            </a>
            
        </div>
    </div>

    <!-- Profile Photo -->
    <div class="mb-6 ml-250">
        <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-blue-700">Profile Photo</label>
        @if ($pwd->image)
            <img src="{{ asset('storage/' . $pwd->image) }}" class="w-24 h-24 rounded-md object-cover border">
        @else
            <span class="text-gray-400 italic">No image uploaded</span>
        @endif
    </div>

    <!-- Personal Information -->
    <div class="grid md:grid-cols-2 gap-6 mb-6 bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow border">
        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Full Name</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->first_name }} {{ $pwd->middle_name }} {{ $pwd->last_name }} {{ $pwd->suffix }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Sex</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->sex }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Birthday</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->date_of_birth }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Civil Status</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->civil_status }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Email Address</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->email_address }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Mobile No.</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->mobile_no }}</p>
        </div>
    </div>

    <!-- Address Section -->
    <div class="grid md:grid-cols-2 gap-6 mb-6 bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow border">
        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Barangay</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->barangay }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Province</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->province }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">City / Municipality</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->city_municipality }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Street / House No.</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->house_no_street_name }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Region</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->region }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Landline</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->landline }}</p>
        </div>
    </div>

    <!-- Disability Information -->
    <div class="grid md:grid-cols-2 gap-6 mb-6 bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow border">
        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Type of Disability</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->type_of_disability }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Cause of Disability</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->cause_of_disability }}</p>
        </div>
    </div>

    <!-- Education and Employment -->
    <div class="grid md:grid-cols-2 gap-6 mb-6 bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow border">
        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Educational Attainment</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->educational_attainment }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Employment Status</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->employment_status }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Category of Employment</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->category_of_employment }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Nature of Employment</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->nature_of_employment }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Occupation</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->occupation }}</p>
        </div>
    </div>

    <!-- Other Details -->
    <div class="grid md:grid-cols-2 gap-6 mb-6 bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow border">
        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Blood Type</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->blood_type }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Organization Affiliated</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->organization_affiliated }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">ID Reference No.</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->id_reference_no }}</p>
        </div>
    </div>

    <!-- Parent Info -->
    <div class="grid md:grid-cols-2 gap-6 bg-gray-200 dark:bg-gray-800 p-6 rounded-lg shadow border">
        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Mother's Name</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->mothers_first_name }} {{ $pwd->mothers_middle_name }} {{ $pwd->mothers_last_name }}</p>
        </div>

        <div>
            <label class="text-gray-700 mb-1 dark:text-blue-700 text-sm font-medium">Father's Name</label>
            <p class="text-gray-700 dark:text-gray-300">{{ $pwd->fathers_first_name }} {{ $pwd->fathers_middle_name }} {{ $pwd->fathers_last_name }}</p>
        </div>
    </div>
    <div class="mt-6">
        <a href="{{ route('pwd.list') }}"
               class="cursor-pointer px-6 py-2 text-xs font-medium text-white bg-gray-700 rounded-lg shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:gray-blue-500 focus:ring-offset-2 transition-colors duration-200">
                Back
        </a>
    </div>
</div>
