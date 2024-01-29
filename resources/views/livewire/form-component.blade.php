<div class="py-6" x-data="{

    detailsModal: false,
    destroyModal: false,

    form: {
        first_name: null,
        last_name: null,
        email: null,
        phone_number: null,
        notes: null,
    },


    setForm: {
        id: null,
        first_name: null,
        last_name: null,
        email: null,
        phone_number: null,
        notes: null,
    },

    showDetails(formData) {

        this.setForm = {

            id: formData.id,
            first_name: formData.first_name,
            last_name: formData.last_name,
            email: formData.email,
            phone_number: formData.phone_number,
            notes: formData.notes,

        };

        this.showDetailsModal();

    },

    findToDestroy(formData) {

        this.setForm = {

            id: formData.id,
            first_name: formData.first_name,
            last_name: formData.last_name,
            email: formData.email,
            phone_number: formData.phone_number,
            notes: formData.notes,

        };

        this.showDestroyModal();

    },


    

    destroy() {

        $wire.destroy(this.setForm).then(() => {

            this.setForm = {
                id: null,
                first_name: null,
                last_name: null,
                email: null,
                phone_number: null,
                notes: null,
            };

            this.closeModals();

        })

    },

    showDetailsModal() {
        this.detailsModal = true;
    },

    showDestroyModal() {
        this.destroyModal = true;
    },

    closeModals() {
        this.detailsModal = false;
        this.destroyModal = false;
    },

}">




    <div style="background-color: #fff" class="overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ml-4 mr-4">

        

        {{-- UPDATE MODAL --}}
        <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-500" x-show="detailsModal"
            x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-click.away="detailsModal = false" x-show="setForm">
            <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div style="background-color: #003554;"
                        class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-white">



                        <h3 class="text-2xl font-semibold text-white mb-4">Formulario</h3>

                        <br>

                        <div class="mb-4 px-10">

                            <main class="mb-4 px-10">

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Primer nombre:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setForm.first_name">
                                </div>

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Ultimo nombre:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setForm.last_name">
                                </div>

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Correo:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setForm.email">
                                </div>


                                <div class="mb-4">
                                    <label for="start" class="block text-white text-sm font-bold mb-2">Numbero
                                        telefonico:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setForm.phone_number">
                                </div>

                                <div class="mb-4">
                                    <label for="start" class="block text-white text-sm font-bold mb-2">Notas:</label>
                                    <input type="text-area" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setForm.notes">
                                </div>

                                <br>

                            </main>


                            <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button x-on:click="showDestroyModal()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-orange-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-orange-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Eliminar</button>
                                </span>
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-red-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                        x-on:click="closeModals()">Regresar</button>
                                </span>
                            </footer>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DESTROY MODAL --}}
        <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-500"
            x-show="destroyModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-click.away="destroyModal = false" x-show="setProduct">
            <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div style="background-color: #003554;"
                        class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-white">



                        <h3 class="text-2xl font-semibold text-white mb-4">Eliminar cliente</h3>

                        <br>

                        <div class="mb-4 px-10">

                            <main class="mb-4 px-10">

                                <br>
                                <label class="text-2xl font-semibold text-white mb-4">Seguro de eliminar este
                                    cliente?</label>
                                <br>

                            </main>

                            <!-- Botones y acciones del modal -->
                            <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button x-on:click="destroy()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-orange-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-orange-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Eliminar</button>
                                </span>

                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-red-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                        x-on:click="closeModals()">Regresar</button>
                                </span>
                            </footer>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div>
            <div style="background-color: #fff;" class="flex h-screen overflow-y-hidden" x-data="setup()"
                x-init="$refs.loading.classList.add('hidden')">


                <div class="flex flex-col flex-1 h-full overflow-hidden">

                    <!-- Main content -->
                    <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
                        <!-- Main content header -->
                        <div
                            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
                            <h3 class="text-2xl font-semibold whitespace-nowrap text-black">Formularios</h3>
                            <div class="space-y-6 md:space-x-2 md:space-y-0">
                                <a href="https://github.com/Kamona-WD/starter-dashboard-layout" target="_blank"
                                    class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-gray-200 rounded-md shadow hover:bg-opacity-20">
                                    <span>
                                        <svg class="w-4 h-4 text-gray-500" viewBox="0 0 16 16" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z">
                                            </path>
                                        </svg>
                                    </span>
                                    
                                </a>


                                




                            </div>
                        </div>


                        {{--<div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">


                            <div style="background-color: #D5DEEF;"
                                class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg ">
                                <div class="flex items-start justify-between">
                                    <div class="flex flex-col space-y-2">
                                        <span class="text-black">Formularios totales</span>
                                        <span class="text-lg font-semibold text-black">{{ $quantity }}</span>
                                    </div>


                                    <img class="max-w-[150px] h-auto object-cover"
                                        src="https://cdn-icons-png.flaticon.com/512/2343/2343731.png">

                                </div>

                                <div>
                                    <span class="inline-block px-2 text-sm text-white bg-green-300 rounded">14%</span>
                                    <span>from 2013</span>
                                </div>
                            </div>

                        </div>--}}



                        <h3 class="mt-6 text-xl text-black"></h3>
                        <div class="flex flex-col mt-6">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <div class="overflow-hidden border-b border-gray-200 rounded-md shadow-md">
                                        <table class="min-w-full overflow-x-scroll divide-y var(--fc-button-bg-color)">
                                            <thead style="background-color: #004d74;">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                                        Nombre
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                                        Numero telefonico
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-white uppercase">
                                                        Fecha
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                {{-- <templatex-for="iin10":key="i"> --}}
                                                @foreach ($forms as $form)
                                                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 w-10 h-10">
                                                                    <img class="w-10 h-10 rounded-full"
                                                                        src="https://c0.klipartz.com/pngpicture/492/790/gratis-png-iconos-de-computadora-compra-orden-de-compra-formulario-de-pedido.png"
                                                                        alt="" />
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $form->first_name }}</div>
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $form->last_name }}</div>
                                                                        <div class="text-sm text-gray-900">
                                                                            {{ $form->email }}</div>

                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{ $form->phone_number }}
                                                            </div>
                                                            <div class="text-sm text-gray-500"></div>
                                                        </td>
                                                        
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">{{ $form->created_at }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{ $form->updated_at }}
                                                            </div>
                                                        </td>

                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                            <button
                                                                class="bi bi-eye-fill text-blue-900 hover:text-blue-600 font-bold py-2 px-2"
                                                                x-on:click="showDetails( {{ json_encode($form) }})"></button>
                                                            <button
                                                                class="bi bi-trash3-fill  text-blue-900 hover:text-blue-600 font-bold py-2 px-2"
                                                                x-on:click="findToDestroy( {{ json_encode($form) }})"></button>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                                {{-- </template> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <!-- Main footer -->
                    <footer class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14">
                        <div>WD3 GROUP &copy; 2023</div>

                    </footer>
                </div>


            </div>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
            <script>
                const setup = () => {
                    return {
                        loading: true,
                        isSidebarOpen: false,
                        toggleSidbarMenu() {
                            this.isSidebarOpen = !this.isSidebarOpen
                        },
                        isSettingsPanelOpen: false,
                        isSearchBoxOpen: false,
                    }
                }
            </script>
            <script></script>
        </div>
    </div>
</div>
