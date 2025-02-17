<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CivilStatus;
use App\Models\Tribe;
use App\Models\Religion; // Assuming you have a Religion model for storing religions
use App\Models\LivingSituation;
use App\Models\CaseSpecification;
use App\Models\LivingStatus;
use App\Models\Barangay;
use App\Models\Purok;
use App\Models\StructureStatusType;
use App\Livewire\Logs\ActivityLogs;
use Illuminate\Support\Facades\Auth;

class SystemConfiguration extends Component
{
    public $civilStatuses = [];
    public $newStatus = ''; // For the input field
    public $showConfirmModal = false;
    public $indexToRemove = null;

    public $livingSituations = [];
    public $newSituation = '';
    public $living_situations;

    public $caseSpecifications = [];
    public $newSpecification = '';
    public $case_specifications;

    public $livingStatuses = [];
    public $newLivingStatus = '';
    public $living_statuses;

    public $barangays = [];
    public $newBarangay;

    public $puroks = [];
    public $newPurok;
    public $barangay_id;

    public $structure_status_types = [];
    public $newStructure = '';





    public function mount()
{
    $this->civilStatuses = CivilStatus::pluck('civil_status')->toArray();
    $this->living_situations = LivingSituation::pluck('living_situation_description')->toArray();
    $this->case_specifications = CaseSpecification::pluck('case_specification_name')->toArray();
    $this->living_statuses = LivingStatus::pluck('living_status_name')->toArray();
    $this->barangays = Barangay::pluck('name')->toArray();
    $this->puroks = Purok::pluck('name')->toArray();
    $this->structure_status_types = StructureStatusType::pluck('structure_status')->toArray(); // Added Structure Status Type
}

    public function addCivilStatusField()
    {
        // Add an empty field for civil status
        $this->civilStatuses[] = '';
    }
    public function addCivilStatus()
    {
        // Validate new status
        $this->validate([
            'newStatus' => 'required|string|unique:civil_statuses,civil_status',
        ]);

        // Add the civil status to the database and update array
        CivilStatus::create(['civil_status' => $this->newStatus]);
        $this->civilStatuses[] = $this->newStatus;

        //Log the activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Civil Status', $user);

        // Clear input and show success message
        $this->newStatus = '';
        session()->flash('message', 'Civil status added successfully!');
    }
    // Method to open the confirmation modal and set the index of the field to be removed
    public function confirmRemoveCivilStatus($index)
    {
        $this->indexToRemove = $index;
        $this->showConfirmModal = true;
    }
    // Method to remove the civil status field if confirmed
    public function removeCivilStatus()
    {
        if ($this->indexToRemove !== null) {
            unset($this->civilStatuses[$this->indexToRemove]);
            $this->civilStatuses = array_values($this->civilStatuses); // Re-index array
            $this->indexToRemove = null;
            $this->showConfirmModal = false;
            session()->flash('message', 'Civil status removed successfully.'); // Flash message for confirmation
        }
    }
   

    public function addLivingSituationField()
    {
        // Add a blank field for new entries
        $this->livingSituations[] = '';
    }

    public function addLivingSituation()
    {
        // Validate new living situation input
        $this->validate([
            'newSituation' => 'required|string|unique:living_situations,living_situation_description',
        ]);

        // Save to the database and update the list
        LivingSituation::create(['living_situation_description' => $this->newSituation]);
        $this->livingSituations[] = $this->newSituation;

        // Log the activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Living Situation', $user);

        // Clear the input field and display success message
        $this->newSituation = '';
        session()->flash('message', 'Living Situation added successfully!');
    }

    public function confirmRemoveLivingSituation($index)
    {
        // Set the index of the item to remove and show confirmation modal
        $this->indexToRemove = $index;
        $this->showConfirmModal = true;
    }

    public function addCaseSpecificationField()
    {
        // Add an empty field for case specification
        $this->caseSpecifications[] = '';
    }

    public function addCaseSpecification()
    {
        // Validate new specification
        $this->validate([
            'newSpecification' => 'required|string|unique:case_specifications,case_specification_name',
        ]);

        // Add the case specification to the database and update array
        CaseSpecification::create(['case_specification_name' => $this->newSpecification]);
        $this->caseSpecifications[] = $this->newSpecification;

        // Log the activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Case Specification', $user);

        // Clear input and show success message
        $this->newSpecification = '';
        session()->flash('message', 'Case Specification added Successfully!');
    }

    public function addLivingStatusField()
    {
        // Add an empty field for case specification
        $this->livingStatuses[] = '';
    }

    public function addLivingStatus()
    {
        // Validate new specification
        $this->validate([
            'newLivingStatus' => 'required|string|unique:living_statuses,living_status_name',
        ]);

        // Add the case specification to the database and update array
        LivingStatus::create(['living_status_name' => $this->newLivingStatus]);
        $this->livingStatuses[] = $this->newLivingStatus;

        // Log the activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Living Status', $user);

        // Clear input and show success message
        $this->newLivingStatus = '';
        session()->flash('message', 'Living Status added Successfully!');

        // Force a re-render to update the displayed list
        $this->livingStatuses = array_values($this->livingStatuses);
    }

    public function addBarangayField()
    {
        // Add an empty field for civil status
        $this->barangays[] = '';
    }
    public function addBarangay()
    {
        // Validate new status
        $this->validate([
            'newBarangay' => 'required|string|unique:barangays,name',
        ]);

        // Add the civil status to the database and update array
        Barangay::create(['name' => $this->newBarangay]);
        $this->barangays[] = $this->newBarangay;

        // Log the activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Barangay', $user);

        // Clear input and show success message
        $this->newBarangay = '';
        session()->flash('message', 'Barangay added successfully!');
    }

    public function addPurokField()
    {
        // Add an empty field for civil status
        $this->puroks[] = '';
    }
    public function addPurok()
    {
        // Validate new status
        $this->validate([
            'newPurok' => 'required|string|unique:puroks,name',
            'barangay_id' => 'required|exists:barangays,id' // Add this validation rule
        ]);

        // Log the activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Purok', $user);

        // Add the Purok to the database and update array
        Purok::create(['name' => $this->newPurok]);
        $this->puroks[] = $this->newPurok;

        // Add the Purok to the database with barangay_id
        // Purok::create([
        // 'name' => $this->newPurok,
        // 'barangay_id' => $this->barangay_id // Include barangay_id here
        // ]);


        // Clear input and show success message
        $this->newPurok = '';
        session()->flash('message', 'Purok Added Successfully!');
    }
    // public function removeLivingSituation()
    // {
    //     if ($this->indexToRemove !== null) {
    //         $situation = $this->livingSituations[$this->indexToRemove];

    //         // Remove from database
    //         LivingSituation::where('living_situation_description', $situation)->delete();

    //         // Remove from list and re-index array
    //         unset($this->livingSituations[$this->indexToRemove]);
    //         $this->livingSituations = array_values($this->livingSituations);

    //         $this->showConfirmModal = false;
    //         session()->flash('message', 'Living Situation removed successfully!');
    //     }
    // }

   
    
    public function addStructure()
    {
        $this->validate([
            'newStructure' => 'required|string|unique:structure_status_types,structure_status|max:255',
        ]);

        // // Log activity
        $logger = new ActivityLogs();
        $user = Auth::user();
        $logger->logActivity('Add New Structure Status', $user);

        // Save the new structure status
        StructureStatusType::create(['structure_status' => $this->newStructure]);

        // Update the list and reset the input
        $this->structure_status_types[] = $this->newStructure;
        $this->newStructure = '';

        session()->flash('message', 'Structure status added successfully!');
    }
    
    public function render()
    {
        return view('livewire.system-configuration');
    }
}