<div class="py-6" x-data="{

    createModal: false,
    updateModal: false,
    destroyModal: false,

    customer: {
        first_name: null,
        last_name: null,
        email: null,
        phone_number: null,
    },


    setCustomer: {
        id: null,
        first_name: null,
        last_name: null,
        email: null,
        phone_number: null,
    },

    edit(customerData) {

        this.setCustomer = {

            id: customerData.id,
            first_name: customerData.first_name,
            last_name: customerData.last_name,
            email: customerData.email,
            phone_number: customerData.phone_number,

        };

        this.showUpdateModal();

    },

    findToDestroy(customerData) {

        this.setCustomer = {

            id: customerData.id,
            first_name: customerData.first_name,
            last_name: customerData.last_name,
            email: customerData.email,
            phone_number: customerData.phone_number,

        };

        this.showDestroyModal();

    },


    store() {

        $wire.store(this.customer).then(() => {

            this.customer = {

                id: null,
                first_name: null,
                last_name: null,
                email: null,
                phone_number: null,

            };

            this.closeModals();

        })


    },

    update() {

        $wire.update(this.setCustomer).then(() => {

            this.setCustomer = {
                id: null,
                first_name: null,
                last_name: null,
                email: null,
                phone_number: null,
            };

            this.closeModals();

        })
    },

    destroy() {

        $wire.destroy(this.setCustomer).then(() => {

            this.setCustomer = {
                id: null,
                first_name: null,
                last_name: null,
                email: null,
                phone_number: null,
            };

            this.closeModals();

        })

    },

    showCreateModal() {
        this.createModal = true;
    },

    showUpdateModal() {
        this.updateModal = true;
    },

    showDestroyModal() {
        this.destroyModal = true;
    },

    closeModals() {
        this.createModal = false;
        this.updateModal = false;
        this.destroyModal = false;
    },

}">




    <div style="background-color: #fff" class="overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 ml-4 mr-4">

        {{-- CREATE MODAL --}}
        <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-500" x-show="createModal"
            x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="opacity-100" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" x-click.away="createModal = false">

            <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div {{-- class="bg-gradient-to-br from-gray-800 to-blue-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-white" --}} style="background-color: #003554;"
                        class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-white">

                        <h3 class="text-2xl font-semibold text-white mb-4">Nuevo cliente</h3>

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
                                        id="name" x-model="customer.first_name">
                                </div>

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Ultimo nombre:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="customer.last_name">
                                </div>

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Correo:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="customer.email">
                                </div>


                                <div class="mb-4">
                                    <label for="start" class="block text-white text-sm font-bold mb-2">Numbero
                                        telefonico:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="customer.phone_number">
                                </div>

                                {{--  --}}







                                <br>

                            </main>


                            <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button x-on:click="store" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-600 focus:outline-none focus:border-green-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Agregar</button>
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

        {{-- UPDATE MODAL --}}
        <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-500" x-show="updateModal"
            x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            x-click.away="updateModal = false" x-show="setProduct">
            <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <div style="background-color: #003554;"
                        class=" px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-white">



                        <h3 class="text-2xl font-semibold text-white mb-4">Actualizar usuario</h3>

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
                                        id="name" x-model="setCustomer.first_name">
                                </div>

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Ultimo nombre:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setCustomer.last_name">
                                </div>

                                <div class="mb-4">
                                    <label for="text"
                                        class="block text-white text-sm font-bold mb-2">Correo:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setCustomer.email">
                                </div>


                                <div class="mb-4">
                                    <label for="start" class="block text-white text-sm font-bold mb-2">Numbero
                                        telefonico:</label>
                                    <input type="text" x-data="{ focused: false }"
                                        x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                        x-on:focus="focused = true" x-on:blur="focused = false"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="name" x-model="setCustomer.phone_number">
                                </div>

                                <br>

                            </main>


                            <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button x-on:click="update" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:border-blue-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Actualizar</button>
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
                            <h3 class="text-2xl font-semibold whitespace-nowrap text-black">Clientes</h3>
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
                                    <span>XD</span>
                                </a>


                                <button x-on:click="showCreateModal()"
                                    class="inline-flex items-center justify-center px-4 py-1 space-x-1 bg-blue-900 text-white rounded-md shadow animate-bounce hover:bg-blue-800 hover:text-white"
                                    style="background-color: #004d74; hover:">Agregar cliente</button>




                            </div>
                        </div>


                        {{--<div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">


                            <div style="background-color: #D5DEEF;"
                                class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg ">
                                <div class="flex items-start justify-between">
                                    <div class="flex flex-col space-y-2">
                                        <span class="text-black">Clientes totales</span>
                                        <span class="text-lg font-semibold text-black">{{ $quantity }}</span>
                                    </div>


                                    <img class="max-w-[150px] h-auto object-cover"
                                        src="data:image/png;base64,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">

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
                                                @foreach ($customers as $customer)
                                                    <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="flex-shrink-0 w-10 h-10">
                                                                    <img class="w-10 h-10 rounded-full"
                                                                        src="data:image/png;base64,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"
                                                                        alt="" />
                                                                </div>
                                                                <div class="ml-4">
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        {{ $customer->first_name }}</div>
                                                                    <div class="text-sm text-gray-900">
                                                                        {{ $customer->last_name }}</div>
                                                                        <div class="text-sm text-gray-900">
                                                                            {{ $customer->email }}</div>

                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">
                                                                {{ $customer->phone_number }}
                                                            </div>
                                                            <div class="text-sm text-gray-500"></div>
                                                        </td>
                                                        
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="text-sm text-gray-900">{{ $customer->created_at }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{ $customer->updated_at }}
                                                            </div>
                                                        </td>

                                                        <td
                                                            class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                                            <button
                                                                class="bi bi-pen text-blue-900 hover:text-blue-600 font-bold py-2 px-2"
                                                                x-on:click="edit( {{ json_encode($customer) }})"></button>
                                                            <button
                                                                class="bi bi-trash3-fill  text-blue-900 hover:text-blue-600 font-bold py-2 px-2"
                                                                x-on:click="findToDestroy( {{ json_encode($customer) }})"></button>

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
