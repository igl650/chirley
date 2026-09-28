<?php
declare(strict_types=1);

namespace StudioChirleyBraga;

$currentYear = date('Y');
?>
    <footer class="site-footer">
        <div class="container footer-inner">
            <a href="#inicio" class="brand-wordmark" aria-label="<?= attr(config('studio_name')) ?> - Início">
                <span class="brand-name"><?= e(config('professional_name')) ?></span>
                <span class="brand-descriptor">Studio de Pilates</span>
            </a>
            <p class="copyright">&copy; <?= e($currentYear) ?> <?= e(config('studio_name')) ?></p>
        </div>
    </footer>

    <script src="/assets/js/site.js" defer></script>
</body>
</html>
