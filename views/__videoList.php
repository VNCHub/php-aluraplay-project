<!DOCTYPE html>
<html lang="pt-br">
    <?php require_once __DIR__ . '/__head.php' ?>
    <body>
        <?php require_once __DIR__ . '/__header.php' ?>
        <ul class="videos__container" alt="videos alura">
            <?php foreach($videoList as $video) { ?>
            <li class="videos__item">
                <?php if ($video->getFilePath() != null): ?>
                    <img 
                    src= "<?= "./img/uploads/" . $video->getFilePath(); ?>" 
                    alt= "<?= $video->title; ?>" 
                    width="100%"/>
                <?php else: ?>
                <iframe width="100%" height="72%" src= <?= $video->url ?>
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <?php endif; ?>
                <div class="descricao-video">
                    <img src="./img/logo.png" alt="logo canal alura">
                    <h3><?= $video->title ?></h3>
                    <div class="acoes-video">
                        <a href="/editar-video?id=<?= $video->id ?>">Editar</a>
                        <a href="/remover-video?id=<?= $video->id ?>">Excluir</a>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </body>
</html>