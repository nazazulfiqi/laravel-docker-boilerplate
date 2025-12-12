<div id="{{ $id ?? 'confirmModal' }}"
    class="fixed inset-0 bg-black/30 backdrop-blur-sm flex items-center justify-center z-50 hidden
           opacity-0 transition-opacity duration-300 border border-gray-200
">

    <div class="bg-white p-7 rounded-2xl shadow-2xl w-full max-w-md
                transform scale-95 opacity-0 transition-all duration-300">

        <h2 class="text-xl font-semibold text-gray-900 tracking-tight">
            {{ $title ?? 'Confirm Action' }}
        </h2>

        <p class="text-gray-600 mt-3 leading-relaxed">
            {{ $message ?? 'Are you sure you want to proceed with this action?' }}
        </p>

        <div class="flex justify-end gap-3 mt-8">

            <button
                class="cancel-btn px-4 py-2.5 rounded-lg border border-gray-300  cursor-pointer
                       text-gray-700 bg-white hover:bg-gray-100 transition font-medium">
                {{ $cancelText ?? 'Cancel' }}
            </button>

            @php
            $color = $color ?? 'blue'; // default biru
            $bgClass = $color === 'red' ? 'bg-linear-to-br from-red-500 to-red-600 hover:bg-red-500' : 'bg-linear-to-br from-blue-500 to-blue-600 hover:bg-blue-500';
            @endphp

            <button
                class="confirm-btn px-4 py-2.5 rounded-lg {{ $bgClass }}
           text-white font-medium transition flex items-center justify-center gap-2 min-w-[110px] cursor-pointer"
                data-form="{{ $confirmForm }}">
                {{ $confirmText ?? 'Confirm' }}
            </button>


        </div>
    </div>
</div>