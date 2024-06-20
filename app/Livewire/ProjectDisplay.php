<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Village;
use Livewire\Component;
use App\Models\District;
use App\Models\Subdistrict;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProjectDisplay extends Component
{
    use WithPagination;

    public $province_id;
    public $district_id;
    public $subdistrict_id;
    public $village_id;
    public $locationLevel;
    public $locationLabel;

    public function mount()
    {
        $user = Auth::user();
        $this->village_id = $user->village_id;
        $this->setProjectVillage();
    }

    public function setProjectVillage()
    {
        $this->locationLevel = 'village';
        $this->setLocationLabel();
    }

    public function setProjectSubdistrict()
    {
        $subdistrict = Village::findOrFail($this->village_id)->subdistrict_id;
        $this->subdistrict_id = $subdistrict;
        $this->locationLevel = 'subdistrict';
        $this->setLocationLabel();
    }

    public function setProjectDistrict()
    {
        $district = Subdistrict::findOrFail($this->subdistrict_id)->district_id;
        $this->district_id = $district;
        $this->locationLevel = 'district';
        $this->setLocationLabel();
    }

    public function setProjectProvince()
    {
        $province = District::findOrFail($this->district_id)->province_id;
        $this->province_id = $province;
        $this->locationLevel = 'province';
        $this->setLocationLabel();
    }

    private function setLocationLabel()
    {
        switch ($this->locationLevel) {
            case 'village':
                $this->locationLabel = 'Desa';
                break;
            case 'subdistrict':
                $this->locationLabel = 'Kecamatan';
                break;
            case 'district':
                $this->locationLabel = 'Kabupaten';
                break;
            case 'province':
                $this->locationLabel = 'Provinsi';
                break;
        }
    }

    public function getProjectsProperty()
    {
        $query = Project::where('status', 'open');

        if ($this->locationLevel === 'village') {
            $query->where('village_id', $this->village_id);
        }

        if ($this->locationLevel === 'subdistrict') {
            $query->where('subdistrict_id', $this->subdistrict_id);
        }

        if ($this->locationLevel === 'district') {
            $query->where('district_id', $this->district_id);
        }

        if ($this->locationLevel === 'province') {
            $query->where('province_id', $this->province_id);
        }

        return $query->paginate(9);
    }

    public function render()
    {
        return view('livewire.project-display', [
            'projects' => $this->projects,
        ]);
    }
}
