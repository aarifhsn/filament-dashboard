<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Contact Form -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-semibold mb-4">Send us a message</h2>

            <form method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium">Your Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium">Your Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        required>
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-medium">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full rounded-lg border-gray-300 focus:border-primary-500 focus:ring-primary-500"
                        required></textarea>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg shadow hover:bg-primary-700">
                        Send Message
                    </button>
                </div>
            </form>
        </div>

        <!-- Admin Info -->
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-semibold mb-4">Contact Information</h2>

            <ul class="space-y-3 text-gray-700">
                <li>
                    <strong>Email:</strong> support@example.com
                </li>
                <li>
                    <strong>Phone:</strong> +880 123 456 789
                </li>
                <li>
                    <strong>Address:</strong> 123 Filament Street, Dhaka, Bangladesh
                </li>
            </ul>
        </div>
    </div>
</x-filament-panels::page>