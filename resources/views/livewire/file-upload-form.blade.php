<div class="d-flex flex-column align-items-center">
    @if (session('success'))
        <div class="alert alert-success mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="content d-inline-block mt-2 border p-5">
        <h1 class="m-3 text-center border-bottom">Register Form</h1>
        
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input wire:model="name" class="form-control" type="text" name="name" id="" placeholder="ex.: John Doe">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input wire:model="email" class="form-control" type="email" name="email" placeholder="ex.: jonh@foobar.com">
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
            <label for="file">File: </label>
            <input class="form-control" type="file" name="file">
        </div>

        <button wire:click="submit" type="submit" class="btn btn-primary mb-3">Submit</button>
    </div>
</div>
