<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El campo :attribute que deberán ser aceptadas.",
	"active_url"           => "El campo :attribute no es una URL válida.",
	"after"                => "El campo :attribute debe ser una fecha después :date.",
	"alpha"                => "El campo :attribute sólo puede contener letras.",
	"alpha_dash"           => "El campo :attribute sólo puede contener letras, números, y guiones.",
	"alpha_num"            => "El campo :attribute sólo puede contener letras y números.",
	"array"                => "El campo :attribute debe ser un array.",
	"before"               => "El campo :attribute debe ser una fecha antes :date.",
	"between"              => array(
		"numeric" => "El campo :attribute debe estar entre :min y :max.",
		"file"    => "El campo :attribute debe estar entre :min y :max kilobytes.",
		"string"  => "El campo :attribute debe estar entre :min y :max caracteres.",
		"array"   => "El campo :attribute debe estar entre :min y :max items.",
	),
	"confirmed"            => "El campo confirmar :attribute no coincide.",
	"date"                 => "El campo :attribute no es una fecha válida.",
	"date_format"          => "El campo :attribute no coincide con el formato :format.",
	"different"            => "El campo :attribute y :other deben ser diferente.",
	"digits"               => "El campo :attribute deben contener sólo :digits dígitos.",
	"digits_between"       => "El campo :attribute debe estar entre :min y :max dígitos.",
	"email"                => "El campo :attribute debe ser una dirección válida de correo electrónico.",
	"exists"               => "El campo seleccionado :attribute es inválido.",
	"image"                => "El campo :attribute debe ser una imagen.",
	"in"                   => "El campo seleccionado :attribute es inválido.",
	"integer"              => "El campo :attribute debe ser un entero.",
	"ip"                   => "El campo :attribute debe ser una dirección IP válida.",
	"max"                  => array(
		"numeric" => "El campo :attribute no puede ser mayor que :max.",
		"file"    => "El campo :attribute no puede ser mayor que :max kilobytes.",
		"string"  => "El campo :attribute no puede ser mayor que :max caracteres.",
		"array"   => "El campo :attribute no puede tener más de :max items.",
	),
	"mimes"                => "El campo :attribute debe ser un archivo de type: :values.",
	"min"                  => array(
		"numeric" => "El campo :attribute debe ser como mínimo :min.",
		"file"    => "El campo :attribute debe ser como mínimo :min kilobytes.",
		"string"  => "El campo :attribute debe ser como mínimo :min caracteres.",
		"array"   => "El campo :attribute debe tener al menos :min items.",
	),
	"not_in"               => "El campo seleccionado :attribute es inválido.",
	"numeric"              => "El campo :attribute debe ser un número.",
	"regex"                => "El campo :attribute formato no es válido.",
	"required"             => "El campo :attribute es requerido.",
	"required_if"          => "El campo :attribute es requerido cuando :other es :value.",
	"required_with"        => "El campo :attribute es requerido cuando :values está presente.",
	"required_with_all"    => "El campo :attribute es requerido cuando :values está presente.",
	"required_without"     => "El campo :attribute es requerido cuando :values no está presente.",
	"required_without_all" => "El campo :attribute es requerido cuando ninguno de :values están presentes.",
	"same"                 => "El campo :attribute y :other debe coincidir.",
	"size"                 => array(
		"numeric" => "El campo :attribute debe ser :size.",
		"file"    => "El campo :attribute debe ser :size kilobytes.",
		"string"  => "El campo :attribute debe ser :size caracteres.",
		"array"   => "El campo :attribute debe contener :size items.",
	),
	"unique"               => "El campo :attribute ya existe.",
	"url"                  => "El campo :attribute formato no es válido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
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
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
