<div class="py-12" x-data="{

    showEventsModal: false,
    showCreateModal: false,
    showUpdateModal: false,
    showDestroyModal: false,
    createCustomerModal: false,
    updateCustomerModal: null,
    titleModal: null,
    Day: null,
    totalProducts: 0.0,
    totalPaid: 0.0,
    totalAmount: 0.0,




    event: {
        title: null,
        description: null,
        start: null,
        end: null,
        customer_id: null,
        paid: null,
        space_id: null,
        tenant_id: null,

    },

    setEvent: {
        title: null,
        description: null,
        start: null,
        end: null,
        customer_id: null,
        paid: null,
        space_id: null,
        tenant_id: null,
    },

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

    deleteDetails: [],
    deletePayments: [],

    create() {

        this.event = {
            id: null,
            title: null, //.slice(0,16)
            start: this.Day.toISOString().slice(0, 16),
            end: this.Day.toISOString().slice(0, 16),
            description: null,
            customer_id: null,
            paid: null,
            space_id: null,
            tenant_id: null,
        };

        this.closeShowEventsModal();
        this.openCreateModal();


    },

    details: [],
    product_selected_to_create: null,

    addProductToCreate() {
        this.details.push(JSON.parse(this.product_selected_to_create));
    },

    removeProductToCreate(index) {
        this.details.splice(index, 1);
    },

    payments: [], //ATRIBUTO QUE ENVIARA LOS PAGOS AL BACKEND
    payment_to_created: { quantity: '', description: '' }, //OBJETO QUE GUARDA LOS ATRIBUTOS LOS CUALES SE ENVIARAN AL ATRIBUTO payemnts


    addPaymentToCreate() {

        if (this.payment_to_created) { //SI EL ATRIBUTO payment_to_created tiene un valor

            this.payments.push({ ...this.payment_to_created }); //AGREGAR LOS DATOS DEL OBJETO AL ATRIBUTO payments

            this.payment_to_created = { quantity: '', description: '' }; //REINICAR EL OBJETO

        }

    },

    removePaymentToCreate(index) {
        this.payments.splice(index, 1);
    },
























    setDetails: [],
    setPayments: [],


    product_selected_to_update: null,

    addProductToUpdate() {
        const p = JSON.parse(this.product_selected_to_update);
        const d = {
            'product_id': p.id,
            'price': 0,
            'quantity': 0,
            'total': 0,
            'name': p.name,
        }
        this.setDetails.push(d);

    },

    removeProductToUpdate(index) {
        this.setDetails.splice(index, 1);
    },

    payment_to_update: { quantity: '', description: '' },

    addPaymentToUpdate() {

        if (this.payment_to_update) {

            this.setPayments.push({ ...this.payment_to_update });

            this.payment_to_update = { quantity: '', description: '' }; //REINICAR EL OBJETO

        }

    },

    removePaymentToUpdate(index) {
        this.setPayments.splice(index, 1);
    },






    editByEventClick(eventData) {

        const formatDateTime = (date) => {
            const pad = (n) => (n < 10 ? `0${n}` : n);
            const year = date.getFullYear();
            const month = pad(date.getMonth() + 1);
            const day = pad(date.getDate());
            const hours = pad(date.getHours());
            const minutes = pad(date.getMinutes());

            return `${year}-${month}-${day}T${hours}:${minutes}`;
        };

        // Convertir las fechas a objetos Date
        const startDate = new Date(eventData.start);
        const endDate = new Date(eventData.end);

        // Formatear las fechas en el formato deseado
        const formattedStart = formatDateTime(startDate);
        const formattedEnd = formatDateTime(endDate);

        this.setEvent = {
            id: eventData.id,
            title: eventData.title,
            start: formattedStart,
            end: formattedEnd,
            description: eventData.description,
            customer_id: eventData.customer_id,
            paid: eventData.paid,
            space_id: eventData.space_id,
            tenant_id: eventData.tenant_id,
        };

        const customers = JSON.parse($wire.get('customers'));


        const all_details = JSON.parse($wire.get('all_details'));
        const all_payments = JSON.parse($wire.get('payments'));

        all_details.forEach(detail => {
            if (detail.event_id == eventData.id) {
                this.setDetails.push({
                    id: detail.id,
                    event_id: detail.event_id,
                    product_id: detail.product_id,
                    name: detail.connection__of__detail_event__to__product.name,
                    price: detail.price,
                    quantity: detail.quantity,
                    total: detail.total,
                });
                this.totalProducts = this.totalProducts + (detail.price * detail.quantity);
            }

        })

        all_payments.forEach(payment => {
            if (payment.event_id == eventData.id) {

                this.setPayments.push({
                    id: payment.id,
                    event_id: payment.event_id,
                    quantity: payment.quantity,
                    description: payment.description,
                });
                this.totalPaid = this.totalPaid + parseFloat(payment.quantity);
            }
        });
        this.openUpdateModal();

    },

    editByEventTable(eventData) {
        this.setEvent = {
            id: eventData.id,
            title: eventData.title,
            start: eventData.start,
            end: eventData.end,
            description: eventData.description,
            customer_id: eventData.customer_id,
            paid: eventData.paid,
            space_id: eventData.space_id,
            tenant_id: eventData.tenant_id,
        };

        const all_details = JSON.parse($wire.get('all_details'));
        const all_payments = JSON.parse($wire.get('payments'));

        all_details.forEach(detail => {
            if (detail.event_id == eventData.id) {
                this.setDetails.push({
                    id: detail.id,
                    event_id: detail.event_id,
                    name: detail.connection__of__detail_event__to__product.name,
                    price: detail.price,
                    quantity: detail.quantity,
                    total: detail.total,
                });
                this.totalProducts = this.totalProducts + (detail.price * detail.quantity);
            }

        })

        all_payments.forEach(payment => {
            if (payment.event_id == eventData.id) {

                this.setPayments.push({
                    id: payment.id,
                    event_id: payment.event_id,
                    quantity: payment.quantity,
                    description: payment.description,
                });
                this.totalPaid = this.totalPaid + parseFloat(payment.quantity);
            }
        });







        this.openUpdateModal();

    },



    findToDestroy(eventData) {

        this.setEvent = {
            id: eventData.id,
        };

        this.closeShowEventsModal();
        this.openDestroyModal();

    },


    destroy() {

        $wire.destroy(this.setEvent).then(() => {

            this.setEvent = {

                title: null,
                description: null,
                start: null,
                end: null,
                customer_id: null,
                paid: null,
                space_id: null,
                tenant_id: null,

            };

            this.closeDestroyModal();
            this.openShowEventsModal();

        })

    },

    saveCustomer(){
        this.closeCreateCustomerModal();
    },

    updateCustomer(){
        this.closeUpdateCustomerModal();
    },

    store() {

        if (this.totalPaid >= this.totalAmount) {
            this.event.paid = true;
        } else {
            this.event.paid = false;
        }

        if (this.event.title != null && this.event.description != null && this.event.start != null && this.event.end != null != null && this.event.space_id != null) {
            $wire.store(this.event, this.details, this.payments, this.customer).then(() => {

                this.event = {

                    title: null,
                    description: null,
                    start: null,
                    end: null,
                    customer_id: null,
                    paid: null,
                    space_id: null,
                    tenant_id: null,

                };

                this.customer = {

                    id: null,
                    first_name: null,
                    last_name: null,
                    email: null,
                    phone_number: null,
    
                };

                this.details = [];
                this.payments = [];

                this.closeCreateModal();

            })
        } else {
            console.log('FALTARON CAMPOS');
        }


    },



    update() {

        if (this.totalPaid >= this.totalAmount) {
            this.setEvent.paid = true;
        } else {
            this.setEvent.paid = false;
        }

        $wire.update(this.setEvent, this.setDetails, this.setPayments, this.deleteDetails, this.deletePayments).then(() => {

            this.setEvent = {

                title: null,
                description: null,
                start: null,
                end: null,
                customer_id: null,
                paid: null,
                space_id: null,
                tenant_id: null,


            };

            this.setCustomer = {
                id: null,
                first_name: null,
                last_name: null,
                email: null,
                phone_number: null,
            };



            this.closeUpdateModal();

        })

    },



    //OPEN MODALS FUNCTIONS
    openShowEventsModal() {
        this.showEventsModal = true;
    },
    openCreateModal() {
        this.showCreateModal = true;
    },
    openUpdateModal() {
        this.showUpdateModal = true;
    },
    openDestroyModal() {
        this.showDestroyModal = true;
    },

    openCreateCustomerModal(){
        this.createCustomerModal = true;
    },
    openUpdateCustomerModal(){
        this.updateCustomerModal = true;
    },

    //CLOSE MODALS FUNCTIONS
    closeShowEventsModal() {
        this.showEventsModal = false;
    },
    closeCreateModal() {
        this.showCreateModal = false;
    },
    closeUpdateModal() {
        this.showUpdateModal = false;
        this.setDetails = [];
        this.setPayments = [];
        this.totalAmount = 0;
        this.totalPaid = 0;
        this.totalProducts = 0;
    },
    closeDestroyModal() {
        this.showDestroyModal = false;
    },

    closeCreateCustomerModal(){
        this.createCustomerModal = false;
    },
    closeUpdateCustomerModal(){
        this.updateCustomerModal = false;
    },


}" x-init="document.addEventListener('DOMContentLoaded', function() {

    const calendarEl = document.getElementById('calendar');

    const all_events = JSON.parse($wire.get('all_events'));

    const events = [];

    all_events.forEach(event => {
        events.push({

            id: event.id,
            title: event.title,
            start: event.start,
            end: event.end,

            extendedProps: {
                description: event.description,
                customer_id: event.customer_id,
                paid: event.paid,
                space_id: event.space_id,
                tenant_id: event.tenant_id,
            }

        })

    })


    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: events,
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
            //right: 'dayGridMonth,listWeek'
        },

        //editable: true,

        eventColor: '#1E0DDB',

        dateClick: function(info) {

            const selectedDay = info.date;
            Livewire.emit('show', selectedDay);

            const formattedDay = selectedDay.toLocaleDateString('es-ES', {
                year: 'numeric',
                weekday: 'long',
                day: 'numeric',
                month: 'long'
            });

            titleModal = formattedDay;
            Day = selectedDay;

            openShowEventsModal();

        },

        eventClick: function(info) {

            const eventData = {

                id: info.event.id,
                title: info.event.title,
                start: info.event.start,
                end: info.event.end,
                description: info.event.extendedProps.description,
                customer_id: info.event.extendedProps.customer_id,
                space_id: info.event.extendedProps.space_id,
                tenant_id: info.event.extendedProps.tenant_id,

            };

            editByEventClick(eventData);

        },


        /*eventDrop: function(info) {

            const start = info.event.start;
            const end = info.event.end;

            // Obtener hora y minutos de start
            const startHours = start.getHours();
            const startMinutes = start.getMinutes();

            // Obtener hora y minutos de end (si es diferente de null)
            let endHours = null;
            let endMinutes = null;

            if (end) {
                endHours = end.getHours();
                endMinutes = end.getMinutes();
            }

            const eventData = {
                id: info.event.id,
                title: info.event.title,
                start: info.event.start,
                end: info.event.end,
                description: info.event.extendedProps.description,
                cost: info.event.extendedProps.cost,
                customer: info.event.extendedProps.customer,
                startHours: startHours,
                startMinutes: startMinutes,
                endHours: endHours,
                endMinutes: endMinutes,
            };

            $wire.update(eventData);

        },*/

    });

    calendar.render();

    Livewire.on('closeModal', function() {
        calendar.destroy();
        calendar.refetchEvents();
        Livewire.emit('refreshLivewireStyles');
        location.reload();
        calendar.render();
    });

});">

    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            {{-- CREATE CUSTOMER MODAL --}}
            <div style="display: none" class="fixed z-20 inset-0 overflow-y-auto ease-out duration-500"
                x-show="createCustomerModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-click.away="createCustomerModal = false">

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
                                        <label for="text" class="block text-white text-sm font-bold mb-2">Primer
                                            nombre:</label>
                                        <input type="text" x-data="{ focused: false }"
                                            x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                            x-on:focus="focused = true" x-on:blur="focused = false"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="name" x-model="customer.first_name">
                                    </div>

                                    <div class="mb-4">
                                        <label for="text" class="block text-white text-sm font-bold mb-2">Ultimo
                                            nombre:</label>
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
                                        <button x-on:click="saveCustomer()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-600 focus:outline-none focus:border-green-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Agregar</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-red-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            x-on:click="closeCreateCustomerModal()">Regresar</button>
                                    </span>
                                </footer>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- UPDATE CUSTOMER MODAL --}}
            <div style="display: none" class="fixed z-20 inset-0 overflow-y-auto ease-out duration-500"
                x-show="updateCustomerModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-click.away="updateCustomerModal = false" x-show="setProduct">
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
                                        <label for="text" class="block text-white text-sm font-bold mb-2">Primer
                                            nombre:</label>
                                        <input type="text" x-data="{ focused: false }"
                                            x-bind:class="{ 'bg-white': focused, 'bg-gray-300': !focused }"
                                            x-on:focus="focused = true" x-on:blur="focused = false"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="name" x-model="setCustomer.first_name">
                                    </div>

                                    <div class="mb-4">
                                        <label for="text" class="block text-white text-sm font-bold mb-2">Ultimo
                                            nombre:</label>
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
                                        <button x-on:click="updateCustomer()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:border-blue-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Actualizar</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-red-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-red-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            x-on:click="closeUpdateCustomerModal()">Regresar</button>
                                    </span>
                                </footer>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SHOW EVENTS MODAL --}}
            <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-1000"
                x-show="showEventsModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-click.away="closeShowEventsModal()">

                <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                        <div
                            class="bg-gradient-to-br from-gray-800 to-blue-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-white">

                            <h3 class="text-2xl font-semibold text-white mb-4" x-text="titleModal"></h3>

                            <br>

                            <div class="mb-4 px-10">

                                <main class="mb-4 px-10">

                                    <br>

                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y">
                                            <thead>
                                                <tr class="bg-gradient-to-br from-gray-700 to-gray-800 font-bold">
                                                    <th
                                                        class="px-2 py-1  text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        Titulo</th>
                                                    <th
                                                        class="px-2 py-1  text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        Inicio</th>
                                                    <th
                                                        class="px-2 py-1  text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        Cierre</th>
                                                    <th
                                                        class="px-2 py-1  text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        Sala</th>
                                                    <th
                                                        class="px-2 py-1  text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        Cliente</th>
                                                    <th
                                                        class="px-2 py-1  text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        Configurar</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($EventsDay as $event)
                                                    <tr class="odd:bg-white even:bg-gray-100">
                                                        <td class="px-2 py-1 whitespace-no-wrap border-b text-black">
                                                            {{ $event->title }}</td>
                                                        <td class="px-2 py-1 whitespace-no-wrap border-b text-black">
                                                            {{ $event->start }}</td>
                                                        <td class="px-2 py-1 whitespace-no-wrap border-b text-black">
                                                            {{ $event->end }}</td>
                                                        <td class="px-2 py-1 whitespace-no-wrap border-b text-black">
                                                            {{ $event->Connection_Of_Event_To_Space->name }}</td>
                                                        <td class="px-2 py-1 whitespace-no-wrap border-b text-black">
                                                            {{ $event->Connection_Of_Event_To_Customer->first_name }}
                                                        </td>
                                                        <td class="px-2 py-1 whitespace-no-wrap border-b ">
                                                            <button
                                                                x-on:click="editByEventTable( {{ json_encode($event) }})"
                                                                class="bi bi-pencil-square text-black font-bold py-1 px-1"></button>

                                                            <button
                                                                x-on:click="findToDestroy( {{ json_encode($event) }})"
                                                                class="bi bi-trash3-fill text-black font-bold py-1 px-1"></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>



                                    <br>

                                </main>

                                <!-- Botones y acciones del modal -->
                                <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button x-on:click="create()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-300 text-base leading-6 font-medium text-black shadow-sm hover:bg-white focus:outline-none focus:border-blue-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Nuevo
                                            evento</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            x-on:click="closeShowEventsModal()">Cancelar</button>
                                    </span>
                                </footer>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CREATE EVENT MODAL --}}
            <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-1000"
                x-show="showCreateModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-click.away="showCreateModal = false">

                <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                    <div style="background-color: #003554;"
                        class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full md:w-4/5 lg:w-4/5 xl:w-4/5"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-black w-full max-w-3x2">

                            <h3 class="text-5xl font-semibold text-white mb-4 pl-9 pt-9">Nuevo Evento</h3>

                            <br>

                            <div class="mb-4 px-10 overflow-y-auto">

                                <main class="mb-4 px-10 flex space-x-4">

                                    <!-- Lado izquierdo del modal -->
                                    <div class="w-1/2">
                                        <!-- Inputs en la parte superior -->
                                        <div class="mb-2 space-y-2">
                                            <div class="mb-4 mt-4">
                                                <label for="text"
                                                    class="block text-white text-xs font-bold mb-1">Titulo:</label>
                                                <input type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="event.title" style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="text"
                                                    class="block text-white text-xs font-bold mb-1">Descripcion:</label>
                                                <input type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="event.description"
                                                    style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="start"
                                                    class="block text-white text-xs font-bold mb-1">Fecha de
                                                    Inicio:</label>
                                                {{-- <input type="datetime-local"
                                                    class="shadow appearance-none border rounded w-full text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="event.start"> --}}
                                                <input type="datetime-local"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="event.start" style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="end"
                                                    class="block text-white text-xs font-bold mb-1">Fecha de
                                                    Cierre:</label>
                                                <input type="datetime-local"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="event.end" style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                
                                                <x-button x-on:click="openCreateCustomerModal()">Agregar cliente</x-button>
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="lounge_id"
                                                    class="block text-white text-xs font-bold mb-1">Sala:</label>
                                                <select x-model="event.space_id" style="font-size: 1.0em;"
                                                    class="w-full  border rounded text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option value="{{ null }}" style="font-size: 1.0em;">
                                                        Salas</option>
                                                    @foreach ($spaces as $space)
                                                        <option value="{{ $space->id }}"
                                                            style="font-size: 1.0em;">{{ $space->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        {{-- DETALLES DEL EVENTO EN LA PARTE INFERIOR --}}
                                        <div>

                                            <div class="mb-2 p-2">
                                                <label for="start"
                                                    class="block text-white text-sm font-bold mb-2">Detalles del
                                                    evento:</label>
                                                <select x-model="product_selected_to_create">
                                                    <option value={{ null }}>Productos</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product }}">{{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-button x-on:click="addProductToCreate"
                                                    class="bg-blue-700 bi bi-bag-plus-fill"></x-button>

                                                <br><br />

                                                <div class="h-full overflow-hidden">
                                                    <table
                                                        class="bg-gray-900 text-white table-fixed w-full overflow-hidden">
                                                        <thead>
                                                            <tr>
                                                                <th class="px-4 py-2">Nombre</th>
                                                                <th class="px-4 py-2">Precio</th>
                                                                <th class="px-4 py-2">Cantidad</th>

                                                                <th class="px-4 py-2">Retirar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <template x-for="(product, index) in details">
                                                                <tr class="odd:bg-gray-300 even:bg-gray-200">
                                                                    <td x-text="product.name"
                                                                        class="text-black border px-4 py-2 overflow-hidden whitespace-nowrap">
                                                                    </td>
                                                                    <td class="text-black border px-4 py-2">
                                                                        <input type="number" class="w-full"
                                                                            x-model="product.price">
                                                                    </td>
                                                                    <td class="text-black border px-4 py-2">
                                                                        <input type="number" class="w-full"
                                                                            x-model="product.quantity"
                                                                            {{-- details.reduce((sum, item) => sum + (item.quantity * item.price), 0) --}}
                                                                            x-on:input="totalProducts = details.reduce((sum, item) => sum + (item.quantity * item.price), 0)">
                                                                    </td>
                                                                    <td class="border px-2 py-1 text-center">
                                                                        <x-button
                                                                            x-on:click="removeProductToCreate(index), totalProducts = totalProducts - (product.price * product.quantity),
                                                                            totalAmount = totalAmount - (product.price * product.quantity)"
                                                                            class="bi bi-x-circle"></x-button>
                                                                    </td>
                                                                </tr>
                                                            </template>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    {{-- LADO DERECHO DEL MODAL --}}
                                    <div class="w-1/2">
                                        <div class="p-2 pb-20">
                                            <br>

                                            <x-button x-on:click="addPaymentToCreate">Agregar pago</x-button>

                                            <br><br />

                                            <table class="bg-blue-900 text-white table-fixed w-full">
                                                <thead>
                                                    <tr>
                                                        <th class="px-4 py-2">Cantidad</th>
                                                        <th class="px-4 py-2">Descripcion</th>
                                                        <th class="px-4 py-2">Retirar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-for="(payment, index) in payments"
                                                        :key="index">
                                                        <tr class="odd:bg-gray-300 even:bg-gray-200">
                                                            <td class="text-black border px-4 py-2">
                                                                <input type="number" x-model="payment.quantity"
                                                                    class="w-full" {{-- payments.reduce((sum, item) => sum + (parseInt(item.quantity) || 0), 0) --}}
                                                                    x-on:input="totalPaid = payments.reduce((sum, item) => sum + (parseInt(item.quantity) || 0), 0)">
                                                            </td>
                                                            <td class="text-black border px-4 py-2">
                                                                <input type="text" x-model="payment.description"
                                                                    class="w-full">
                                                            </td>
                                                            <td class="border px-2 py-1 text-center">
                                                                <x-button
                                                                    x-on:click="removePaymentToCreate(index), totalPaid = totalPaid - payment.quantity,
                                                                    totalAmout = totalAmount = payment.quantity"
                                                                    class="bi bi-x-circle"></x-button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mb-8 pt-20 flex flex-col items-end mt-auto">
                                            <label for="" class="text-white text-3xl mb-8">
                                                <span class="mr-4">TOTAL DE PRODUCTOS:</span> <label
                                                    x-text="totalProducts"></label>
                                            </label>
                                            <label for="" class="text-white text-3xl mb-8">
                                                <span class="mr-4">TOTAL DE PAGOS:</span> <label
                                                    x-text="totalPaid"></label>
                                            </label>

                                            <label for="" class="text-white text-3xl mb-8">
                                                <span class="mr-4">TOTAL A PAGAR:</span> <label
                                                    x-text="totalAmount = totalProducts"></label>
                                            </label>
                                        </div>



                                    </div>

                                </main>


                                <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button x-on:click="store()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-300 text-base leading-6 font-medium text-black shadow-sm hover:bg-white focus:outline-none focus:border-blue-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Agregar</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            x-on:click="closeCreateModal()">Cancelar</button>
                                    </span>
                                </footer>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- UPDATE EVENT MODAL --}}
            <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-1000"
                x-show="showUpdateModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-click.away="showUpdateModal = false">

                <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                    <div style="background-color: #003554;"
                        class="inline-block align-bottom rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full md:w-4/5 lg:w-4/5 xl:w-4/5"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-black w-full max-w-3x2">

                            <h3 class="text-5xl font-semibold text-white mb-4 pl-9 pt-9">Actualizar evento</h3>

                            <br>

                            <div class="mb-4 px-10 overflow-y-auto">

                                <main class="mb-4 px-10 flex space-x-4">

                                    <!-- Lado izquierdo del modal -->
                                    <div class="w-1/2">
                                        <!-- Inputs en la parte superior -->
                                        <div class="mb-2 space-y-2">
                                            <div class="mb-4 mt-4">
                                                <label for="text"
                                                    class="block text-white text-xs font-bold mb-1">Titulo:</label>
                                                <input type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="setEvent.title"
                                                    style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="text"
                                                    class="block text-white text-xs font-bold mb-1">Descripcion:</label>
                                                <input type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="setEvent.description"
                                                    style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="start"
                                                    class="block text-white text-xs font-bold mb-1">Fecha de
                                                    Inicio:</label>
                                                {{-- <input type="datetime-local"
                                                    class="shadow appearance-none border rounded w-full text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="event.start"> --}}
                                                <input type="datetime-local"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="setEvent.start"
                                                    style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="end"
                                                    class="block text-white text-xs font-bold mb-1">Fecha de
                                                    Cierre:</label>
                                                <input type="datetime-local"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    id="start" x-model="setEvent.end" style="font-size: 1.0em;">
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="customer_id"
                                                    class="h-full w-full block text-white text-xs font-bold mb-1">Cliente:</label>
                                                <select x-model="setEvent.customer_id" style="font-size: 1.0em;" disabled
                                                    class="w-full border rounded text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option value="{{ null }}" style="font-size: 1.0em;">
                                                        Clientes</option>
                                                    @foreach ($customerss as $customer)
                                                        <option value="{{ $customer->id }}"
                                                            style="font-size: 1.0em;">
                                                            {{ $customer->first_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-4 mt-4">
                                                <label for="lounge_id"
                                                    class="block text-white text-xs font-bold mb-1">Sala:</label>
                                                <select x-model="setEvent.space_id" style="font-size: 1.0em;"
                                                    class="w-full  border rounded text-xs text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    <option value="{{ null }}" style="font-size: 1.0em;">
                                                        Salas</option>
                                                    @foreach ($spaces as $space)
                                                        <option value="{{ $space->id }}"
                                                            style="font-size: 1.0em;">{{ $space->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        {{-- DETALLES DEL EVENTO EN LA PARTE INFERIOR --}}
                                        <div>

                                            <div class="mb-2 p-2">
                                                <label for="start"
                                                    class="block text-white text-sm font-bold mb-2">Detalles del
                                                    evento:</label>
                                                <select x-model="product_selected_to_update">
                                                    <option value={{ null }}>Productos</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product }}">{{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-button x-on:click="addProductToUpdate"
                                                    class="bg-blue-700 bi bi-bag-plus-fill"></x-button>

                                                <br><br />

                                                <div class="h-full overflow-hidden">
                                                    <table
                                                        class="bg-gray-900 text-white table-fixed w-full overflow-hidden">
                                                        <thead>
                                                            <tr>
                                                                <th class="px-4 py-2">Nombre</th>
                                                                <th class="px-4 py-2">Precio</th>
                                                                <th class="px-4 py-2">Cantidad</th>

                                                                <th class="px-4 py-2">Retirar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <template x-for="(product, index) in setDetails">
                                                                <tr class="odd:bg-gray-300 even:bg-gray-200">
                                                                    <td x-text="product.name"
                                                                        class="text-black border px-4 py-2 overflow-hidden whitespace-nowrap">
                                                                    </td>
                                                                    <td class="text-black border px-4 py-2">
                                                                        <input type="number" class="w-full"
                                                                            x-model="product.price">
                                                                    </td>
                                                                    <td class="text-black border px-4 py-2">
                                                                        <input type="number" class="w-full"
                                                                            x-model="product.quantity"
                                                                            {{-- details.reduce((sum, item) => sum + (item.quantity * item.price), 0) --}}
                                                                            x-on:input="totalProducts = setDetails.reduce((sum, item) => sum + (item.quantity * item.price), 0)">
                                                                    </td>
                                                                    <td class="border px-2 py-1 text-center">
                                                                        <x-button
                                                                            x-on:click="
                                                                        removeProductToUpdate(index, product.id);
                                                                        totalProducts = totalProducts - (product.price * product.quantity);
                                                                        totalAmount = totalAmount - (product.price * product.quantity);
                                                                        deleteDetails.push(product.id);
                                                                        "
                                                                            class="bi bi-x-circle"></x-button>
                                                                    </td>
                                                                </tr>
                                                            </template>




                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    {{-- LADO DERECHO DEL MODAL --}}
                                    <div class="w-1/2">
                                        <div class="p-2 pb-20">
                                            <br>

                                            <x-button x-on:click="addPaymentToUpdate">Agregar pago</x-button>

                                            <br><br />

                                            <table class="bg-blue-900 text-white table-fixed w-full">
                                                <thead>
                                                    <tr>
                                                        <th class="px-4 py-2">Cantidad</th>
                                                        <th class="px-4 py-2">Descripcion</th>
                                                        <th class="px-4 py-2">Retirar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <template x-for="(payment, index) in setPayments"
                                                        :key="index">
                                                        <tr class="odd:bg-gray-300 even:bg-gray-200">

                                                            <td class="text-black border px-4 py-2">
                                                                <input type="number" x-model="payment.quantity"
                                                                    class="w-full" {{-- payments.reduce((sum, item) => sum + (parseInt(item.quantity) || 0), 0) --}}
                                                                    x-on:input="
                                                                    let previousQuantity = payment._previousQuantity || 0;
                                                                    totalPaid = totalPaid - previousQuantity + parseFloat(payment.quantity);
                                                                    payment._previousQuantity = parseFloat(payment.quantity);">
                                                            </td>
                                                            <td class="text-black border px-4 py-2">
                                                                <input type="text" x-model="payment.description"
                                                                    class="w-full">
                                                            </td>
                                                            <td class="border px-2 py-1 text-center">
                                                                <x-button
                                                                    x-on:click="removePaymentToUpdate(index), 
                                                                    totalPaid = totalPaid - payment.quantity,
                                                                    totalAmout = totalAmount - totalPaid,
                                                                    deletePayments.push(payment.id);
                                                    
                                                                    
                                                                    {{--  --}}
                                                                    
                                                                    "
                                                                    class="bi bi-x-circle"></x-button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mb-8 pt-20 flex flex-col items-end mt-auto">
                                            <label for="" class="text-white text-3xl mb-8">
                                                <span class="mr-4">TOTAL DE PRODUCTOS:</span> <label
                                                    x-text="totalProducts"></label>
                                            </label>
                                            <label for="" class="text-white text-3xl mb-8">
                                                <span class="mr-4">TOTAL DE PAGOS:</span> <label
                                                    x-text="totalPaid"></label>
                                            </label>

                                            <label for="" class="text-white text-3xl mb-8">
                                                <span class="mr-4">TOTAL A PAGAR:</span> <label
                                                    x-text="totalAmount = totalProducts"></label>
                                            </label>
                                        </div>



                                    </div>

                                </main>


                                <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button x-on:click="update()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-300 text-base leading-6 font-medium text-black shadow-sm hover:bg-white focus:outline-none focus:border-blue-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Actualizar</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button x-on:click="destroy()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-red-900 px-4 py-2 bg-orange-900 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-orange-600 focus:outline-none focus:border-red-600 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Eliminar</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            x-on:click="closeUpdateModal()">Cancelar</button>
                                    </span>
                                </footer>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


            {{-- DESTROY EVENT MODAL --}}
            <div style="display: none" class="fixed z-10 inset-0 overflow-y-auto ease-out duration-1000"
                x-show="showDestroyModal" x-cloak x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-click.away="showDestroyModal = false">

                <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full md:w-3/5 lg:w-3/5 xl:w-3/5"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                        <div
                            class="bg-gradient-to-br from-gray-800 to-blue-900 px-4 pt-5 pb-4 sm:p-6 sm:pb-4 rounded-lg text-black">



                            <h3 class="text-2xl font-semibold text-white mb-4">Eliminar Evento</h3>

                            <br>

                            <div class="mb-4 px-10">

                                <main class="mb-4 px-10">

                                    <br>
                                    <label class="text-2xl font-semibold text-white mb-4">Seguro de eliminar este
                                        evento?</label>
                                    <br>

                                </main>

                                <!-- Botones y acciones del modal -->
                                <footer class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button x-on:click="destroy()" type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-800 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Eliminar</button>
                                    </span>

                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-600 text-base leading-6 font-medium text-white shadow-sm hover:text-white hover:bg-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                            x-on:click="closeDestroyModal()">Cancelar</button>
                                    </span>
                                </footer>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div id='calendar' wire:ignore></div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

        </div>

        <br>

    </div>


</div>

@stack('modals')
@yield('scripts')
