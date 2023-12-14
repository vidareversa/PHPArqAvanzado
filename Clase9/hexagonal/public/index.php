<?php

require_once '../app/Domain/Model/Usuario.php';
require_once '../app/Application/Service/UsuarioService.php';
require_once '../app/Infrastructure/Adapter/UsuarioRepository.php';

use Application\Service\UsuarioService;
use Infrastructure\Adapter\UsuarioRepository;

$usuarioRepository = new UsuarioRepository();
$usuarioService = new UsuarioService($usuarioRepository);

$usuario = $usuarioService->obtenerUsuarioPorId(1);