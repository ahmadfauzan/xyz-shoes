<!-- Modal for login and register -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content dark">

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-header">
                    <h2 class="modal-title my-auto" id="exampleModalToggleLabel">Login</h2>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="modal-body">
                    <label for="email" class="mb-2">
                        Email
                    </label>
                    <input type="text" class="form-control input-modal mb-3" name="email" :value="old('email')" required
                        autofocus>
                    <label for="password" class="mb-2">
                        Password
                    </label>
                    <input type="password" class="form-control input-modal mb-5" name="password" required
                        autocomplete="current-password">
                    <input type="submit" class="btn-primary btn-login" value="Login">
                </div>
                <div class="modal-footer text-center mb-3">
                    Don't have an account?
                    <a href="#" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">register now</a>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content dark">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="modal-header">
                    <h2 class="modal-title my-auto" id="exampleModalToggleLabel">Register</h2>
                </div>
                <div class="modal-body">
                    <label for="full_name" class="mb-2">
                        Full Name
                    </label>
                    <input type="text" class="form-control input-modal mb-3" name="name" :value="old('name')" required
                        autofocus>
                    <label for="email" class="mb-2">
                        Email
                    </label>
                    <input type="email" class="form-control input-modal mb-3" name="email" :value="old('email')"
                        required>
                    <label for="password" class="mb-2">
                        Password
                    </label>
                    <input type="password" class="form-control input-modal mb-3" name="password" required
                        autocomplete="new-password">
                    <label for="confirm_password" class="mb-2">
                        Confirm Password
                    </label>
                    <input type="password" class="form-control input-modal mb-5" name="password_confirmation" required>
                    <input type="submit" class="btn-primary btn-login" value="Register">
                </div>
                <div class="modal-footer text-center mb-3">
                    Already registered?
                    <a href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">login now</a>

                </div>
            </form>
        </div>
    </div>
</div>
