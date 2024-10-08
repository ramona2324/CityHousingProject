<div x-data="{ openFilters: false, isModalOpen: false }" class="p-10 h-screen ml-[17%] mt-[60px]">
    <div class="flex bg-gray-100 text-[12px]">
        <!-- Main Content -->
        <div x-data="pagination()" class="flex-1 h-screen p-6 overflow-auto">
            <!-- Alert Message -->
            <div class="relative z-0 mb-2">
                @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
                @endif
            </div>
            <!-- Container for the Title -->
            <div class="bg-white rounded shadow mb-4 flex items-center justify-between z-0 relative p-3">
                <div class="flex items-center">
                    <h2 class="text-[13px] ml-5 text-gray-700">APPLICANTS</h2>
                </div>
                <img src="{{ asset('storage/images/design.png') }}" alt="Design" class="absolute right-0 top-0 h-full object-cover opacity-100 z-0">
                <div class="relative z-0">
                    <button @click="isModalOpen = true" class="bg-gradient-to-r from-custom-red to-custom-green hover:bg-gradient-to-r hover:from-custom-red hover:to-custom-red text-white px-4 py-2 rounded">
                        Add Applicant
                    </button>
                    <button class="bg-custom-green text-white px-4 py-2 rounded">Export</button>
                </div>
            </div>
            <!-- Search and Filters -->
            <div class="bg-white p-6 rounded shadow">
                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <button @click="openFilters = !openFilters" class="flex space-x-2 items-center hover:bg-yellow-500 py-2 px-4 rounded bg-iroad-orange">
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
                        <div class="relative hidden md:block border-gray-300 z-60">
                            <svg class="absolute top-[8px] left-4" width="19" height="19" viewBox="0 0 21 21"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z"
                                      stroke="#787C7F" stroke-width="1.75" stroke-linecap="round"
                                      stroke-linejoin="round" />
                                <path d="M18.3746 18.375L14.5684 14.5688" stroke="#787C7F" stroke-width="1.75"
                                      stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input wire:model.live.debounce.300ms="search" type="search" name="search"
                                   class="rounded-md px-12 py-2 placeholder:text-[13px] z-60 border border-gray-300 bg-[#f7f7f9] hover:ring-custom-yellow focus:ring-custom-yellow"
                                   placeholder="Search">
                            <!-- Clear Button -->
                            <button wire:click="clearSearch" class="absolute bottom-1 right-4 text-2xl text-gray-500">
                                &times; <!-- This is the "x" symbol -->
                            </button>
                        </div>
                    </div>
                </div>

                <div x-show="openFilters" class="flex space-x-2 mb-1 mt-5">
                    <label class="text-center mt-2" for="start_date">Date From:</label>
                    <input type="date" id="start_date" wire:model.live="startDate" class="border text-[13px] border-gray-300 rounded px-2 py-1"
                           max="{{ now()->toDateString() }}">
                    <label class="text-center mt-2" for="end_date">To:</label>
                    <input type="date" id="end_date" wire:model.live="endDate" class="border text-[13px] border-gray-300 rounded px-2 py-1"
                           max="{{ now()->toDateString() }}">

                    <select wire:model.live="selectedPurok_id" class="bg-gray-50 border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                        <option value="">Purok</option>
                        @foreach($puroksFilter as $purokFilter)
                            <option value="{{ $purokFilter->id }}">{{ $purokFilter->name }}</option>
                        @endforeach
                    </select>

                    <select wire:model.live="selectedBarangay_id" class="bg-gray-50 border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                        <option value="">Barangay</option>
                        @foreach($barangaysFilter as $barangayFilter)
                            <option value="{{ $barangayFilter->id }}">{{ $barangayFilter->name }}</option>
                        @endforeach
                    </select>

                    <select wire:model.live="selectedTaggingStatus" class="bg-gray-50 border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                        <option value="">Status</option>
                        @foreach($taggingStatuses as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                    <button wire:click="resetFilters" class="bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white px-4 py-1.5 rounded-full">Reset Filters</button>
                </div>
            </div>

            <!-- Table with transaction requests -->
            <div x-data="{openEditModal: false}"
                 class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-2 border-b text-center font-semibold">ID</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">NAME</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">SUFFIX NAME</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">CONTACT NUMBER</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">PUROK</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">BARANGAY</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">DATE APPLIED</th>
                            <th class="py-2 px-2 border-b text-center font-semibold">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applicants as $applicant)
                            <tr>
                                <td class="py-4 px-2 text-center border-b uppercase font-semibold">{{ $applicant->applicant_id }}</td>
                                <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->last_name }}, {{ $applicant->first_name }} {{ $applicant->middle_name }}</td>
                                <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->suffix_name }}</td>
                                <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->contact_number }}</td>
                                <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->address->purok->name ?? 'N/A' }}</td>
                                <td class="py-4 px-2 text-center border-b uppercase">{{ $applicant->address->barangay->name ?? 'N/A' }}</td>
                                <td class="py-4 px-2 text-center border-b">{{ \Carbon\Carbon::parse($applicant->date_applied)->format('m/d/Y') }}</td>
                                <td class="py-4 px-2 text-center border-b space-x-2">
                                    <button wire:click="edit({{ $applicant->id }})" @click="openEditModal = true" class="text-custom-red text-bold underline px-4 py-1.5">Edit</button>
    {{--                                <button @click="openEditModal = true" class="text-custom-red text-bold underline px-4 py-1.5">Edit</button>--}}
                                    @if ($applicant->taggedAndValidated)
                                        <span class="bg-gray-400 text-white px-5 py-1.5 rounded-full cursor-not-allowed">Tagged</span>
                                    @else
                                        <button onclick="window.location.href='{{ route('applicant-details', ['applicantId' => $applicant->id]) }}'"
                                                class="bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white px-8 py-1.5 rounded-full">
                                            Tag
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-4 px-2 text-center border-b">No applicants found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="py-4 px-3">
{{--                    <div class="flex">--}}
{{--                        <div class="flex space-x-4 items-center mb-3">--}}
{{--                            <label for="">Per page</label>--}}
{{--                            <select name="" id="">--}}
{{--                                <option value="10">5</option>--}}
{{--                                <option value="20">10</option>--}}
{{--                                <option value="50">20</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    {{ $applicants->links() }}
                </div>

                <!-- ADD APPLICANT MODAL -->
                <div x-show="isModalOpen" x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                    <div class="bg-white text-white w-[450px] rounded-lg shadow-lg p-6 relative z-50">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-black">ADD APPLICANT</h3>
                            <!-- Close Button: Closes the Modal -->
                            <button @click="isModalOpen = false" class="text-gray-400 hover:text-gray-200 text-3xl">
                                &times;
                            </button>
                        </div>

                        <!-- Livewire Form -->
                        <form wire:submit.prevent="store">
                            <x-validation-errors class="mb-4" />
                            <!-- Date Applied Field -->
                            <div class="grid grid-cols-1 mb-4">
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="date_applied">APPLICATION DATE <span class="text-red-500">*</span></label>
                                    <input type="date" id="date_applied" wire:model="date_applied" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none"
                                           max="{{ now()->toDateString() }}">
                                    @error('date_applied') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Main Fields -->
                            <div class="grid grid-cols-2 gap-3 mb-3">
                                <!-- First Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="first_name">FIRST NAME <span class="text-red-500">*</span> </label>
                                    <input type="text" wire:model="first_name" id="first_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase" required>
                                    @error('first_name') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <!-- Middle Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="middle_name">MIDDLE NAME <span class="text-red-500">*</span> </label>
                                    <input type="text" wire:model="middle_name" id="middle_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase">
                                    @error('middle_name') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <!-- Last Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="last_name">LAST NAME <span class="text-red-500">*</span> </label>
                                    <input type="text" wire:model="last_name" id="last_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase" required>
                                    @error('last_name') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <!-- Suffix Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="suffix_name">SUFFIX NAME</label>
                                    <input type="text" wire:model="suffix_name" id="suffix_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase">
                                    @error('suffix_name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <!-- Barangay Field -->
                            <div class="mb-3">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="barangay">BARANGAY <span class="text-red-500">*</span> </label>
                                <select id="barangay" wire:model.live="barangay_id" class="w-full px-3 py-1 text-[12px] select2-barangay bg-white-700 border border-gray-600 rounded-lg text-gray-800 uppercase" required>
                                    <option value="">Select Barangay</option>
                                    @foreach($barangays as $barangay)
                                        <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                                    @endforeach
                                </select>
                                @error('barangay_id') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <!-- Purok Field -->
                            <div class="mb-3">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="purok">PUROK <span class="text-red-500">*</span> </label>
                                <select id="purok" wire:model.live="purok_id" class="w-full px-3 py-1 text-[12px] select2-purok bg-white-700 border border-gray-600 rounded-lg focus:outline-none text-gray-800 uppercase" required>
                                    <option value="">Select Purok</option>
                                    @foreach($puroks as $purok)
                                        <option value="{{ $purok->id }}">{{ $purok->name }}</option>
                                    @endforeach
                                </select>
                                @error('purok_id') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <!-- Contact Number Field -->
                            <div class="mb-3">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="contact_number">CONTACT NUMBER</label>
                                <input type="text" wire:model="contact_number" id="contact_number" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase" placeholder="Contact Number">
                                @error('contact_number') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <!-- Interviewer Field -->
                            <div class="mb-6">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="interviewer">INITIALLY INTERVIEWED BY <small class="text-red-500">(read only)</small></label>
                                <input type="text" id="interviewer" wire:model="interviewer" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-red-600 focus:outline-none text-[12px] uppercase cursor-default" readonly>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <!-- Award Button -->
                                <button type="submit"
                                        class="w-full py-2 bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                    <span class="text-[12px]"> + ADD APPLICANT</span>
                                </button>

                                <!-- Cancel Button -->
                                <button type="button" @click="isModalOpen = false"
                                        class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                    <span class="text-[12px]">CANCEL</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- EDIT APPLICANT MODAL -->
                <div x-show="openEditModal" x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
                    <div class="bg-white text-white w-[450px] rounded-lg shadow-lg p-6 relative z-50">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-black">EDIT APPLICANT</h3>
                            <!-- Close Button: Closes the Modal -->
                            <button @click="openEditModal = false" class="text-gray-400 hover:text-gray-200 text-3xl">
                                &times;
                            </button>
                        </div>

                        <form wire:submit.prevent="update">
                            <!-- Date Applied Field -->
                            <div class="grid grid-cols-1 mb-4">
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="date_applied">APPLICATION DATE <span class="text-red-500">*</span></label>
                                    <input type="date" id="date_applied" wire:model="date_applied" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none"
                                           max="{{ now()->toDateString() }}">
                                    @error('date_applied') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Main Fields -->
                            <div class="grid grid-cols-2 gap-3 mb-3">
                                <!-- First Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="first_name">FIRST NAME </label>
                                    <input type="text" wire:model="edit_first_name" id="first_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase" required>
                                </div>

                                <!-- Middle Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="middle_name">MIDDLE NAME </label>
                                    <input type="text" wire:model="edit_middle_name" id="middle_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase">
                                </div>

                                <!-- Last Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="last_name">LAST NAME </label>
                                    <input type="text" wire:model="edit_last_name" id="last_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase" required>
                                </div>

                                <!-- Suffix Name Field -->
                                <div>
                                    <label class="block text-[12px] font-medium mb-2 text-black" for="suffix_name">SUFFIX NAME</label>
                                    <input type="text" wire:model="edit_suffix_name" id="suffix_name" class="w-full px-3 py-1 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase">
                                </div>
                            </div>

                            <!-- Barangay Field -->
                            <div class="mb-3">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="barangay">BARANGAY </label>
                                <select id="barangay" wire:model.live="edit_barangay_id" class="w-full px-3 py-1 text-[12px] select2-barangay bg-white-700 border border-gray-600 rounded-lg text-gray-800 uppercase" required>
                                    <option value="">Select Barangay</option>
                                    @foreach($barangays as $barangay)
                                        <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Purok Field -->
                            <div class="mb-3">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="purok">PUROK </label>
                                <select id="purok" wire:model.live="edit_purok_id" class="w-full px-3 py-1 text-[12px] select2-purok bg-white-700 border border-gray-600 rounded-lg focus:outline-none text-gray-800 uppercase" required>
                                    <option value="">Select Purok</option>
                                    @foreach($puroks as $purok)
                                        <option value="{{ $purok->id }}">{{ $purok->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Contact Number Field -->
                            <div class="mb-6">
                                <label class="block text-[12px] font-medium mb-2 text-black" for="contact_number">CONTACT NUMBER</label>
                                <input type="text" wire:model="edit_contact_number" id="contact_number" class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px] uppercase" placeholder="Contact Number">
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <!-- SAVE Button -->
                                <button type="submit"
                                        class="w-full py-2 bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                    <span class="text-[12px]"> SAVE </span>
                                </button>

                                <!-- Cancel Button -->
                                <button type="button" @click="openEditModal = false"
                                        class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                    <span class="text-[12px]">CANCEL</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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