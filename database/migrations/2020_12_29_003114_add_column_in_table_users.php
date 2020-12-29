<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('domain')->nullable();
            $table->string('sub_domain')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('facebook_page_id')->nullable();
            $table->string('facebook_pixel')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('site_title')->nullable();
            $table->longText('site_keywords')->nullable();
            $table->longText('site_description')->nullable();
            $table->tinyInteger('plan_id')->nullable();
            $table->dateTime('next_expiration')->nullable();
            $table->dateTime('disabled_account')->nullable();
            $table->dateTime('deleted_account')->nullable();
            $table->tinyInteger('status_ative')->nullable()->default(1);
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('domain');
            $table->dropColumn('sub_domain');
            $table->dropColumn('logo');
            $table->dropColumn('facebook');
            $table->dropColumn('facebook_page_id');
            $table->dropColumn('facebook_pixel');
            $table->dropColumn('google_analytics');
            $table->dropColumn('whatsapp');
            $table->dropColumn('email_contact');
            $table->dropColumn('site_title');
            $table->dropColumn('site_keywords');
            $table->dropColumn('site_description');
            $table->dropColumn('plan_id');
            $table->dropColumn('next_expiration');
            $table->dropColumn('disabled_account');
            $table->dropColumn('deleted_account');
            $table->dropColumn('status_ative');
            $table->dropSoftDeletes();


        });
    }
}
