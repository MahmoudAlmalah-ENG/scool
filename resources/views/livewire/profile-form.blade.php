@use('App\Enum\UserEnum')

<form class="row g-3" wire:submit.prevent="update" method="post" enctype="multipart/form-data">
    <div class="col-12 col-md-6">
        <label class="form-label" for="name">Name</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control"
               placeholder="John"
               wire:model="form.name"
        />
        @error('form.name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="email">Email</label>
        <input type="text"
               id="email"
               name="email"
               class="form-control"
               placeholder="example@domain.com"
               wire:model="form.email"
        />
        @error('form.email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="gender">Gender</label>
        <select id="gender"
                name="gender"
                class="select2 form-select"
                aria-label="Default select example"
                wire:model="form.gender"
        >
            <option value="{{ UserEnum::MALE->value }}">Male</option>
            <option value="{{ UserEnum::FEMALE->value }}">Female</option>
        </select>
        @error('form.gender') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="phone">Phone Number</label>
        <div class="input-group">
            <input type="text"
                   id="phone"
                   name="phone"
                   class="form-control phone-number-mask"
                   placeholder="202 555 0111"
                   wire:model="form.phone"
            />
        </div>
        @error('form.phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="address">Address</label>
        <input type="text"
               id="address"
               name="address"
               class="form-control"
               placeholder="1234 Main St"
               wire:model="form.address"
        />
        @error('form.address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="school">School</label>
        <input type="text"
               id="school"
               name="school"
               class="form-control"
               placeholder="School Name"
               wire:model="form.school"
        />
        @error('form.school') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="birthday">Birthday</label>
        <input type="date"
               id="birthday"
               name="birthday"
               class="form-control"
               wire:model="form.birthday"
        />
        @error('form.birthday') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 col-md-6">
        <label class="form-label" for="avatar">Avatar</label>
        <input type="file"
               id="avatar"
               name="avatar"
               class="form-control"
               wire:model="form.avatar"
        />
        @error('form.avatar') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">
            Submit
        </button>
        <button type="reset" class="btn btn-label-secondary"
                data-bs-dismiss="modal" aria-label="Close">
            Cancel
        </button>
    </div>
</form>
