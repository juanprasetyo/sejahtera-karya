<div>
    <form method="POST" action="{{ route('user.complete-profile.update') }}">
        @csrf
        <div class="form-control my-3">
            <label class="mb-2" for="province">Province</label>
            <select wire:model.live="selectedProvince" id="province">
                <option value="" selected>Choose a province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control my-3">
            <label class="mb-2" for="district">District</label>
            <select wire:model.live="selectedDistrict" id="district">
                <option value="" selected>Choose a district</option>
                @if ($selectedProvince)
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-control my-3">
            <label class="mb-2" for="subdistrict">Subdistrict</label>
            <select wire:model.live="selectedSubdistrict" id="subdistrict">
                <option value="" selected>Choose a subdistrict</option>
                @if ($selectedDistrict)
                    @foreach($subdistricts as $subdistrict)
                        <option value="{{ $subdistrict->id }}">{{ $subdistrict->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-control my-3">
            <label class="mb-2" for="village">Village</label>
            <select wire:model.live="selectedVillage" id="village" name="village_id">
                <option value="" selected>Choose a village</option>
                @if ($selectedSubdistrict)
                    @foreach($villages as $village)
                        <option value="{{ $village->id }}">{{ $village->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        @if ($selectedVillage)
        <div class="mt-4">
            <button class="btn btn-primary w-full" type="submit">Save</button>
        </div>
        @endif
    </form>
</div>
