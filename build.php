<?php
declare(strict_types=1);

/**
 * Gera o site estático em public/.
 *
 * Uso:
 *   php build.php                         (sem domínio: página com noindex)
 *   php build.php https://meudominio.com  (com domínio: indexável, canonical, Open Graph, sitemap)
 */

$root = __DIR__;
$url = rtrim((string) ($argv[1] ?? getenv('SITE_URL') ?: ''), '/');

if ($url !== '' && !preg_match('#^https://[a-z0-9.-]+(/.*)?$#i', $url)) {
    fwrite(STDERR, "URL inválida: use o formato https://dominio.com.br\n");
    exit(1);
}

putenv('SITE_URL=' . $url);

ob_start();
require $root . '/src/index.php';
$html = trim((string) ob_get_clean()) . "\n";

file_put_contents($root . '/public/index.html', $html);

$robots = "User-agent: *\nAllow: /\n";
if ($url !== '') {
    $robots .= "\nSitemap: {$url}/sitemap.xml\n";
    $sitemap = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{$url}/</loc>
    <lastmod>%s</lastmod>
  </url>
</urlset>

XML;
    file_put_contents($root . '/public/sitemap.xml', sprintf($sitemap, date('Y-m-d')));
} elseif (is_file($root . '/public/sitemap.xml')) {
    unlink($root . '/public/sitemap.xml');
}
file_put_contents($root . '/public/robots.txt', $robots);

echo 'OK: public/index.html gerado (' . ($url !== '' ? $url : 'sem domínio, noindex') . ")\n";
