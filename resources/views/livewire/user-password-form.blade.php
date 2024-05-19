<form method="POST" wire:submit.prevent="update">
    <div class="alert alert-warning" role="alert">
        <h5 class="alert-heading mb-2">Ensure that these requirements are met</h5>
        <span>Minimum 8 characters long, uppercase & symbol</span>
    </div>
    <div class="row">
        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
            <label class="form-label" for="newPassword">New Password</label>
            <div class="input-group input-group-merge">
                <input class="form-control" type="password" id="newPassword" name="newPassword" wire:model="password"
                       placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 col-12 col-sm-6 form-password-toggle">
            <label class="form-label" for="confirmPassword">Confirm New Password</label>
            <div class="input-group input-group-merge">
                <input class="form-control" type="password" name="confirmPassword"
                       id="confirmPassword" wire:model="password_confirmation"
                       placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary me-2">Change Password</button>
        </div>
    </div>
</form>
