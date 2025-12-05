<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-black">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="/login" method="POST" class="space-y-6">
      @csrf

      <div>
        <label for="email" class="block text-sm/6 font-medium text-black">Email address</label>
        <div class="mt-2">
          <x-form-input id="email" type="email" name="email" required placeholder="johndoe@example.com"></x-form-input>
          <x-form-error name="email" />

        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-black">Password</label>
          <div class="text-sm">
            <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot password?</a>
          </div>
        </div>
        <div class="mt-2">
          <x-form-input id="password" type="password" name="password" required></x-form-input>
          <x-form-error name="password" />
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-gray-400">
      Not a member?
      <a href="/register" class="font-semibold text-indigo-400 hover:text-indigo-300">REGISTER</a>
    </p>
  </div>
</div>
