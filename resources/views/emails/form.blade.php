<!DOCTYPE html>
<html>

<head>
    <title>Send Bulk Email</title>
    @vite('resources/css/app.css') <!-- assuming you use Vite -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Send Email to Users</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

<form method="POST" action="{{ route('email.send') }}" enctype="multipart/form-data">


            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-2">Subject</label>
                <input type="text" name="subject" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-2">Message</label>
                <textarea name="body" class="w-full border border-gray-300 rounded px-3 py-2" rows="4" required></textarea>
            </div>

 <div class="mb-4">
        <label class="block font-medium mb-2">Attachment (Image/File)</label>
        <input type="file" name="attachment" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>


            <div class="mb-4">
                <label class="block font-medium mb-2">Select Users</label>
                <div class="grid grid-cols-2 gap-2 max-h-48 overflow-y-scroll border p-2 rounded">
                    @foreach ($users as $user)
                        <label class="flex items-center">
                            <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="mr-2">
                            {{ $user->name }} ({{ $user->email }})
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Send Emails
            </button>
        </form>
    </div>

</body>

</html>
