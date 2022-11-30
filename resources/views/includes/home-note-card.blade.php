<div class="p-3 bg-gray-50 rounded-lg shadow-sm hover:shadow-lg smooth border-b-4 overflow-hidden note" style="border-color: {{ $note->color }};" data-id="{{ $note->id }}">

    <div class="relative flex justify-between items-center">

        <div class="border px-2 py-1 rounded-lg" style="border-color: {{ $note->color }};">
            <i class="{{ \App\Models\NoteIcon::find($note->icon_id)->icon }}" style="color: {{ $note->color }};"></i>
        </div>

        <div class="options">
            <i class="fa-solid fa-ellipsis"></i>
        </div>
        <div class="note-dropdown">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                </li>
            </ul>
        </div>

    </div>

    <div class="flex flex-col justify-between h-[85%]">
        <div class="relative h-full mt-2">
            @if($note->password)
                <div class="locked-note">
                    <i class="fa-solid fa-lock text-6xl text-red-600/50"></i>
                </div>
            @endif
            <h3 class="text-lg font-semibold my-2 note-title" data-modal="note">{{ $note->title }}</h3>
            <p class="my-2 text-gray-600" @if($note->password) style="filter: blur(3px); user-select: none;" @endif>{{ \Illuminate\Support\Str::limit(strip_tags(((!$note->password) ? $note->note : 'Maalesef efekti kaldırınca notu göremezsin. Ama çabaların için tebrikler :) Notu görmek istiyorsan şifresini biliyor olmalısın.')), 128, '...') }}</p>

        </div>

        <div class="flex justify-between items-center mt-4 text-sm">
            <div class="flex items-center">
                <div class="flex items-center border p-1 rounded-lg">
                    @if($note->visibility == "public")
                        <i class="fa-solid fa-users text-green-400" title="Herkese Açık"></i>
                    @else
                        <i class="fa-solid fa-user text-red-400" title="Sadece Sen"></i>
                    @endif

                </div>

                <div class="flex items-center ml-2">
                    <div class="flex justify-center items-center rounded-full bg-white p-1">
                        <i class="fa-solid fa-user" style="color: {{ $note->color }};"></i>

                    </div>
                    <p class="ml-2">{{ \App\Models\User::find($note->user_id)->name }}</p>
                </div>

            </div>

            <div class="flex items-center">
                <i class="fa-solid fa-calendar-days" style="color: {{ $note->color }};"></i>
                <p class="ml-2">{{ \Carbon\Carbon::parse($note->created_at)->format('d M Y') }}</p>
            </div>
        </div>
    </div>



</div>
