<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f3f6d5] min-h-screen">

<header class="bg-[#8e7cc3] text-white p-4 flex justify-between items-center shadow">
    <h1 class="text-xl font-bold">Dashboard Admin</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="bg-[#d9534f] px-4 py-1 rounded-lg hover:bg-red-600 transition">
            Logout
        </button>
    </form>
</header>


<main class="p-6">

    <form method="GET" action="{{ route('admin.dashboard') }}"
          class="flex flex-wrap gap-2 mb-5">
        
        <select name="status"
            class="border-2 border-[#8e7cc3] p-2 rounded-lg">
            <option value="">Semua Status</option>
            <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>
                Waiting
            </option>
            <option value="checked_in" {{ request('status') == 'checked_in' ? 'selected' : '' }}>
                Checked In
            </option>
        </select>

        <input type="text" name="search"
            placeholder="Cari kode tiket"
            value="{{ request('search') }}"
            class="border-2 border-[#8e7cc3] p-2 rounded-lg">

        <button type="submit"
            class="bg-[#a8dadc] px-4 py-2 rounded-lg font-semibold hover:bg-[#90cfcf] transition">
            Filter
        </button>
    </form>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-xl shadow-lg overflow-hidden">
            <thead class="bg-[#a8dadc]">
                <tr>
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Kode Tiket</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse($tickets as $ticket)
                <tr class="text-center hover:bg-gray-50">
                    <td class="p-2 border">{{ $ticket->id }}</td>
                    <td class="p-2 border">{{ $ticket->user->name }}</td>
                    <td class="p-2 border font-mono">{{ $ticket->ticket_code }}</td>
                    <td class="p-2 border">
                        {{ $ticket->ordered_at?->format('d-m-Y H:i') ?? '-' }}
                    </td>
                    <td class="p-2 border">
                        <span class="
                            px-2 py-1 rounded text-white text-sm
                            {{ $ticket->status == 'waiting' ? 'bg-orange-400' : 'bg-green-500' }}">
                            {{ $ticket->status }}
                        </span>
                    </td>
                    <td class="p-2 border">
                        @if($ticket->status === 'waiting')
                            <form method="POST" action="{{ route('admin.checkin', $ticket->id) }}">
                                @csrf
                                <button type="submit"
                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Check-in
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400">✔</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center">
                        Tidak ada tiket
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</main>
</body>
</html>
