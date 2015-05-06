<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Field following language lines contain Field default error messages used by
	| Field validator class. Some of Fieldse rules have multiple versions such
	| as Field size rules. Feel free to tweak each of Fieldse messages here.
	|
	*/

	"accepted"             => "Field :attribute harus yang diperbolehkan.",
	"active_url"           => "Field :attribute bukan URL yang valid.",
	"after"                => "Field :attribute harus sebuah tanggal setelah :date.",
	"alpha"                => "Field :attribute hanya boleh diisi huruf.",
	"alpha_dash"           => "Field :attribute hanya boleh diisi huruf, nomor dan strip.",
	"alpha_num"            => "Field :attribute hanya boleh diisi huruf dan nomor.",
	"array"                => "Field :attribute harus berupa array.",
	"before"               => "Field :attribute harus sebuah tanggal sebelum :date.",
	"between"              => array(
		"numeric" => "Field :attribute harus di antara :min dan :max.",
		"file"    => "Field :attribute harus di antara :min dan :max kilobyte.",
		"string"  => "Field :attribute harus di antara :min dan :max karacter.",
		"array"   => "Field :attribute harus di antara:min dan :max item.",
	),
	"boolean"              => "Field :attribute harus berupa true atau false",
	"confirmed"            => "Field konfirmasi :attribute tidak tepat.",
	"date"                 => "Field :attribute bukan tanggal yang valid.",
	"date_format"          => "Field :attribute tidak sama dengan format :format.",
	"different"            => "Field :attribute dan :other harus berbeda.",
	"digits"               => "Field :attribute harus :digits digit.",
	"digits_between"       => "Field :attribute harus di antara :min dan :max digit.",
	"email"                => "Field :attribute harus berupa email yang valid.",
	"exists"               => "Field :attribute yang dipilih tidak valid.",
	"image"                => "Field :attribute harus berupa gambar.",
	"in"                   => "Field :attribute yang dipilih tidak valid.",
	"integer"              => "Field :attribute harus berupa integer.",
	"ip"                   => "Field :attribute harus berupa IP address yang valid.",
	"max"                  => array(
		"numeric" => "Field :attribute tidak boleh lebih dari :max.",
		"file"    => "Field :attribute tidak boleh lebih dari :max kilobyte.",
		"string"  => "Field :attribute tidak boleh lebih dari :max karakter.",
		"array"   => "Field :attribute tidak boleh lebih dari :max item.",
	),
	"mimes"                => "Field :attribute harus bertipe berkas: :values.",
	"min"                  => array(
		"numeric" => "Field :attribute tidak boleh kurang dari :min.",
		"file"    => "Field :attribute tidak boleh kurang dari :min kilobyte.",
		"string"  => "Field :attribute tidak boleh kurang dari :min karakter.",
		"array"   => "Field :attribute tidak boleh kurang dari :min item.",
	),
	"not_in"               => "Field :attribute yand dipilih tidak valid.",
	"numeric"              => "Field :attribute harus berupa nomor.",
	"regex"                => "Format field :attribute tidak valid.",
	"required"             => "Field :attribute harus diisi.",
	"required_if"          => "Field :attribute harus diisi ketika :other adalah :value.",
	"required_with"        => "Field :attribute harus diisi ketika :values ada.",
	"required_with_all"    => "Field :attribute harus diisi ketika :values ada.",
	"required_without"     => "Field :attribute harus diisi ketika :values tidak ada.",
	"required_without_all" => "Field :attribute harus diisi ketika :values tidak ada.",
	"same"                 => "Field :attribute dan :other harus sama.",
	"size"                 => array(
		"numeric" => "Field :attribute harus memiliki :size.",
		"file"    => "Field :attribute harus memiliki :size kilobyte.",
		"string"  => "Field :attribute harus memiliki :size karacter.",
		"array"   => "Field :attribute harus memiliki :size item.",
	),
	"unique"               => "Field :attribute sudah ada dalam database.",
	"url"                  => "Format field :attribute tidak valid.",
	"timezone"             => "Field :attribute harus berupa zona yang valid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using Field
	| convention "attribute.rule" to name Field lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| Field following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
