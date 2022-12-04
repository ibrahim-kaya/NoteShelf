<div id="modal-bg" class="hidden py-12 bg-gray-800/30 z-20 fixed top-0 right-0 bottom-0 left-0 close-modal"></div>
<div id="pw_modal"
     class="hidden fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 mx-auto w-11/12 md:w-2/4 lg:w-2/5"
     data-id="">
    <div class="relative bg-white shadow-md rounded border border-gray-400 max-h-[90vh]">
        <div class="modal-header flex justify-between items-center p-3">
            <div class="pw-modal-title">
                <p>Şifreli Not</p>
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
        <form id="unlock-note">
            <div class="modal-body max-h-[70vh] overflow-auto mb-5 p-5">
                <div>
                    <label for="note_pwd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notu
                        görüntülemek için not şifresini giriniz:</label>
                    <input type="password" id="note_pwd"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           required>
                </div>
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
        </form>
    </div>
</div>

<div class="wrapper">
    <div class="popup">
        <div class="popup-inside">
            <div class="backgrounds">
                <div class="background"></div>
                <div class="background background2"></div>
                <div class="background background3"></div>
                <div class="background background4"></div>
                <div class="background background5"></div>
                <div class="background background6"></div>
            </div>
        </div>

        <div class="content">
            <div class="modal-header flex justify-between items-center p-6">
                <div class="modal-title">
                    <p class="font-bold">Not Başlığı</p>
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

            <div class="content-wrapper">

            </div>
        </div>
    </div>
</div>
