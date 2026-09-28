<?php
declare(strict_types=1);

namespace StudioChirleyBraga;

require_once __DIR__ . '/app/config/site.php';
require_once __DIR__ . '/app/partials/header.php';
?>

<main id="conteudo-principal">
    <section class="hero" id="inicio">
        <div class="hero-text">
            <p class="hero-place">Juazeiro, Bahia</p>
            <h1 class="hero-title">Pilates com acompanhamento de fisioterapeuta.</h1>
            <p class="hero-lead">
                Aulas individualizadas com <?= e(config('professional_name')) ?>, no Passarela Center. Você escolhe o horário pelo WhatsApp.
            </p>
            <div class="hero-actions">
                <a href="<?= attr(config('whatsapp_url')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Agendar pelo WhatsApp</a>
                <a href="#estudio" class="link-arrow">Conhecer o estúdio</a>
            </div>
            <dl class="hero-facts">
                <div>
                    <dt>Experiência</dt>
                    <dd><?= e(config('experience_years')) ?> anos de Pilates</dd>
                </div>
                <div>
                    <dt>Formação</dt>
                    <dd>Fisioterapeuta</dd>
                </div>
                <div>
                    <dt>Google</dt>
                    <dd>
                        <a href="<?= attr(config('maps_url')) ?>" target="_blank" rel="noopener noreferrer">
                            <?= e(config('google_rating')) ?> · <?= e(config('google_review_count')) ?> avaliações
                        </a>
                    </dd>
                </div>
            </dl>
        </div>
        <div class="hero-photo">
            <img src="<?= attr(config('images')['hero_portrait']) ?>" alt="<?= attr(config('professional_name')) ?>, fisioterapeuta e instrutora de Pilates" width="1080" height="1440" fetchpriority="high">
        </div>
    </section>

    <section class="studio" id="estudio">
        <div class="container studio-grid">
            <div class="studio-text">
                <h2 class="section-title">Aparelhos de Pilates e atenção a cada aluno.</h2>
                <p>
                    O estúdio fica no Passarela Center, em Juazeiro. As aulas usam aparelhos como o Cadillac e o Reformer, com apoio de bolas e bosu quando o exercício pede.
                </p>
                <p>
                    O trabalho é individualizado: o que se faz em cada sessão parte das necessidades e dos objetivos de quem está ali.
                </p>
            </div>
            <div class="studio-photos">
                <img src="<?= attr(config('images')['studio']) ?>" alt="Aparelho Cadillac no Studio de Pilates Chirley Braga, com a logomarca do estúdio na parede" width="720" height="960" loading="lazy">
                <img src="<?= attr(config('images')['movement']) ?>" alt="Exercício em pé ao lado do aparelho Reformer, no estúdio" width="720" height="960" loading="lazy">
            </div>
        </div>
    </section>

    <section class="lessons" id="aulas">
        <div class="container lessons-grid">
            <div class="lessons-head">
                <h2 class="section-title">Aulas</h2>
                <p>Cada plano é definido em conversa com a Chirley, de acordo com a sua rotina e o seu objetivo.</p>
            </div>
            <dl class="info-list">
                <div>
                    <dt>Formato das aulas</dt>
                    <dd class="tbc">A combinar</dd>
                </div>
                <div>
                    <dt>Duração e frequência</dt>
                    <dd class="tbc">A combinar</dd>
                </div>
                <div>
                    <dt>Valores</dt>
                    <dd class="tbc">A combinar pelo WhatsApp</dd>
                </div>
                <div>
                    <dt>Horários</dt>
                    <dd class="tbc">A combinar conforme a disponibilidade</dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="about" id="chirley">
        <div class="container about-grid">
            <p class="about-statement">Atendimento humanizado, individualizado e baseado em evidências.</p>
            <div class="about-text">
                <h2 class="about-kicker"><?= e(config('professional_name')) ?></h2>
                <p>
                    Fisioterapeuta e instrutora de Pilates há <?= e(config('experience_years')) ?> anos. A base em fisioterapia orienta o jeito de conduzir as aulas: observar como cada pessoa se move e ajustar os exercícios a partir daí.
                </p>
                <a href="<?= attr(config('instagram_url')) ?>" target="_blank" rel="noopener noreferrer" class="link-arrow link-arrow--light">
                    Acompanhar no Instagram
                </a>
            </div>
        </div>
    </section>

    <section class="steps" id="como-comecar">
        <div class="container steps-grid">
            <div class="steps-head">
                <h2 class="section-title">Como começar</h2>
                <p>Não há formulário nem cadastro: o primeiro contato é uma conversa.</p>
            </div>
            <ol class="steps-list">
                <li>
                    <span class="steps-num" aria-hidden="true">1</span>
                    <div>
                        <h3>Envie uma mensagem</h3>
                        <p>Pelo WhatsApp, conte o que você busca com o Pilates.</p>
                    </div>
                </li>
                <li>
                    <span class="steps-num" aria-hidden="true">2</span>
                    <div>
                        <h3>Tire suas dúvidas</h3>
                        <p>Valores, formato das aulas e horários disponíveis são passados direto por lá.</p>
                    </div>
                </li>
                <li>
                    <span class="steps-num" aria-hidden="true">3</span>
                    <div>
                        <h3>Combine o horário</h3>
                        <p>Escolha o dia e a hora que cabem na sua semana.</p>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <section class="contact" id="contato">
        <div class="container contact-grid">
            <div class="contact-head">
                <h2 class="section-title">Onde estamos</h2>
                <div class="contact-actions">
                    <a href="<?= attr(config('whatsapp_url')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">Agendar pelo WhatsApp</a>
                    <a href="<?= attr(config('maps_url')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">Traçar rota</a>
                </div>
            </div>
            <dl class="info-list">
                <div>
                    <dt>Endereço</dt>
                    <dd>
                        <address>
                            <?= e(config('street_address')) ?><br>
                            <?= e(config('city')) ?>-<?= e(config('state')) ?> · CEP <?= e(config('postal_code')) ?><br>
                            <?= e(config('address_reference')) ?>
                        </address>
                    </dd>
                </div>
                <div>
                    <dt>Horário</dt>
                    <dd><?= e(config('opening_hours_display')) ?></dd>
                </div>
                <div>
                    <dt>WhatsApp</dt>
                    <dd><a href="<?= attr(config('whatsapp_url')) ?>" target="_blank" rel="noopener noreferrer"><?= e(config('phone_display')) ?></a></dd>
                </div>
                <div>
                    <dt>Instagram</dt>
                    <dd><a href="<?= attr(config('instagram_url')) ?>" target="_blank" rel="noopener noreferrer"><?= e(config('instagram_handle')) ?></a></dd>
                </div>
            </dl>
        </div>
    </section>
</main>

<?php
require_once __DIR__ . '/app/partials/footer.php';
