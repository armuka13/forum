<x-layout>

    <form method="POST" action="/posts" class="max-w-3xl mx-auto bg-white shadow rounded-md p-8 mt-8">
        @csrf

        <h2 class="text-2xl font-semibold text-gray-900">Ask a Question</h2>
        <p class="mt-1 text-sm text-gray-600">Provide a clear title and detailed explanation.</p>

        <div class="mt-8 space-y-6">

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                <div class="mt-2">
                    <x-form-input id="title" name="title" required class="w-full"/>
                </div>
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-900">Content</label>
                <div class="mt-2">
                    <textarea
                        id="content"
                        name="content"
                        rows="6"
                        required
                        class="block w-full rounded-md bg-white/5 px-3 py-1.5
                            text-base text-black border border-black
                            outline-1 -outline-offset-1 outline-white/10
                            placeholder:text-gray-500
                            focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500
                            sm:text-sm/6"
                    ></textarea>
                </div>
            </div>

        </div>

        <!-- Buttons -->
        <div class="mt-8 flex justify-end gap-x-4">
            <x-button>
                Save
            </x-button>
        </div>

    </form>

</x-layout>
