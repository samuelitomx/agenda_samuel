<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tenant;
use App\Models\User;
use App\Models\Customer;
use App\Models\Form;
use App\Models\Space;
use App\Models\Event;
use App\Models\Product;
use App\Models\Payment;
use App\Models\EventDetail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $tenants = [
            [
                'name' => 'SPF MEXICO',
                'trade_name' => 'SPF',
                'ubication' => 'Ciudad Industrial',
                'phone_number' => '868900900',
                'rfc' => '313650',
                'email' => 'spf@spf.com'
            ],
            [
                'name' => 'TPI COMPOSITES',
                'trade_name' => 'TPI',
                'ubication' => 'Parque Industrial',
                'phone_number' => '868950611',
                'rfc' => '343630',
                'email' => 'tpi@tpi.com'
            ],
            [
                'name' => 'TRIKO WAIPERS',
                'trade_name' => 'TRIKO',
                'ubication' => 'Parque Industrial',
                'phone_number' => '868930344',
                'rfc' => '946654',
                'email' => 'triko@triko.com'
            ],
            [
                'name' => 'BBB',
                'trade_name' => 'BBB MORE',
                'ubication' => 'Av. del padre',
                'phone_number' => '868123456',
                'rfc' => '123456',
                'email' => 'bbb@bbb.com'
            ],
            [
                'name' => 'INDUSTRIAS XYZ',
                'trade_name' => 'XYZ',
                'ubication' => 'Parque Empresarial',
                'phone_number' => '868789012',
                'rfc' => '789012',
                'email' => 'industrias_xyz@example.com'
            ],
            [
                'name' => 'TECNOLOGIA INNOVADORA',
                'trade_name' => 'Tech Innovate',
                'ubication' => 'Distrito Tecnológico',
                'phone_number' => '868345678',
                'rfc' => '345678',
                'email' => 'tech_innovate@example.com'
            ],
            [
                'name' => 'FABRICA DE IDEAS',
                'trade_name' => 'Ideas Factory',
                'ubication' => 'Centro Creativo',
                'phone_number' => '868678901',
                'rfc' => '678901',
                'email' => 'ideas_factory@example.com'
            ],
            [
                'name' => 'PRODUCCIONES VISIONARIAS',
                'trade_name' => 'Visionary Productions',
                'ubication' => 'Complejo Audiovisual',
                'phone_number' => '868234567',
                'rfc' => '234567',
                'email' => 'visionary_productions@example.com'
            ],
            [
                'name' => 'LOGISTICA EFICIENTE',
                'trade_name' => 'Efficient Logistics',
                'ubication' => 'Área Logística',
                'phone_number' => '868890123',
                'rfc' => '890123',
                'email' => 'efficient_logistics@example.com'
            ],

        ];


        foreach ($tenants as $tenant) {
            $new_tenant = new Tenant();
            $new_tenant->name = $tenant['name'];
            $new_tenant->trade_name = $tenant['trade_name'];
            $new_tenant->ubication = $tenant['ubication'];
            $new_tenant->phone_number = $tenant['phone_number'];
            $new_tenant->rfc = $tenant['rfc'];
            $new_tenant->email = $tenant['email'];
            $new_tenant->save();
        }

        $users = [
            [
                'name' => 'Samuel',
                'email' => 'samuel@spf.com',
                'password' => bcrypt('1234567890'),
                'created_at' => "2013-09-09",
                'phone_number' => "8681580642",
                'tenant_id' => 1
            ],
            [
                'name' => 'Angel',
                'email' => 'angel@spf.com',
                'password' => bcrypt('1234567890'),
                'created_at' => "2018-09-09",
                'phone_number' => "868283833",
                'tenant_id' => 1
            ],
            [
                'name' => 'Cristian',
                'email' => 'cristian@spf.com',
                'password' => bcrypt('1234567890'),
                'created_at' => "2017-09-09",
                'phone_number' => "8765432134",
                'tenant_id' => 1
            ],
            [
                'name' => 'Haziel',
                'email' => 'haziel@tpi.com',
                'password' => bcrypt('1234567890'),
                'created_at' => "2017-09-09",
                'phone_number' => "8688889900",
                'tenant_id' => 2
            ],
            [
                'name' => 'John Smith',
                'email' => 'john.srmith@tpi.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2017-09-09',
                'phone_number' => "8753647263",
                'tenant_id' => 2
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane.rdoe@tpi.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2016-09-09',
                'phone_number' => "9876543213",
                'tenant_id' => 2
            ],
            [
                'name' => 'Michael Johnson',
                'email' => 'michael.johngson@triko.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2016-09-09',
                'phone_number' => "8681562734",
                'tenant_id' => 3
            ],
            [
                'name' => 'Emily Wilson',
                'email' => 'emily.wilsogn@triko.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2016-09-09',
                'phone_number' => "4433764869",
                'tenant_id' => 3
            ],
            [
                'name' => 'David Brown',
                'email' => 'david.browng@triko.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2015-09-09',
                'phone_number' => "374849494",
                'tenant_id' => 3
            ],
            [
                'name' => 'Sarah Jones',
                'email' => 'sarah.jonesg@bbb.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2015-09-09',
                'phone_number' => "9876543212",
                'tenant_id' => 4
            ],
            [
                'name' => 'Linda Anderson',
                'email' => 'linda.andebrson@bbb.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2015-09-09',
                'phone_number' => "0980987654",
                'tenant_id' => 4
            ],
            [
                'name' => 'Robert Davis',
                'email' => 'robert.dabvis@bbb.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2014-09-09',
                'phone_number' => "0129874523",
                'tenant_id' => 4
            ],
            [
                'name' => 'Susan Miller',
                'email' => 'susan.mibller@xyz.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2014-09-09',
                'phone_number' => "9873342134",
                'tenant_id' => 5
            ],
            [
                'name' => 'William Moore',
                'email' => 'williamb.moore@xyz.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2014-09-09',
                'phone_number' => "9763450987",
                'tenant_id' => 5
            ],
            [
                'name' => 'Karen bWhite',
                'email' => 'karen.bwhite@xyz.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2013-09-09',
                'phone_number' => "0129876543",
                'tenant_id' => 5
            ],
            [
                'name' => 'Richard Harris',
                'email' => 'richfard.harris@ti.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2013-09-09',
                'phone_number' => "9876542312",
                'tenant_id' => 6
            ],
            [
                'name' => 'Jennifer Martinez',
                'email' => 'jenfnifer.martinez@ti.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2013-09-09',
                'phone_number' => "8615674322",
                'tenant_id' => 6
            ],
            [
                'name' => 'Daniel Wilson',
                'email' => 'daniel.wilsofn@ti.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2023-09-09',
                'phone_number' => "9875467729",
                'tenant_id' => 6
            ],
            [
                'name' => 'Patricia Taylor',
                'email' => 'patricia.tafylor@fabrica_de_ideas.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2023-09-09',
                'phone_number' => "2287654388",
                'tenant_id' => 7
            ],
            [
                'name' => 'Matthew Anderson',
                'email' => 'matthew.anfderson@fabrica_de_ideas.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2023-09-09',
                'phone_number' => "8657382228",
                'tenant_id' => 7
            ],
            [
                'name' => 'Nancy Davis',
                'email' => 'nancy.davfis@fabrica_de_ideas.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2022-09-09',
                'phone_number' => "9876540027",
                'tenant_id' => 7
            ],
            [
                'name' => 'Christopher Clark',
                'email' => 'christopher.cflark@visionaria.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2022-09-09',
                'phone_number' => "8681564738",
                'tenant_id' => 8
            ],
            [
                'name' => 'Laura Hernandez',
                'email' => 'laura.hernanfdez@evisionaria.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2022-09-09',
                'phone_number' => "8682634956",
                'tenant_id' => 8
            ],
            [
                'name' => 'Ryan Rodriguez',
                'email' => 'ryan.rodrigfuez@visionaria.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2021-09-09',
                'phone_number' => "8563847577",
                'tenant_id' => 8
            ],
            [
                'name' => 'Maria Gonzalez',
                'email' => 'maria.gonzfalez@fabricas_eficientes.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2021-09-09',
                'phone_number' => "8687543298",
                'tenant_id' => 9
            ],
            [
                'name' => 'Eric Moore',
                'email' => 'eric.mooddre@fabricas_eficientes.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2021-09-09',
                'phone_number' => "8684732909",
                'tenant_id' => 9
            ],
            [
                'name' => 'Samantha Smith',
                'email' => 'samantha.smidth@fabricas_eficientes.com',
                'password' => bcrypt('1234567890'),
                'created_at' => '2020-09-09',
                'phone_number' => "8674352343",
                'tenant_id' => 9
            ]
            
            ];


        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->tenant_id = $user['tenant_id'];
            $new_user->password = $user['password'];
            $new_user->phone_number = $user['phone_number'];
            $new_user->created_at = $user['created_at'];
            $new_user->save();
        }

        $General_Administratorl = Role::create(['name' => 'Administrador']);
                                  Role::create(['name' => 'Servicio al cliente']);
                                  Role::create(['name' => 'Gerente']);
                                  Role::create(['name' => 'Auditor']);

                                  Permission::create(['name' => 'Mostrar Usuarios'])->syncRoles($General_Administratorl);
                                  Permission::create(['name' => 'Crear Usuarios'])->syncRoles($General_Administratorl);;
                                  Permission::create(['name' => 'Editar Usuarios'])->syncRoles($General_Administratorl);;
                                  Permission::create(['name' => 'Eliminar Usuarios'])->syncRoles($General_Administratorl);;

                                  $user = User::findOrFail(1);
                                  $user->syncRoles($General_Administratorl);

        $customers = [
            [
                'first_name' => 'Armando',
                'last_name' => 'Hernandez',
                'email' => 'armando@hotmail.com',
                'phone_number' => '8681580642',
                'tenant_id' => 1
            ],
            [
                'first_name' => 'Jesus',
                'last_name' => 'Hernandez',
                'email' => 'jesus@hotmail.com',
                'phone_number' => '8681580642',
                'tenant_id' => 1
            ],
            [
                'first_name' => 'Raulo',
                'last_name' => 'Jimenez',
                'email' => 'raulo@hotmail.com',
                'phone_number' => '8681580642',
                'tenant_id' => 1
            ],
            [
                'first_name' => 'Laura',
                'last_name' => 'Martínez',
                'email' => 'laura@hotmail.com',
                'phone_number' => '8687654321',
                'tenant_id' => 2
            ],
            [
                'first_name' => 'Ricardo',
                'last_name' => 'Gómez',
                'email' => 'ricardo@gmail.com',
                'phone_number' => '8681112233',
                'tenant_id' => 2
            ],
            [
                'first_name' => 'María',
                'last_name' => 'López',
                'email' => 'maria@yahoo.com',
                'phone_number' => '8684455667',
                'tenant_id' => 2
            ],
            [
                'first_name' => 'Sandra',
                'last_name' => 'Ramírez',
                'email' => 'sandra@hotmail.com',
                'phone_number' => '8688765432',
                'tenant_id' => 3
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'Pérez',
                'email' => 'juan@gmail.com',
                'phone_number' => '8683334444',
                'tenant_id' => 3
            ],
            [
                'first_name' => 'Leticia',
                'last_name' => 'Sánchez',
                'email' => 'leticia@yahoo.com',
                'phone_number' => '8689990000',
                'tenant_id' => 3
            ],
            [
                'first_name' => 'Pedro',
                'last_name' => 'González',
                'email' => 'pedro@hotmail.com',
                'phone_number' => '8687778888',
                'tenant_id' => 4
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Martínez',
                'email' => 'ana@gmail.com',
                'phone_number' => '8681122334',
                'tenant_id' => 4
            ],
            [
                'first_name' => 'Roberto',
                'last_name' => 'López',
                'email' => 'roberto@yahoo.com',
                'phone_number' => '8684455566',
                'tenant_id' => 4
            ],
            [
                'first_name' => 'Gabriela',
                'last_name' => 'Hernández',
                'email' => 'gabriela@hotmail.com',
                'phone_number' => '8681112233',
                'tenant_id' => 5
            ],
            [
                'first_name' => 'Héctor',
                'last_name' => 'Gómez',
                'email' => 'hector@gmail.com',
                'phone_number' => '8684445555',
                'tenant_id' => 5
            ],
            [
                'first_name' => 'Isabel',
                'last_name' => 'Martínez',
                'email' => 'isabel@yahoo.com',
                'phone_number' => '8689991111',
                'tenant_id' => 5
            ],
            [
                'first_name' => 'Fernando',
                'last_name' => 'López',
                'email' => 'fernando@hotmail.com',
                'phone_number' => '8686667777',
                'tenant_id' => 6
            ],
            [
                'first_name' => 'Karla',
                'last_name' => 'Pérez',
                'email' => 'karla@gmail.com',
                'phone_number' => '8682233444',
                'tenant_id' => 6
            ],
            [
                'first_name' => 'Luis',
                'last_name' => 'Sánchez',
                'email' => 'luis@yahoo.com',
                'phone_number' => '8688889999',
                'tenant_id' => 6
            ],
            [
                'first_name' => 'Patricia',
                'last_name' => 'Rodríguez',
                'email' => 'patricia@hotmail.com',
                'phone_number' => '8685556666',
                'tenant_id' => 7
            ],
            [
                'first_name' => 'Miguel',
                'last_name' => 'Gutiérrez',
                'email' => 'miguel@gmail.com',
                'phone_number' => '8681122333',
                'tenant_id' => 7
            ],
            [
                'first_name' => 'Rosa',
                'last_name' => 'Martínez',
                'email' => 'rosa@yahoo.com',
                'phone_number' => '8687778888',
                'tenant_id' => 7
            ],
            [
                'first_name' => 'Jorge',
                'last_name' => 'Hernández',
                'email' => 'jorge@hotmail.com',
                'phone_number' => '8688889999',
                'tenant_id' => 8
            ],
            [
                'first_name' => 'Elena',
                'last_name' => 'Gómez',
                'email' => 'elena@gmail.com',
                'phone_number' => '8685556666',
                'tenant_id' => 8
            ],
            [
                'first_name' => 'Antonio',
                'last_name' => 'Martínez',
                'email' => 'antonio@yahoo.com',
                'phone_number' => '8682223333',
                'tenant_id' => 8
            ],
            [
                'first_name' => 'Martha',
                'last_name' => 'López',
                'email' => 'martha@hotmail.com',
                'phone_number' => '8687778888',
                'tenant_id' => 9
            ],
            [
                'first_name' => 'Raúl',
                'last_name' => 'Pérez',
                'email' => 'raul@gmail.com',
                'phone_number' => '8683334444',
                'tenant_id' => 9
            ],
            [
                'first_name' => 'Carmen',
                'last_name' => 'Sánchez',
                'email' => 'carmen@yahoo.com',
                'phone_number' => '8689990000',
                'tenant_id' => 9
            ]
        ];

        foreach ($customers as $customer) {
            $new_customer = new Customer();
            $new_customer->first_name = $customer['first_name'];
            $new_customer->last_name = $customer['last_name'];
            $new_customer->email = $customer['email'];
            $new_customer->phone_number = $customer['phone_number'];
            $new_customer->tenant_id = $customer['tenant_id'];
            $new_customer->save();
        }

        $forms = [
            [
                'first_name' => 'Armando',
                'last_name' => 'Hernandez',
                'email' => 'armando@hotmail.com',
                'phone_number' => '8681580642',
                'notes' => '.',
                'tenant_id' => 1
            ],
            [
                'first_name' => 'Jesus',
                'last_name' => 'Hernandez',
                'email' => 'jesus@hotmail.com',
                'phone_number' => '8681580642',
                'notes' => '.',
                'tenant_id' => 1
            ],
            [
                'first_name' => 'Raulo',
                'last_name' => 'Jimenez',
                'email' => 'raulo@hotmail.com',
                'phone_number' => '8681580642',
                'notes' => '.',
                'tenant_id' => 1
            ],
            [
                'first_name' => 'Laura',
                'last_name' => 'Martínez',
                'email' => 'laura@hotmail.com',
                'phone_number' => '8687654321',
                'notes' => '.',
                'tenant_id' => 2
            ],
            [
                'first_name' => 'Ricardo',
                'last_name' => 'Gómez',
                'email' => 'ricardo@gmail.com',
                'phone_number' => '8681112233',
                'notes' => '.',
                'tenant_id' => 2
            ],
            [
                'first_name' => 'María',
                'last_name' => 'López',
                'email' => 'maria@yahoo.com',
                'phone_number' => '8684455667',
                'notes' => '.',
                'tenant_id' => 2
            ],
            [
                'first_name' => 'Sandra',
                'last_name' => 'Ramírez',
                'email' => 'sandra@hotmail.com',
                'phone_number' => '8688765432',
                'notes' => '.',
                'tenant_id' => 3
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'Pérez',
                'email' => 'juan@gmail.com',
                'phone_number' => '8683334444',
                'notes' => '.',
                'tenant_id' => 3
            ],
            [
                'first_name' => 'Leticia',
                'last_name' => 'Sánchez',
                'email' => 'leticia@yahoo.com',
                'phone_number' => '8689990000',
                'notes' => '.',
                'tenant_id' => 3
            ],
            [
                'first_name' => 'Pedro',
                'last_name' => 'González',
                'email' => 'pedro@hotmail.com',
                'phone_number' => '8687778888',
                'notes' => '.',
                'tenant_id' => 4
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Martínez',
                'email' => 'ana@gmail.com',
                'phone_number' => '8681122334',
                'notes' => '.',
                'tenant_id' => 4
            ],
            [
                'first_name' => 'Roberto',
                'last_name' => 'López',
                'email' => 'roberto@yahoo.com',
                'phone_number' => '8684455566',
                'notes' => '.',
                'tenant_id' => 4
            ],
            [
                'first_name' => 'Gabriela',
                'last_name' => 'Hernández',
                'email' => 'gabriela@hotmail.com',
                'phone_number' => '8681112233',
                'notes' => '.',
                'tenant_id' => 5
            ],
            [
                'first_name' => 'Héctor',
                'last_name' => 'Gómez',
                'email' => 'hector@gmail.com',
                'phone_number' => '8684445555',
                'notes' => '.',
                'tenant_id' => 5
            ],
            [
                'first_name' => 'Isabel',
                'last_name' => 'Martínez',
                'email' => 'isabel@yahoo.com',
                'phone_number' => '8689991111',
                'notes' => '.',
                'tenant_id' => 5
            ],
            [
                'first_name' => 'Fernando',
                'last_name' => 'López',
                'email' => 'fernando@hotmail.com',
                'phone_number' => '8686667777',
                'notes' => '.',
                'tenant_id' => 6
            ],
            [
                'first_name' => 'Karla',
                'last_name' => 'Pérez',
                'email' => 'karla@gmail.com',
                'phone_number' => '8682233444',
                'notes' => '.',
                'tenant_id' => 6
            ],
            [
                'first_name' => 'Luis',
                'last_name' => 'Sánchez',
                'email' => 'luis@yahoo.com',
                'phone_number' => '8688889999',
                'notes' => '.',
                'tenant_id' => 6
            ],
            [
                'first_name' => 'Patricia',
                'last_name' => 'Rodríguez',
                'email' => 'patricia@hotmail.com',
                'phone_number' => '8685556666',
                'notes' => '.',
                'tenant_id' => 7
            ],
            [
                'first_name' => 'Miguel',
                'last_name' => 'Gutiérrez',
                'email' => 'miguel@gmail.com',
                'phone_number' => '8681122333',
                'notes' => '.',
                'tenant_id' => 7
            ],
            [
                'first_name' => 'Rosa',
                'last_name' => 'Martínez',
                'email' => 'rosa@yahoo.com',
                'phone_number' => '8687778888',
                'notes' => '.',
                'tenant_id' => 7
            ],
            [
                'first_name' => 'Jorge',
                'last_name' => 'Hernández',
                'email' => 'jorge@hotmail.com',
                'phone_number' => '8688889999',
                'notes' => '.',
                'tenant_id' => 8
            ],
            [
                'first_name' => 'Elena',
                'last_name' => 'Gómez',
                'email' => 'elena@gmail.com',
                'phone_number' => '8685556666',
                'notes' => '.',
                'tenant_id' => 8
            ],
            [
                'first_name' => 'Antonio',
                'last_name' => 'Martínez',
                'email' => 'antonio@yahoo.com',
                'phone_number' => '8682223333',
                'notes' => '.',
                'tenant_id' => 8
            ],
            [
                'first_name' => 'Martha',
                'last_name' => 'López',
                'email' => 'martha@hotmail.com',
                'phone_number' => '8687778888',
                'notes' => '.',
                'tenant_id' => 9
            ],
            [
                'first_name' => 'Raúl',
                'last_name' => 'Pérez',
                'email' => 'raul@gmail.com',
                'phone_number' => '8683334444',
                'notes' => '.',
                'tenant_id' => 9
            ],
            [
                'first_name' => 'Carmen',
                'last_name' => 'Sánchez',
                'email' => 'carmen@yahoo.com',
                'phone_number' => '8689990000',
                'notes' => '.',
                'tenant_id' => 9
            ]
        ];

        foreach ($forms as $form) {
            $new_form = new Form();
            $new_form->first_name = $form['first_name'];
            $new_form->last_name = $form['last_name'];
            $new_form->email = $form['email'];
            $new_form->phone_number = $form['phone_number'];
            $new_form->notes = $form['notes'];
            $new_form->tenant_id = $form['tenant_id'];
            $new_form->save();
        }

        $spaces = [
            [
                'name' => 'Salón A',
                'tenant_id' => 1,
                'dimensions' => '10m x 15m',
                'capacity' => 100,
                'description' => 'Elegante salón para eventos corporativos',
                'days_for_settlement' => 7,
                'theme' => 'Negocios',
                'price_for_hour' => 300,
                'minimum_amount' => 1500.00,
            ],
            [
                'name' => 'Salón B',
                'tenant_id' => 1,
                'dimensions' => '8m x 12m',
                'capacity' => 80,
                'description' => 'Acogedor salón para fiestas familiares',
                'days_for_settlement' => 5,
                'theme' => 'Familiar',
                'price_for_hour' => 400,
                'minimum_amount' => 1000.00,
            ],
            [
                'name' => 'Salón C',
                'tenant_id' => 1,
                'dimensions' => '12m x 20m',
                'capacity' => 150,
                'description' => 'Gran salón para eventos especiales',
                'days_for_settlement' => 10,
                'theme' => 'Elegancia',
                'price_for_hour' => 500,
                'minimum_amount' => 2000.00,
            ],
            [
                'name' => 'Salón X',
                'tenant_id' => 2,
                'dimensions' => '15m x 25m',
                'capacity' => 200,
                'description' => 'Espacioso salón para bodas y grandes eventos',
                'days_for_settlement' => 15,
                'theme' => 'Bodas',
                'price_for_hour' => 900,
                'minimum_amount' => 2500.00,
            ],
            [
                'name' => 'Salón Y',
                'tenant_id' => 2,
                'dimensions' => '10m x 18m',
                'capacity' => 120,
                'description' => 'Salón moderno para eventos sociales',
                'days_for_settlement' => 8,
                'theme' => 'Moderno',
                'price_for_hour' => 100,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Salón Z',
                'tenant_id' => 2,
                'dimensions' => '8m x 14m',
                'capacity' => 90,
                'description' => 'Salón íntimo para celebraciones pequeñas',
                'days_for_settlement' => 6,
                'theme' => 'Íntimo',
                'price_for_hour' => 300,
                'minimum_amount' => 1200.00,
            ],
            [
                'name' => 'Salón 1',
                'tenant_id' => 3,
                'dimensions' => '10m x 15m',
                'capacity' => 100,
                'description' => 'Salón versátil para distintos tipos de eventos',
                'days_for_settlement' => 7,
                'theme' => 'Versátil',
                'price_for_hour' => 200,
                'minimum_amount' => 1500.00,
            ],
            [
                'name' => 'Salón 2',
                'tenant_id' => 3,
                'dimensions' => '8m x 12m',
                'capacity' => 80,
                'description' => 'Salón acogedor para celebraciones íntimas',
                'days_for_settlement' => 5,
                'theme' => 'Íntimo',
                'price_for_hour' => 100,
                'minimum_amount' => 1000.00,
            ],
            [
                'name' => 'Salón 3',
                'tenant_id' => 3,
                'dimensions' => '12m x 20m',
                'capacity' => 150,
                'description' => 'Salón elegante para eventos especiales',
                'days_for_settlement' => 10,
                'theme' => 'Elegancia',
                'price_for_hour' => 800,
                'minimum_amount' => 2000.00,
            ],
            [
                'name' => 'Salón 4',
                'tenant_id' => 4,
                'dimensions' => '15m x 25m',
                'capacity' => 200,
                'description' => 'Salón amplio para bodas y grandes reuniones',
                'days_for_settlement' => 15,
                'theme' => 'Bodas',
                'price_for_hour' => 600,
                'minimum_amount' => 2500.00,
            ],
            [
                'name' => 'Salón 5',
                'tenant_id' => 4,
                'dimensions' => '10m x 18m',
                'capacity' => 120,
                'description' => 'Salón moderno para eventos sociales',
                'days_for_settlement' => 8,
                'theme' => 'Moderno',
                'price_for_hour' => 500,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Salón 6',
                'tenant_id' => 4,
                'dimensions' => '8m x 14m',
                'capacity' => 90,
                'description' => 'Salón íntimo para celebraciones pequeñas',
                'days_for_settlement' => 6,
                'theme' => 'Íntimo',
                'price_for_hour' => 400,
                'minimum_amount' => 1200.00,
            ],
            [
                'name' => 'Gran Salón',
                'tenant_id' => 5,
                'dimensions' => '12m x 18m',
                'capacity' => 150,
                'description' => 'Salón espacioso para eventos especiales',
                'days_for_settlement' => 10,
                'theme' => 'Elegancia',
                'price_for_hour' => 100,
                'minimum_amount' => 2000.00,
            ],
            [
                'name' => 'Salón Elegante',
                'tenant_id' => 5,
                'dimensions' => '10m x 15m',
                'capacity' => 120,
                'description' => 'Salón elegante para fiestas y ceremonias',
                'days_for_settlement' => 8,
                'theme' => 'Elegancia',
                'price_for_hour' => 700,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Salón Encanto',
                'tenant_id' => 5,
                'dimensions' => '8m x 12m',
                'capacity' => 80,
                'description' => 'Salón íntimo con encanto especial',
                'days_for_settlement' => 6,
                'theme' => 'Encanto',
                'price_for_hour' => 900,
                'minimum_amount' => 1200.00,
            ],
            [
                'name' => 'Salón de Eventos',
                'tenant_id' => 6,
                'dimensions' => '12m x 18m',
                'capacity' => 150,
                'description' => 'Salón versátil para distintos eventos especiales',
                'days_for_settlement' => 10,
                'theme' => 'Versátil',
                'price_for_hour' => 400,
                'minimum_amount' => 2000.00,
            ],
            [
                'name' => 'Elegance Hall',
                'tenant_id' => 6,
                'dimensions' => '10m x 15m',
                'capacity' => 120,
                'description' => 'Salón elegante para celebraciones inolvidables',
                'days_for_settlement' => 8,
                'theme' => 'Elegancia',
                'price_for_hour' => 1000,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Sala Íntima',
                'tenant_id' => 6,
                'dimensions' => '8m x 12m',
                'capacity' => 80,
                'description' => 'Salón íntimo para eventos privados',
                'days_for_settlement' => 6,
                'theme' => 'Íntimo',
                'price_for_hour' => 1000,
                'minimum_amount' => 1200.00,
            ],
            [
                'name' => 'Grand Ballroom',
                'tenant_id' => 7,
                'dimensions' => '15m x 25m',
                'capacity' => 200,
                'description' => 'Gran salón de baile para eventos majestuosos',
                'price_for_hour' => 400,
                'days_for_settlement' => 15,
                'theme' => 'Majestuoso',
                'minimum_amount' => 2500.00,
            ],
            [
                'name' => 'Sala Moderna',
                'tenant_id' => 7,
                'dimensions' => '10m x 18m',
                'capacity' => 120,
                'description' => 'Sala moderna para eventos contemporáneos',
                'days_for_settlement' => 8,
                'theme' => 'Moderno',
                'price_for_hour' => 200,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Sala Exclusiva',
                'tenant_id' => 7,
                'dimensions' => '8m x 14m',
                'capacity' => 90,
                'description' => 'Sala exclusiva para reuniones exclusivas',
                'days_for_settlement' => 6,
                'theme' => 'Exclusivo',
                'price_for_hour' => 500,
                'minimum_amount' => 1200.00,
            ],
            [
                'name' => 'Salón de Celebraciones',
                'tenant_id' => 8,
                'dimensions' => '12m x 18m',
                'capacity' => 150,
                'description' => 'Salón versátil para diversas celebraciones',
                'days_for_settlement' => 10,
                'theme' => 'Versátil',
                'price_for_hour' => 800,
                'minimum_amount' => 2000.00,
            ],
            [
                'name' => 'Elegance Venue',
                'tenant_id' => 8,
                'dimensions' => '10m x 15m',
                'capacity' => 120,
                'description' => 'Lugar elegante para eventos inolvidables',
                'days_for_settlement' => 8,
                'theme' => 'Elegancia',
                'price_for_hour' => 400,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Sala Privada',
                'tenant_id' => 8,
                'dimensions' => '8m x 12m',
                'capacity' => 80,
                'description' => 'Sala privada para eventos íntimos',
                'days_for_settlement' => 6,
                'price_for_hour' => 300,
                'theme' => 'Íntimo',
                'minimum_amount' => 1200.00,
            ],
            [
                'name' => 'Grandioso Salón',
                'tenant_id' => 9,
                'dimensions' => '15m x 25m',
                'capacity' => 200,
                'description' => 'Salón grandioso para eventos majestuosos',
                'days_for_settlement' => 15,
                'price_for_hour' => 300,
                'theme' => 'Majestuoso',
                'minimum_amount' => 2500.00,
            ],
            [
                'name' => 'Sala Vanguardista',
                'tenant_id' => 9,
                'dimensions' => '10m x 18m',
                'capacity' => 120,
                'description' => 'Sala vanguardista para eventos modernos',
                'days_for_settlement' => 8,
                'theme' => 'Moderno',
                'price_for_hour' => 700,
                'minimum_amount' => 1800.00,
            ],
            [
                'name' => 'Sala de Reuniones',
                'tenant_id' => 9,
                'dimensions' => '8m x 14m',
                'capacity' => 90,
                'description' => 'Sala especializada para reuniones exclusivas',
                'days_for_settlement' => 6,
                'price_for_hour' => 500,
                'theme' => 'Exclusivo',
                'minimum_amount' => 1200.00,
            ],
           
        ];

        foreach ($spaces as $space) {
            $new_space = new Space();
            $new_space->name = $space['name'];
            $new_space->tenant_id = $space['tenant_id'];
            $new_space->dimensions = $space['dimensions'];
            $new_space->capacity = $space['capacity'];
            $new_space->description = $space['description'];
            $new_space->days_for_settlement = $space['days_for_settlement'];
            $new_space->theme = $space['theme'];
            $new_space->minimum_amount = $space['minimum_amount'];
            $new_space->price_for_hour = $space['price_for_hour'];
            $new_space->save();
        }


        $events = [

            [

                'title' => 'Evento #1',
                'description' => "Descripcion Del Evento 1",
                'paid' => false,
                'customer_id' => 1,
                'space_id' => 1,
                'start' => '2023-12-1 8:00',
                'end' => '2023-12-1 9:00',
                'tenant_id' => 1

            ],
            [

                'title' => 'Evento #2',
                'description' => "Descripcion Del Evento 2",
                'paid' => false,
                'customer_id' => 2,
                'space_id' => 2,
                'start' => '2023-12-2 8:00',
                'end' => '2023-12-2 9:00',
                'tenant_id' => 1

            ],
            [

                'title' => 'Evento #3',
                'description' => "Descripcion Del Evento 3",
                'paid' => false,
                'customer_id' => 3,
                'space_id' => 3,
                'start' => '2023-12-3 8:00',
                'end' => '2023-12-3 9:00',
                'tenant_id' => 1

            ],
            [

                'title' => 'Evento #4',
                'description' => "Descripcion Del Evento 4",
                'paid' => false,
                'customer_id' => 4,
                'space_id' => 4,
                'start' => '2023-12-4 9:00',
                'end' => '2023-12-4 10:00',
                'tenant_id' => 2

            ],
            [
                'title' => 'Evento #5',
                'description' => "Descripcion Del Evento 5",
                'paid' => false,
                'customer_id' => 5,
                'space_id' => 5,
                'start' => '2023-12-5 9:00',
                'end' => '2023-12-5 10:00',
                'tenant_id' => 2
            ],
            [

                'title' => 'Evento #6',
                'description' => "Descripcion Del Evento #6",
                'paid' => false,
                'customer_id' => 6,
                'space_id' => 6,
                'start' => '2023-12-6 9:00',
                'end' => '2023-12-6 10:00',
                'tenant_id' => 2

            ],
            [

                'title' => 'Evento #7',
                'description' => "Descripcion Del Evento #7",
                'paid' => false,
                'customer_id' => 7,
                'space_id' => 7,
                'start' => '2023-12-7 9:00',
                'end' => '2023-12-7 10:00',
                'tenant_id' => 3

            ],
            [

                'title' => 'Evento #8',
                'description' => "Descripcion Del Evento #8",
                'paid' => false,
                'customer_id' => 8,
                'space_id' => 8,
                'start' => '2023-12-8 9:00',
                'end' => '2023-12-8 10:00',
                'tenant_id' => 3

            ],
            [

                'title' => 'Evento #9',
                'description' => "Descripcion Del Evento #9",
                'paid' => false,
                'customer_id' => 9,
                'space_id' => 9,
                'start' => '2023-12-9 9:00',
                'end' => '2023-12-9 10:00',
                'tenant_id' => 3

            ],
            [

                'title' => 'Evento #10',
                'description' => "Descripcion Del Evento #10",
                'paid' => false,
                'customer_id' => 10,
                'space_id' => 10,
                'start' => '2023-12-10 9:00',
                'end' => '2023-12-10 10:00',
                'tenant_id' => 4

            ],
            [

                'title' => 'Evento #11',
                'description' => "Descripcion Del Evento #11",
                'paid' => false,
                'customer_id' => 11,
                'space_id' => 11,
                'start' => '2023-12-11 9:00',
                'end' => '2023-12-11 10:00',
                'tenant_id' => 4

            ],
            [

                'title' => 'Evento #12',
                'description' => "Descripcion Del Evento #12",
                'paid' => false,
                'customer_id' => 12,
                'space_id' => 12,
                'start' => '2023-12-12 9:00',
                'end' => '2023-12-12 10:00',
                'tenant_id' => 4

            ],
            [

                'title' => 'Evento #13',
                'description' => "Descripcion Del Evento #13",
                'paid' => false,
                'customer_id' => 13,
                'space_id' => 13,
                'start' => '2023-12-13 9:00',
                'end' => '2023-12-13 10:00',
                'tenant_id' => 5

            ],[

                'title' => 'Evento #14',
                'description' => "Descripcion Del Evento #14",
                'paid' => false,
                'customer_id' => 14,
                'space_id' => 14,
                'start' => '2023-12-14 9:00',
                'end' => '2023-12-14 10:00',
                'tenant_id' => 5

            ],
            [

                'title' => 'Evento #15',
                'description' => "Descripcion Del Evento #15",
                'paid' => false,
                'customer_id' => 15,
                'space_id' => 15,
                'start' => '2023-12-15 9:00',
                'end' => '2023-12-15 10:00',
                'tenant_id' => 5

            ],
            [

                'title' => 'Evento #16',
                'description' => "Descripcion Del Evento #16",
                'paid' => false,
                'customer_id' => 16,
                'space_id' => 16,
                'start' => '2023-12-16 9:00',
                'end' => '2023-12-16 10:00',
                'tenant_id' => 6

            ],
            [

                'title' => 'Evento #17',
                'description' => "Descripcion Del Evento #17",
                'paid' => false,
                'customer_id' => 17,
                'space_id' => 17,
                'start' => '2023-12-17 9:00',
                'end' => '2023-12-17 10:00',
                'tenant_id' => 6

            ],
            [

                'title' => 'Evento #18',
                'description' => "Descripcion Del Evento #18",
                'paid' => false,
                'customer_id' => 18,
                'space_id' => 18,
                'start' => '2023-12-18 9:00',
                'end' => '2023-12-18 10:00',
                'tenant_id' => 6

            ],
            [

                'title' => 'Evento #19',
                'description' => "Descripcion Del Evento #19",
                'paid' => false,
                'customer_id' => 19,
                'space_id' => 19,
                'start' => '2023-12-19 9:00',
                'end' => '2023-12-19 10:00',
                'tenant_id' => 7

            ],
            [

                'title' => 'Evento #20',
                'description' => "Descripcion Del Evento #20",
                'paid' => false,
                'customer_id' => 20,
                'space_id' => 20,
                'start' => '2023-12-20 9:00',
                'end' => '2023-12-20 10:00',
                'tenant_id' => 7

            ],
            [

                'title' => 'Evento #21',
                'description' => "Descripcion Del Evento #21",
                'paid' => false,
                'customer_id' => 21,
                'space_id' => 21,
                'start' => '2023-12-21 9:00',
                'end' => '2023-12-21 10:00',
                'tenant_id' => 7

            ],
            [

                'title' => 'Evento #22',
                'description' => "Descripcion Del Evento #22",
                'paid' => false,
                'customer_id' => 22,
                'space_id' => 22,
                'start' => '2023-12-22 9:00',
                'end' => '2023-12-22 10:00',
                'tenant_id' => 8

            ],
            [

                'title' => 'Evento #23',
                'description' => "Descripcion Del Evento #23",
                'paid' => false,
                'customer_id' => 23,
                'space_id' => 23,
                'start' => '2023-12-23 9:00',
                'end' => '2023-12-23 10:00',
                'tenant_id' => 8

            ],
            [

                'title' => 'Evento #24',
                'description' => "Descripcion Del Evento #24",
                'paid' => false,
                'customer_id' => 24,
                'space_id' => 24,
                'start' => '2023-12-24 9:00',
                'end' => '2023-12-24 10:00',
                'tenant_id' => 8

            ],
            [

                'title' => 'Evento #25',
                'description' => "Descripcion Del Evento #25",
                'paid' => false,
                'customer_id' => 25,
                'space_id' => 25,
                'start' => '2023-12-25 9:00',
                'end' => '2023-12-25 10:00',
                'tenant_id' => 9

            ],
            [

                'title' => 'Evento #26',
                'description' => "Descripcion Del Evento #26",
                'paid' => false,
                'customer_id' => 26,
                'space_id' => 26,
                'start' => '2023-12-26 9:00',
                'end' => '2023-12-26 10:00',
                'tenant_id' => 9

            ],
            [

                'title' => 'Evento #27',
                'description' => "Descripcion Del Evento #27",
                'paid' => false,
                'customer_id' => 27,
                'space_id' => 27,
                'start' => '2023-12-27 9:00',
                'end' => '2023-12-27 10:00',
                'tenant_id' => 9

            ],

        ];

        foreach($events as $event)
        {

            Event::create($event);

        }

        $products = [

            [
                'name' => 'Coca-Cola',
                'description' => 'No Hay Nada Mejor',
                'cost' => 90,
                'stock' => '30',
                'tenant_id' => 1
            ],
            [
                'name' => 'Pizza',
                'description' => 'Es mejor que la hamburguesa',
                'cost' => 100,
                'stock' => '9',
                'tenant_id' => 1,
            ],
            [
                'name' => 'Hamburguesa',
                'description' => 'No es mejor que la Pizza',
                'cost' => 101,
                'stock' => '1',
                'tenant_id' => 1
            ],
            [
                'name' => 'Agua 👍',
                'description' => 'solo agua',
                'cost' => 60,
                'stock' => '30',
                'tenant_id' => 2
            ],
            [
                'name' => 'Papas Fritas',
                'description' => 'Son Ricas',
                'cost' => 25,
                'stock' => '3',
                'tenant_id' => 2
            ],
            [
                'name' => 'Pastel',
                'description' => 'Es Lo Mejor',
                'cost' => 60,
                'stock' => '1',
                'tenant_id' => 2 
            ],
            [
                'name' => 'Sandia',
                'description' => 'Es mejor que el melon',
                'cost' => 25,
                'stock' => '1',
                'tenant_id' => 3
            ],
            [
                'name' => 'Chocolate',
                'description' => 'Es moejor que la vainilla',
                'cost' => 15,
                'stock' => '5',
                'tenant_id' => 3
            ],
            [
                'name' => 'Tacos',
                'description' => 'Lo Mejor de Mexico',
                'cost' => 40,
                'stock' => '6',
                'tenant_id' => 3
            ],
            [
                'name' => 'Coca-Cola',
                'description' => 'No Hay Nada Mejor',
                'cost' => 90,
                'stock' => '30',
                'tenant_id' => 4
            ],
            [
                'name' => 'Pepsi',
                'description' => 'Refrescante y Deliciosa',
                'cost' => 85,
                'stock' => '25',
                'tenant_id' => 4
            ],
            [
                'name' => 'Sprite',
                'description' => 'Limonada Carbonatada',
                'cost' => 80,
                'stock' => '20',
                'tenant_id' => 4
            ],
            [
                'name' => 'Fanta',
                'description' => 'Naranja y Burbujeante',
                'cost' => 95,
                'stock' => '15',
                'tenant_id' => 5
            ],
            [
                'name' => 'Mountain Dew',
                'description' => 'Energía Citrus',
                'cost' => 100,
                'stock' => '10',
                'tenant_id' => 5
            ],
            [
                'name' => 'Dr. Pepper',
                'description' => 'Sabor Único',
                'cost' => 110,
                'stock' => '12',
                'tenant_id' => 5
            ],
            [
                'name' => 'Chocolate Bar',
                'description' => 'Deliciosa barra de chocolate',
                'cost' => 50,
                'stock' => '50',
                'tenant_id' => 6
            ],
            [
                'name' => 'Laptop',
                'description' => 'Potente portátil para tus necesidades',
                'cost' => 1200,
                'stock' => '10',
                'tenant_id' => 6
            ],
            [
                'name' => 'Headphones',
                'description' => 'Auriculares de alta calidad con cancelación de ruido',
                'cost' => 150,
                'stock' => '15',
                'tenant_id' => 6
            ],
            [
                'name' => 'Orange Juice',
                'description' => 'Jugo de naranja natural',
                'cost' => 75,
                'stock' => '40',
                'tenant_id' => 7
            ],
            [
                'name' => 'Popcorn',
                'description' => 'Palomitas de maíz listas para el cine',
                'cost' => 20,
                'stock' => '100',
                'tenant_id' => 7
            ],
            [
                'name' => 'Smartphone',
                'description' => 'Teléfono inteligente con últimas características',
                'cost' => 800,
                'stock' => '30',
                'tenant_id' => 7
            ],
            [
                'name' => 'Coffee Beans',
                'description' => 'Granos de café premium',
                'cost' => 40,
                'stock' => '50',
                'tenant_id' => 8
            ],
            [
                'name' => 'Television',
                'description' => 'Televisor de alta definición',
                'cost' => 700,
                'stock' => '5',
                'tenant_id' => 8
            ],
            [
                'name' => 'Fitness Tracker',
                'description' => 'Seguimiento de actividad para un estilo de vida saludable',
                'cost' => 60,
                'stock' => '20',
                'tenant_id' => 8
            ],
            [
                'name' => 'Green Tea',
                'description' => 'Té verde antioxidante',
                'cost' => 25,
                'stock' => '30',
                'tenant_id' => 9
            ],
            [
                'name' => 'Backpack',
                'description' => 'Mochila duradera para todas tus aventuras',
                'cost' => 50,
                'stock' => '15',
                'tenant_id' => 9
            ],
            [
                'name' => 'Digital Camera',
                'description' => 'Cámara digital de alta resolución',
                'cost' => 300,
                'stock' => '10',
                'tenant_id' => 9
            ],
        ];

        foreach($products as $product)
        {

            Product::create($product);

        }


    }
}
