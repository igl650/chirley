<?php
declare(strict_types=1);

/**
 * Studio de Pilates Chirley Braga — Configuração Central e Fonte Única de Dados
 * 
 * Contém todos os dados factuais confirmados do estúdio, metadados e funções de escape seguro.
 */

namespace StudioChirleyBraga;

const CONFIG = [
    // Identificação
    'studio_name' => 'Studio de Pilates Chirley Braga',
    'professional_name' => 'Chirley Braga',
    'experience_years' => 19,
    'professional_role' => 'Fisioterapeuta e instrutora de Pilates há 19 anos',
    'approach' => 'Atendimento humanizado, individualizado e baseado em evidências',
    
    // SEO. O domínio ('base_url') vem do build; sem ele o site sai com noindex.
    'meta_title' => 'Studio de Pilates Chirley Braga | Pilates em Juazeiro-BA',
    'meta_description' => 'Atendimento humanizado e individualizado com Chirley Braga, fisioterapeuta e instrutora de Pilates há 19 anos em Juazeiro-BA. Agende pelo WhatsApp.',
    'meta_robots' => 'index, follow',

    // Contato e Canais
    'phone_display' => '(74) 98859-6319',
    'phone_raw' => '5574988596319',
    'phone_e164' => '+5574988596319',
    'whatsapp_url' => 'https://wa.me/5574988596319?text=Ol%C3%A1%2C%20gostaria%20de%20conhecer%20o%20Pilates%20do%20Studio%20Chirley%20Braga.',
    'instagram_handle' => '@chirleybraga.pilates',
    'instagram_url' => 'https://www.instagram.com/chirleybraga.pilates/',
    
    // Localização (endereço e CEP confirmados pelo responsável do projeto)
    'city' => 'Juazeiro',
    'state' => 'BA',
    'country' => 'BR',
    'region_display' => 'Juazeiro • BA',
    'street_address' => 'Passarela Center, R. Stª. Maria Gorete, 23, Santa Maria Goretti',
    'postal_code' => '48904-287',
    'address_display' => 'Passarela Center, R. Stª. Maria Gorete, 23, Santa Maria Goretti, Juazeiro-BA, 48904-287',
    'address_reference' => 'Ao lado do GBarbosa',
    'maps_url' => 'https://www.google.com/maps/place/?q=place_id:ChIJbQ3hC2dxcwcRMJiyOqJtSiM',
    'place_id' => 'ChIJbQ3hC2dxcwcRMJiyOqJtSiM',
    
    // Prova social verificada (Google Maps)
    'google_rating' => '5,0',
    'google_review_count' => 224,
    'google_review_date' => 'setembro de 2026',
    
    // Horário público anunciado (marcado como provisório para confirmação com Chirley)
    'opening_hours_display' => 'Segunda a sexta, das 07h às 20h',
    'opening_hours_status' => 'provisório',
    'opening_hours_note' => 'Horário informado na ficha do Google Maps. Consulte a disponibilidade pelo WhatsApp.',
    
    // Navegação por âncoras da página única
    'nav_links' => [
        '#estudio' => 'Estúdio',
        '#aulas' => 'Aulas',
        '#chirley' => 'Chirley',
        '#como-comecar' => 'Como começar',
        '#contato' => 'Contato',
    ],
    
    // Imagens locais do site
    'images' => [
        'hero_portrait' => '/assets/img/chirley-retrato-instagram.jpg',
        'studio' => '/assets/img/pilates-studio-instagram.jpg',
        'movement' => '/assets/img/pilates-movimento-instagram.jpg',
        'og_image' => '/assets/img/chirley-retrato-instagram.jpg',
    ],
];

/**
 * Obtém um valor da configuração central.
 */
function config(string $key, mixed $default = null): mixed
{
    if ($key === 'base_url') {
        // Definido no build: php build.php https://dominio.com.br (ou variável SITE_URL)
        return (string) (getenv('SITE_URL') ?: '');
    }

    return CONFIG[$key] ?? $default;
}

/**
 * Escapa texto de forma segura para renderização em HTML.
 */
function e(mixed $value): string
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/**
 * Escapa valor de forma segura para uso em atributos HTML.
 */
function attr(mixed $value): string
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

/**
 * Retorna URL absoluta ou relativa com base na configuração.
 */
function url(string $path = ''): string
{
    $base = config('base_url', '');
    if (!empty($base)) {
        return rtrim((string)$base, '/') . '/' . ltrim($path, '/');
    }
    return '/' . ltrim($path, '/');
}
