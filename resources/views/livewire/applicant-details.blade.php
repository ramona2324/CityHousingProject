<div class="p-10 h-screen ml-[17%] mt-[60px]">
    <div class="flex bg-gray-100 text-[12px]">
        <div class="flex-1 p-6 overflow-auto">
            <form wire:submit.prevent="store">
                <div class="bg-white rounded shadow mb-4 flex items-center justify-between p-3 fixed top-[80px] left-[20%] right-[3%] z-0">
                    <div class="flex items-center">
                        <a href="{{ route('applicants') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5 text-custom-yellow mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <h2 class="text-[13px] ml-2 items-center text-gray-700">Tag Applicant</h2>
                    </div>
                    <img src="{{ asset('storage/images/design.png') }}" alt="Design"
                        class="absolute right-0 top-0 h-full object-cover opacity-100 z-0">
                    <div class="flex space-x-2 z-50">
                        <button type="submit"
                            class="bg-gradient-to-r from-custom-red to-green-700 hover:bg-gradient-to-r hover:from-custom-green hover:to-custom-green text-white text-xs font-medium px-6 py-2 rounded">
                            SUBMIT
                        </button>
                    </div>
                </div>

                <div class="flex flex-col p-3 rounded mt-12">

                    {{-- <x-validation-errors class="z-70 mb-1" />--}}

                    <h2 class="text-[30px] ml-2 items-center font-bold text-gray-700 underline">{{ $applicant->applicant_id }}</h2>
                    <h1 class="text-[25px] ml-2 items-center font-bold text-gray-700 mb-3 capitalize">
                        {{ $applicant->last_name }}, {{ $applicant->first_name }}
                        @if($applicant->middle_name) {{ $applicant->middle_name }} @endif
                    </h1>
                    <h2 class="text-[13px] ml-2 items-center font-bold text-gray-700">PERSONAL INFORMATION</h2>
                    <p class="text-[12px] ml-2 items-center text-gray-700">Encode here the personal information of the
                        Applicant from the form.</p>
                </div>

                <div class="bg-white p-6 rounded shadow mb-6">
                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label for="first-name" class="block text-[12px] font-medium text-gray-700 mb-1" aria-describedby>FIRST NAME <small class="text-red-500">(read only)</small></label>
                            <input wire:model="first_name" type="text" id="first-name" name="first-name" class="capitalize w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow cursor-default" readonly>
                            @error('first_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label for="middle_name" class="block text-[12px] font-medium text-gray-700 mb-1">MIDDLE NAME <small class="text-red-500">(read only)</small></label>
                            <input wire:model="middle_name" type="text" id="middle_name" name="middle_name" class="capitalize w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow cursor-default" readonly>
                            @error('middle_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label for="last_name" class="block text-[12px] font-medium text-gray-700 mb-1">LAST NAME <small class="text-red-500">(read only)</small></label>
                            <input wire:model="last_name" type="text" id="last_name" name="last-name" class="capitalize w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow cursor-default" readonly>
                            @error('last_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label for="suffix_name" class="block text-[12px] font-medium text-gray-700 mb-1">SUFFIX NAME <small class="text-red-500">(read only)</small></label>
                            <input wire:model="suffix_name" type="text" id="suffix_name" name="suffix_name" class="capitalize w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow cursor-default" readonly>
                            @error('suffix_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div x-data="{ civilStatus: '' }">
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="barangay" class="block text-[12px] font-medium text-gray-700 mb-1">BARANGAY <small class="text-red-500">(read only)</small></label>
                                <input wire:model="barangay" id="barangay" name="barangay" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize cursor-default" readonly>
                                @error('barangay') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="purok" class="block text-[12px] font-medium text-gray-700 mb-1">PUROK <small class="text-red-500">(read only)</small></label>
                                <input wire:model="purok" id="purok" name="purok" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize cursor-default" readonly>
                                @error('purok') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="full_address" class="block text-[12px] font-medium text-gray-700 mb-1">FULL ADDRESS</label>
                                <input wire:model="full_address" type="text" id="full_address" name="full_address" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                @error('full_address') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="civil_status" class="block text-[12px] font-medium text-gray-700 mb-1">CIVIL STATUS <span class="text-red-500">*</span></label>
                                <select x-model="civilStatus" id="civil_status" name="civil_status" wire:model="civil_status_id"
                                    class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow">
                                    <option value="">Select Status</option>
                                    @foreach($civil_statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->civil_status }}</option>
                                    @endforeach
                                </select>
                                @error('civil_status') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="contact_number" class="block text-[12px] font-medium text-gray-700 mb-1">CONTACT NUMBER <small class="text-red-500">(read only)</small></label>
                                <input wire:model="contact_number" type="text" id="contact_number" name="contact_number" required class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize cursor-default" readonly>
                                @error('contact_number') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="tribe" class="block text-[12px] font-medium text-gray-700 mb-1">TRIBE/ETHNICITY <span class="text-red-500">*</span></label>
                                <select wire:model="tribe_id" id="tribe" name="tribe" required class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                    <option value="">Select Tribe/Ethnicity</option>
                                    @foreach($tribes as $tribe)
                                    <option value="{{ $tribe->id }}">{{ $tribe->tribe_name }}</option>
                                    @endforeach
                                </select>
                                @error('tribe') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="sex" class="block text-[12px] font-medium text-gray-700 mb-1">SEX <span class="text-red-500">*</span></label>
                                <div class="flex items-center">
                                    <div class="mr-6">
                                        <input type="radio" wire:model="sex" value="Male" id="male" class="mr-2">
                                        <label for="male" class="cursor-pointer">Male</label>
                                    </div>
                                    <div>
                                        <input type="radio" wire:model="sex" value="Female" id="female" class="mr-2">
                                        <label for="female" class="cursor-pointer">Female</label>
                                    </div>
                                    @error('sex') <span class="text-red-600 error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="date_of_birth" class="block text-[12px] font-medium text-gray-700 mb-1">DATE OF BIRTH <span class="text-red-500">*</span></label>
                                <input wire:model="date_of_birth" type="date" id="date_of_birth" name="date_of_birth" required class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow">
                                @error('date_of_birth') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2">
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="religion" class="block text-[12px] font-medium text-gray-700 mb-1">RELIGION</label>
                                <select wire:model="religion_id" id="religion" name="religion" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow">
                                    <option value="">Select Religion</option>
                                    @foreach($religions as $religion)
                                    <option value="{{ $religion->id }}">{{ $religion->religion_name }}</option>
                                    @endforeach
                                </select>
                                @error('religion') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="occupation"
                                    class="block text-[12px] font-medium text-gray-700 mb-1">OCCUPATION <small>(Put N/A if none)</small> <span class="text-red-500">*</span></label>
                                <input type="text" id="occupation" name="occupation" wire:model="occupation"
                                    class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                @error('occupation') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="monthly_income" class="block text-[12px] font-medium text-gray-700 mb-1">MONTHLY
                                    INCOME <span class="text-red-500">*</span></label>
                                <input type="text" id="monthly_income" wire:model="monthly_income"
                                    class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                @error('monthly_income') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-2 mb-4">
                                <label for="family_income" class="block text-[12px] font-medium text-gray-700 mb-1">FAMILY
                                    INCOME <span class="text-red-500">*</span></label>
                                <input type="text" id="family_income" wire:model="family_income"
                                    class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                @error('family_income') <span class="text-red-600 error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <template x-if="civilStatus === '2'">
                            <div>
                                <hr class="mt-2 mb-2 ">
                                <h2 class="block text-[12px] font-medium text-gray-700 mb-2">SPOUSE DETAILS</h2>
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full md:w-1/3 px-2 mb-4">
                                        <label for="spouse_first_name" class="block text-[12px] font-medium text-gray-700 mb-1">
                                            FIRST NAME <span class="text-red-500">*</span></label>
                                        <input type="text" id="spouse_first_name" name="spouse_first_name" wire:model="spouse_first_name" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                        @error('spouse_first_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full md:w-1/3 px-2 mb-4">
                                        <label for="spouse_middle_name" class="block text-[12px] font-medium text-gray-700 mb-1">
                                            MIDDLE NAME <span class="text-red-500">*</span></label>
                                        <input type="text" id="spouse_middle_name" name="spouse_middle_name" wire:model="spouse_middle_name" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                        @error('spouse_middle_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full md:w-1/3 px-2 mb-4">
                                        <label for="spouse_last_name" class="block text-[12px] font-medium text-gray-700 mb-1">
                                            LAST NAME <span class="text-red-500">*</span></label>
                                        <input type="text" id="spouse_last_name" name="spouse_last_name" wire:model="spouse_last_name" class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                        @error('spouse_last_name') <span class="text-red-600 error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="w-full md:w-1/3 px-2 mb-4">
                                        <label for="spouse_occupation" class="block text-[12px] font-medium text-gray-700 mb-1">OCCUPATION <span class="text-red-500">*</span></label>
                                        <input type="text" id="spouse_occupation" name="spouse_occupation" wire:model="spouse_occupation"
                                            class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                        @error('spouse_occupation') <span class="text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="w-full md:w-1/3 px-2 mb-4">
                                        <label for="spouse_monthly_income" class="block text-[12px] font-medium text-gray-700 mb-1">MONTHLY
                                            INCOME <span class="text-red-500">*</span></label>
                                        <input type="text" id="spouse_monthly_income" name="spouse_monthly_income" wire:model="spouse_monthly_income"
                                            class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                        @error('spouse_monthly_income') <span class="text-red-600 error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div x-data="{
                        isEditing: false,
                        rows: [
                            { firstName: '', middleName: '', LastName: '', civilStatus: '', age: '', occupation: '', monthlyIncome: '', relationship: '' },
                        ],
                        addRow() {
                            this.rows.push({ firstName: '', middleName: '', LastName: '', civilStatus: '', age: '', occupation: '', monthlyIncome: '', relationship: '' });
                        },
                        toggleEditMode() {
                            this.isEditing = !this.isEditing;
                        }
                    }" class="mt-6">
                        <div class="flex justify-between">
                            <div class="mt-4 flex justify-start">
                                <h2 class="text-[12px] font-medium text-gray-700 mb-2">DEPENDENTS</h2>
                            </div>
                            <div class="mt-4 flex justify-end mb-2">
                                <!-- Toggle Edit/Cancel -->
                                <button type="button" @click="toggleEditMode"
                                    class="mr-4 text-[12px] px-4 py-1 bg-custom-yellow text-white hover:bg-orange-500 rounded-full">
                                    <span x-text="isEditing ? 'Cancel' : 'Edit'"></span>
                                </button>
                                <!-- Show Save button only when in editing mode -->
                                <button type="submit" x-show="isEditing" @click="toggleEditMode"
                                    class="px-4 text-[12px] py-1 bg-green-500 text-white rounded-full hover:bg-green-600">
                                    Save
                                </button>
                            </div>
                        </div>
                        <table class="w-full">
                            <thead>
                                <tr class="text-center border border-gray-700">
                                    <th class="p-2 border-b">First Name</th>
                                    <th class="p-2 border-b">Middle Name</th>
                                    <th class="p-2 border-b">Last Name</th>
                                    <th class="p-2 border-b">Civil Status</th>
                                    <th class="p-2 border-b">Age</th>
                                    <th class="p-2 border-b">Occupation</th>
                                    <th class="p-2 border-b">Monthly Income</th>
                                    <th class="p-2 border-b">Relationship</th>
                                    <th class="p-2 border-b"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="(row, index) in rows" :key="index">
                                    <tr class="odd:bg-custom-green-light even:bg-transparent text-center">
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.firstName"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                            <span x-show="!isEditing" x-text="row.firstName"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.middleName"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                            <span x-show="!isEditing" x-text="row.middleName"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.lastName"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                            <span x-show="!isEditing" x-text="row.lastName"></span>
                                        </td>
                                        <td class="border px-1 py-2">
                                            <select x-show="isEditing" x-model="row.civilStatus"
                                                class="capitalize w-full py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                                <option value="">Select Status</option>
                                                @foreach($civil_statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->civil_status }}</option>
                                                @endforeach
                                            </select>
                                            <span x-show="!isEditing" x-text="row.civilStatus"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.age"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]">
                                            <span x-show="!isEditing" x-text="row.age"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.occupation"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                            <span x-show="!isEditing" x-text="row.occupation"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.monthlyIncome"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                            <span x-show="!isEditing" x-text="row.monthlyIncome"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input x-show="isEditing" type="text" x-model="row.relationship"
                                                class="capitalize w-full px-3 py-1 bg-transparent focus:outline-none text-[12px]" oninput="capitalizeInput(this)">
                                            <span x-show="!isEditing" x-text="row.relationship"></span>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <button @click.prevent="rows.splice(index, 1)" type="button"
                                                class="text-red-500 hover:text-red-700 text-[14px]" x-show="isEditing">
                                                ✕
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <!-- Add Row Button -->
                        <div class="flex justify-end mb-4 mt-4">
                            <button @click.prevent="addRow()" type="button" x-show="isEditing"
                                class="text-white bg-green-500 hover:bg-green-600 text-[12px] px-2 py-2 rounded-md flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Add Row
                            </button>
                        </div>
                    </div>

                </div>

                <div x-data="{
                    livingSituation: @entangle('living_situation_id'),
                    livingStatus: @entangle('living_status_id')}"
                    class="bg-white p-6 rounded shadow mb-6">

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label for="tagging_date" class="block text-[12px] font-medium text-gray-700 mb-1">TAGGING DATE <span class="text-red-500">*</span></label>
                            <input wire:model="tagging_date" type="date" id="tagging_date" name="tagging_date" required class="w-full p-1 border text-[12px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize"
                                max="{{ date('Y-m-d') }}">
                            @error('tagging_date') <span class="text-red-600 error">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label for="living_situation" class="block text-[13px] font-medium text-gray-700 mb-1">LIVING SITUATION (CASE) <span class="text-red-500">*</span></label>
                            <select x-model.number="livingSituation" wire:model="living_situation_id" id="living_situation" name="living_situation" required class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                <option value="">Select situation</option>
                                @foreach($livingSituations as $livingSituation)
                                <option value="{{ $livingSituation->id }}">{{ $livingSituation->living_situation_description }}</option>
                                @endforeach
                            </select>
                            @error('living_situation') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <template x-if="livingSituation >= '1' && livingSituation <= '7'  || livingSituation === '9'">
                            <div class="w-full md:w-1/3 px-2 mb-4">
                                <label for="living_situation_case_specification" class="block text-[13px] font-medium text-gray-700 mb-1">LIVING SITUATION CASE SPECIFICATION <span class="text-red-500">*</span></label>
                                <textarea wire:model="living_situation_case_specification" type="text" id="living_situation_case_specification" name="living_situation_case_specification" placeholder="Enter case details"
                                    class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize" oninput="capitalizeInput(this)">
                                </textarea>
                                @error('living_situation_case_specification') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </template>
                        <template x-if="livingSituation == '8'">
                            <div class="w-full md:w-1/3 px-2 mb-4">
                                <label for="case_specification" class="block text-[13px] font-medium text-gray-700 mb-1">CASE SPECIFICATION <span class="text-red-500">*</span></label>
                                <select wire:model="case_specification_id" id="case_specification" name="case_specification" class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                    <option value="">Select specification</option>
                                    @foreach($caseSpecifications as $caseSpecification)
                                    <option value="{{ $caseSpecification->id }}">{{ $caseSpecification->case_specification_name }}</option>
                                    @endforeach
                                </select>
                                @error('case_specification') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </template>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label for="government_program" class="block text-[13px] font-medium text-gray-700 mb-1">SOCIAL WELFARE SECTOR <span class="text-red-500">*</span></label>
                            <select wire:model="government_program_id" id="government_program" name="government_program" required class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                <option value="">Select type of assistance</option>
                                @foreach($governmentPrograms as $governmentProgram)
                                <option value="{{ $governmentProgram->id }}">{{ $governmentProgram->program_name }}</option>
                                @endforeach
                            </select>
                            @error('government_program') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label for="living_status" class="block text-[13px] font-medium text-gray-700 mb-1">LIVING STATUS <span class="text-red-500">*</span></label>
                            <select x-model.number="livingStatus" wire:model="living_status_id" id="living_status" name="living_status" required
                                class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                <option value="">Select status</option>
                                @foreach($livingStatuses as $livingStatus)
                                <option value="{{ $livingStatus->id }}">{{ $livingStatus->living_status_name }}</option>
                                @endforeach
                            </select>
                            @error('living_status') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <template x-if="livingStatus === '1'">
                        <div class="flex flex-wrap -mx-2 ml-[33%]">
                            <div class="w-full md:w-2/4 px-2 mb-4">
                                <label for="rent_fee" class="block text-[13px] font-medium text-gray-700 mb-1">RENT FEE <span class="text-red-500">*</span></label>
                                <input wire:model="rent_fee" type="number" id="rent_fee" name="rent_fee" placeholder="How much monthly?"
                                    class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow"
                                    min="0" step="0.01">
                                @error('rent_fee') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-2/4 px-2 mb-4">
                                <label for="landlord" class="block text-[13px] font-medium text-gray-700 mb-1">LANDLORD <span class="text-red-500">*</span></label>
                                <input wire:model="landlord" type="text" id="landlord" name="landlord" placeholder="LANDLORD"
                                    class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                @error('landlord') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </template>
                    <template x-if="livingStatus === '5'">
                        <div class="flex flex-wrap -mx-2 ml-[33%]">
                            <div class="w-full md:w-2/4 px-2 mb-4">
                                <label for="house_owner" class="block text-[13px] font-medium text-gray-700 mb-1">HOUSE OWNER NAME <span class="text-red-500">*</span></label>
                                <input wire:model="house_owner" type="text" id="house_owner" name="house_owner" placeholder="HOUSE OWNER NAME"
                                    class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                                @error('house_owner') <span class="error text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </template>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label class="block text-[13px] font-bold text-gray-700 mt-1 mb-1">HOUSE MATERIALS</label>
                            <label for="roof_type" class="block text-[13px] font-medium text-gray-700 mb-1">ROOF <span class="text-red-500">*</span></label>
                            <select wire:model="roof_type_id" id="roof_type" name="roof_type" required class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                <option value="">Select type of roof</option>
                                @foreach($roofTypes as $roofType)
                                <option value="{{ $roofType->id }}">{{ $roofType->roof_type_name }}</option>
                                @endforeach
                            </select>
                            @error('roof_type') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label for="wall_type" class="block text-[13px] font-medium text-gray-700 mt-7 mb-1">WALL <span class="text-red-500">*</span></label>
                            <select wire:model="wall_type_id" id="wall_type" name="wall_type" required class="w-full p-1 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow capitalize">
                                <option value="">Select type of wall</option>
                                @foreach($wallTypes as $wallType)
                                <option value="{{ $wallType->id }}">{{ $wallType->wall_type_name }}</option>
                                @endforeach
                            </select>
                            @error('wall_type') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-2">
                        <div class="w-full md:w-full px-2 mb-4">
                            <label for="remarks" class="block text-[13px] font-medium text-gray-700 mb-1">REMARKS</label>
                            <input wire:model="remarks" type="text" id="remarks" name="remarks" class="w-full p-3 border text-[13px] border-gray-300 rounded-md focus:outline-none focus:ring-custom-yellow" oninput="capitalizeInput(this)">
                            @error('remarks') <span class="error text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="p-3 rounded">
                    <h2 class="text-[13px] ml-2 items-center font-bold text-gray-700">UPLOAD DOCUMENTS</h2>
                    <p class="text-[12px] ml-2 items-center text-gray-700">Upload here the captured requirements submitted by the qualified applicants.</p>
                </div>

                <div x-data="fileUpload()" class="bg-white p-6 rounded shadow mb-6">
                    <div class="grid grid-cols-2 gap-2">
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

                            <!-- Hidden File Input for Multiple Files -->
                            <input wire:model="photos" type="file" x-ref="fileInput" @change="addFiles($refs.fileInput.files)" multiple
                                class="hidden" />
                        </div>

                        <!-- Show selected files and progress bars -->
                        <div class="w-full grid grid-cols-1 gap-2 border-2 border-dashed border-green-500 rounded-lg p-2">
                            <template x-for="(fileWrapper, index) in files" :key="index">
                                <div @click="openPreviewModal = true; selectedFile = fileWrapper"
                                    class="bg-white p-2 shadow border-2 border-green-500 rounded-lg">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 3v6h4l1 1h4V3H7z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 8v10h14V8H5z" />
                                            </svg>
                                            <span class="text-xs font-medium text-gray-700"
                                                x-text="fileWrapper.displayName"></span>
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
                        </div>

                        <!-- Preview Modal (Triggered by Clicking a Progress Bar) -->
                        <div x-show="openPreviewModal"
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 shadow-lg"
                            x-cloak>
                            <div class="bg-white w-[600px] rounded-lg shadow-lg p-6 relative">
                                <!-- Modal Header with File Name -->
                                <div class="flex justify-between items-center mb-4">
                                    <!-- Only show input if selectedFile is not null -->
                                    <template x-if="selectedFile">
                                        <input type="text" x-model="selectedFile.displayName"
                                            class="text-[13px] w-[60%] font-regular text-black border-none focus:outline-none focus:ring-0">
                                    </template>
                                    <button class="text-orange-500 underline text-sm" @click="renameFile()">Rename File</button>
                                    <button @click="openPreviewModal = false" class="text-gray-400 hover:text-gray-200">&times;</button>
                                </div>

                                <!-- Display Image -->
                                <div class="flex justify-center mb-4">
                                    {{-- <img :src="selectedFile ? URL.createObjectURL(selectedFile.file) : '/path/to/default/image.jpg'"--}}
                                    <img :src="selectedFile && selectedFile.file ? URL.createObjectURL(selectedFile.file) : '/path/to/default/image.jpg'"
                                        alt="Preview Image" class="w-full h-auto max-h-[60vh] object-contain">
                                </div>
                                <!-- Modal Buttons -->
                                <div class="flex justify-between mt-4">
                                    <button class="px-4 py-2 bg-green-600 text-white rounded-lg"
                                        @click="openPreviewModal = false">CONFIRM
                                    </button>
                                    <button class="px-4 py-2 bg-red-600 text-white rounded-lg"
                                        @click="removeFile(selectedFile); openPreviewModal = false">REMOVE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        setTimeout(function() {
                            var flashMessage = document.getElementById('flash-message');
                            if (flashMessage) {
                                flashMessage.style.transition = 'opacity 0.5s ease'; // Smooth fade-out effect
                                flashMessage.style.opacity = '0'; // Start fading out
                                setTimeout(function() {
                                    flashMessage.remove(); // Remove the element from the DOM after the fade-out
                                }, 500); // Wait for the fade-out transition to complete (0.5s)
                            }
                        }, 3000); // Delay before the fade-out starts (3 seconds)
                    });
                </script>
                <script>
                    function fileUpload() {
                        return {
                            files: [],
                            selectedFile: null,
                            openPreviewModal: false,
                            addFiles(fileList) {
                                for (let i = 0; i < fileList.length; i++) {
                                    const file = fileList[i];
                                    this.files.push({
                                        file,
                                        displayName: file.name
                                    });
                                    // Also push to the Livewire photo array (make sure you declare this in your component)
                                    this.$wire.set('photos', [...this.photos, file]); // Assuming this.photos holds the current array
                                }
                            },
                            removeFile(fileWrapper) {
                                this.files = this.files.filter(f => f !== fileWrapper);
                            },
                            renameFile() {
                                if (this.selectedFile) {
                                    const newName = prompt('Rename File', this.selectedFile.displayName);
                                    if (newName) {
                                        this.selectedFile.displayName = newName;
                                        const fileIndex = this.files.findIndex(f => f === this.selectedFile);
                                        if (fileIndex > -1) {
                                            this.files[fileIndex].displayName = newName;
                                        }

                                    }
                                }
                            }
                        }
                    }
                </script>
                <script>
                    function capitalizeInput(input) {
                        input.value = input.value.toLowerCase().replace(/\b\w/g, function(char) {
                            return char.toUpperCase();
                        });
                    }
                </script>
            </form>
        </div>
    </div>
</div>