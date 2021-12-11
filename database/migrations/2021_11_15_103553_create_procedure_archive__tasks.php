
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProcedureArchiveTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure = "DROP PROCEDURE IF EXISTS `pr_archive_tasks`;
        CREATE PROCEDURE `pr_archive_tasks` (IN num bigint)
        BEGIN
        SELECT tasks.id ,tasks.title,tasks.description,tasks.status,tasks.assigned_to,tasks.user_id,tasks.created_at,tasks.updated_at,tasks.duedate,
               users.name ,users.email ,users.password ,users.parentId ,users.company_name from tasks
        INNER JOIN
        users ON (tasks.assigned_to = users.id)
        where ((users.parentId = num) or (users.id = num)) and (tasks.status = 'finished')
        ORDER BY tasks.updated_at desc;
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
        Schema::dropIfExists('procedure_archive_tasks');
    }
}









