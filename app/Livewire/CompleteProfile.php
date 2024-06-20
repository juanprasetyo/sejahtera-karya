<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Village;

class CompleteProfile extends Component
{
    public $provinces;
    public $districts = [];
    public $subdistricts = [];
    public $villages = [];

    public $selectedProvince = null;
    public $selectedDistrict = null;
    public $selectedSubdistrict = null;
    public $selectedVillage = null;
    
    public function mount()
    {
        $this->provinces = Province::all();
    }
        
    public function updatedSelectedProvince($provinceId)
    {
        $this->districts = District::where('province_id', $provinceId)->get();
        $this->reset(['selectedDistrict', 'subdistricts', 'selectedSubdistrict', 'villages', 'selectedVillage']);
    }

    public function updatedSelectedDistrict($districtId)
    {
        $this->subdistricts = Subdistrict::where('district_id', $districtId)->get();
        $this->reset(['selectedSubdistrict', 'villages', 'selectedVillage']);
    }

    public function updatedSelectedSubdistrict($subdistrictId)
    {
        $this->villages = Village::where('subdistrict_id', $subdistrictId)->get();
        $this->reset(['selectedVillage']);
    }

    public function render()
    {
        return view('livewire.complete-profile');
    }
}
