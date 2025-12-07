<x-layout>
    <div class="bg-white px-4 py-6 border border-gray-200 rounded-lg mb-4">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="text-center text-2xl/9 font-bold tracking-tight text-black">Account Settings</h2>
            </div>

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <!-- Edit Profile Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-black mb-4">Edit Profile</h3>
                    <form method="POST" action="/settings/profile" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="name" class="block text-sm/6 font-medium text-black">Name</label>
                            <div class="mt-2">
                                <x-form-input id="name" type="text" name="name" value="{{ Auth::user()->name }}" required></x-form-input>
                                <x-form-error name="name" />
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm/6 font-medium text-black">Email Address</label>
                            <div class="mt-2">
                                <x-form-input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required></x-form-input>
                                <x-form-error name="email" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="flex-1 rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update Profile</button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Section -->
                <div class="border-t pt-8">
                    <h3 class="text-lg font-semibold text-black mb-4">Change Password</h3>
                    <form method="POST" action="/settings/password" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="current_password" class="block text-sm/6 font-medium text-black">Current Password</label>
                            <div class="mt-2">
                                <x-form-input id="current_password" type="password" name="current_password" required></x-form-input>
                                <x-form-error name="current_password" />
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm/6 font-medium text-black">New Password</label>
                            <div class="mt-2">
                                <x-form-input id="password" type="password" name="password" required></x-form-input>
                                <x-form-error name="password" />
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm/6 font-medium text-black">Confirm New Password</label>
                            <div class="mt-2">
                                <x-form-input id="password_confirmation" type="password" name="password_confirmation" required></x-form-input>
                                <x-form-error name="password_confirmation" />
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="flex-1 rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>