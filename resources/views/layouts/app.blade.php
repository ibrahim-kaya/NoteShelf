<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="/assets/css/iziToast.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @yield('styles')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="/assets/js/ckeditor.js"></script>
    <script src="/assets/js/iziToast.min.js"></script>

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">

    <!-- Page Content -->
    <main>

        <div class="flex bg-gray-200 w-full min-h-screen h-full">

            <div class="bg-white h-20 w-72 m-4 mr-2 rounded-lg min-h-screen shadow-lg hidden lg:block">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800 m-4">NoteShelf</h1>
                </div>

                <hr>

                <div class="flex justify-between items-center m-2 p-2 rounded-lg hover:bg-gray-100 smooth">
                    <img src="https://templates.iqonic.design/note-plus/html/assets/images/user/1.jpg"
                         alt="Profil Resmi" class="w-12 h-12 rounded-full">
                    <div class="grow">
                        <p class="ml-2">{{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
                    </div>
                    <div>
                        <p><i class="fa-solid fa-chevron-down"></i></p>
                    </div>
                </div>

                <div class="p-4">
                    <button
                        class="bg-gray-800 w-full rounded-lg text-white flex justify-between overflow-hidden hover:bg-gray-900 smooth">
                        <span class="py-1 px-3">+</span>
                        <span class="grow text-left ml-2 py-1.5">
                                    <span>Yeni Ekle</span>
                                </span>
                        <span class="px-2 py-1.5 bg-gray-900"><i class="fa-solid fa-chevron-down"></i></span>
                    </button>


                    <ul class="space-y-2 mt-4">
                        <li>
                            <a href="#"
                               class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                                <svg aria-hidden="true"
                                     class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">Notlarım</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                                <svg aria-hidden="true"
                                     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Not Kategorileri</span>
                                <span
                                    class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full">Pro</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                                <svg aria-hidden="true"
                                     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                                    <path
                                        d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Gelen Kutusu</span>
                                <span
                                    class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                                <svg aria-hidden="true"
                                     class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                          clip-rule="evenodd"></path>
                                </svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Profilim</span>
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{route('logout')}}"
                                   onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                   class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                                    <svg aria-hidden="true"
                                         class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 whitespace-nowrap">Çıkış Yap</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full m-4 ml-2">

                <div class="flex h-16">
                    <div class="w-full bg-white rounded-lg mr-2 shadow-md flex items-center p-5">

                        <p class="text-gray-600 hover:text-gray-800 smooth cursor-pointer new-note-btn"><i
                                class="fa-solid fa-pen text-xs"></i> Yeni not ekle...</p>

                    </div>

                    <div class="w-20 bg-white rounded-lg ml-2 shadow-md">

                    </div>
                </div>


                <form id="new-note-form"
                      class="max-h-0 h-full transition-all ease-in-out duration-1000 overflow-hidden mt-4 new-note-container bg-white rounded-lg shadow-lg">
                    <div class="p-4">

                        <input id="note_title" name="title" type="text"
                               class="w-full border-0 outline-none focus:border-gray-500 rounded-md"
                               placeholder="Not başlığı giriniz...">
                        <div id="editor" class="h-44"></div>

                        <hr class="mb-4">

                        <div class="flex items-center">

                            <div class="relative">
                                <div class="flex items-center py-2 sm:py-1 px-2 rounded-full bg-blue-50 options">
                                    <p class="new-note-options-text mr-2">Not Simgesi:</p>
                                    <div
                                        class="note-icon flex justify-center items-center h-6 w-6 rounded-full bg-blue-100">
                                        <i class="{{ $icons->first()->icon }} text-blue-900"></i>
                                    </div>
                                    <input type="hidden" name="icon" value="1">
                                </div>

                                <div class="note-dropdown note-dropdown-alt">
                                    <div class="m-2 py-1 text-sm text-gray-700 dark:text-gray-200">
                                        <p>Bir not simgesi seçin:</p>
                                        <div class="m-2 flex">
                                            @foreach($icons as $icon)
                                                <div
                                                    class="note-icon-opt cursor-pointer m-1 flex justify-center items-center h-6 w-6 rounded-full bg-blue-100"
                                                    data-icon="{{ $icon->icon }}" data-iconid="{{ $icon->id }}">
                                                    <i class="{{ $icon->icon }} text-blue-900"></i>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="relative">
                                <div class="flex items-center py-2 sm:py-1 px-2 rounded-full bg-blue-50 options">
                                    <p class="new-note-options-text mr-2">Not Rengi:</p>
                                    <div class="note-color h-6 w-6 rounded-full bg-blue-400"></div>
                                    <input type="hidden" name="color" value="1">
                                </div>

                                <div class="note-dropdown note-dropdown-alt">
                                    <div class="m-2 py-1 text-sm text-gray-700 dark:text-gray-200">
                                        <p>Bir not rengi seçin:</p>
                                        <div class="m-2 flex">
                                            <div
                                                class="note-color-opt cursor-pointer m-1 h-6 w-6 rounded-full text-blue-400 border-blue-400 border-blue-300 bg-blue-400"
                                                data-color="#60a5fa" data-colorid="1"></div>
                                            <div
                                                class="note-color-opt cursor-pointer m-1 h-6 w-6 rounded-full text-indigo-400 border-indigo-400 border-indigo-300 bg-indigo-400"
                                                data-color="#818cf8" data-colorid="2"></div>
                                            <div
                                                class="note-color-opt cursor-pointer m-1 h-6 w-6 rounded-full text-green-400 border-green-400 border-green-300 bg-green-400"
                                                data-color="#4ade80" data-colorid="3"></div>
                                            <div
                                                class="note-color-opt cursor-pointer m-1 h-6 w-6 rounded-full text-yellow-400 border-yellow-400 border-yellow-300 bg-yellow-400"
                                                data-color="#facc15" data-colorid="4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="relative">
                                <input type="hidden" name="privacy" value="private">
                                <div
                                    class="note-privacy flex items-center ml-3 sm:py-1 py-2 px-2 rounded-full bg-blue-50 options">
                                    <i class="fa-solid fa-user text-blue-900 text-xl sm:text-base"></i>
                                    <p class="new-note-options-text">Sadece Sen</p>
                                </div>

                                <div class="note-dropdown note-dropdown-alt" style="position: absolute;">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownDefault">
                                        <p class="ml-3 mt-2 mb-2">Gizlilik Seçeneği</p>
                                        <li>
                                            <a class="privacy-opt cursor-pointer block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-black"
                                               data-text="Sadece Sen"
                                               data-class="fa-solid fa-user text-blue-900 text-xl sm:text-base"
                                               data-privacy="private"><i class="fa-solid fa-user text-gray-800"></i>
                                                Sadece
                                                Sen Gör</a>
                                        </li>
                                        <li>
                                            <a class="privacy-opt cursor-pointer block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white text-black"
                                               data-text="Herkese Açık"
                                               data-class="fa-solid fa-earth-europe text-blue-900 text-xl sm:text-base"
                                               data-privacy="public"><i
                                                    class="fa-solid fa-earth-europe text-gray-800"></i>
                                                Herkese Açık</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="relative">
                                <input type="hidden" name="password" value="">
                                <div
                                    class="note_password flex items-center ml-3 sm:py-1 py-2 px-2 rounded-full bg-blue-50 options">
                                    <i class="fa-solid fa-unlock text-blue-900 text-xl sm:text-base"></i>
                                    <p class="new-note-options-text">Şifre Yok</p>
                                </div>

                                <div class="note-dropdown note-dropdown-alt" style="position: absolute;">
                                    <div class="mt-4 m-2">
                                        <div class="relative z-0 w-full group">
                                            <input type="password" name="note_password" id="note_password"
                                                   class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" "/>
                                            <label for="note_password"
                                                   class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Not
                                                Şifresi</label>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="button"
                                                    class="pass_save bg-green-500 hover:bg-green-600 rounded-lg px-2 py-1 mt-2 text-sm text-white">
                                                Onayla
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-1.5 my-4 mx-1 float-right smooth save-note">
                            Kaydet
                        </button>
                        <button type="button"
                                class="bg-gray-500 hover:bg-gray-600 text-white rounded-lg px-4 py-1.5 my-4 mx-1 float-right smooth close-new-note">
                            Kapat
                        </button>
                    </div>
                </form>

                <div class="w-full bg-white rounded-lg mt-8 shadow-md p-5">

                    @yield('content')

                </div>


            </div>

        </div>


    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function hideDropDown() {
        var menu = $('.note-dropdown.swing-in-top-fwd');
        menu.fadeOut('slow');
        menu.removeClass('swing-in-top-fwd').addClass('swing-out-top-bck');
        if (menu.hasClass('note-dropdown-alt')) $('.new-note-container').css('max-height', '-=' + menu.height() + 'px');
        $('.dropdown-bg').fadeOut();
    }
</script>

@yield('scripts')
</body>
</html>
