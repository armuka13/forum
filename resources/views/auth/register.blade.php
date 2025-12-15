<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <style>
      /* Visual feedback using HTML5 validity states (no JS) */
      input:invalid {
        box-shadow: none;
        border-color: black; /* red-500 */
      }
      input:valid {
        box-shadow: none;
        border-color: #16a34a; /* green-600 */
      }
      .requirements { color: #6b7280; } /* gray-500 */
    </style>
</head>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="text-center text-2xl/9 font-bold tracking-tight text-black">REGISTER</h2>
  </div>

  <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
    <form method="POST" action="/register" class="space-y-6">
        @csrf
      <div>
        <label for="name" class="block text-sm/6 font-medium text-black">Name</label>
        <div class="mt-2">
            <x-form-input id="name" type="text" name="name" required></x-form-input>
            <x-form-error name="name" />

        </div>
      </div>
      <div>
        <label for="email" class="block text-sm/6 font-medium text-black">Email address</label>
        <div class="mt-2">
            <x-form-input id="email" type="email" name="email" required></x-form-input>
            <x-form-error name="email" />

        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-black">Password</label>
        </div>
        <div class="mt-2">
          <x-form-input id="password" type="password" name="password" required aria-describedby="password-requirements" minlength="8" pattern="(?=.*[A-Za-z])(?=.*\\d).{8,}" title="At least 8 characters, including one letter and one number."></x-form-input>
          <x-form-error name="password" />
          <div id="password-requirements" class="mt-2 text-sm requirements">
            <p class="font-medium">Password requirements:</p>
            <ul class="mt-1 space-y-1">
              <li>• At least 8 characters</li>
              <li>• At least one letter</li>
              <li>• At least one number</li>
            </ul>
          </div>
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-black">Password Confirmation</label>
        </div>
        <div class="mt-2">
          <x-form-input id="password_confirmation" type="password" name="password_confirmation" required minlength="8" title="Repeat the password above."></x-form-input>
          <x-form-error name="password confirmation" />

        </div>
      </div>
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Register</button>
      </div>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-400">
      Already have an account?
      <a href="/login" class="font-semibold text-indigo-400 hover:text-indigo-300">Log In</a>
    </p>

  </div>
</div>
