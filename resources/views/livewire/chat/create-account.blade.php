@guest
    <div class="relative z-10">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <div x-data
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div
                                class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-orange-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>

                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full" x-data="{ name: '' }">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Entre com
                                    seu
                                    nome</h3>
                                <div class="mt-2">
                                    <input type="text" class="bg-slate-100 w-full py-2 px-4 rounded-md"
                                        placeholder="Seu Nome"id="name">
                                </div>

                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">


                        <button
                            x-on:click="
                        await $wire.set('name', 
                            document.getElementById('name').value
                        )
                        await $wire.createAccount().then((result) => {
                           if(result) {
                               window.location.reload()
                           }})
                        "
                            type="button"
                            class=" flex items-center	 mt-3 w-3 justify-center rounded-md bg-blue-950 text-white px-3 py-2 text-sm font-semibold  ring-1 ring-inset ring-gray-300 hover:bg-blue-900 sm:mt-0 sm:w-auto">Entrar
                            na conversa
                            <x-coolicon-chevron-right class="w-4 h-4" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endguest
