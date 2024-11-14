<?php

namespace App\Helpers;

class Messages
{
    public static function mesagesAction($action, $type)
    {
        // Variables que se retornan
        $titulo = '';
        $message = '';
        $tipo = '';
        // Segun a las opciones datos que se enviaran
        switch ($action) {
            case 'find':
                switch ($type) {
                    case 'success':
                        $titulo = 'Exito';
                        $message = 'Se listan las coincidencisa de la busqueda.';
                        $tipo = 'bg-success';
                        break;
                    case 'warning':
                        $titulo = 'Aviso';
                        $message = 'No se tuvieron coincidencias de la busqueda.';
                        $tipo = 'bg-warning';
                        break;
                }
                break;
            case 'add':
                switch ($type) {
                    case 'success':
                        $titulo = 'Exito';
                        $message = 'Los Datos se guardaron correctamnete.';
                        $tipo = 'bg-success';
                        break;
                    case 'danger':
                        $titulo = 'Error';
                        $message = 'No se pudo guardar los datos.';
                        $tipo = 'bg-danger';
                        break;
                    case 'error':
                        $titulo = 'Error';
                        $message = 'No se completaron de registrar todos los datos necesarios.';
                        $tipo = 'bg-danger';
                        break;
                    case 'general-error':
                        $titulo = 'Error';
                        $message = 'ERROR: NO SE PUDO REALIZAR LA TAREA SOLICITADA, POR FAVOR CONTACTESE CON SISTEMAS PARA SOLUCIONAR EL PROBLEMA.';
                        $tipo = 'bg-danger';
                        break;
                }
                break;
            case 'edit':
                switch ($type) {
                    case 'view':
                        $titulo = 'Error';
                        $message = 'La vista no se pudo cargar.';
                        $tipo = 'bg-danger';
                        break;
                    case 'success':
                        $titulo = 'Exito';
                        $message = 'Los Datos se Modificaron correctamente.';
                        $tipo = 'bg-success';
                        break;
                    case 'danger':
                        $titulo = 'Error';
                        $message = 'Los Datos No se pudieron Modificar.';
                        $tipo = 'bg-danger';
                        break;
                    case 'exists':
                        $titulo = 'Error';
                        $message = 'El Dato que se quiere Modificar no existe.';
                        $tipo = 'bg-danger';
                        break;
                    case 'empty':
                        $titulo = 'Error';
                        $message = 'Verifique que esta mandando la información completa.';
                        $tipo = 'bg-danger';
                        break;
                    case 'general-error':
                        $titulo = 'Error';
                        $message = 'ERROR: NO SE PUDO REALIZAR LA TAREA SOLICITADA, POR FAVOR CONTACTESE CON SISTEMAS PARA SOLUCIONAR EL PROBLEMA.';
                        $tipo = 'bg-danger';
                        break;
                }
                break;
            case 'delete':
                switch ($type) {
                    case 'success':
                        $titulo = 'Exito';
                        $message = 'Los Datos fueron eliminados.';
                        $tipo = 'bg-success';
                        break;
                    case 'danger':
                        $titulo = 'Error';
                        $message = 'Los Datos No se pudieron Eliminar.';
                        $tipo = 'bg-danger';
                        break;
                    case 'exists':
                        $titulo = 'Error';
                        $message = 'El Dato que se quiere Eliminar no existe.';
                        $tipo = 'bg-danger';
                        break;
                    case 'general-error':
                        $titulo = 'Error';
                        $message = 'ERROR: NO SE PUDO REALIZAR LA TAREA SOLICITADA, POR FAVOR CONTACTESE CON SISTEMAS PARA SOLUCIONAR EL PROBLEMA.';
                        $tipo = 'bg-danger';
                        break;
                }
                break;
            case 'active':
                switch ($type) {
                    case 'success':
                        $titulo = 'Exito';
                        $message = 'Se Modifico correctamente la Habilitación.';
                        $tipo = 'bg-success';
                        break;
                    case 'danger':
                        $titulo = 'Error';
                        $message = 'No se pudo Modificar la Habilitación.';
                        $tipo = 'bg-danger';
                        break;
                    case 'exists':
                        $titulo = 'Error';
                        $message = 'El Dato que se quiere Habilitar no existe.';
                        $tipo = 'bg-danger';
                        break;
                    case 'general-error':
                        $titulo = 'Error';
                        $message = 'ERROR: NO SE PUDO REALIZAR LA TAREA SOLICITADA, POR FAVOR CONTACTESE CON SISTEMAS PARA SOLUCIONAR EL PROBLEMA.';
                        $tipo = 'bg-danger';
                        break;
                }
                break;
            case 'reset':
                switch ($type) {
                    case 'success':
                        $titulo = 'Exito';
                        $message = 'Se Reestablecio la Contraseña correctamente.';
                        $tipo = 'bg-success';
                        break;
                    case 'danger':
                        $titulo = 'Error';
                        $message = 'No se pudo Reestablecer la Contraseña.';
                        $tipo = 'bg-danger';
                        break;
                    case 'exists':
                        $titulo = 'Error';
                        $message = 'Al Usuario que quiere Reestablecer la Contrasela no existe.';
                        $tipo = 'bg-danger';
                        break;
                    case 'general-error':
                        $titulo = 'Error';
                        $message = 'ERROR: NO SE PUDO REALIZAR LA TAREA SOLICITADA, POR FAVOR CONTACTESE CON SISTEMAS PARA SOLUCIONAR EL PROBLEMA.';
                        $tipo = 'bg-danger';
                        break;
                }
                break;
            default:
                $titulo = 'Error';
                $message = 'ERROR: NO SE PUDO REALIZAR LA TAREA SOLICITADA, POR FAVOR CONTACTESE CON SISTEMAS PARA SOLUCIONAR EL PROBLEMA.';
                $tipo = 'bg-danger';
                break;
        }
        return [$titulo, $message, $tipo];
    }
}
