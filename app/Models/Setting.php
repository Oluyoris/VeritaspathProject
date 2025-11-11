<?php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class Setting extends Model
   {
       protected $fillable = [
           'site_name',
           'seo_title',
           'seo_description',
           'seo_keywords',
           'logo_path',
           'favicon_path',
       ];
   }