$('#ejer3a').bootstrapValidator({

    message: 'Este valor no es valido',

    

    fields: {

        usuario: {

            validators: {

                notEmpty: {

                    message: 'El usuario es obligatorio!'

                },
                
            }

        },
        password: {

            validators: {

                notEmpty: {

                    message: 'La contraseña es obligatoria'

                },
                
            }

        },
    }

});

$('#ejer3b').bootstrapValidator({

    message: 'Este valor no es valido',

    

    fields: {

        usuario: {

            validators: {

                notEmpty: {

                    message: 'El usuario es obligatorio!'

                },
                
            }

        },
        password: {

            validators: {

                notEmpty: {

                    message: 'La contraseña es obligatoria'

                },
                stringLength: {
                    min: 8,
                    max: 30,
                    message: 'La contraseña debe tener minimo 8 caracteres <br>'
                },
                different: {
                    field: 'usuario',
                    message: 'La contraseña no puede ser igual al nombre de usuario<br>'
                },
                regexp: {
                    regexp: /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/,
                    message: 'La contraseña debe contener letras , numeros y almenos una mayuscula<br>'
                },

                
            }

        },
    }
});


$('#eje4').bootstrapValidator({

    message: 'Este valor no es valido',
    fields: {

        titulo: {

            validators: {

                notEmpty: {

                    message: 'El titulo es obligatorio!'

                }
                
            }

        },
        actores: {

            validators: {

                notEmpty: {

                    message: 'Los actores son obligatorios!'

                }
                
            }

        },
        director: {

            validators: {

                notEmpty: {

                    message: 'El director es obligatorio!'

                }
                
            }

        },
        guion: {

            validators: {

                notEmpty: {

                    message: 'El guion es obligatorio!'

                }
                
            }

        },
        nacionalidad: {

            validators: {

                notEmpty: {

                    message: 'El guion es obligatorio!'

                }
                
            }

        },
        duracion: {

            validators: {

                notEmpty: {

                    message: 'La duracion es obligatoria!'

                },
                regexp: {
                    regexp: /^[1-9]+$/,
                    message: 'El campo solo puede contener numeros , la duracion no puede ser cero'
                },
                stringLength: {
                    min: 1,
                    max: 3,
                    message: 'El campo debe maximo 3 caracteres'
                },
                
            }

        },
        sinopsis: {

            validators: {

                notEmpty: {

                    message: 'La sinopsis es obligatoria!'

                }
                
            }

        },
        produccion: {

            validators: {

                notEmpty: {

                    message: 'La produccion es obligatoria!'

                }
                
            }

        },
        año: {

            validators: {

                notEmpty: {

                    message: 'El año es obligatorio'

                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'El campo solo puede contener numeros'
                },
                stringLength: {
                    min: 1,
                    max: 4,
                    message: 'El campo debe tener maximo 4 caracteres'
                },
 
            }

        }

    }

});