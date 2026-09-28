# Studio de Pilates Chirley Braga — Site

Site de uma página do Studio de Pilates Chirley Braga (Juazeiro-BA). O conteúdo é escrito em PHP e **gerado como HTML estático** em `public/`, que é o que vai para a Vercel (a Vercel não executa PHP).

## Estrutura

```text
├── build.php            # Gera public/index.html, robots.txt e sitemap.xml
├── vercel.json          # Configuração de publicação e cabeçalhos de segurança
├── src/
│   ├── index.php        # Conteúdo da página
│   └── app/
│       ├── config/site.php      # Dados do estúdio (contato, endereço, horário, links)
│       └── partials/            # Cabeçalho (SEO, schema.org) e rodapé
├── public/              # Site pronto para publicar
│   ├── index.html       # GERADO por build.php: não edite à mão
│   ├── 404.html
│   ├── robots.txt       # GERADO por build.php
│   ├── favicon.svg
│   └── assets/          # css, js e imagens
└── docs/                # Material de trabalho (fora do Git, ver .gitignore)
```

## Editar o site

1. Altere o texto em `src/index.php` ou os dados em `src/app/config/site.php`.
2. Gere o HTML:

```bash
php build.php
```

3. Confira localmente (precisa de PHP 8.2+ só para o build e a pré-visualização):

```bash
php -S localhost:8000 -t public
```

4. Faça o commit incluindo o `public/index.html` atualizado.

> Sempre rode `php build.php` antes do commit. Se esquecer, o site publicado fica desatualizado.

## Publicar na Vercel

1. Suba o repositório no GitHub (de preferência **privado** enquanto as fotos não tiverem autorização de uso).
2. Na Vercel: **Add New → Project**, importe o repositório. Não é preciso configurar nada: o `vercel.json` já define `public/` como pasta de saída e não há comando de build.
3. Conecte o domínio em **Settings → Domains**.

### Ao ter o domínio (indexação no Google)

Sem domínio, o site sai com `noindex, nofollow` (não aparece no Google) e sem imagem de pré-visualização do WhatsApp. Ao definir o domínio, gere de novo com ele e faça o commit:

```bash
php build.php https://seudominio.com.br
```

Isso ativa indexação, `canonical`, imagem Open Graph, `sitemap.xml` e a linha `Sitemap` no `robots.txt`. Depois envie o sitemap no Google Search Console e coloque o site na ficha do Google Meu Negócio.

## Antes de divulgar

- [ ] Confirmar com a Chirley horário, endereço/CEP e o texto da seção "Sobre".
- [ ] Preencher a seção "Aulas" (hoje "a combinar") em `src/index.php`.
- [ ] Autorização de uso das três fotos (hoje vindas do Instagram) e de quem aparece na foto do Reformer.
- [ ] Logotipo oficial em SVG/PNG no lugar do nome em texto no cabeçalho e no favicon.
- [ ] Conferir a nota e o número de avaliações do Google (`google_rating` e `google_review_count` em `src/app/config/site.php`).
- [ ] Testar o link do WhatsApp em um celular.
- [ ] Rodar `php build.php https://dominio` e fazer o commit.
