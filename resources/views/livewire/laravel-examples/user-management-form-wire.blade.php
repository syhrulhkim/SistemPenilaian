
<div>
    {{-- START SECTION - USER FORM  --}}
    <div class="row">
        <div class="col-lg-4">
            <h3 style="color:black">User Details</h3>
       
            <p class="text-muted">Create a new user by fill up all required field.</p>
        </div>
        <div class="col-lg-12">
    
            <form wire:submit.prevent="store">
    
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Name</label>
                                <input wire:model="name" type="text" id="name" name="name" class="form-control" >
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-labell" style="font-weight:500">Email</label>
                                <input wire:model="email" type="email" id="email" name="email" class="form-control" >
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Password</label>
                                <input wire:model="password" type="password" id="password" name="password" class="form-control" placeholder="">
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Role</label>
                                <select wire:model="role" name="role" id="role" class="form-control custom-select" data-placeholder="Choose a Role" tabindex="1">
                                    <option value="">-- Choose a Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="hr">HR</option>
                                </select>
                                @error('role') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="card-footer" style="background-color: #f9fafb !important;border-top: none;">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            @if (session()->has('message'))
                                {{ session('message') }}
                                
                            @endif
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </form>
    
        </div>
    </div>
    {{-- END SECTION - USER FORM  --}}
</div>