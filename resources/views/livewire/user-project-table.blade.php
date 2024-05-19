<div>

    <div class="col-12 col-md-12 text-center">
        <label class="form-label" for="name">Name</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control disabled text-center"
               wire:model="name"
               disabled
        />
    </div>

    <div class="col-12 col-md-12 text-center">
        <label class="form-label" for="description">Description</label>
        <textarea id="description"
                  name="description"
                  class="form-control disabled text-center"
                  wire:model="description"
                  disabled
        ></textarea>
    </div>

    @if(! is_null($images))
        <div class="col-12 col-md-12 text-center">
            <label class="form-label" for="images">Images</label>
            <div class="row">
                @foreach($images as $file)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <img src="{{ $file->getUrl() }}" alt="{{ $file->file_name }}" class="img-fluid"/>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(! is_null($video))
        <div class="col-12 col-md-12 text-center">
            <label class="form-label" for="video">Video</label>
            <video controls style="width: inherit;">
                <source src="{{ $video }}">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif

</div>
