<?php

namespace App\Models;

/*
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * THIS FILE IS AUTO-GENERATED BY AUTOMODEL:TABLE COMMAND
 * ANY CHANGES MADE TO THIS FILE MAY BE LOST
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */

use Illuminate\Database\Eloquent\Model;

/**
 * No description found in the table comment.
 *
 * Class Pengajar
 * @package App\Models
 *
 * @property integer $id
 * @property integer $id_guru
 * @property integer $id_pelajaran
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\Jadwal[] $jadwals
 * @property \App\Models\Guru $guru
 * @property \App\Models\Pelajaran $pelajaran
 */
class Pengajar extends Model 
{

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pengajar';

    protected $fillable = [
        'id_guru', 'id_pelajaran'
    ];



    /**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = ['pivot'];


	/**
	 * The attributes appended to the model's JSON form.
	 *
	 * @var array
	 */
	protected $appends = [];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at'];



	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function jadwals()
	{
		return $this->hasMany(
			// Model
			'App\Models\Jadwal',
			// Foreign key
			'id_pengajar',
			// Local key
			'id'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function guru()
	{
		return $this->belongsTo(
			// Model
			'App\Models\Guru',
			// Foreign key
			'id',
			// Other key
			'id_guru'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function pelajaran()
	{
		return $this->belongsTo(
			// Model
			'App\Models\Pelajaran',
			// Foreign key
			'id',
			// Other key
			'id_pelajaran'
		);
	}



}
