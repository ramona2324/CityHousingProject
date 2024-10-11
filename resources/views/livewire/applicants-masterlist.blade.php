<div>
    <div class="p-10 h-screen ml-[17%] mt-[60px]">
        <div x-data="{ openModal: false, openFilters: false}" class="flex bg-gray-100 text-[12px]">

            <!-- Main Content -->
            <div x-data="pagination()" class="flex-1 h-screen p-6 overflow-auto">

                <!-- Container for the Title -->
                <div class="bg-white rounded shadow mb-4 flex items-center justify-between z-0 relative p-3">
                    <div class="flex items-center">
                        <h2 class="text-[13px] ml-5 text-gray-700">MASTERLIST OF APPLICANTS</h2>
                    </div>
                    <img src="{{ asset('storage/images/design.png') }}" alt="Design" class="absolute right-0 top-0 h-full object-cover opacity-100 z-0">
                    <div x-data class="relative z-0">
                        <button class="bg-[#2B7A0B] text-white px-4 py-2 rounded">Export</button>
                    </div>
                </div>

                <!-- Search and Filters -->
                <div class="bg-white p-6 rounded shadow">
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <button @click="openFilters = !openFilters" class="flex space-x-2 items-center hover:bg-[#FF8100] py-2 px-4 rounded bg-[#FF9100]">
                                <div class="text-white">
                                    <!-- Filter Icon (You can use an icon from any library) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.447.894l-4 2.5A1 1 0 017 21V13.414L3.293 6.707A1 1 0 013 6V4z" />
                                    </svg>
                                </div>
                                <div class="text-[13px] text-white font-medium">
                                    Filter
                                </div>
                            </button>
                            <!-- Search -->
                            <div class="relative hidden md:block border-gray-300">
                                <svg class="absolute top-[13px] left-4" width="19" height="19" viewBox="0 0 21 21"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z"
                                          stroke="#787C7F" stroke-width="1.75" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    <path d="M18.3746 18.375L14.5684 14.5688" stroke="#787C7F" stroke-width="1.75"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <input type="search" name="search" id="search"
                                       class="rounded-md px-12 py-2 placeholder:text-[13px] z-10 border border-gray-300 bg-[#f7f7f9] hover:ring-custom-yellow focus:ring-custom-yellow"
                                       placeholder="Search">
                            </div>
                        </div>
                    </div>

                    <div x-show="openFilters" class="flex space-x-2 mb-1 mt-5">
                        <input type="date" id="start-date" class="border text-[13px] border-gray-300 rounded px-2 py-1">
                        <input type="date" id="end-date" class="border text-[13px] border-gray-300 rounded px-2 py-1">
                        <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                            <option value="">Purok</option>
                            <option value="purok1">Purok 1</option>
                            <option value="purok2">Purok 2</option>
                            <option value="purok3">Purok 3</option>
                        </select>
                        <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                            <option value="">Barangay</option>
                            <option value="barangay1">Barangay 1</option>
                            <option value="barangay2">Barangay 2</option>
                            <option value="barangay3">Barangay 3</option>
                        </select>
                        <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                            <option value="">Applicant Type</option>
                            <option value="applicantType1">Applicant Type</option>
                            <option value="applicantType2">Applicant Type</option>
                            <option value="applicantType3">Applicant Type</option>
                        </select>
                        <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                            <option value="">Status</option>
                            <option value="status1">Status 1</option>
                            <option value="status2">Status 2</option>
                            <option value="status3">Status 3</option>
                        </select>

                        <button class="bg-[#FFBF00] hover:bg-[#FFAF00] text-white px-4 py-2 rounded">Apply Filters</button>
                    </div>
                </div>

                <!-- ADD APPLICANT MODAL -->
                <div x-show="openModal"
                     class="fixed inset-0 flex z-50 items-center justify-center w-full bg-black bg-opacity-50 shadow-lg"
                     x-cloak>
                    <div class="bg-white text-white w-[400px] rounded-lg shadow-lg p-6 relative">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-black">ADD APPLICANT</h3>
                            <button @click="openModal = false" class="text-gray-400 hover:text-gray-200">
                                &times;
                            </button>
                        </div>

                        <!-- Form -->
                        <form>
                            <!-- Date Applied Field -->
                            <div class="mb-4">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="date-applied">DATE
                                    APPLIED</label>
                                <input type="date" id="date-applied"
                                       class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                       placeholder="Date Applied">
                            </div>
                            <div class="mb-4">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="barangay">TYPE
                                    OF APPLICANT <span class="text-red-500">*</span></label>
                                <select class="block text-[12px] w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600"
                                        style="padding: 2px 4px;">
                                    <option value="">TYPE OF APPLICANT</option>
                                    <option value="barangay1">Walkin Housing Applicant</option>
                                    <option value="barangay2">Request for Relocation Applicant</option>
                                    <option value="barangay3">Shelter Assistance Applicant</option>
                                </select>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block  text-[12px] font-medium mb-2 text-black"
                                           for="first-name">FIRST NAME <span class="text-red-500">*</span></label>
                                    <input type="text" id="first-name"
                                           class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                           placeholder="First Name">
                                </div>
                                <div>
                                    <label class="block  text-[12px] font-medium mb-2 text-black"
                                           for="middle-name">MIDDLE NAME <span class="text-red-500">*</span></label>
                                    <input type="text" id="middle-name"
                                           class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                           placeholder="Middle Name">
                                </div>
                                <div>
                                    <label class="block  text-[12px] font-medium mb-2 text-black"
                                           for="last-name">LAST NAME <span class="text-red-500">*</span></label>
                                    <input type="text" id="last-name"
                                           class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                           placeholder="Last Name">
                                </div>
                                <div>
                                    <label class="block  text-[12px] font-medium mb-2 text-black"
                                           for="suffix-name">SUFFIX NAME</label>
                                    <input type="text" id="suffix-name"
                                           class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                           placeholder="Suffix Name">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="barangay">BARANGAY <span class="text-red-500">*</span></label>
                                <input type="text" id="barangay"
                                       class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                       placeholder="Barangay">
                            </div>
                            <div class="mb-4">
                                <label class="block text-[12px] font-medium mb-2 text-black"
                                       for="purok">PUROK <span class="text-red-500">*</span></label>
                                <input type="text" id="purok"
                                       class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                       placeholder="Purok">
                            </div>
                            <div class="mb-4">
                                <label class="block text-[12px] font-medium mb-2 text-black"
                                       for="contact number">CONTACT NUMBER <span class="text-red-500">*</span></label>
                                <input type="text" id="contact-number"
                                       class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-1 focus:ring-gray-600 text-[12px]"
                                       placeholder="Contact Number">
                            </div>
                            <div class="mb-4">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="interviewer">INITIALLY
                                    INTERVIEWED BY</label>
                                <input type="text" id="initially-interviewed-by"
                                       class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:ring-1 focus:ring-gray-600 text-[12px]"
                                       placeholder="Initially Interviewed By">
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <!-- Award Button -->
                                <button type="submit"
                                        class="w-full py-2 bg-gradient-to-r from-custom-red to-custom-green hover:bg-gradient-to-r hover:from-custom-red hover:to-custom-red text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                    <span class="text-sm"> + ADD APPLICANT</span>
                                </button>

                                <!-- Cancel Button -->
                                <button type="submit"
                                        class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                    <span class="text-[12px]">CANCEL</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Button to toggle dropdown -->
                <div x-data="{ showDropdown: false }" class="relative">
                    <button @click="showDropdown = !showDropdown" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Toggle Columns
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="showDropdown" @click.away="showDropdown = false" class="absolute bg-white shadow-lg w-56 mt-2 py-2 rounded-lg z-10">
                        <label class="block px-4 py-2">
                            <input type="checkbox" id="toggle-name" checked> Show Name
                        </label>
                        <label class="block px-4 py-2">
                            <input type="checkbox" id="toggle-purok" checked> Show Purok
                        </label>
                        <label class="block px-4 py-2">
                            <input type="checkbox" id="toggle-barangay" checked> Show Barangay
                        </label>
                        <label class="block px-4 py-2">
                            <input type="checkbox" id="toggle-contact" checked> Show Contact
                        </label>
                    </div>
                </div>

                <!-- Table with transaction requests -->
                <div x-data="{openModalAward: false, openModalTag: false, openPreviewModal: false, selectedFile: null, fileName: ''}"
                     class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-2 px-2 border-b text-center font-semibold">ID</th>
                                <th class="py-2 px-2 border-b text-center font-semibold toggle-column name-col">NAME</th>
                                <th class="py-2 px-2 border-b text-center font-semibold toggle-column purok-col">PUROK</th>
                                <th class="py-2 px-2 border-b text-center font-semibold toggle-column barangay-col">BARANGAY</th>
                                <th class="py-2 px-2 border-b text-center font-semibold toggle-column contact-col">CONTACT NUMBER</th>
                                <th class="py-2 px-2 border-b text-center font-semibold">OCCUPATION</th>
                                <th class="py-2 px-2 border-b text-center font-semibold">MONTHLY INCOME</th>
                                <th class="py-2 px-2 border-b text-center font-semibold">TRANSACTION TYPE</th>
                                <th class="py-2 px-2 border-b text-center font-semibold">DATE APPLIED</th>
                                <th class="py-2 px-2 border-b text-center font-semibold">STATUS</th>
                                <th class="py-2 px-2 border-b text-center font-semibold">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($applicants as $applicant)
                                <tr>
                                    <td class="py-4 px-2 text-center  border-b uppercase font-semibold">{{ $applicant->applicant_id}}</td>
                                    <td class="py-4 px-2 text-center  border-b uppercase name-col">{{ $applicant->last_name }}, {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->suffix_name }}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase purok-col">{{ $applicant->address->purok->name ?? 'N/A' }}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase barangay-col">{{ $applicant->address->barangay->name ?? 'N/A' }}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase contact-col">{{ $applicant->contact_number}}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase">{{ optional($applicant->taggedAndValidated)->occupation ?? 'N/A' }}</td>
{{--                                    <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->livingSituation->living_situation_description ?? 'N/A' }}</td>--}}
                                    <td class="py-4 px-2 text-center border-b uppercase">{{ optional($applicant->taggedAndValidated)->monthly_income ?? 'N/A' }}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->transactionType->type_name }}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase">{{ \Carbon\Carbon::parse($applicant->date_applied)->format('m/d/Y') }}</td>
                                    <td class="py-4 px-2 text-center border-b uppercase">Pending</td>
                                    <td class="py-4 px-2 text-center border-b space-x-2">
                                        <button
                                                @click="window.location.href = '{{ route('masterlist-applicant-details') }}'"
                                                class="text-custom-red text-bold underline px-4 py-1.5">Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 px-2 text-center border-b">No applicants found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- JavaScript for toggling columns visibility -->
                    <script>
                        // JavaScript to toggle columns visibility based on checkbox selection
                        document.getElementById('toggle-name').addEventListener('change', function() {
                            document.querySelectorAll('.name-col').forEach(function(col) {
                                col.style.display = this.checked ? '' : 'none';
                            }.bind(this));
                        });

                        document.getElementById('toggle-purok').addEventListener('change', function() {
                            document.querySelectorAll('.purok-col').forEach(function(col) {
                                col.style.display = this.checked ? '' : 'none';
                            }.bind(this));
                        });

                        document.getElementById('toggle-barangay').addEventListener('change', function() {
                            document.querySelectorAll('.barangay-col').forEach(function(col) {
                                col.style.display = this.checked ? '' : 'none';
                            }.bind(this));
                        });

                        document.getElementById('toggle-contact').addEventListener('change', function() {
                            document.querySelectorAll('.contact-col').forEach(function(col) {
                                col.style.display = this.checked ? '' : 'none';
                            }.bind(this));
                        });
                    </script>

                    <!-- Award Applicant Modal -->
                    <div x-show="openModalAward"
                         class="fixed inset-0 flex z-50 items-center justify-center bg-black bg-opacity-50 shadow-lg"
                         x-cloak style="font-family: 'Poppins', sans-serif;">
                        <div class="bg-white text-white w-[400px] rounded-lg shadow-lg p-6 relative">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-black">AWARD APPLICANT</h3>
                                <button @click="openModalAward = false" class="text-gray-400 hover:text-gray-200">
                                    &times;
                                </button>
                            </div>

                            <!-- Form -->
                            <form>
                                <!-- Award Date Field -->
                                <div class="mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="date-applied">AWARD
                                        DATE</label>
                                    <input type="date" id="award-date"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                           placeholder="Award Date">
                                </div>


                                <!-- Main Fields -->

                                <!-- Barangay Field -->
                                <div class="mb-4">
                                    <br>
                                    <label class="block text-sm font-medium mb-2 text-black" for="barangay">LOT
                                        ALLOCATED</label>
                                    <label class="block text-[12px] font-medium mb-2 text-black"
                                           for="barangay">BARANGAY</label>
                                    <input type="text" id="barangay"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                           placeholder="Barangay">
                                </div>

                                <!-- Purok Field -->
                                <div class="mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black"
                                           for="purok">PUROK</label>
                                    <input type="text" id="purok"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                           placeholder="Purok">
                                </div>

                                <!-- Contact Number Field -->
                                <div class="mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="contact number">CONTACT
                                        NUMBER</label>
                                    <input type="text" id="contact-number"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                           placeholder="Contact Number">
                                </div>

                                <!-- Interviewer Field -->
                                <div class="mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="interviewer">LOT
                                        SIZE ALLOCATED</label>
                                    <input type="text" id="lot-size-allocated"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                           placeholder="Lot Size Allocated">
                                </div>
                                <br>
                                <div class="grid grid-cols-2 gap-4 mb-4">
                                    <button type="submit"
                                            class="w-full py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded-lg">
                                        AWARD
                                    </button>
                                    <button type="button" @click="openModalAward = false"
                                            class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg">
                                        CANCEL
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Tagging/Validation Modal -->
                    <div x-show="openModalTag"
                         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 shadow-lg"
                         x-cloak style="font-family: 'Poppins', sans-serif;">
                        <div class="bg-white text-white w-[400px] rounded-lg shadow-lg p-6 relative">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold text-black">TAGGED/VALIDATED</h3>
                                <button @click="openModalTag = false" class="text-gray-400 hover:text-gray-200">
                                    &times;
                                </button>
                            </div>

                            <!-- Form -->
                            <form @submit.prevent>
                                <!-- Tagging and Validation Date Field -->
                                <div class="mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black"
                                           for="tagging-validation-date">TAGGING AND VALIDATION DATE</label>
                                    <input type="date" id="tagging-validation-date"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]">
                                </div>

                                <!-- Validator's Name Field -->
                                <div class="mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="validator-name">VALIDATOR'S
                                        NAME</label>
                                    <input type="text" id="validator-name"
                                           class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                           placeholder="Validator's Name">
                                </div>

                                <!-- House Situation Upload -->
                                <h2 class="block text-[12px] font-medium mb-2 text-black">UPLOAD HOUSE SITUATION</h2>

                                <!-- Drag and Drop Area -->
                                <div class="border-2 border-dashed border-green-500 rounded-lg p-4 flex flex-col items-center space-y-1">
                                    <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 15a4 4 0 011-7.874V7a5 5 0 018.874-2.485A5.5 5.5 0 1118.5 15H5z" />
                                    </svg>
                                    <p class="text-gray-500 text-xs">DRAG AND DROP FILES</p>
                                    <p class="text-gray-500 text-xs">or</p>
                                    <button type="button"
                                            class="px-3 py-1 bg-green-600 text-white rounded-md text-xs hover:bg-green-700"
                                            @click="$refs.fileInput.click()">BROWSE FILES
                                    </button>

                                    <!-- Hidden File Input -->
                                    <input type="file" x-ref="fileInput"
                                           @change="selectedFile = $refs.fileInput.files[0]; fileName = selectedFile.name"
                                           class="hidden" />
                                </div>

                                <!-- Show selected file and progress bar when a file is selected -->
                                <template x-if="selectedFile">
                                    <div @click="openPreviewModal = true" class="mt-4 bg-white p-2 rounded-lg shadow">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M7 3v6h4l1 1h4V3H7z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M5 8v10h14V8H5z" />
                                                </svg>
                                                <span class="text-xs font-medium text-gray-700"
                                                      x-text="fileName"></span>

                                            </div>
                                            <!-- Status -->
                                            <span class="text-xs text-green-500 font-medium">100%</span>
                                        </div>
                                        <!-- Progress Bar -->
                                        <div class="h-1.5 bg-gray-200 rounded-full overflow-hidden cursor-pointer">
                                            <div class="w-full h-full bg-green-500"></div>
                                        </div>
                                    </div>
                                </template>

                                <!-- Buttons -->
                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <button type="submit"
                                            class="w-full py-2 bg-green-600 hover:bg-green-500 text-white font-semibold rounded-lg">
                                        TAGGED & VALIDATED
                                    </button>
                                    <button type="button" @click="openModalTag = false"
                                            class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg">
                                        CANCEL
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Preview Modal (Triggered by Clicking the Progress Bar) -->
                    <div x-show="openPreviewModal"
                         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 shadow-lg"
                         x-cloak>
                        <div class="bg-white w-[600px] rounded-lg shadow-lg p-6 relative">
                            <!-- Modal Header with File Name -->
                            <div class="flex justify-between items-center mb-4">
                                <input type="text" x-model="fileName"
                                       class="text-[13px] w-[60%] font-regular text-black border-none focus:outline-none focus:ring-0">
                                <button class="text-orange-500 underline text-sm"
                                        @click="fileName = prompt('Rename File', fileName) || fileName">Rename File
                                </button>
                                <button @click="openPreviewModal = false" class="text-gray-400 hover:text-gray-200">
                                    &times;
                                </button>
                            </div>

                            <!-- Display Image -->
                            <div class="flex justify-center mb-4">
                                <img :src="selectedFile ? URL.createObjectURL(selectedFile) : '/path/to/default/image.jpg'"
                                     alt="Preview Image" class="w-full h-auto max-h-[60vh] object-contain">
                            </div>
                            <!-- Modal Buttons -->
                            <div class="flex justify-between mt-4">
                                <button class="px-4 py-2 bg-green-600 text-white rounded-lg"
                                        @click="openPreviewModal = false">CONFIRM
                                </button>
                                <button class="px-4 py-2 bg-red-600 text-white rounded-lg"
                                        @click="selectedFile = null; openPreviewModal = false">REMOVE
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination controls -->
                <div class="flex justify-end text-[12px] mt-4">
                    <button
                            @click="prevPage"
                            :disabled="currentPage === 1"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-l disabled:opacity-50">
                        Prev
                    </button>
                    <template x-for="page in totalPages" :key="page">
                        <button
                                @click="goToPage(page)"
                                :class="{'bg-custom-green text-white': page === currentPage, 'bg-gray-200': page !== currentPage}"
                                class="px-4 py-2 mx-1 rounded">
                            <span x-text="page"></span>
                        </button>
                    </template>
                    <button
                            @click="nextPage"
                            :disabled="currentPage === totalPages"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-r disabled:opacity-50">
                        Next
                    </button>
                </div>

            </div>
        </div>
    </div>


    <script>
        function pagination() {
            return {
                currentPage: 1,
                totalPages: 3, // Set this to the total number of pages you have

                prevPage() {
                    if (this.currentPage > 1) this.currentPage--;
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) this.currentPage++;
                },
                goToPage(page) {
                    this.currentPage = page;
                }
            }
        }
    </script>
</div>