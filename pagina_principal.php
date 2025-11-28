<?php
// --- ARQUIVO: pagina_principal.php ---

// 1. DADOS DOS VÍDEOS (Substitui o JavaScript antigo)
$videosData = [
    'video1' => ['titulo' => 'Treino Funcional Adaptado', 'desc' => 'Experiência inspiradora focada em acessibilidade e treino funcional para cadeirantes.', 'src' => 'videos/video1.mp4'],
    'video2' => ['titulo' => 'Superação na Musculação', 'desc' => 'Atleta com deficiência visual demonstrando técnica correta no supino.', 'src' => 'videos/video2.mp4'],
    // ... Adicione os outros vídeos aqui (video3, video4...) ...
    'video12' => ['titulo' => 'Dança Inclusiva', 'desc' => 'Show de dança com par misto (cadeirante e andante) em perfeita sintonia.', 'src' => 'videos/video12.mp4'],
    'video19' => ['titulo' => 'Finalização de Treino', 'desc' => 'Alongamento guiado e depoimento final sobre a importância do esporte.', 'src' => 'videos/video19.mp4']
];

// 2. CONFIGURAÇÕES DE ACESSIBILIDADE
$tema_atual = isset($_GET['tema']) ? $_GET['tema'] : 'padrao';
$tamanho_fonte = isset($_GET['fonte']) ? $_GET['fonte'] : 'medio';
$ler_texto = isset($_GET['ler']) ? $_GET['ler'] : 'nao';
$video_selecionado = isset($_GET['video']) ? $_GET['video'] : '';

function criarLink($params) {
    global $tema_atual, $tamanho_fonte, $video_selecionado;
    $novos = array_merge([
        'tema' => $tema_atual,
        'fonte' => $tamanho_fonte,
        'video' => $video_selecionado, 
        'ler' => 'nao' 
    ], $params);
    return "?" . http_build_query($novos);
}

// 3. ÁUDIO DO TEXTO (Resumo da página)
$texto_audio = "Bem-vindo ao Accessibility Fitness. Conheça nosso propósito, veja experiências inspiradoras e entenda como a inclusão transforma vidas.";
if ($video_selecionado && isset($videosData[$video_selecionado])) {
    $texto_audio = "Você selecionou o vídeo: " . $videosData[$video_selecionado]['titulo'] . ". " . $videosData[$video_selecionado]['desc'];
}
$url_audio = "https://translate.google.com/translate_tts?ie=UTF-8&q=" . urlencode($texto_audio) . "&tl=pt-BR&client=tw-ob";
?>
