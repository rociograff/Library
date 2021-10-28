//Nueva Persona
$(document).ready(function() {
    $('#datosPersona').bootstrapValidator({
        message: 'Este valor no es válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nro_dni: {
                message: 'DNI no válido',
                validators: {
                    notEmpty: {
                        message: 'El Dni es obligatorio'
                    },
                    regexp: {
                        regexp: /^\d{8}$/,
                        message: 'Debe ingresar 8 dígitos.'
                    }
                }
            },
            apellido: {
                message: 'Apellido no válido',
                validators: {
                    notEmpty: {
                        message: 'El apellido es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: 'La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            nombre: {
                message: 'Nombre no válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: 'La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            domicilio: {
                message: 'Domicilio no válido',
                validators: {
                    notEmpty: {
                        message: 'Se requiere un domicilio'
                    }
                }
            },
            fecha_nac: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar una fecha'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese número de teléfono'
                    }
                }
            }
        }
    });
});

//Buscar Persona
$(document).ready(function() {
    $('#buscarPersona').bootstrapValidator({
        message: 'Este valor no es válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nro_dni: {
                message: 'DNI no válido',
                validators: {
                    notEmpty: {
                        message: 'El Dni es obligatorio'
                    },
                    regexp: {
                        regexp: /^\d{8}$/,
                        message: 'Debe ingresar 8 dígitos.'
                    }
                }
            }
        }
    });
});

//Modificar Persona
$(document).ready(function() {
    $('#modificarPersona').bootstrapValidator({
        message: 'Este valor no es válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            apellido: {
                message: 'Apellido no válido',
                validators: {
                    notEmpty: {
                        message: 'El apellido es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: 'La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            nombre: {
                message: 'Nombre no válido',
                validators: {
                    notEmpty: {
                        message: 'El nombre es obligatorio'
                    },
                    regexp: {
                        regexp: /^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\s]*)+$/,
                        message: 'La primer letra en mayúscula. Solo letras.'
                    }
                }
            },
            domicilio: {
                message: 'Domicilio no válido',
                validators: {
                    notEmpty: {
                        message: 'Se requiere un domicilio'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese número de teléfono'
                    }
                }
            }
        }
    });
});