@extends('layouts.app')

@section('content')

    @if($status == 'success')
        <div class="dropdown-bg"></div>
        <form id="edit-note-form" data-id="{{ $note->id }}"
              class="transition-all ease-in-out duration-1000 mt-4 new-note-container bg-white rounded-lg h-full" style="max-height: 350px;">
            <div class="p-4">
                <input id="note_title" name="title" type="text"
                       class="w-full border-0 outline-none focus:border-gray-500 rounded-md"
                       placeholder="Not başlığı giriniz..." value="{{ $note->title }}">
                <div id="editor" class="h-44">{!! $note->note !!}</div>

                <hr class="mb-4">

                <div class="flex items-center">

                    <div class="relative">
                        <div class="flex items-center py-2 sm:py-1 px-2 rounded-full bg-blue-50 options">
                            <p class="new-note-options-text mr-2">Not Simgesi:</p>
                            <div
                                class="note-icon flex justify-center items-center h-6 w-6 rounded-full bg-blue-100">
                                <i class="{{ $icons->find($note->icon_id)->icon }} text-blue-900"></i>
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
                            <div class="note-color h-6 w-6 rounded-full"
                                 style="background-color: {{ $colors->find($note->color)->color }}"></div>
                            <input type="hidden" name="color" value="{{ $colors->find($note->color)->id }}">
                        </div>

                        <div class="note-dropdown note-dropdown-alt">
                            <div class="m-2 py-1 text-sm text-gray-700 dark:text-gray-200">
                                <p>Bir not rengi seçin:</p>
                                <div class="m-2 flex">
                                    @foreach($colors as $color)
                                        <div
                                            class="note-color-opt cursor-pointer m-1 h-6 w-6 rounded-full"
                                            style="background-color: {{ $color->color }};"
                                            data-color="{{ $color->color }}"
                                            data-colorid="{{ $color->id }}"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="relative">
                        <input type="hidden" name="privacy" value="{{ $note->visibility }}">
                        @if($note->visibility == 'private')
                            <div
                                class="note-privacy flex items-center ml-3 sm:py-1 py-2 px-2 rounded-full bg-blue-50 options">
                                <i class="fa-solid fa-user text-blue-900 text-xl sm:text-base"></i>
                                <p class="new-note-options-text">Sadece Sen</p>
                            </div>
                        @else
                            <div
                                class="note-privacy flex items-center ml-3 sm:py-1 py-2 px-2 rounded-full bg-blue-50 options">
                                <i class="fa-solid fa-users text-blue-900 text-xl sm:text-base"></i>
                                <p class="new-note-options-text">Herkese Açık</p>
                            </div>
                        @endif

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
                        <input type="hidden" name="password" value="{{ $note->password }}">

                        @if($note->password)
                            <div
                                class="note-password flex items-center ml-3 sm:py-1 py-2 px-2 rounded-full bg-blue-50 options">
                                <i class="fa-solid fa-lock text-blue-900 text-xl sm:text-base"></i>
                                <p class="new-note-options-text">Şifreli Not</p>
                            </div>
                        @else
                            <div
                                class="note-password flex items-center ml-3 sm:py-1 py-2 px-2 rounded-full bg-blue-50 options">
                                <i class="fa-solid fa-lock-open text-blue-900 text-xl sm:text-base"></i>
                                <p class="new-note-options-text">Şifre Yok</p>
                            </div>
                        @endif

                        <div class="note-dropdown note-dropdown-alt" style="position: absolute;">
                            <div class="mt-4 m-2">
                                <div class="relative z-0 w-full group">
                                    <input type="password" name="note_password" id="note_password"
                                           class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                           placeholder=""/>
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
            </div>
        </form>
    @else
        <h1 class="text-2xl font-bold">HATA!</h1>

        <p class="mt-5">{{ $message }}</p>
    @endif

@endsection

@section('scripts')
    @vite(['resources/js/edit-note-page.js'])
@endsection
