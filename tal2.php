<?php
// Definição dos dados no PHP (Substituindo o objeto JS)
$infoData = [
    'deca' => [
        'nome' => "Deca-Durabolin",
        'risco' => "Alta retenção líquida, acne severa e risco cardíaco."
    ],
    'dura' => [
        'nome' => "Durateston",
        'risco' => "Alterações hormonais agressivas, calvície e agressividade."
    ]
];

// Captura a escolha do usuário vinda da URL (GET)
$selecionado = isset($_GET['anabolizantes']) ? $_GET['anabolizantes'] : '';
?>
