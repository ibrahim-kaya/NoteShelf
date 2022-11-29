<div id="modal-bg" class="py-12 bg-gray-800/30 z-20 absolute top-0 right-0 bottom-0 left-0 close-modal"></div>
<div id="modal" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 mx-auto w-11/12 md:w-2/3 max-w-lg">
    <div class="relative bg-white shadow-md rounded border border-gray-400 max-h-[90vh]">
        <div class="modal-header flex justify-between items-center p-3">
            <div class="modal-title">
                <p>Not Başlığı</p>
            </div>
            <button
                class="cursor-pointer text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:outline-none close-modal"
                aria-label="close modal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                     height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        <div class="modal-body max-h-[70vh] overflow-scroll mb-5 p-5">
            <p>Not içeriği</p>
        </div>

        <div class="flex items-center justify-end w-full p-5">
            <button
                class="focus:outline-none transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">
                Onayla
            </button>
            <button
                class="focus:outline-none ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm close-modal">
                Kapat
            </button>
        </div>
    </div>
</div>