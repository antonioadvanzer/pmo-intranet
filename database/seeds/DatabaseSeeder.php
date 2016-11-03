<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\TypeUser;
use App\Models\Rol;
use App\Models\Project;
use App\Models\PMO;
use App\Models\Permission;
use App\Models\Company;
use App\Models\CategoryElement;
use App\Models\BusinessUnit;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        // Seed companies ----------
        Company::create([
            'id' => 1,
            'name' => "Advanzer"
        ]);
        Company::create([
            'id' => 2,
            'name' => "Entuizer"
        ]);
        // -------------------------

        // Seed type users ----------
        TypeUser::create([
            'id' => 1,
            'name' => "Administrador",
            'description' => "Perfil que define el control absoluto de todo el sistema"
        ]);
        TypeUser::create([
            'id' => 2,
            'name' => "Empleado",
            'description' => "Perfil gestionado por roles administrativos (CRUD)"
        ]);
        TypeUser::create([
            'id' => 3,
            'name' => "Cliente",
            'description' => "Perfil con el permiso de acceder a un solo proyecto PMO"
        ]);
        // -------------------------

        // Seed category elements ----------
        CategoryElement::create([
            'id' => 1,
            'name' => "Proyecto",
            'description' => " null "
        ]);
        CategoryElement::create([
            'id' => 2,
            'name' => "Empaquetamiento",
            'description' => " null "
        ]);
        // ---------------------------------

        // Seed business unit --------------
        BusinessUnit::create([
            'id' => 1,
            'name' => "Automotriz",
            'description' => " null ",
            'company' => 1,
            'icon' => "fa-car"
        ]);
        BusinessUnit::create([
            'id' => 2,
            'name' => "Industria Privada",
            'description' => " null ",
            'company' => 1,
            'icon' => "fa-industry"
        ]);
        BusinessUnit::create([
            'id' => 3,
            'name' => "Gobierno",
            'description' => " null ",
            'company' => 1,
            'icon' => "fa-book"
        ]);
        BusinessUnit::create([
            'id' => 4,
            'name' => "Financieras y Mesa de Ayuda",
            'description' => " null ",
            'company' => 1,
            'icon' => "fa-line-chart"
        ]);
        BusinessUnit::create([
            'id' => 5,
            'name' => "Proyectos de Consultoria",
            'description' => " null ",
            'company' => 2,
            'icon' => "fa-folder-open-o"
        ]);
        BusinessUnit::create([
            'id' => 6,
            'name' => "Proyectos de Tecnología",
            'description' => " null ",
            'company' => 2,
            'icon' => "fa-laptop"
        ]);
        // ---------------------------------

        // Seed pmo ----------------------------
        PMO::create([
            'id' => 1,
            'organization' => " null ",
            'model' => " null ",
            'planning_methodology' => " null ",
            'tracing' => " null ",
            'implementation' => " null ",
            'go_live' => " null ",
            'close_project' => " null "
        ]);
        PMO::create([
            'id' => 2,
            'organization' => " null ",
            'model' => " null ",
            'planning_methodology' => " null ",
            'tracing' => " null ",
            'implementation' => " null ",
            'go_live' => " null ",
            'close_project' => " null "
        ]);
        // -------------------------------------

        // Seed rol ----------------------------
        Rol::create([
            'id' => 1,
            'name' => "Administrador",
            'description' => "Pueden gestionar todo los proyectos, categorias y PMO´s"
        ]);
        // -------------------------------------

        // Seed project --------------------------------
        Project::create([
            'id' => 1,
            'name' => "Ejemplo 1",
            'description' => " ejemplo de un proyecto",
            'client' => " fulano ",
            'objective' => " probar ",
            'scope' => " muchos ",
            'status' => 1,
            'progress' => 100,
            'category_project' => 1,
            'business_unit' => 1,
            'pmo' => 1,
            'link' => " null "
        ]);
        Project::create([
            'id' => 2,
            'name' => "Ejemplo 2",
            'description' => " ejemplo de un proyecto",
            'client' => " sutano ",
            'objective' => " probar ",
            'scope' => " muchos ",
            'status' => 1,
            'progress' => 100,
            'category_project' => 1,
            'business_unit' => 5,
            'pmo' => 2,
            'link' => " null "
        ]);
        // ---------------------------------------------

        // Seed permission ---------------------------------
        Permission::create([
            'id' => 1,
            'rol' => 1,
            'E' => null,
            'UN' => null,
            'C' => null,
            'EP' => null,
            'create' => 1,
            'read' => 1,
            'update' => 1,
            'delete' => 1
        ]);
        // -------------------------------------------------

        // Seed Users --------------------------------
        Users::create([
            'id' => 1,
            'name' => "Administrador",
            'last_name' => "General",
            'nickname' => "admin",
            'email' => "pmo.intranet@advanzer.com",
            'password' => Hash::make("admin"),
            'type' => 1,
            'company' => 1,
            'rol' => 1,
            'pmo' => null
        ]);
        Users::create([
            'id' => 2,
            'name' => "Empleado1",
            'last_name' => "General",
            'nickname' => "empleado1",
            'email' => "empleado1@advanzer.com",
            'password' => Hash::make("empleado1"),
            'type' => 2,
            'company' => 1,
            'rol' => 1,
            'pmo' => null
        ]);
        Users::create([
            'id' => 3,
            'name' => "Cliente1",
            'last_name' => "Ejemplo",
            'nickname' => "cliente1",
            'email' => "cliente1@advanzer.com",
            'password' => Hash::make("cliente1"),
            'type' => 3,
            'company' => 1,
            'rol' => null,
            'pmo' => 1
        ]);
        Users::create([
            'id' => 4,
            'name' => "Empleado2",
            'last_name' => "General",
            'nickname' => "empleado2",
            'email' => "empleado2@entuizer.com",
            'password' => Hash::make("empleado2"),
            'type' => 2,
            'company' => 2,
            'rol' => 1,
            'pmo' => null
        ]);
        Users::create([
            'id' => 5,
            'name' => "Cliente2",
            'last_name' => "Ejemplo",
            'nickname' => "cliente2",
            'email' => "cliente2@entuizer.com",
            'password' => Hash::make("cliente2"),
            'type' => 3,
            'company' => 2,
            'rol' => null,
            'pmo' => 2
        ]);
        // -------------------------------------------------

    }
}
