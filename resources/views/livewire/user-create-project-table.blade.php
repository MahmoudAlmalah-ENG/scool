<form class="row g-3" wire:submit.prevent="store" enctype="multipart/form-data">
    <div class="col-12 col-md-12 text-center">
        <label class="form-label" for="name">Name</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control text-center"
               wire:model="name"
        />
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-12 col-md-12 text-center">
        <label class="form-label" for="description">Description</label>
        <textarea id="description"
                  name="description"
                  class="form-control text-center"
                  wire:model="description"
        ></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    <div class="col-12 col-md-12 text-center" id="image">
        <label class="form-label" for="images">Images</label>
        <input type="file"
               id="images"
               name="images"
               class="form-control text-center"
               wire:model="images"
               accept="image/*"
               multiple
        />
        @error('images') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if($images)
        <div class="col-12 col-md-12 text-center" id="image">
            <label class="form-label" for="images">Images</label>
            <div class="row">
                @foreach($images as $file)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <img src="{{ $file->temporaryUrl() }}"
                             alt="-"
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
               wire:model="video"
        />
        @error('video') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if($video)
        <div class="col-12 col-md-12 text-center" id="video">
            <label class="form-label" for="video">Video</label>
            <video controls style="width: inherit;">
                <source src="{{ $video->temporaryUrl() }}">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif

    <progress max="100" wire:loading wire:target="store" class="col-12 col-md-12"></progress>
    <progress max="100" wire:loading wire:target="images" class="col-12 col-md-12"></progress>
    <progress max="100" wire:loading wire:target="video" class="col-12 col-md-12"></progress>

    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary me-sm-3 me-1"
                wire:loading.attr="disabled" wire:target="store" wire:target="images" wire:target="video">
            Submit
        </button>
        <button type="reset" class="btn btn-label-secondary"
                data-bs-dismiss="modal" aria-label="Close">
            Cancel
        </button>
    </div>
</form>
