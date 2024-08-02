<?php
return [

    'resource' => [
        'single' => 'Programación',
        'plural' => 'Programaciones',
        'navigation' => 'Configuración',
        'history' => 'Mostrar historial de ejecución',
    ],
    'fields' => [
        'command' => 'Comando',
        'arguments' => 'Argumentos',
        'options' => 'Opciones',
        'options_with_value' => 'Opciones con valor',
        'expression' => 'Expresión de cron',
        'log_filename' => 'Nombre de archivo de registro',
        'output' => 'Salida',
        'even_in_maintenance_mode' => 'Incluso en modo de mantenimiento',
        'without_overlapping' => 'Sin superposición',
        'on_one_server' => 'Ejecutar programación solo en un servidor',
        'webhook_before' => 'URL anterior',
        'webhook_after' => 'URL posterior',
        'email_output' => 'Correo electrónico para enviar la salida',
        'sendmail_success' => 'Enviar correo electrónico en caso de éxito al ejecutar el comando',
        'sendmail_error' => 'Enviar correo electrónico en caso de falla al ejecutar el comando',
        'log_success' => 'Escribir la salida del comando en la tabla de historial en caso de éxito al ejecutar el comando',
        'log_error' => 'Escribir la salida del comando en la tabla de historial en caso de falla al ejecutar el comando',
        'status' => 'Estado',
        'actions' => 'Acciones',
        'data-type' => 'Tipo de datos',
        'run_in_background' => 'Ejecutar en segundo plano',
        'created_at' => 'Creado en',
        'updated_at' => 'Actualizado en',
        'never' => 'Nunca',
        'environments' => 'Entornos',
        'limit_history_count' => 'Limitar recuento de historial',
    ],
    'messages' => [
        'no-records-found' => 'No se encontraron registros.',
        'save-success' => 'Datos guardados correctamente.',
        'save-error' => 'Error al guardar los datos.',
        'timezone' => 'Todos los programas se ejecutarán en la zona horaria: ',
        'select' => 'Seleccione un comando',
        'custom' => 'Comando personalizado',
        'custom-command-here' => 'Comando personalizado aquí (p. ej. `cat /proc/cpuinfo` o `artisan db:migrate`)',
        'help-cron-expression' => 'Si es necesario, haga clic aquí y utilice una herramienta para facilitar la creación de la expresión de cron',
        'help-log-filename' => 'Si se configura el archivo de registro, los mensajes de registro de este cron se escriben en storage/logs/<log filename>.log',
        'help-type' => 'Se pueden especificar varios :type separados por comas',
        'attention-type-function' => "ATENCIÓN: los parámetros del tipo 'función' se ejecutan antes de la ejecución de la programación y su retorno se pasa como parámetro. Úselo con cuidado, puede interrumpir su trabajo",
        'delete_cronjob' => 'Eliminar cronjob',
        'delete_cronjob_confirm' => '¿Realmente desea eliminar el cronjob ":cronjob"?'
    ],
    'status' => [
        'active' => 'Activo',
        'inactive' => 'Inactivo',
        'trashed' => 'Eliminado',
    ],
    'buttons' => [
        'inactivate' => 'Inactivar',
        'activate' => 'Activar',
        'history' => 'Historial',
        'clear_history' => 'Borrar historial'

    ],
    'validation' => [
        'cron' => 'El campo debe completarse en el formato de expresión cron.',
        'regex' => __('validation.alpha_dash') . ' ' . 'También se permite la coma.'
    ]
];
