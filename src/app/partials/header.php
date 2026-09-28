<?php
declare(strict_types=1);

namespace StudioChirleyBraga;

// Estruturação do schema LocalBusiness somente com campos estritamente confirmados
$localBusinessSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => config('studio_name'),
    'telephone' => config('phone_e164'),
    'address' => [
        '@type' => 'PostalAddress',
        'addressLocality' => config('city'),
        'addressRegion' => config('state'),
        'addressCountry' => config('country'),
        'streetAddress' => config('street_address'),
        'postalCode' => config('postal_code'),
    ],
    'hasMap' => config('maps_url'),
    'sameAs' => [
        config('instagram_url'),
    ],
    // Horários omitidos do JSON-LD até confirmação da proprietária (não há campo para horário provisório)
];

if (!empty(config('base_url'))) {
    $localBusinessSchema['url'] = config('base_url');
}
?>
<!DOCTYPE html>
<html lang="pt-BR" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>document.documentElement.classList.replace('no-js', 'js');</script>
    
    <title><?= e(config('meta_title')) ?></title>
    <meta name="description" content="<?= attr(config('meta_description')) ?>">
    <meta name="robots" content="<?= attr(config('base_url') ? config('meta_robots') : 'noindex, nofollow') ?>">
    
    <?php if (!empty(config('base_url'))): ?>
        <link rel="canonical" href="<?= attr(config('base_url')) ?>">
        <meta property="og:url" content="<?= attr(config('base_url')) ?>">
    <?php endif; ?>

    <!-- Open Graph (Facebook / WhatsApp / LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="<?= attr(config('studio_name')) ?>">
    <meta property="og:title" content="<?= attr(config('meta_title')) ?>">
    <meta property="og:description" content="<?= attr(config('meta_description')) ?>">
    <?php if (!empty(config('base_url'))): ?>
        <meta property="og:image" content="<?= attr(url(config('images')['og_image'])) ?>">
    <?php endif; ?>

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= attr(config('meta_title')) ?>">
    <meta name="twitter:description" content="<?= attr(config('meta_description')) ?>">
    <?php if (!empty(config('base_url'))): ?>
        <meta name="twitter:image" content="<?= attr(url(config('images')['og_image'])) ?>">
    <?php endif; ?>

    <!-- Tipografia otimizada: Google Fonts com preconnect e display=swap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:opsz,wght@6..72,400;6..72,500&family=Source+Sans+3:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/assets/css/site.css">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    <!-- Dados Estruturados Schema.org: LocalBusiness estritamente factual -->
    <script type="application/ld+json">
    <?= json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>
</head>
<body>
    <a href="#conteudo-principal" class="skip-link">Pular para o conteúdo principal</a>

    <header class="site-header" id="topo">
        <div class="container header-container">
            <a href="#inicio" class="brand-wordmark" aria-label="<?= attr(config('studio_name')) ?> - Início">
                <span class="brand-name"><?= e(config('professional_name')) ?></span>
                <span class="brand-descriptor">Studio de Pilates</span>
            </a>

            <nav class="main-nav" id="main-nav" aria-label="Navegação principal">
                <ul class="nav-list">
                    <?php foreach (config('nav_links') as $href => $label): ?>
                        <li><a href="<?= attr($href) ?>" class="nav-link"><?= e($label) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <div class="header-actions">
                <a href="<?= attr(config('whatsapp_url')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary header-cta">
                    Agendar pelo WhatsApp
                </a>
                <button type="button" class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="main-nav" aria-label="Abrir menu de navegação">
                    <span class="menu-icon-bar"></span>
                    <span class="menu-icon-bar"></span>
                </button>
            </div>
        </div>
    </header>
