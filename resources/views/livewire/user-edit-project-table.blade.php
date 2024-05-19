<form class="row g-3" wire:submit.prevent="update" enctype="multipart/form-data">
    <div class="col-12 col-md-12 text-center">
        <label class="form-label" for="name">Name</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control text-center"
               wire:model="form.name"
        />
        @error('form.name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-12 col-md-12 text-center">
        <label class="form-label" for="description">Description</label>
        <textarea id="description"
                  name="description"
                  class="form-control text-center"
                  wire:model="form.description"
        ></textarea>
        @error('form.description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    <div class="col-12 col-md-12 text-center" id="image">
        <label class="form-label" for="images">Images</label>
        <input type="file"
               id="images"
               name="images"
               class="form-control text-center"
               wire:model="form.images"
               accept="image/*"
               multiple
        />
        @error('form.images') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if(! is_null($this->form->old_images))
        <div class="col-12 col-md-12 text-center" id="image">
            <label class="form-label" for="images">Images</label>
            <div class="row">
                @foreach($this->form->old_images as $file)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                         <span class="btn btn-danger" wire:click="deleteImage({{ $file->id }})">
                                <i class="fas fa-trash"></i>
                        </span>
                        <img src="{{ $file->getUrl() }}"
                             alt="{{ $file->file_name }}"
                             class="img-fluid"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="col-12 col-md-12 text-center" id="video">
        <label class="form-label" for="video">Video</label>
        <input type="file"
               id="video"
               name="video"
               class="form-control text-center"
               accept="video/*"
               wire:model="form.video"
        />
        @error('form.video') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if(! is_null($this->form->old_video))
        <div class="col-12 col-md-12 text-center">
            <label class="form-label" for="video">Video</label>
            <span class="btn btn-danger" wire:click="deleteVideo()">
                <i class="fas fa-trash"></i>
            </span>
            <video controls style="width: inherit;">
                <source src="{{ $this->form->old_video }}">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif

    <progress max="100" wire:loading wire:target="update" class="col-12 col-md-12"></progress>
    <progress max="100" wire:loading wire:target="form.images" class="col-12 col-md-12"></progress>
    <progress max="100" wire:loading wire:target="form.video" class="col-12 col-md-12"></progress>

    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary me-sm-3 me-1"
                wire:loading.attr="disabled" wire:target="update" wire:target="form.images" wire:target="form.video">
            Submit
        </button>
        <button type="reset" class="btn btn-label-secondary"
                data-bs-dismiss="modal" aria-label="Close">
            Cancel
        </button>
    </div>
</form>
