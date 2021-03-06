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
 * Class Siswa
 * @package App\Models
 *
 * @property integer $id
 * @property string $nomor_pelajar
 * @property string $nama
 * @property string $telepon
 * @property string $alamat
 * @property integer $id_kelas
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\Absen[] $absens
 * @property \App\Models\Kela $kela
 */
class Siswa extends Model 
{

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'siswa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomor_pelajar', 'nama','telepon','alamat','id_kelas',
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
	public function absens()
	{
		return $this->hasMany(
			// Model
			'App\Models\Absen',
			// Foreign key
			'id_siswa',
			// Local key
			'id'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function kela()
	{
		return $this->belongsTo(
			// Model
			'App\Models\Kela',
			// Foreign key
			'id',
			// Other key
			'id_kelas'
		);
	}



}
