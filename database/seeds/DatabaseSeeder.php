<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\TypeUser;
use App\Models\Rol;
use App\Models\Project;
use App\Models\ProjectAttribute;
use App\Models\ProjectAttributeValue;
use App\Models\Permission;
use App\Models\Company;
use App\Models\BusinessUnit;
use App\Models\BusinessUnitAttribute;
use App\Models\BusinessUnitAttributeValue;
use App\Models\PMOAttribute;
use App\Models\PMOCategory;
use App\Models\PMOProject;
use App\Models\PMOProjectAttribute;
use App\Models\GDLink;

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

        // Seed links to google drive ----------
        GDLink::create([
            'id' => 1,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Automotriz/Administración del Conocimiento"
        ]);
        GDLink::create([
            'id' => 2,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Automotriz/Administrativo"
        ]);
        GDLink::create([
            'id' => 3,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Industria Privada/Administración del Conocimiento"
        ]);
        GDLink::create([
            'id' => 4,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Industria Privada/Administrativo"
        ]);
        GDLink::create([
            'id' => 5,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Gobierno/Administración del Conocimiento"
        ]);
        GDLink::create([
            'id' => 6,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Gobierno/Administrativo"
        ]);
        GDLink::create([
            'id' => 7,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Financieras y Mesa de Ayuda/Administración del Conocimiento"
        ]);
        GDLink::create([
            'id' => 8,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Financieras y Mesa de Ayuda/Administrativo"
        ]);
        GDLink::create([
            'id' => 9,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Proyectos de Consultoria/Administración del Conocimiento"
        ]);
        GDLink::create([
            'id' => 10,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Proyectos de Consultoria/Administrativo"
        ]);
        GDLink::create([
            'id' => 11,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Proyectos de Tecnología/Administración del Conocimiento"
        ]);
        GDLink::create([
            'id' => 12,
            'link_format' => "PMO-Files/BUSINESS_UNITS/Proyectos de Tecnología/Administrativo"
        ]);
        GDLink::create([
            'id' => 13,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/ATTRIBUTES/Documentos Internos"
        ]);
        GDLink::create([
            'id' => 14,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/ATTRIBUTES/Documentos Internos"
        ]);
        GDLink::create([
            'id' => 15,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/Organización"
        ]);
        GDLink::create([
            'id' => 16,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/Modelo"
        ]);
        GDLink::create([
            'id' => 17,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/Planeación y metodología"
        ]);
        GDLink::create([
            'id' => 18,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/Seguimiento"
        ]);
        GDLink::create([
            'id' => 19,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/Implementación"
        ]);
        GDLink::create([
            'id' => 20,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/GoLive"
        ]);
        GDLink::create([
            'id' => 21,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 1/PMO/Cierre del proyecto"
        ]);
        GDLink::create([
            'id' => 22,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/CONTRATO"
        ]);
        GDLink::create([
            'id' => 23,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/ANEXOS Y/O BASES DE LICITACION"
        ]);
        GDLink::create([
            'id' => 24,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/FASE I - Preparación del proyecto"
        ]);
        GDLink::create([
            'id' => 25,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/FASE II - Planos de Negocio"
        ]);
        GDLink::create([
            'id' => 26,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/Realización"
        ]);
        GDLink::create([
            'id' => 27,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/PREPARACION FINAL"
        ]);
        GDLink::create([
            'id' => 28,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/GoLive y soporte"
        ]);
        GDLink::create([
            'id' => 29,
            'link_format' => "PMO-Files/PROJECTS/Ejemplo 2/PMO/Seguimiento del proyecto"
        ]);
        // -------------------------

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

        // Seed business unit attributes -----------------
        BusinessUnitAttribute::create([
            'id' => 1,
            'name' => "Administración del Conocimiento",
            'description' => " null "
        ]);
        BusinessUnitAttribute::create([
            'id' => 2,
            'name' => "Administrativo",
            'description' => " null "
        ]);
        // -----------------------------------------------

        // Seed project attributes ----------
        ProjectAttribute::create([
            'id' => 1,
            'name' => "Documentos Internos",
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
            'business_unit' => 1,
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
            'business_unit' => 5,
        ]);
        // ---------------------------------------------

        // Seed values of attributes business unit ---------------------------
        BusinessUnitAttributeValue::create([
            'id' => 1,
            'business_unit' => 1,
            'business_unit_attribute' => 1,
            'link' => 1
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 2,
            'business_unit' => 1,
            'business_unit_attribute' => 2,
            'link' => 2
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 3,
            'business_unit' => 2,
            'business_unit_attribute' => 1,
            'link' => 3
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 4,
            'business_unit' => 2,
            'business_unit_attribute' => 2,
            'link' => 4
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 5,
            'business_unit' => 3,
            'business_unit_attribute' => 1,
            'link' => 5
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 6,
            'business_unit' => 3,
            'business_unit_attribute' => 2,
            'link' => 6
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 7,
            'business_unit' => 4,
            'business_unit_attribute' => 1,
            'link' => 7
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 8,
            'business_unit' => 4,
            'business_unit_attribute' => 2,
            'link' => 8
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 9,
            'business_unit' => 5,
            'business_unit_attribute' => 1,
            'link' => 9
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 10,
            'business_unit' => 5,
            'business_unit_attribute' => 2,
            'link' => 10
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 11,
            'business_unit' => 6,
            'business_unit_attribute' => 1,
            'link' => 11
        ]);
        BusinessUnitAttributeValue::create([
            'id' => 12,
            'business_unit' => 6,
            'business_unit_attribute' => 2,
            'link' => 12
        ]);
        // -------------------------------------------------------------------
        
        // Seed values of attributes projects --------------------------------
        ProjectAttributeValue::create([
            'id' => 1,
            'project' => 1,
            'project_attribute' => 1,
            'link' => 13
        ]);
        ProjectAttributeValue::create([
            'id' => 2,
            'project' => 2,
            'project_attribute' => 1,
            'link' => 14
        ]);
        // -------------------------------------------------------------------

        // Seed pmo categories ----------
        PMOCategory::create([
            'id' => 1,
            'name' => "Tradicionales"
        ]);
        PMOCategory::create([
            'id' => 2,
            'name' => "Gobierno"
        ]);
        // -------------------------

        // Seed pmo attributes ------------------------------------
        PMOAttribute::create([
            'id' => 1,
            'name' => "Organización",
            'pmo_category' => 1,
            'icon' => "fa-sitemap"
        ]);
        PMOAttribute::create([
            'id' => 2,
            'name' => "Modelo",
            'pmo_category' => 1,
            'icon' => "fa-gear fa-spin"
        ]);
        PMOAttribute::create([
            'id' => 3,
            'name' => "Planeación y metodología",
            'pmo_category' => 1,
            'icon' => "fa-book fa-fw"
        ]);
        PMOAttribute::create([
            'id' => 4,
            'name' => "Seguimiento",
            'pmo_category' => 1,
            'icon' => "fa-retweet"
        ]);
        PMOAttribute::create([
            'id' => 5,
            'name' => "Implementación",
            'pmo_category' => 1,
            'icon' => "fa-cloud-laravel-upload"
        ]);
        PMOAttribute::create([
            'id' => 6,
            'name' => "GoLive",
            'pmo_category' => 1,
            'icon' => "fa-rss"
        ]);
        PMOAttribute::create([
            'id' => 7,
            'name' => "Cierre del proyecto",
            'pmo_category' => 1,
            'icon' => "fa-sign-out"
        ]);
        PMOAttribute::create([
            'id' => 8,
            'name' => "CONTRATO",
            'pmo_category' => 2,
            'icon' => "fa-folder-open"
        ]);
        PMOAttribute::create([
            'id' => 9,
            'name' => "ANEXOS Y/O BASES DE LICITACION",
            'pmo_category' => 2,
            'icon' => "fa-files-o"
        ]);
        PMOAttribute::create([
            'id' => 10,
            'name' => "FASE I - Preparación del proyecto",
            'pmo_category' => 2,
            'icon' => "fa-file-text"
        ]);
        PMOAttribute::create([
            'id' => 11,
            'name' => "FASE II - Planos de Negocio",
            'pmo_category' => 2,
            'icon' => "fa-object-group"
        ]);
        PMOAttribute::create([
            'id' => 12,
            'name' => "Realización",
            'pmo_category' => 2,
            'icon' => "fa-pencil-square-o"
        ]);
        PMOAttribute::create([
            'id' => 13,
            'name' => "PREPARACION FINAL",
            'pmo_category' => 2,
            'icon' => "fa-clipboard"
        ]);
        PMOAttribute::create([
            'id' => 14,
            'name' => "GoLive y soporte",
            'pmo_category' => 2,
            'icon' => "fa-handshake-o"
        ]);
        PMOAttribute::create([
            'id' => 15,
            'name' => "Seguimiento del proyecto",
            'pmo_category' => 2,
            'icon' => "fa-line-chart"
        ]);
        // --------------------------------------------------------

        // Seed pmo projects ----------------------------------------
        PMOProject::create([
            'id' => 1,
            'project' => 1,
            'pmo_category' => 1,
        ]);
        PMOProject::create([
            'id' => 2,
            'project' => 2,
            'pmo_category' => 2
        ]);
        // ----------------------------------------------------------

        // Seed values of pmo attributes ----------------------------
        PMOProjectAttribute::create([
            'id' => 1,
            'pmo_project' => 1,
            'pmo_attribute' => 1,
            'link' => 15
        ]);
        PMOProjectAttribute::create([
            'id' => 2,
            'pmo_project' => 1,
            'pmo_attribute' => 2,
            'link' => 16
        ]);
        PMOProjectAttribute::create([
            'id' => 3,
            'pmo_project' => 1,
            'pmo_attribute' => 3,
            'link' => 17
        ]);
        PMOProjectAttribute::create([
            'id' => 4,
            'pmo_project' => 1,
            'pmo_attribute' => 4,
            'link' => 18
        ]);
        PMOProjectAttribute::create([
            'id' => 5,
            'pmo_project' => 1,
            'pmo_attribute' => 5,
            'link' => 19
        ]);
        PMOProjectAttribute::create([
            'id' => 6,
            'pmo_project' => 1,
            'pmo_attribute' => 6,
            'link' => 20
        ]);
        PMOProjectAttribute::create([
            'id' => 7,
            'pmo_project' => 1,
            'pmo_attribute' => 7,
            'link' => 21
        ]);
        PMOProjectAttribute::create([
            'id' => 8,
            'pmo_project' => 2,
            'pmo_attribute' => 8,
            'link' => 22
        ]);
        PMOProjectAttribute::create([
            'id' => 9,
            'pmo_project' => 2,
            'pmo_attribute' => 9,
            'link' => 23
        ]);
        PMOProjectAttribute::create([
            'id' => 10,
            'pmo_project' => 2,
            'pmo_attribute' => 10,
            'link' => 24
        ]);
        PMOProjectAttribute::create([
            'id' => 11,
            'pmo_project' => 2,
            'pmo_attribute' => 11,
            'link' => 25
        ]);
        PMOProjectAttribute::create([
            'id' => 12,
            'pmo_project' => 2,
            'pmo_attribute' => 12,
            'link' => 26
        ]);
        PMOProjectAttribute::create([
            'id' => 13,
            'pmo_project' => 2,
            'pmo_attribute' => 13,
            'link' => 27
        ]);
        PMOProjectAttribute::create([
            'id' => 14,
            'pmo_project' => 2,
            'pmo_attribute' => 14,
            'link' => 28
        ]);
        PMOProjectAttribute::create([
            'id' => 15,
            'pmo_project' => 2,
            'pmo_attribute' => 15,
            'link' => 29
        ]);
        // ----------------------------------------------------------

        // Seed rol ----------------------------
        Rol::create([
            'id' => 1,
            'name' => "Administrador",
            'description' => "Pueden gestionar todo los proyectos, categorias y PMO´s"
        ]);
        // -------------------------------------

        // Seed permission ---------------------------------
        Permission::create([
            'id' => 1,
            'rol' => 1,
            'C' => null,
            'BU' => null,
            'P' => null,
            'ABU' => 1,
            'AP' => 1,
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
