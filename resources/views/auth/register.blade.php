<x-guest-layout>

        <form method="POST"  action="{{ route('register') }}">
            @csrf
            <p class="text-white text-2xl font-bold py-4">Register</p>

                <!-- Name -->
            <div class="mt-4">
                <x-input-label for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="other_name" :value="__('Other Name')" />
                <x-text-input id="other_name" class="block mt-1 w-full" type="text" name="other_name" :value="old('other_name')" required autofocus autocomplete="other_name" />
                <x-input-error :messages="$errors->get('other_name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" class="block mt-1 w-full  rounded px-2 py-1" name="gender" required autocomplete="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="country" :value="__('Country')" />
                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="state" :value="__('State')" />
                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="state" />
                <x-input-error :messages="$errors->get('state')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            @isset($referralUser)
            <div class="mt-4">
                <x-input-label for="invite" :value="__('Invite Code')" />

                <x-text-input id="invite" class="block mt-1 w-full"
                                type="text"
                                name="invite"
                                value="{{ $referralUser }}"
                                autocomplete="invite" readonly />

                <x-input-error :messages="$errors->get('invite')" class="mt-2" />
            </div>
        @else
        <div class="mt-4">
            <x-input-label for="invite" :value="__('Invite Code')" />

            <x-text-input id="invite" class="block mt-1 w-full"
                            type="text"
                            name="invite"
                            autocomplete="invite" />

            <x-input-error :messages="$errors->get('invite')" class="mt-2" />
        </div>
        @endisset
            <!-- Invite Code -->


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

</x-guest-layout>
