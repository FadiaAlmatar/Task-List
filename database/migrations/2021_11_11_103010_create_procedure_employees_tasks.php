
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedureEmployeesTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `pr_employees_tasks`;
        CREATE PROCEDURE `pr_employees_tasks` (IN id bigint)
        BEGIN
        SELECT * from tasks
        INNER JOIN
        users ON (tasks.assigned_to = users.id)
        where (users.parentId = id) or (users.id = id);
        END;";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedure_employees_tasks');
    }
}









