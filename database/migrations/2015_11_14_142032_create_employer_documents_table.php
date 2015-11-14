<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerDocumentsTable extends Migration
{

    public function up()
    {
        Schema::create('employer_documents', function(Blueprint $table){
            $table->increments('id');
            $table->integer('employer_id', false, true);
            $table->enum('doc_type', ['pan_card', 'company_firm_rc','trade_license','govt_dept_rc', 'others'])->comment('uploaded document type');
            $table->string('doc_url', 240)->comment('Document URL');
            $table->string('description', 240)->comment('Document description')->nullable();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('employers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employer_documents');
    }
}
