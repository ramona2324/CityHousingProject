<div x-data="{ openFilters: false }" class="p-10 h-screen ml-[17%] mt-[60px]">
    <div class="flex bg-gray-100 text-[12px]">
        <!-- Main Content -->
        <div class="flex-1 h-screen p-6 overflow-auto">
            <div class="bg-white rounded shadow mb-4 flex items-center justify-between z-5 relative p-3">
                <div class="flex items-center">
                    <h2 class="text-[13px] ml-5 text-gray-700">SHELTER ASSISTANCE APPLICANTS — PROFILED/TAGGED</h2>
                </div>
                <img src="{{ asset('storage/images/design.png') }}" alt="Design" class="absolute right-0 top-0 h-full object-cover opacity-100 z-0">
                <div class="relative z-0">
                    <!-- <button class="bg-custom-green text-white px-4 py-2 rounded">Export</button> -->
                </div>
            </div>

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
                        <div class="relative hidden md:block border-gray-300">
                            <svg class="absolute top-[13px] left-4" width="19" height="19" viewBox="0 0 21 21"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.625 16.625C13.491 16.625 16.625 13.491 16.625 9.625C16.625 5.75901 13.491 2.625 9.625 2.625C5.75901 2.625 2.625 5.75901 2.625 9.625C2.625 13.491 5.75901 16.625 9.625 16.625Z"
                                    stroke="#787C7F" stroke-width="1.75" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M18.3746 18.375L14.5684 14.5688" stroke="#787C7F" stroke-width="1.75"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="search" name="search" wire:model.live.debounce.300ms="search"
                                class="rounded-md px-12 py-2 placeholder:text-[13px] z-10 border border-gray-300 bg-[#f7f7f9] hover:ring-custom-yellow focus:ring-custom-yellow"
                                placeholder="Search">
                            <button wire:click="clearSearch" class="absolute bottom-1 right-4 text-2xl text-gray-500">
                                &times; <!-- This is the "x" symbol -->
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <label class="text-center mt-2 mr-1" for="start_date">Date Profiled/Tagged From:</label>
                        <input type="date" id="start_date" wire:model.live="startTaggingDate" class="border text-[13px] border-gray-300 rounded px-2 py-1"
                            max="{{ now()->toDateString() }}">
                        <label class="text-center mt-2 ml-2 mr-1" for="end_date">To:</label>
                        <input type="date" id="end_date" wire:model.live="endTaggingDate" class="border text-[13px] border-gray-300 rounded px-2 py-1 mr-1"
                            max="{{ now()->toDateString() }}">

                        <div class="relative group">
                            <button wire:click="resetFilters" class="flex items-center justify-center border border-gray-300 bg-gray-100 rounded w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 256 256" class="w-4 h-4" xml:space="preserve">
                                    <g transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                        <path d="M 81.521 31.109 c -0.86 -1.73 -2.959 -2.438 -4.692 -1.575 c -1.73 0.86 -2.436 2.961 -1.575 4.692 c 2.329 4.685 3.51 9.734 3.51 15.01 C 78.764 67.854 63.617 83 45 83 S 11.236 67.854 11.236 49.236 c 0 -16.222 11.501 -29.805 26.776 -33.033 l -3.129 4.739 c -1.065 1.613 -0.62 3.784 0.992 4.85 c 0.594 0.392 1.264 0.579 1.926 0.579 c 1.136 0 2.251 -0.553 2.924 -1.571 l 7.176 -10.87 c 0.001 -0.001 0.001 -0.002 0.002 -0.003 l 0.018 -0.027 c 0.063 -0.096 0.106 -0.199 0.159 -0.299 c 0.049 -0.093 0.108 -0.181 0.149 -0.279 c 0.087 -0.207 0.152 -0.419 0.197 -0.634 c 0.009 -0.041 0.008 -0.085 0.015 -0.126 c 0.031 -0.182 0.053 -0.364 0.055 -0.547 c 0 -0.014 0.004 -0.028 0.004 -0.042 c 0 -0.066 -0.016 -0.128 -0.019 -0.193 c -0.008 -0.145 -0.018 -0.288 -0.043 -0.431 c -0.018 -0.097 -0.045 -0.189 -0.071 -0.283 c -0.032 -0.118 -0.065 -0.236 -0.109 -0.35 c -0.037 -0.095 -0.081 -0.185 -0.125 -0.276 c -0.052 -0.107 -0.107 -0.211 -0.17 -0.313 c -0.054 -0.087 -0.114 -0.168 -0.175 -0.25 c -0.07 -0.093 -0.143 -0.183 -0.223 -0.27 c -0.074 -0.08 -0.153 -0.155 -0.234 -0.228 c -0.047 -0.042 -0.085 -0.092 -0.135 -0.132 L 36.679 0.775 c -1.503 -1.213 -3.708 -0.977 -4.921 0.53 c -1.213 1.505 -0.976 3.709 0.53 4.921 l 3.972 3.2 C 17.97 13.438 4.236 29.759 4.236 49.236 C 4.236 71.714 22.522 90 45 90 s 40.764 -18.286 40.764 -40.764 C 85.764 42.87 84.337 36.772 81.521 31.109 z"
                                            style="fill: rgb(0,0,0);"></path>
                                    </g>
                                </svg>
                            </button>
                            <p class="absolute opacity-0 w-12/12 group-hover:opacity-50 transition-opacity duration-300 rounded-md bg-gray-700 text-[11px] text-white mt-1 p-1">
                                Reset
                            </p>
                        </div>
                    </div>
                </div>

                <div x-show="openFilters" class="flex space-x-2 mb-1 mt-5">
                    <div x-show="openFilters" class="flex space-x-2 mb-1 mt-5">
                        <select wire:model.live="selectedOriginOfRequest" class="border text-[13px] border-gray-300 text-gray-600 rounded px-2 py-1 shadow-sm">
                            <option value="">Select Request Origin</option>
                            @foreach ($OriginOfRequests as $origin)
                            <option value="{{ $origin->id }}">{{ $origin->name }}</option>
                            @endforeach
                        </select>
                        <button wire:click="resetFilters" class="bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white px-4 py-1.5 rounded-full">
                            Reset Filter
                        </button>
                    </div>
                </div>
            </div>


            <!-- Table with transaction requests -->
            <div x-data="{openModalGrant: false, openModalDocumentsChecklist: false, openPreviewModal: false}"
                class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-2  text-center font-medium">Profile No.</th>
                            <th class="py-2 px-2 border-b text-center  font-medium">Name</th>
                            <th class="py-2 px-2 border-b text-center font-medium">Origin of Request</th>
                            <th class="py-2 px-2 border-b text-center font-medium">Date Request</th>
                            <th class="py-2 px-2 border-b text-center font-medium">Date Profiled/Tagged</th>
                            <th class="py-2 px-2 border-b text-center font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody x-data>
                        @forelse($profiledTaggedApplicants as $shelterApplicant)
                        <tr>
                            <td class="py-4 px-2 text-center border-b">{{ $shelterApplicant->shelterApplicant->profile_no }}</td>
                            <td class="py-4 px-2 text-center capitalize border-b underline cursor-pointer hover:text-green-500"
                                @click="window.location.href = '{{ route('profiled-tagged-applicant-details', ['profileNo' => $shelterApplicant->id]) }}'">
                                {{ $shelterApplicant->shelterApplicant->person->last_name }}, {{ $shelterApplicant->shelterApplicant->person->first_name }} {{ $shelterApplicant->shelterApplicant->person->middle_name }}
                            </td>
                            <td class="py-4 px-2 text-center capitalize border-b">{{ $shelterApplicant->shelterApplicant->originOfRequest->name ?? 'N/A' }}</td>
                            <td class="py-4 px-2 text-center capitalize border-b"> {{ $shelterApplicant->shelterApplicant->date_request->format('Y-m-d') }}</td>
                            <td class="py-4 px-2 text-center border-b">{{ optional($shelterApplicant->date_tagged)->format('Y-m-d') }}</td>
                            <td class="py-4 px-2 text-center border-b space-x-2">
                                @php
                                $isComplete = $shelterApplicant->granteeDocumentsSubmission->count() >= 3; // Assuming 3 required documents
                                @endphp

                                @if ($isComplete)
                                <button
                                    @click="showDocumentModal({{ $shelterApplicant->id }})"
                                    class="bg-amber-500 text-white px-4 py-1.5 rounded-full">
                                    Submitted
                                </button>
                                @else
                                <button
                                    @click="openModalDocumentsChecklist = true; $wire.set('profiledTaggedApplicantId', {{ $shelterApplicant->id }})"
                                    class="bg-amber-500 text-white px-4 py-1.5 rounded-full hover:from-orange-500 hover:to-orange-500">
                                    Submit Requirements
                                </button>
                                @endif

                                @if($shelterApplicant->grantees->isEmpty())
                                <button
                                     @click="window.location.href = '{{ route('grant-applicant', ['profiledTaggedApplicantId' => $shelterApplicant->id]) }}'"
                                    class="bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white px-6 py-1.5 rounded-full">
                                    Grant
                                </button>
                                @else
                                <button
                                    class="bg-gray-500 text-white px-6 py-1.5 rounded-full" disabled>
                                    Granted
                                </button>
                                @endif
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">No applicants found.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

                <!-- Pagination Links -->
                <div class="py-4 px-3">
                    {{ $profiledTaggedApplicants->links() }}
                </div>

                <!-- GRANT Modal -->
                <div x-show="openModalGrant"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 shadow-lg "
                    x-cloak style="font-family: 'Poppins', sans-serif;">
                    <div class="bg-white text-white w-[680px] h-[590px] rounded-lg shadow-lg px-6 p-2 relative overflow-y-auto">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center mb-2 bg-white sticky top-0 z-10 py-6">
                            <h3 class="text-lg font-semibold text-black">GRANT APPLICANT</h3>
                            <button @click="openModalGrant = false" class="text-gray-400 hover:text-gray-200">
                                &times;
                            </button>
                        </div>

                        <!-- Form -->
                        <form wire:submit.prevent="grantApplicant">
                            <div class="flex flex-wrap -mx-2">
                                <!-- Tagging and Validation Date Field -->
                                <div class="w-full md:w-1/3 px-2 mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black"
                                        for="irs-date">DATE OF RIS</label>
                                    <input type="date" id="irs-date" wire:model="date_of_ris" max="{{ now()->toDateString() }}" required
                                        class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]">
                                    @error('date_of_ris') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full md:w-1/3 px-2 mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black"
                                        for="delivery-date">DATE OF DELIVERY</label>
                                    <input type="date" id="delivery-date" wire:model="date_of_delivery" required
                                        class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]"
                                        max="{{ now()->toDateString() }}">
                                    @error('date_of_delivery') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full md:w-1/3 px-2 mb-4">
                                    <label class="block text-[12px] font-medium mb-2 text-black"
                                        for="ar_no">AR N0.</label>
                                    <input type="number" id="ar_no" wire:model="ar_no"
                                        class="w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-400 text-[12px]">
                                    @error('ar_no') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-4">MATERIALS DELIVERED</label>
                            <div class="flex flex-wrap -mx-2 text-start">
                                <div class="w-full md:w-3/12 px-2 mb-2">
                                    <label
                                        class="block text-[12px] font-medium text-gray-700">ITEM</label>
                                </div>
                                <div class="w-full md:w-2/12 px-2 mb-2 text-end">
                                    <label class="block text-[12px] font-medium text-black">STOCK</label>
                                </div>
                                <div class="w-full md:w-2/12 px-2 mb-2 text-end">
                                    <label class="block text-[12px] font-medium text-black">QTY</label>
                                </div>
                                <div class="w-full md:w-2/12 px-2 mb-2 text-end">
                                    <label class="block text-[12px] font-medium text-black">UNIT</label>
                                </div>
                                <div class="w-full md:w-3/12 px-2 mb-2 text-center">
                                    <label class="block text-[12px] font-medium text-black">PO NO.</label>
                                </div>
                            </div>
                            <div>
                                @foreach ($materials as $index => $material)
                                <div class="flex flex-wrap -mx-2">
                                    <!-- Material Select -->
                                    <div class="w-full md:w-4/12 px-2 mb-2" x-data="{ query: '', suggestions: [], showSuggestions: false }" @click.away="showSuggestions = false">
                                        <input
                                            type="text"
                                            x-model="query"
                                            @input.debounce.300ms="$wire.searchMaterials(query).then(data => { suggestions = data; showSuggestions = true; })"
                                            placeholder="Type to search materials..."
                                            class="uppercase w-full px-1 py-1.5 bg-white border border-gray-600 rounded-lg placeholder-gray-400 text-gray-700 focus:outline-none text-[12px]" />

                                        <ul x-show="showSuggestions && suggestions.length" class="bg-white border text-black border-gray-300 rounded-lg shadow-lg mt-1 max-h-40 overflow-y-auto uppercase">
                                            <template x-for="(item, index) in suggestions" :key="index">
                                                <li
                                                    @click="$wire.selectMaterial({{ $index }}, item.id); query = item.item_description; showSuggestions = false;"
                                                    class="px-3 py-2 cursor-pointer hover:bg-gray-100">
                                                    <span x-text="item.item_description"></span>
                                                </li>
                                            </template>
                                        </ul>

                                        @error('materials.' . $index . '.material_id')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Available quantity -->
                                    <div class="w-full md:w-2/12 px-2 mb-2">
                                        <input type="text" wire:model="materials.{{ $index }}.available_quantity" readonly class="uppercase w-full p-1 border text-[12px] border-gray-600 rounded-lg text-gray-800 focus:outline-none" placeholder="available">
                                    </div>

                                    <!-- Quantity Input -->
                                    <div class="w-full md:w-2/12 px-2 mb-2">
                                        <input type="number" wire:model="materials.{{ $index }}.grantee_quantity" required class="uppercase w-full px-3 py-1 bg-white-700 border border-gray-600 rounded-lg placeholder-gray-400 text-gray-800 focus:outline-none text-[12px]" placeholder="Quantity">
                                        @error('materials.' . $index . '.grantee_quantity') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>

                                    <!-- Material Unit -->
                                    <div class="w-full md:w-2/12 px-2 mb-2">
                                        <input type="text" wire:model="materials.{{ $index }}.materialUnitDisplay" readonly class="uppercase w-full p-1 border text-[12px] border-gray-600 rounded-lg text-gray-800 focus:outline-none" placeholder="Material Unit">
                                    </div>

                                    <!-- PO Number -->
                                    <div class="w-full md:w-2/12 px-2 mb-2">
                                        <input type="text" wire:model="materials.{{ $index }}.purchaseOrderDisplay" readonly class="uppercase w-full p-1 border text-[12px] border-gray-600 rounded-lg text-gray-800 focus:outline-none" placeholder="PO Number">
                                    </div>
                                </div>
                                @endforeach

                                <!-- Add Material Button -->
                                <div class="flex justify-center mt-4 mb-4">
                                    <button type="button" wire:click="addMaterial" class="px-3 py-1 bg-custom-yellow text-white rounded-md text-xs hover:bg-custom-yellow">Add Materials Delivered</button>
                                </div>


                                <!-- House Situation Upload -->
                                <h2 class="block text-[12px] font-medium mb-2 text-black mt-4">UPLOAD PHOTO</h2>
                                <p class="text-gray-500 text-xs">Upload here the photo after delivery.</p>

                                <!-- Drag and Drop Area -->
                                <div x-data="fileUpload()">
                                    <div class="border-2 border-dashed border-green-500 rounded-lg p-4 flex flex-col items-center space-y-1">
                                        <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 011-7.874V7a5 5 0 018.874-2.485A5.5 5.5 0 1118.5 15H5z" />
                                        </svg>
                                        <button type="button" class="px-3 py-1 bg-green-600 text-white rounded-md text-xs hover:bg-green-700"
                                            @click="$refs.fileInput.click()">BROWSE FILES
                                        </button>

                                        <!-- Hidden File Input -->
                                        <input type="file" x-ref="fileInput" wire:model="images" class="hidden"
                                            @change="addFiles($refs.fileInput.files)" multiple />
                                        @error('images')
                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Show selected file and progress bar when a file is selected -->
                                    <template x-for="(fileWrapper, index) in files" :key="index">
                                        <div @click="openPreviewModal = true; selectedFile = fileWrapper" class="mt-4 bg-white p-2 rounded-lg shadow">
                                            <div class="flex items-center justify-between mb-2">
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 text-orange-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 3v6h4l1 1h4V3H7z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8v10h14V8H5z" />
                                                    </svg>
                                                    <span class="text-xs font-medium text-gray-700" x-text="fileWrapper.displayName"></span>
                                                </div>
                                                <!-- Status -->
                                                <span class="text-xs text-green-500 font-medium" x-text="fileWrapper.progress + '%'"></span>
                                            </div>
                                            <!-- Progress Bar -->
                                            <div class="h-1.5 bg-gray-200 rounded-full overflow-hidden cursor-pointer">
                                                <div class="h-full bg-green-500" x-bind:style="'width: ' + fileWrapper.progress + '%'"></div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Preview Modal (Triggered by Clicking the Progress Bar) -->
                                    <div x-show="openPreviewModal"
                                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 shadow-lg"
                                        x-cloak>
                                        <div class="bg-white w-[600px] rounded-lg shadow-lg p-6 relative">
                                            <!-- Modal Header with File Name -->
                                            <div class="flex justify-between items-center mb-4">
                                                <!-- Only show input if selectedFile is not null -->
                                                <template x-if="selectedFile">
                                                    <input type="text" x-model="selectedFile.displayName"
                                                        class="text-[13px] w-[60%] font-regular text-black border-none focus:outline-none focus:ring-0"
                                                        placeholder="Rename file">
                                                    @error('images') <span class="error text-red-600">{{ $message }}</span> @enderror
                                                </template>
                                                <button @click="openPreviewModal = false" class="text-gray-400 hover:text-gray-200">
                                                    &times;
                                                </button>
                                            </div>

                                            <!-- Display Image -->
                                            <div class="flex justify-center mb-4">
                                                <img :src="selectedFile && selectedFile.file ? URL.createObjectURL(selectedFile.file) :  '/storage/images/default.jpg'"
                                                    alt="Preview Image" class="w-full h-auto max-h-[60vh] object-contain">
                                            </div>
                                            <!-- Modal Buttons -->
                                            <div class="flex justify-between mt-4 ">
                                                <button type="button" class="px-4 py-2 bg-green-600 text-white rounded-lg"
                                                    @click="confirmFile(); $wire.grantApplicant(selectedFile.file)">CONFIRM
                                                </button>
                                                <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-lg"
                                                    @click="removeFile(selectedFile); openPreviewModal = false">REMOVE
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Buttons -->
                                <div class="grid grid-cols-2 gap-4 mt-6">
                                    <div>
                                        <div class="alert"
                                            :class="{primary:'alert-primary', success:'alert-success', danger:'alert-danger', warning:'alert-warning'}[(alert.type ?? 'primary')]"
                                            x-data="{ open:false, alert:{} }"
                                            x-show="open" x-cloak
                                            x-transition:enter="animate-alert-show"
                                            x-transition:leave="animate-alert-hide"
                                            @alert.window="open = true; setTimeout( () => open=false, 3000 ); alert=$event.detail[0]">
                                            <div class="alert-wrapper">
                                                <strong x-html="alert.title">Title</strong>
                                                <p x-html="alert.message">Description</p>
                                            </div>
                                            <i class="alert-close fa-solid fa-xmark" @click="open=false"></i>
                                        </div>
                                        <button type="submit"
                                            class="w-full py-2 bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                            <span class="text-[12px]">GRANT APPLICANT</span>
                                            <div wire:loading>
                                                <svg aria-hidden="true"
                                                    class="w-5 h-5 mx-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                        fill="currentColor" />
                                                    <path
                                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                        fill="currentFill" />
                                                </svg>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </button>
                                    </div>
                                    <script>
                                        document.addEventListener('livewire.initialized', () => {
                                            let obj = @json(session('alert') ?? []);
                                            if (Object.keys(obj).length) {
                                                Livewire.dispatch('alert', [obj])
                                            }
                                        })
                                    </script>
                                    <button type="button" @click="openModalGrant = false"
                                        class="w-full py-2 bg-gray-600 hover:bg-gray-500 text-white font-semibold rounded-lg">
                                        CANCEL
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Modal Relocate - Checklist for uploading documents -->
                <div x-show="openModalDocumentsChecklist"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                    x-cloak
                    style="font-family: 'Poppins', sans-serif;">
                    <!-- Modal -->
                    <div class="bg-white w-full max-w-7xl mx-4 rounded-xl shadow-2xl relative max-h-[90vh] flex flex-col">
                        <!-- Modal Header -->
                        <div class="flex-none flex justify-between items-center p-4 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900">DOCUMENTS/REQUIREMENTS CHECKLIST</h3>
                            <button @click="openModalDocumentsChecklist = false" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">
                                &times;
                            </button>
                        </div>

                        <!-- Modal Content - Scrollable Area -->
                        <div class="flex-1 p-8 overflow-y-auto">
                            <form wire:submit.prevent="submit">
                                <!-- Horizontal Scrollable Container -->
                                <div class="w-full overflow-x-auto pb-4">
                                    <div class="flex flex-nowrap gap-4 min-w-full">
                                        <!-- 1st Attachment - Request Letter Address to City Mayor-->
                                        <div class="flex-none w-80 bg-gray-50 p-2 rounded-lg shadow-sm">
                                            <p class="uppercase font-bold text-gray-900 text-sm">
                                                {{ $attachmentLists->where('id', 1)->first()->attachment_name ?? 'Request Letter Address to City Mayor' }}
                                            </p>

                                            <!-- File upload -->
                                            <div wire:ignore x-data="{ isUploading: false }" x-init="
                                                FilePond.registerPlugin(FilePondPluginImagePreview);
                                                const pond = FilePond.create($refs.input, {
                                                    allowFileEncode: true,
                                                    onprocessfilestart: () => { isUploading = true; },
                                                    onprocessfile: (error, file) => { isUploading = false; },
                                                    server: {
                                                        process: (fileName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                            @this.upload('requestLetterAddressToCityMayor', file, load, error, progress);
                                                        },
                                                        revert: (fileName, load) => {
                                                            @this.removeUpload('requestLetterAddressToCityMayor', fileName, load);
                                                        },
                                                    },
                                                });">
                                                <input x-ref="input" type="file" accept="image/*,application/pdf" wire:model="requestLetterAddressToCityMayor">
                                                @error('requestLetterAddressToCityMayor')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror
                                            </div>
                                        </div>

                                        <!-- 2nd attachment - Certificate of Indigency -->
                                        <div class="flex-none w-80 bg-gray-50 p-2 rounded-lg shadow-sm">
                                            <div class="mb-1">
                                                <p class="uppercase font-bold text-gray-900 text-sm">
                                                    {{ $attachmentLists->where('id', 2)->first()->attachment_name ?? 'Certificate of Indigency' }}

                                                </p>
                                            </div>

                                            <!-- File upload -->
                                            <div wire:ignore x-data="{ isUploading: false }" x-init="
                                                FilePond.registerPlugin(FilePondPluginImagePreview);
                                                const pond = FilePond.create($refs.input, {
                                                    allowFileEncode: true,
                                                    onprocessfilestart: () => { isUploading = true; },
                                                    onprocessfile: (error, file) => { isUploading = false; },
                                                    server: {
                                                        process: (fileName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                            @this.upload('certificateOfIndigency', file, load, error, progress);
                                                        },
                                                        revert: (fileName, load) => {
                                                            @this.removeUpload('certificateOfIndigency', fileName, load);
                                                        },
                                                    },
                                                });">
                                                <input x-ref="input" type="file" accept="image/*,application/pdf" wire:model="certificateOfIndigency">
                                                @error('certificateOfIndigency')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror
                                            </div>
                                        </div>

                                        <!-- 3rd attachment - Consent Letter (if the land is not theirs) -->
                                        <div class="flex-none w-80 bg-gray-50 p-2 rounded-lg shadow-sm">
                                            <div class="mb-1">
                                                <p class="uppercase font-bold text-gray-900 text-sm">
                                                    {{ $attachmentLists->where('id', 3)->first()->attachment_name ?? 'Consent Letter (if the land is not theirs)' }}

                                                </p>
                                            </div>

                                            <!-- File upload -->
                                            <div wire:ignore x-data="{ isUploading: false }" x-init="
                                                FilePond.registerPlugin(FilePondPluginImagePreview);
                                                const pond = FilePond.create($refs.input, {
                                                    allowFileEncode: true,
                                                    onprocessfilestart: () => { isUploading = true; },
                                                    onprocessfile: (error, file) => { isUploading = false; },
                                                    server: {
                                                        process: (fileName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                            @this.upload('consentLetterIfTheLandIsNotTheirs', file, load, error, progress);
                                                        },
                                                        revert: (fileName, load) => {
                                                            @this.removeUpload('consentLetterIfTheLandIsNotTheirs', fileName, load);
                                                        },
                                                    },
                                                });">
                                                <input x-ref="input" type="file" accept="image/*,application/pdf" wire:model="consentLetterIfTheLandIsNotTheirs">
                                                @error('consentLetterIfTheLandIsNotTheirs')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror
                                            </div>
                                        </div>

                                        <!-- 4th attachment - Photocopy of ID from the Land Owner (if the land is not theirs)  -->
                                        <div class="flex-none w-80 bg-gray-50 p-2 rounded-lg shadow-sm">
                                            <div class="mb-1">
                                                <p class="uppercase font-bold text-gray-900 text-sm">
                                                    {{ $attachmentLists->where('id', 4)->first()->attachment_name ?? 'Photocopy of ID from the Land Owner (if the land is not theirs) ' }}
                                                </p>
                                            </div>

                                            <!-- File upload -->
                                            <div wire:ignore x-data="{ isUploading: false }" x-init="
                                                FilePond.registerPlugin(FilePondPluginImagePreview);
                                                const pond = FilePond.create($refs.input, {
                                                    allowFileEncode: true,
                                                    onprocessfilestart: () => { isUploading = true; },
                                                    onprocessfile: (error, file) => { isUploading = false; },
                                                    server: {
                                                        process: (fileName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                            @this.upload('photocopyOfIdFromTheLandOwnerIfTheLandIsNotTheirs', file, load, error, progress);
                                                        },
                                                        revert: (fileName, load) => {
                                                            @this.removeUpload('photocopyOfIdFromTheLandOwnerIfTheLandIsNotTheirs', fileName, load);
                                                        },
                                                    },
                                                });">
                                                <input x-ref="input" type="file" accept="image/*,application/pdf" wire:model="photocopyOfIdFromTheLandOwnerIfTheLandIsNotTheirs">
                                                @error('photocopyOfIdFromTheLandOwnerIfTheLandIsNotTheirs')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror
                                            </div>
                                        </div>

                                        <!-- 5th attachment - Profiling Form  -->
                                        <div class="flex-none w-80 bg-gray-50 p-2 rounded-lg shadow-sm">
                                            <div class="mb-1">
                                                <p class="uppercase font-bold text-gray-900 text-sm">
                                                    {{ $attachmentLists->where('id', 5)->first()->attachment_name ?? 'Profiling Form ' }}

                                                </p>
                                            </div>

                                            <!-- File upload -->
                                            <div wire:ignore x-data="{ isUploading: false }" x-init="
                                                FilePond.registerPlugin(FilePondPluginImagePreview);
                                                const pond = FilePond.create($refs.input, {
                                                    allowFileEncode: true,
                                                    onprocessfilestart: () => { isUploading = true; },
                                                    onprocessfile: (error, file) => { isUploading = false; },
                                                    server: {
                                                        process: (fileName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                            @this.upload('profilingForm', file, load, error, progress);
                                                        },
                                                        revert: (fileName, load) => {
                                                            @this.removeUpload('profilingForm', fileName, load);
                                                        },
                                                    },
                                                });">
                                                <input x-ref="input" type="file" accept="image/*,application/pdf" wire:model="profilingForm">
                                                @error('profilingForm')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Submit Button Section - Fixed at bottom -->
                                <div class="mt-4">
                                    <button type="submit"
                                        class="w-full py-2 bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white font-semibold rounded-lg flex items-center justify-center space-x-2">
                                        <span class="text-[12px]">SUBMIT</span>
                                        <div wire:loading>
                                            <svg aria-hidden="true"
                                                class="w-5 h-5 mx-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                    fill="currentColor" />
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                    fill="currentFill" />
                                            </svg>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal for viewing -->
                <div x-show="$wire.showDocumentModal"
                    class="fixed inset-0 z-50 overflow-y-auto"
                    aria-labelledby="modal-title"
                    role="dialog"
                    aria-modal="true" x-cloack>
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            Submitted Documents
                                        </h3>
                                        <div class="mt-4 grid grid-cols-1 gap-4">
                                            @foreach($currentDocuments as $document)
                                            <div class="border rounded-lg p-4 bg-gray-50">
                                                <div class="space-y-4">
                                                    <!-- Document Header -->
                                                    <div class="flex justify-between items-start">
                                                        <h4 class="font-medium text-lg text-gray-900">{{ $document['attachment_name'] }}</h4>
                                                        @if($editingDocumentId === $document['id'])
                                                        <button wire:click="cancelEdit"
                                                            class="text-gray-400 hover:text-gray-500">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                        </button>
                                                        @else
                                                        <button wire:click="startEditingDocument({{ $document['id'] }})"
                                                            class="bg-custom-red text-white px-4 py-2 rounded-full text-sm hover:bg-opacity-90 transition-colors">
                                                            Edit Photo
                                                        </button>
                                                        @endif
                                                    </div>

                                                    <!-- Current File Info -->
                                                    <div class="text-sm text-gray-600">
                                                        Current file: <span class="font-medium text-gray-900">{{ $document['file_name'] }}</span>
                                                    </div>

                                                    <!-- Image Preview -->
                                                    <div class="relative">
                                                        <img src="{{ $document['file_url'] }}"
                                                            alt="{{ $document['attachment_name'] }}"
                                                            class="rounded-lg shadow-sm max-h-48 object-cover">
                                                    </div>

                                                    <!-- Edit Form -->
                                                    @if($editingDocumentId === $document['id'])
                                                    <div class="space-y-4 mt-4 bg-white p-4 rounded-lg border">
                                                        <div>
                                                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                                                Upload New Photo
                                                            </label>
                                                            <input type="file"
                                                                wire:model="newDocument"
                                                                class="block w-full text-sm text-gray-500
                                                                  file:mr-4 file:py-2 file:px-4
                                                                  file:rounded-full file:border-0
                                                                  file:text-sm file:font-semibold
                                                                  file:bg-custom-red file:text-white
                                                                  hover:file:bg-custom-green
                                                                  cursor-pointer"
                                                                accept="image/*">
                                                        </div>
                                                        <div class="flex justify-end space-x-2">
                                                            <button wire:click="updateDocument"
                                                                class="bg-custom-green text-white px-4 py-2 rounded-full text-sm hover:bg-opacity-90 transition-colors">
                                                                Save Changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="button"
                                    wire:click="$set('showDocumentModal', false)"
                                    class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-auto sm:text-sm">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- <script>
    // Initialize FilePond instance
    document.addEventListener('livewire:load', function() {
        FilePond.create(document.querySelector('.filepond'), {
            onprocessfile: (error, file) => {
                if (error) {
                    console.error('FilePond Error:', error);
                } else {
                    console.log('File processed:', file);
                }
            }
        });
    });
</script> -->
<script>
    function fileUpload() {
        return {
            files: [],
            selectedFile: null,

            addFiles(fileList) {
                for (let i = 0; i < fileList.length; i++) {
                    const file = fileList[i];
                    this.files.push({
                        file,
                        displayName: file.name,
                        progress: 0 // Initialize progress to 0
                    });
                    // Start the upload process for the file
                    this.uploadFile(file, this.files.length - 1);
                }
            },
            removeFile(fileWrapper) {
                this.files = this.files.filter(f => f !== fileWrapper);
            },
            uploadFile(file, index) {
                const uploadSimulation = setInterval(() => {
                    if (this.files[index].progress >= 100) {
                        clearInterval(uploadSimulation);
                    } else {
                        this.files[index].progress += 10; // Simulate progress increase
                    }
                }, 100); // Adjust the speed of progress simulation
            },

            confirmFile() {
                // Logic to handle file confirmation (just close modal)
                this.openPreviewModal = false;
            }
        };
    }
</script>