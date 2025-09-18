@if(session('success'))
    <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
        {{ session('success') }}
    </div>
@endif


<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>