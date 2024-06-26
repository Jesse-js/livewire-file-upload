<div class="d-flex flex-column align-items-center">
    @if (session('success'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="content mt-2 border p-5" 
        wire:keydown.shift.enter.outside.debounce="submit"
        wire:keydown.right.window.debounce="submit">
        <h1 class="m-3 text-center border-bottom">Register Form</h1>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input wire:model="name" class="form-control" type="text" name="name" id=""
                placeholder="ex.: John Doe">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input wire:model="email" class="form-control" type="email" name="email"
                placeholder="ex.: jonh@foobar.com">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password">Password: </label>
            <input wire:model="password" class="form-control" type="password" name="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">Image: </label>
            <input wire:model="image" class="form-control" accept="image/png, image/jpeg" id="image"
             type="file" name="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            @if ($image)
                <img class="image my-3" src="{{ $image->temporaryUrl() }}">
            @endif
            <div wire:loading wire:target="image">
                <span class="text-success">Uploading...</span>
            </div>
        </div>
        <div class="d-block mb-3">
            <div wire:loading.delay wire:target="submit">
                <span class="text-success d-block">Sending...</span>
            </div>
        </div>

        
        <button type="button" @click="$dispatch('person-created')" class="d-block btn btn-primary mb-3">Reload List</button>

        <button wire:loading.class="btn-secondary" wire:loading.attr="disabled" wire:click="submit" type="submit" 
        class="btn btn-primary mb-3">Create +</button>
    </div>
</div>
