$('#formAMarchivo').bootstrapValidator({

    message: 'Este valor no es valido',

    

    fields: {

        nombreArchivo: {

            validators: {

                notEmpty: {

                    message: 'El nombre es obligatorio'

                },
                
            }

        },
        
    }

})
