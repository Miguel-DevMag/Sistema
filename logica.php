<?php
// --- LÓGICA PHP ---

// 1. Dados dos Vídeos
$videosData = [
    'video1' => [
        'titulo' => "Treino Adaptado de Musculação",
        'desc' => "Vídeo mostrando como um treino de musculação pode ser adaptado...",
        'src' => "videos/video1.mp4"
    ],
    'video2' => [
        'titulo' => "Aula de Dança Inclusiva",
        'desc' => "Vídeo de uma aula de dança inclusiva, mostrando movimentos adaptados...",
        'src' => "videos/video2.mp4"
    ],
    'video3' => [
        'titulo' => "Artes Marciais Adaptadas",
        'desc' => "Vídeo de artes marciais adaptadas, explicando técnicas seguras...",
        'src' => "videos/video3.mp4"
    ]
];

// 2. Captura configurações
$video_escolhido = isset($_GET['video']) ? $_GET['video'] : '';
$tema_atual = isset($_GET['tema']) ? $_GET['tema'] : 'padrao';
$tamanho_fonte = isset($_GET['fonte']) ? $_GET['fonte'] : 'medio';
$ler_texto = isset($_GET['ler']) ? $_GET['ler'] : 'nao';

// 3. Função para manter a URL organizada
function criarLink($params) {
    global $video_escolhido, $tema_atual, $tamanho_fonte, $ler_texto;
    
    // Mescla os parâmetros atuais com os novos
    $novos = array_merge([
        'video' => $video_escolhido,
        'tema' => $tema_atual,
        'fonte' => $tamanho_fonte,
        'ler' => 'nao' // Por padrão, ao navegar, para de ler
    ], $params);
    
    return "?" . http_build_query($novos);
}

// 4. Lógica de Leitura (TTS via MP3)
// Texto resumido para caber na URL da API gratuita
$texto_principal = "Bem-vindo ao Accessibility Fitness. Academia acessível para pessoas com deficiência visual. " .
                   "Nosso site oferece conteúdo sobre treinos, suplementos e saúde. " .
                   "Use a navegação abaixo para escolher vídeos de treino adaptado, dança inclusiva ou artes marciais.";

// Codifica o texto para URL
$texto_encoded = urlencode($texto_principal);
// Link para gerar áudio (Google TTS API não oficial mas funcional para testes)
$url_audio = "https://translate.google.com/translate_tts?ie=UTF-8&q={$texto_encoded}&tl=pt-BR&client=tw-ob";

?>
