<?php
/**
 * Usuarios controller
 *
 * Controller for application usuarios.
 * 
 * @uses       none
 * @package    Usuarios
 * @subpackage Controller
 */
/**
 * Incluir librerias 
 */
require_once ($config['models']."/usuarios.php");

/**
 * Settings iniciales 
 */
//Requiere un objeto
//$usuariosModel= new usuariosModel();
//$datos=$usuariosModel->initUserData();
$db=new dbConnect($config);
//Tambien se puede hacer así, llamada estatica, para pasar de un programa NO oop a oop(no orientado a objetos, a orientado a objetos)
 $datos=usuariosModel::initUserData();
/**
 * Inicializacion de variables 
 */
$usuario='';
$content='';
$route=route('usuarios', 'select');     

/**
 * Parametrizar 
 */

/**
 * Procesar 
 */
//$link=connectDBServer($config);
$link=new dbConnect($config);
switch($route['action'])
{
    case 'delete':
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert            
            if ($_POST['delete']=='Si')
                usuariosModel::procesarDelete($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select"); 
            break;
        }
        else
        {
            $usuarios=usuariosModel::readUsersById($db, $_GET['usuario']);
            $viewVar=array('usuarios'=>$usuarios,'helper'=>$config['helpers']);     
        }
    break;    
    case 'update':       
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert            
            usuariosModel::procesarUpdate($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select"); 
            break;
        }
        else
        {
            $datos= usuariosModel::readUserData($db, $config['usersUploadDirectory']."/images");
        }        
    case 'insert':
        // Si POST          
        if (isset($_POST['usuario']))
        {
            // Procesar formulario de insert
             usuariosModel::procesar($db,$config['usersUploadDirectory']."/images", $config);
            header("Location: ?controller=usuarios&action=select");            
        }
        else
        {
            //Mostrar formulario
            $viewVar=array('usuario'=>'','datos'=>$datos,'db'=>$db,'helper'=>$config['helpers']);           
        }                             
    break;
    case 'select':
    default:   
        $usuarios= usuariosModel::readUsers($link);
        $viewVar=array('usuarios'=>$usuarios,'helper'=>$config['helpers']);
    break;
}
/**
 * Mostrar 
 */
$content=view($viewVar, $config['views'].'/'.$route['controller'].'/'.$route['action'].'.phtml');
$db->disconnectDBServer();
?>