<!-- Main Content -->
<div class="flex-1 h-screen p-6 overflow-auto">
    <div class="bg-white rounded shadow mb-4 flex items-center justify-between z-50 relative p-3">
        <div class="flex items-center">
            <h2 class="text-[13px] ml-5 text-gray-700">WALK IN APPLICANTS</h2>
        </div>
        <img src="{{ asset('storage/images/design.png') }}" alt="Design" class="absolute right-0 top-0 h-full object-cover opacity-100 z-0">
        <div x-data="{ openModal: false}" class="relative z-0">
            <button @click="openModal = true" class="bg-custom-red text-white px-4 py-2 rounded">Add
                Applicant
            </button>
            <button class="bg-custom-green text-white px-4 py-2 rounded">Export</button>

            <!-- ADD APPLICANT MODAL -->
            <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-cloak>
                <div class="bg-white text-white w-[400px] rounded-lg shadow-lg p-6 relative z-50">
                    <!-- Modal Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-black">ADD APPLICANT</h3>
                        <button @click="openModal = false" class="text-gray-400 hover:text-gray-200">
                           &times;
                        </button>
                    </div>

                    <!-- Form -->
                    <form wire:submit.prevent="createNewApplicant">
                        <!--DATE APPLIED FIELD-->
                        <div class="mb-4">
                            <label class="block text-[12px] font-medium mb-2 text-black" for="date-applied">DATE APPLIED</label>
                            <input type="date" id="date-applied"
                                   class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                   wire:model="date_applied">
                        </div>
                        <!--script for default present date-->
                        <script>
                            // JavaScript to set today's date as the default value
                            document.addEventListener('DOMContentLoaded', function () {
                                const dateInput = document.getElementById('date-applied');
                                if (!dateInput.value) {  // If no date has been selected by the user yet
                                    const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
                                    dateInput.value = today;
                                }
                            });
                        </script>

                        <!-- Main Fields -->
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- First Name Field -->
                            <div>
                                <label class="block text-[12px] font-medium mb-2 text-black" for="first-name">FIRST NAME</label>
                                <input type="text" id="first-name"
                                       class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                       placeholder="First Name" wire:model="first_name">
                            </div>

                            <!-- Middle Name Field -->
                            <div>
                                <label class="block  text-[12px] font-medium mb-2 text-black" for="middle-name">MIDDLE NAME</label>
                                <input type="text" id="middle-name"
                                       class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                       placeholder="Middle Name" wire:model="middle_name">
                            </div>

                            <!-- Last Name Field -->
                            <div>
                                <label class="block  text-[12px] font-medium mb-2 text-black" for="last-name">LAST NAME</label>
                                <input type="text" id="last-name"
                                       class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                       placeholder="Last Name" wire:model="last_name">
                            </div>

                            <!-- Suffix Name Field -->
                            <div>
                                <label class="block  text-[12px] font-medium mb-2 text-black" for="suffix-name">SUFFIX NAME</label>
                                <input type="text" id="suffix-name"
                                       class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                       placeholder="Suffix Name" wire:model="suffix_name">
                            </div>
                        </div>

                        <!-- Barangay Field -->
{{--                        <div class="mb-4">--}}
{{--                            <label class="block text-[12px] font-medium mb-2 text-black" for="barangay">BARANGAY</label>--}}
{{--                            <input type="text" id="barangay"--}}
{{--                                   class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"--}}
{{--                                   placeholder="Barangay">--}}
{{--                        </div>--}}

{{--                        <!-- Purok Field -->--}}
{{--                        <div class="mb-4">--}}
{{--                            <label class="block text-[12px] font-medium mb-2 text-black"--}}
{{--                                   for="purok">PUROK</label>--}}
{{--                            <input type="text" id="purok"--}}
{{--                                   class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"--}}
{{--                                   placeholder="Purok">--}}
{{--                        </div>--}}

                        <!-- REGION Field -->
                        <div class="mb-4">--}}
                            <label class="block text-[12px] font-medium mb-2 text-black" for="region">REGION</label>--}}
                            <select name="region" id="region" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg text-gray-800 text-[12px]">
                                <option selected disabled>Choose Region</option>
                            </select>
                            <input type="hidden" id="region-text" wire:model="region_text" name="region_text">
                        </div>

                        <!-- PROVINCE Field -->
                        <div class="mb-4">--}}
                            <label class="block text-[12px] font-medium mb-2 text-black" for="province">PROVINCE</label>--}}
                            <select name="province" id="province" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg text-gray-800 text-[12px]">
                                <option selected disabled>Choose Province</option>
                            </select>
                            <input type="hidden" id="province-text" wire:model="province_text" name="province_text">
                        </div>

                        <!-- City / Municipality Field -->
                        <div class="mb-4">
                            <label class="block text-[12px] font-medium mb-2 text-black" for="city">City / Municipality</label>
                            <select id="city" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg text-gray-800 text-[12px]">
                                <option selected disabled>Choose City/Municipality</option>
                            </select>
                            <input type="hidden" id="city-text" wire:model="city_text" name="city_text">
                        </div>

                        <!-- Barangay Field -->
                        <div class="mb-4">
                            <label class="block text-[12px] font-medium mb-2 text-black" for="barangay">Barangay</label>
                            <select id="barangay" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg text-gray-800 text-[12px]">
                                <option selected disabled>Choose Barangay</option>
                            </select>
                            <input type="hidden" id="barangay-text" wire:model="barangay_text" name="barangay_text">
                        </div>


                        <!-- Contact Number Field -->
                        <div class="mb-4">
                            <label class="block text-[12px] font-medium mb-2 text-black"
                                   for="contact number">CONTACT NUMBER</label>
                            <input type="text" id="contact-number"
                                   class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                   placeholder="Contact Number">
                        </div>

                        <!-- Interviewer Field -->
                        <div class="mb-4">
                            <label class="block text-[12px] font-medium mb-2 text-black" for="interviewer">INITIALLY
                                INTERVIEWED BY</label>
                            <input type="text" id="initially-interviewed-by"
                                   class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800  focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                   placeholder="Initially Interviewed By">
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Award Button -->
                            <button type="submit"
                                    class="w-full py-2 bg-red-600 hover:bg-red-500 text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                <span class="text-sm"> + ADD APPLICANT</span>
                            </button>

                            <!-- Cancel Button -->
                            <button type="button" @click="openModal = false"
                                    class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                <span class="text-[12px]">CANCEL</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="bg-white p-6 rounded shadow">--}}
{{--        <div class="flex justify-between items-center">--}}
{{--            <div class="flex space-x-2">--}}
{{--                <button @click="openFilters = !openFilters" class="flex space-x-2 items-center hover:bg-yellow-500 py-2 px-4 rounded bg-iroad-orange">--}}
{{--                    <div class="text-white">--}}
{{--                        <!-- Filter Icon (You can use an icon from any library) -->--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.447.894l-4 2.5A1 1 0 017 21V13.414L3.293 6.707A1 1 0 013 6V4z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="text-[13px] text-white font-medium">--}}
{{--                        Filter--}}
{{--                    </div>--}}
{{--                </button>--}}
                <!-- Search -->
{{--                <div class="relative hidden md:block border-gray-300">--}}
{{--                    <svg class="absolute top-[13px] left-4" width="19" height="19" viewBox="0 0 21 21"--}}
{{--                         fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                        <path d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z"--}}
{{--                              stroke="#787C7F" stroke-width="1.75" stroke-linecap="round"--}}
{{--                              stroke-linejoin="round" />--}}
{{--                        <path d="M18.3746 18.375L14.5684 14.5688" stroke="#787C7F" stroke-width="1.75"--}}
{{--                              stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                    </svg>--}}
{{--                    <input type="search" name="search" id="search"--}}
{{--                           class="rounded-md px-12 py-2 placeholder:text-[13px] z-10 border border-gray-300 bg-[#f7f7f9] hover:ring-custom-yellow focus:ring-custom-yellow"--}}
{{--                           placeholder="Search">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div x-show="openFilters" class="flex space-x-2 mb-1 mt-5">--}}
{{--            <label class="text-center mt-2">Date From:</label>--}}
{{--            <input type="date" id="start-date" class="border text-[13px] border-gray-300 rounded px-2 py-1">--}}
{{--            <label class="text-center mt-2">To:</label>--}}
{{--            <input type="date" id="end-date" class="border text-[13px] border-gray-300 rounded px-2 py-1">--}}
{{--            <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">--}}
{{--                <option value="">Purok</option>--}}
{{--                <option value="purok1">Purok 1</option>--}}
{{--                <option value="purok2">Purok 2</option>--}}
{{--                <option value="purok3">Purok 3</option>--}}
{{--            </select>--}}
{{--            <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">--}}
{{--                <option value="">Barangay</option>--}}
{{--                <option value="barangay1">Barangay 1</option>--}}
{{--                <option value="barangay2">Barangay 2</option>--}}
{{--                <option value="barangay3">Barangay 3</option>--}}
{{--            </select>--}}
{{--            <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">--}}
{{--                <option value="">Situation</option>--}}
{{--                <option value="barangay1">Barangay 1</option>--}}
{{--                <option value="barangay2">Barangay 2</option>--}}
{{--                <option value="barangay3">Barangay 3</option>--}}
{{--            </select>--}}
{{--            <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">--}}
{{--                <option value="">Occupation</option>--}}
{{--                <option value="barangay1">Barangay 1</option>--}}
{{--                <option value="barangay2">Barangay 2</option>--}}
{{--                <option value="barangay3">Barangay 3</option>--}}
{{--            </select>--}}
{{--            <select class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">--}}
{{--                <option value="">Status</option>--}}
{{--                <option value="barangay1">Barangay 1</option>--}}
{{--                <option value="barangay2">Barangay 2</option>--}}
{{--                <option value="barangay3">Barangay 3</option>--}}
{{--            </select>--}}

{{--            <button class="bg-custom-yellow text-white px-4 py-2 rounded">Apply Filters</button>--}}
{{--        </div>--}}
{{--    </div>--}}



    <!-- Table with transaction requests -->
    <div x-data="{openModalAward: false, openModalTag: false, openPreviewModal: false, selectedFile: null, fileName: ''}"
         class="overflow-x-auto p-2">
{{--        <table class="min-w-full bg-white border border-gray-200">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr>--}}
{{--                <th class="py-2 px-2  text-center font-medium">Name</th>--}}
{{--                <th class="py-2 px-2 border-b text-center  font-medium">Purok</th>--}}
{{--                <th class="py-2 px-2 border-b text-center font-medium">Barangay</th>--}}
{{--                <th class="py-2 px-2 border-b text-center font-medium">Contact Number</th>--}}
{{--                <th class="py-2 px-2 border-b text-center font-medium">Date Applied</th>--}}
{{--                <th class="py-2 px-2 border-b text-center font-medium">Status</th>--}}
{{--                <th class="py-2 px-2 border-b text-center font-medium">Actions</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td class="py-4 px-2 text-center  border-b">John Doe</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Suaybaguio</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Magugpo North</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">09637894863</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">11/23/2023</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Pending</td>--}}
{{--                <td class="py-4 px-2 text-center border-b space-x-2">--}}
{{--                    <button--}}
{{--                            @click="window.location.href = '{{ route('applicant-details') }}'"--}}
{{--                            3--}}
{{--                            class="text-custom-red text-bold underline px-4 py-1.5">Details--}}
{{--                    </button>--}}
{{--                    <button @click="openModalTag = true"--}}
{{--                            class="bg-custom-yellow text-white px-8 py-1.5 rounded-full">Tag--}}
{{--                    </button>--}}
{{--                    <button @click="openModalAward = true"--}}
{{--                            class="bg-custom-green text-white px-8 py-1.5 rounded-full">Award--}}
{{--                    </button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="py-4 px-2 text-center  border-b">John Doe</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Suaybaguio</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Magugpo North</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">09637894863</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">11/23/2023</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Pending</td>--}}
{{--                <td class="py-4 px-2 text-center border-b space-x-2">--}}
{{--                    <button--}}
{{--                            @click="window.location.href = '{{ route('applicant-details') }}'"--}}
{{--                            class="text-custom-red text-bold underline px-4 py-1.5">Details--}}
{{--                    </button>--}}
{{--                    <button class="bg-custom-yellow text-white px-8 py-1.5 rounded-full">Tag</button>--}}
{{--                    <button class="bg-custom-green text-white px-8 py-1.5 rounded-full">Award</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="py-4 px-2 text-center  border-b">John Doe</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Suaybaguio</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Magugpo North</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">09637894863</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">11/23/2023</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Pending</td>--}}
{{--                <td class="py-4 px-2 text-center border-b space-x-2">--}}
{{--                    <button--}}
{{--                            @click="window.location.href = '{{ route('applicant-details') }}'"--}}
{{--                            class="text-custom-red text-bold underline px-4 py-1.5">Details--}}
{{--                    </button>--}}
{{--                    <button class="bg-custom-yellow text-white px-8 py-1.5 rounded-full">Tag</button>--}}
{{--                    <button class="bg-custom-green text-white px-8 py-1.5 rounded-full">Award</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="py-4 px-2 text-center  border-b">John Doe</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Suaybaguio</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Magugpo North</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">09637894863</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">11/23/2023</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Pending</td>--}}
{{--                <td class="py-4 px-2 text-center border-b space-x-2">--}}
{{--                    <button--}}
{{--                            @click="window.location.href = '{{ route('applicant-details') }}'"--}}
{{--                            class="text-custom-red text-bold underline px-4 py-1.5">Details--}}
{{--                    </button>--}}
{{--                    <button class="bg-custom-yellow text-white px-8 py-1.5 rounded-full">Tag</button>--}}
{{--                    <button class="bg-custom-green text-white px-8 py-1.5 rounded-full">Award</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="py-4 px-2 text-center  border-b">John Doe</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Suaybaguio</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Magugpo North</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">09637894863</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">11/23/2023</td>--}}
{{--                <td class="py-4 px-2 text-center border-b">Pending</td>--}}
{{--                <td class="py-4 px-2 text-center border-b space-x-2">--}}
{{--                    <button--}}
{{--                            @click="window.location.href = '{{ route('applicant-details') }}'"--}}
{{--                            class="text-custom-red text-bold underline px-4 py-1.5">Details--}}
{{--                    </button>--}}
{{--                    <button class="bg-custom-yellow text-white px-8 py-1.5 rounded-full">Tag</button>--}}
{{--                    <button class="bg-custom-green text-white px-8 py-1.5 rounded-full">Award</button>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}

        <!-- Award Applicant Modal -->
        <livewire:walkin-applicants-table/>

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

                    <h2 class="block text-[12px] font-medium mb-2 text-black">UPLOAD HOUSE SITUATION</h2>

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

                        <input type="file" x-ref="fileInput"
                               @change="selectedFile = $refs.fileInput.files[0]; fileName = selectedFile.name"
                               class="hidden" />
                    </div>

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
                                <span class="text-xs text-green-500 font-medium">100%</span>
                            </div>
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
    <script src="{{ asset('js/ph-address-selector.js') }}"></script>
    <script>
        document.addEventListener('livewire:load', function () {
            // Reinitialize address selector on Livewire component mount
            initializePhilippineAddressSelector();
        });

        function initializePhilippineAddressSelector() {
            var my_handlers = {
                // fill province
                fill_provinces: function() {
                    //selected region
                    var region_code = $(this).val();

                    // set selected text to input
                    var region_text = $(this).find("option:selected").text();
                    let region_input = $('#region-text');
                    region_input.val(region_text);
                    //clear province & city & barangay input
                    $('#province-text').val('');
                    $('#city-text').val('');
                    $('#barangay-text').val('');

                    //province
                    let dropdown = $('#province');
                    dropdown.empty();
                    dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
                    dropdown.prop('selectedIndex', 0);

                    //city
                    let city = $('#city');
                    city.empty();
                    city.append('<option selected="true" disabled></option>');
                    city.prop('selectedIndex', 0);

                    //barangay
                    let barangay = $('#barangay');
                    barangay.empty();
                    barangay.append('<option selected="true" disabled></option>');
                    barangay.prop('selectedIndex', 0);

                    // filter & fill
                    var url = '/storage/ph-json/province.json';
                    $.getJSON(url, function(data) {
                        var result = data.filter(function(value) {
                            return value.region_code == region_code;
                        });

                        result.sort(function(a, b) {
                            return a.province_name.localeCompare(b.province_name);
                        });

                        $.each(result, function(key, entry) {
                            dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                        })

                    });
                },
                // fill city
                fill_cities: function() {
                    //selected province
                    var province_code = $(this).val();

                    // set selected text to input
                    var province_text = $(this).find("option:selected").text();
                    let province_input = $('#province-text');
                    province_input.val(province_text);
                    //clear city & barangay input
                    $('#city-text').val('');
                    $('#barangay-text').val('');

                    //city
                    let dropdown = $('#city');
                    dropdown.empty();
                    dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
                    dropdown.prop('selectedIndex', 0);

                    //barangay
                    let barangay = $('#barangay');
                    barangay.empty();
                    barangay.append('<option selected="true" disabled></option>');
                    barangay.prop('selectedIndex', 0);

                    // filter & fill
                    var url = '/storage/ph-json/city.json';
                    $.getJSON(url, function(data) {
                        var result = data.filter(function(value) {
                            return value.province_code == province_code;
                        });

                        result.sort(function(a, b) {
                            return a.city_name.localeCompare(b.city_name);
                        });

                        $.each(result, function(key, entry) {
                            dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                        })

                    });
                },
                // fill barangay
                fill_barangays: function() {
                    // selected barangay
                    var city_code = $(this).val();

                    // set selected text to input
                    var city_text = $(this).find("option:selected").text();
                    let city_input = $('#city-text');
                    city_input.val(city_text);
                    //clear barangay input
                    $('#barangay-text').val('');

                    // barangay
                    let dropdown = $('#barangay');
                    dropdown.empty();
                    dropdown.append('<option selected="true" disabled>Choose barangay</option>');
                    dropdown.prop('selectedIndex', 0);

                    // filter & Fill
                    var url = '/storage/ph-json/barangay.json';
                    $.getJSON(url, function(data) {
                        var result = data.filter(function(value) {
                            return value.city_code == city_code;
                        });

                        result.sort(function(a, b) {
                            return a.brgy_name.localeCompare(b.brgy_name);
                        });

                        $.each(result, function(key, entry) {
                            dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                        })

                    });
                },

                onchange_barangay: function() {
                    // set selected text to input
                    var barangay_text = $(this).find("option:selected").text();
                    let barangay_input = $('#barangay-text');
                    barangay_input.val(barangay_text);
                },

            };

            $(function() {
                // events
                $('#region').on('change', my_handlers.fill_provinces);
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);
                $('#barangay').on('change', my_handlers.onchange_barangay);

                // load region
                let dropdown = $('#region');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose Region</option>');
                dropdown.prop('selectedIndex', 0);
                const url = '/storage/ph-json/region.json';
                // Populate dropdown with list of regions
                $.getJSON(url, function(data) {
                    $.each(data, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
                    })
                });

            });
        }
    </script>
</div>
